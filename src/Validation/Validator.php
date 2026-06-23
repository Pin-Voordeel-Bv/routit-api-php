<?php

namespace Inserve\RoutITAPI\Validation;

use ReflectionClass;
use Inserve\RoutITAPI\Exception\RoutITAPIException;

class Validator
{
    public static function validateNested(?object $obj, string $fieldName, array &$errors): void
    {
        if ($obj === null) {
            $errors[] = "Required nested object '$fieldName' is missing or null.";
            return;
        }

        if (!method_exists($obj, 'validate')) {
            $errors[] = "Object '$fieldName' does not support validation.";
            return;
        }

        $result = $obj->validate();
        if (is_array($result)) {
            $errors = array_merge($errors, $result);
        }
    }

    public static function validateOptionalNested(?object $obj, string $name, array &$errors): void
    {
        if ($obj === null) {
            return; // no validation needed if the optional object is missing
        }

        if (!method_exists($obj, 'validate')) {
            $errors[] = "Optional nested object '$name' does not have a validate() method.";
            return;
        }

        $nestedErrors = $obj->validate();
        if (!empty($nestedErrors)) {
            foreach ($nestedErrors as $e) {
                $errors[] = "$name: $e";
            }
        }
    }

    public static function validateEach(iterable $items, string $fieldName, array &$errors): void
    {
        foreach ($items as $i => $item) {
            if (!is_object($item) || !method_exists($item, 'validate')) {
                $errors[] = "Item at index $i in '$fieldName' is not a valid object with a validate() method.";
                continue;
            }

            $nestedErrors = $item->validate();
            if (!is_array($nestedErrors)) {
                $errors[] = "Validation for item at index $i in '$fieldName' did not return an error array.";
            } else {
                foreach ($nestedErrors as $e) {
                    $errors[] = "$fieldName[$i]: $e";
                }
            }
        }
    }

    public static function assertRequiredFieldsPresent(object $obj, array $requiredFields, array &$errors): void
    {
        $ref = new \ReflectionClass($obj);
        foreach ($requiredFields as $field) {
            if (!$ref->hasProperty($field)) {
                $errors[] = "Missing required property '$field' on " . get_class($obj) . ".";
                continue;
            }
            $prop = $ref->getProperty($field);
            $prop->setAccessible(true);
            $isInitialized = PHP_VERSION_ID >= 70400 ? $prop->isInitialized($obj) : true;
            if (!$isInitialized) {
                $errors[] = "Required property '$field' is not initialized.";
                continue;
            }

            try {
                $val = $prop->getValue($obj);
                if ($val === null || (is_string($val) && trim($val) === '')) {
                    $errors[] = "Required property '$field' is null or empty.";
                }
            } catch (\Error $e) {
                $errors[] = "Failed to access property '$field': " . $e->getMessage();
            }
        }
    }

    public static function assertRequiredPossibleEmptyFieldsPresent(object $obj, array $requiredFields, array &$errors): void
    {
        $ref = new \ReflectionClass($obj);
        foreach ($requiredFields as $field) {
            if (!$ref->hasProperty($field)) {
                $errors[] = "Missing required property '$field' on " . get_class($obj) . ".";
                continue;
            }
            $prop = $ref->getProperty($field);
            $prop->setAccessible(true);
            $isInitialized = PHP_VERSION_ID >= 70400 ? $prop->isInitialized($obj) : true;
            if (!$isInitialized) {
                $errors[] = "Required property '$field' is not initialized.";
                continue;
            }
        }
    }

    public static function assertStringLength(?string $value, ?int $min, ?int $max, string $fieldName, array &$errors): void
    {
        if ($value === null) {
            $errors[] = "Field '$fieldName' is null.";
            return;
        }
        $min = $min ?? 0;
        $len = strlen($value);
        if ($len < $min) {
            $errors[] = "Field '$fieldName' is shorter than minimum length $min.";
        }
        if ($max !== null && $len > $max) {
            $errors[] = "Field '$fieldName' is longer than maximum length $max.";
        }
    }

    public static function assertOptionalStringLength(
        mixed $value,
        ?int $minLength,
        ?int $maxLength,
        string $fieldName,
        array &$errors
    ): void {
        if ($value !== null) {
            self::assertStringLength($value, $minLength, $maxLength, $fieldName, $errors);
        }
    }

    public static function assertEnumValue(?string $value, array $allowedValues, string $fieldName, array &$errors): void
    {
        if ($value === null) {
            $errors[] = "Field '$fieldName' is empty. Allowed: " . implode(', ', $allowedValues);
            return;
        }

        if (!in_array($value, $allowedValues, true)) {
            $errors[] = "Invalid value for '$fieldName': $value. Allowed: " . implode(', ', $allowedValues);
        }
    }

    public static function assertOptionalEnumValue(?string $value, array $allowedValues, string $fieldName, array &$errors): void
    {
        if ($value !== null) {
            self::assertEnumValue($value, $allowedValues, $fieldName, $errors);
        }
    }

    public static function assertInitializedStringLength(
        object $obj,
        string $property,
        ?int $min,
        ?int $max,
        array &$errors
    ): void {
        $ref = new \ReflectionClass($obj);

        if (!$ref->hasProperty($property)) {
            $errors[] = "Missing property '$property' on " . get_class($obj);
            return;
        }

        $prop = $ref->getProperty($property);
        $prop->setAccessible(true);

        if (PHP_VERSION_ID >= 70400 && !$prop->isInitialized($obj)) {
            $errors[] = "Property '$property' is not initialized.";
            return;
        }

        try {
            $val = $prop->getValue($obj);
            self::assertStringLength($val, $min, $max, $property, $errors);
        } catch (\Error $e) {
            $errors[] = "Failed to access property '$property': " . $e->getMessage();
        }
    }

    public static function assertInitializedInt(
        object $obj,
        string $property,
        array &$errors
    ): void {
        $ref = new \ReflectionClass($obj);

        if (!$ref->hasProperty($property)) {
            $errors[] = "Missing property '$property' on " . get_class($obj);
            return;
        }

        $prop = $ref->getProperty($property);
        $prop->setAccessible(true);

        if (PHP_VERSION_ID >= 70400 && !$prop->isInitialized($obj)) {
            $errors[] = "Property '$property' is not initialized.";
            return;
        }

        try {
            $value = $prop->getValue($obj);
            if (!is_int($value)) {
                $errors[] = "Property '$property' must be an integer.";
            }
        } catch (\Error $e) {
            $errors[] = "Failed to access property '$property': " . $e->getMessage();
        }
    }

    public static function assertInitializedBool(object $obj, string $fieldName, array &$errors): void
    {
        $ref = new \ReflectionClass($obj);
        if (!$ref->hasProperty($fieldName)) {
            $errors[] = "Missing property '$fieldName' on " . get_class($obj) . ".";
            return;
        }

        $prop = $ref->getProperty($fieldName);
        $prop->setAccessible(true);
        $isInitialized = PHP_VERSION_ID >= 70400 ? $prop->isInitialized($obj) : true;

        if (!$isInitialized) {
            $errors[] = "Property '$fieldName' is not initialized.";
            return;
        }

        $value = $prop->getValue($obj);
        if (!is_bool($value)) {
            $errors[] = "Property '$fieldName' must be a boolean.";
        }
    }

    public static function assertInitializedDateString(
        object $obj,
        string $property,
        string $fieldName,
        array &$errors
    ): void {
        if (!property_exists($obj, $property)) {
            $errors[] = "Missing property '$fieldName' on " . get_class($obj) . ".";
            return;
        }

        $ref = new \ReflectionProperty($obj, $property);
        $ref->setAccessible(true);

        if (PHP_VERSION_ID >= 70400 && !$ref->isInitialized($obj)) {
            $errors[] = "Property '$fieldName' is not initialized.";
            return;
        }

        $value = $ref->getValue($obj);

        if (!is_string($value)) {
            $errors[] = "Field '$fieldName' must be a string.";
            return;
        }

        if (!strtotime($value)) {
            $errors[] = "Field '$fieldName' must be a valid date string (e.g., 'YYYY-MM-DD').";
        }
    }

    public static function assertOptionalBoolean(mixed $value, string $fieldName, array &$errors): void
    {
        if ($value !== null && !is_bool($value)) {
            $errors[] = "Field '$fieldName' must be a boolean (true or false).";
        }
    }

    public static function assertOptionalDateString(
        mixed $value,
        string $fieldName,
        array &$errors
    ): void {
        if ($value === null) {
            return;
        }

        if (!is_string($value)) {
            $errors[] = "Field '$fieldName' must be a string date (e.g., 'YYYY-MM-DD'), got " . gettype($value) . ".";
            return;
        }

        // Check if the format is roughly valid and parsable
        $ts = strtotime($value);
        if ($ts === false) {
            $errors[] = "Field '$fieldName' must be a valid date string (e.g., 'YYYY-MM-DD'). Given: " . var_export($value, true);
            return;
        }

        // Optionally check format stricter
        $parts = explode('-', $value);
        if (count($parts) !== 3 || strlen($parts[0]) !== 4 || strlen($parts[1]) !== 2 || strlen($parts[2]) !== 2) {
            $errors[] = "Field '$fieldName' is not in expected 'YYYY-MM-DD' format.";
        }
    }

    public static function assertIterable(mixed $value, string $fieldName, array &$errors): void
    {
        if (!is_iterable($value)) {
            $errors[] = "Field '$fieldName' must be iterable.";
        }
    }

    public static function throwIfErrors(array $errors): void
    {
        if (!empty($errors)) {
            throw new RoutITAPIException("Validation error(s)", 0, null, $errors);
        }
    }

    private function get_class_name($classname)
    {
        if ($pos = strrpos($classname, '\\')) return substr($classname, $pos + 1);
        return $pos;
    }

    public static function isInitialized(object $obj, string $property): bool
    {
        $ref = new \ReflectionClass($obj);
        if (!$ref->hasProperty($property)) {
            return false;
        }

        $prop = $ref->getProperty($property);
        if (PHP_VERSION_ID >= 70400 && !$prop->isInitialized($obj)) {
            return false;
        }

        return true;
    }

    public static function isDateString(string $value): bool
    {
        return (bool) \DateTime::createFromFormat('Y-m-d', $value);
    }
}

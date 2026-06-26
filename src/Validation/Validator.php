<?php

namespace Inserve\RoutITAPI\Validation;

use ReflectionClass;
use Inserve\RoutITAPI\Exception\RoutITAPIException;

class Validator
{
    /**
     * @template T of object
     * @param T $obj
     * @param string $field
     * @param array<string> $errors
     * @param bool $required
     * @return mixed
     */
    public static function getInitializedPropertyValue(object $obj, string $field, array &$errors, bool $required = true): mixed
    {
        $ref = new \ReflectionClass($obj);
        if (!$ref->hasProperty($field)) {
            if ($required) {
                $errors[] = self::formatFieldError($field, 'is missing from object of class ' . get_class($obj));
            }
            return null;
        }
        $prop = $ref->getProperty($field);
        $prop->setAccessible(true);
        $isInitialized = PHP_VERSION_ID >= 70400 ? $prop->isInitialized($obj) : true;
        if (!$isInitialized) {
            if ($required) {
                $errors[] = self::formatFieldError($field, 'is not initialized.');
            }
            return null;
        }
        try {
            return $prop->getValue($obj);
        } catch (\Throwable $e) {
            if ($required) {
                $errors[] = self::formatFieldError($field, 'could not be accessed: ' . $e->getMessage());
            }
            return null;
        }
    }

    /**
     * @param string $fieldName
     * @param string $message
     * @return string
     */
    private static function formatFieldError(string $fieldName, string $message): string
    {
        return "Field '$fieldName' $message";
    }

    /**
     * @param object $item
     * @param string $path
     * @param array<string> $errors
     */
    private static function invokeValidate(mixed $item, string $path, array &$errors): void
    {
        if (!is_object($item) || !method_exists($item, 'validate')) return;
        $result = $item->validate(...array_slice(func_get_args(), 2));
        if (is_array($result)) {
            foreach ($result as $err) {
                $errors[] = self::formatFieldError($path, $err);
            }
        }
   }

    /**
     * @param string|int|null $value
     * @param string $fieldName
     * @param callable(string|int|null): bool $predicate
     * @param string $errorMessage
     * @param array<string> $errors
     */
    private static function assertFieldMatches(mixed $value, string $fieldName, callable $predicate, string $errorMessage, array &$errors): void
    {
        if ($value === null) return;
        if (!$predicate($value)) {
            $errors[] = self::formatFieldError($fieldName, $errorMessage);
        }
    }

    /**
     * @param ?string $value
     * @param ?int $min
     * @param ?int $max
     * @param string $fieldName
     * @param array<string> $errors
     * @param bool $required
     */
    private static function assertStringLengthCommon(?string $value, ?int $min, ?int $max, string $fieldName, array &$errors, bool $required): void
    {
        if ($value === null) {
            if ($required) {
                $errors[] = self::formatFieldError($fieldName, 'is required and must be a string.');
            }
            return;
        }
        if (!is_string($value)) {
            $errors[] = self::formatFieldError($fieldName, 'must be a string.');
            return;
        }
        $len = mb_strlen($value);
        if ($min !== null && $len < $min) {
            $errors[] = self::formatFieldError($fieldName, "must be at least $min characters (got $len).");
        }
        if ($max !== null && $len > $max) {
            $errors[] = self::formatFieldError($fieldName, "must be at most $max characters (got $len).");
        }
    }

    /**
     * Validates a date string (YYYY-MM-DD) for presence and format.
     *
     * @param string|null $value
     * @param string $fieldName
     * @param array<string> $errors
     * @param bool $required Whether the field is required
     */
    private static function assertDateStringInternal(?string $value, string $fieldName, array &$errors, bool $required = false): void
    {
        if ($value === null || trim($value) === '') {
            if ($required) {
                $errors[] = self::formatFieldError($fieldName, 'is required but missing or empty.');
            }
            return;
        }
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $value) || !strtotime($value)) {
            $errors[] = self::formatFieldError($fieldName, 'must be a valid date string (YYYY-MM-DD).');
        }
    }

    /**
     * Validates a boolean value (or null) for optional/required presence and type.
     *
     * @param bool|null $value
     * @param string $fieldName
     * @param array<string> $errors
     * @param bool $required Whether the value must be present
     */
    private static function assertBooleanInternal(?bool $value, string $fieldName, array &$errors, bool $required = false): void
    {
        if ($required && $value === null) {
            $errors[] = self::formatFieldError($fieldName, 'is required and not initialized.');
            return;
        }

        if ($value !== null && !is_bool($value)) {
            $errors[] = self::formatFieldError($fieldName, 'must be a boolean (true or false).');
        }
    }

    /**
     * @param object $obj
     * @param string $property
     * @return bool Whether the property exists and is initialized (PHP 7.4+ safe)
     */
    private static function hasInitializedProperty(object $obj, string $property): bool
    {
        $ref = new \ReflectionProperty($obj, $property);
        $ref->setAccessible(true);
        return PHP_VERSION_ID < 70400 || $ref->isInitialized($obj);
    }

    public static function validateNested(?object $obj, string $fieldName, array &$errors): void
    {
        if ($obj === null) {
            $errors[] = self::formatFieldError($fieldName, 'is required but missing or null.');
            return;
        }

        if (!method_exists($obj, 'validate')) {
            $errors[] = self::formatFieldError($fieldName, 'does not support validation.');
            return;
        }

        $result = $obj->validate();
        if (is_array($result)) {
            $errors = array_merge($errors, $result);
        }
    }

    public static function validateOptionalNested(?object $obj, string $name, array &$errors, bool $reportErrors = true): void
    {
        if ($obj === null) {
            return; // no validation needed if the optional object is missing
        }

        if (!method_exists($obj, 'validate')) {
            $errors[] = self::formatFieldError($name, 'does not have a validate() method.');
            return;
        }

        if (!$reportErrors) {
            $nestedErrors = $obj->validate(false);
        } else {
            $nestedErrors = $obj->validate();
        }
        if (!empty($nestedErrors)) {
            foreach ($nestedErrors as $e) {
                $errors[] = self::formatFieldError($name, $e);
            }
        }
    }

    public static function validateEach(iterable|null $items, string $fieldName, array &$errors): void
    {
        if ($items === null) {
            $errors[] = self::formatFieldError($fieldName, 'is missing or null and must be iterable.');
            return;
        }

        foreach ($items as $i => $item) {
            if (!is_object($item)) {
                $errors[] = self::formatFieldError($fieldName, 'contains a non-object item.');
                continue;
            }

            if (!method_exists($item, 'validate')) {
                $errors[] = self::formatFieldError($fieldName, 'contains item without validate() method.');
                continue;
            }

            try {
                $result = match ((new \ReflectionMethod($item, 'validate'))->getNumberOfParameters()) {
                    0 => $item->validate(),
                    1 => $item->validate($errors),
                    default => throw new \RuntimeException("Unexpected validate() signature."),
                };

                if (is_array($result)) {
                    $errors = array_merge($errors, $result);
                }
            } catch (\Throwable $e) {
                $errors[] = self::formatFieldError($fieldName, 'validation threw: ' . $e->getMessage());
            }
        }
    }

    public static function assertRequiredFieldsPresent(object $obj, array $requiredFields, array &$errors): void
    {
        foreach ($requiredFields as $field) {
            $localErrors = [];
            $val = self::getInitializedPropertyValue($obj, $field, $localErrors);
            if (!empty($localErrors)) {
                $errors = array_merge($errors, $localErrors);
                continue;
            }
            if (is_string($val) && trim($val) === '') {
                $errors[] = self::formatFieldError($field, 'is null or empty.');
            }
        }
    }

    public static function assertRequiredPossibleEmptyFieldsPresent(object $obj, array $requiredFields, array &$errors): void
    {
        foreach ($requiredFields as $field) {
            if (!self::hasInitializedProperty($obj, $field)) {
                $errors[] = self::formatFieldError($field, 'is missing or not initialized.');
            }
        }
    }

    public static function assertStringLength(?string $value, ?int $min, ?int $max, string $fieldName, array &$errors): void
    {
        self::assertStringLengthCommon($value, $min, $max, $fieldName, $errors, true);
    }

    public static function assertOptionalStringLength(
        mixed $value,
        ?int $minLength,
        ?int $maxLength,
        string $fieldName,
        array &$errors
    ): void {
        self::assertStringLengthCommon($value, $minLength, $maxLength, $fieldName, $errors, false);
    }

    public static function assertEnumValue(
        ?string $value,
        array $allowedValues,
        string $fieldName,
        array &$errors
    ): void {
        if ($value === null || trim($value) === '') {
            $errors[] = self::formatFieldError($fieldName, "is empty. Allowed: " . implode(', ', $allowedValues));
            return;
        }

        self::assertFieldMatches(
            $value,
            $fieldName,
            fn($v) => in_array($v, $allowedValues, true),
            "must be one of: " . implode(', ', $allowedValues),
            $errors
        );
    }

    public static function assertOptionalEnumValue(
        object $obj,
        string $property,
        array $allowedValues,
        array &$errors
    ): void {
        $value = self::getInitializedPropertyValue($obj, $property, $errors, required: false);

        if ($value === null || $value === '') {
            return; // Optional: skip if not set or empty
        }

        self::assertEnumValue($value, $allowedValues, $property, $errors);
    }

    public static function assertRequiredEnum(?string $value, array $allowedValues, string $fieldName, array &$errors): void
    {
        if (!isset($value) || $value === '') {
            $errors[] = self::formatFieldError($field, 'is empty. Allowed: ' . implode(', ', $allowedValues));
        } elseif (!in_array($value, $allowedValues, true)) {
            $errors[] = self::formatFieldError($field, "value '$value' is invalid. Allowed: " . implode(', ', $allowedValues));
        }
    }

    public static function assertInitializedStringLength(
        object $obj,
        string $property,
        ?int $min,
        ?int $max,
        array &$errors
    ): void {
        $localErrors = [];
        $value = self::getInitializedPropertyValue($obj, $property, $localErrors);
        if (!empty($localErrors)) return;
        self::assertStringLength($value, $min, $max, $property, $errors);
    }

    public static function assertStringPropertyLength(
        object $obj,
        string $property,
        ?int $min,
        ?int $max,
        string $label,
        array &$errors
    ): void {
    $localErrors = [];
    $value = self::getInitializedPropertyValue($obj, $property, $localErrors);
    if (!empty($localErrors)) return;
        self::assertStringLength($value, $min, $max, $label, $errors);
    }

    public static function assertInitializedStringMatchingPattern(
        object $obj,
        string $fieldName,
        string $pattern,
        string $label,
        array &$errors
    ): void {
        $localErrors = [];
        $value = self::getInitializedPropertyValue($obj, $fieldName, $localErrors);
        if (!empty($localErrors)) return;
        if (!is_string($value) || !preg_match($pattern, $value)) {
            $errors[] = self::formatFieldError($label, "must match pattern $pattern. Given: " . var_export($value, true));
        }
    }

    public static function assertInitializedInt(
        object $obj,
        string $property,
        array &$errors
    ): void {
        $localErrors = [];
        $value = self::getInitializedPropertyValue($obj, $property, $localErrors);
        if (!empty($localErrors)) return;
        if (!is_int($value)) {
            $errors[] = self::formatFieldError($property, 'must be an integer.');
        }
    }

    public static function assertInitializedDateString(
        object $obj,
        string $property,
        string $fieldName,
        array &$errors
    ): void {
        $localErrors = [];
        $value = self::getInitializedPropertyValue($obj, $property, $localErrors);
        if (!empty($localErrors)) return;
        self::assertDateStringInternal($value, $fieldName, $errors);
    }

    // @TODO: does the class definition and serialization afterward prevent other then int?
    public static function assertOptionalInt(object $obj, string $propertyName, array &$errors): void
    {
        $localErrors = [];
        $value = self::getInitializedPropertyValue($obj, $propertyName, $localErrors, false);
        if (!empty($localErrors)) return;
        if ($value === null) return;
        self::assertFieldMatches(
            $value,
            $propertyName,
            fn($v) => is_int($v),
            "must be an integer",
            $errors
        );
    }

    // @TODO: does the class definition and serialization afterward prevent other then boolean?
    public static function assertOptionalBoolean(object $obj, string $propertyName, array &$errors): void
    {
        $localErrors = [];
        $value = self::getInitializedPropertyValue($obj, $propertyName, $localErrors, false);
        if (!empty($localErrors)) return;
        if ($value === null) return;
        self::assertFieldMatches(
            $value,
            $propertyName,
            fn($v) => is_bool($v),
            "must be a boolean (true or false).",
            $errors
        );
    }

    public static function assertInitializedBoolean(object $obj, string $fieldName, array &$errors): void
    {
        $localErrors = [];
        $value = self::getInitializedPropertyValue($obj, $fieldName, $localErrors);
        if (!empty($localErrors)) return;
        self::assertBooleanInternal($value, $fieldName, $errors, true);
    }

    public static function assertOptionalDateString(object $obj, string $fieldName, array &$errors): void
    {
        $value = self::getInitializedPropertyValue($obj, $fieldName, $errors, false);

        // Skip if not set
        if ($value === null || $value === '') {
            return;
        }

        if (!is_string($value)) {
            $errors[] = self::formatFieldError($fieldName, 'must be a string representing a date.');
            return;
        }

        self::assertDateStringInternal($value, $fieldName, $errors, false);
    }

    public static function assertWrappedArrayPresentAndValid(
        ?object $wrapper,
        string $fieldName,
        array &$errors
    ): void {
        if ($wrapper === null) {
            $errors[] = self::formatFieldError($fieldName, 'must not be null.');
            return;
        }

        if (!method_exists($wrapper, 'getItems')) {
            $errors[] = self::formatFieldError($fieldName, 'does not have a getItems() method.');
            return;
        }

        $items = $wrapper->getItems();

        if (!is_array($items) && !$items instanceof \Traversable) {
            $errors[] = self::formatFieldError($fieldName, 'must be iterable.');
            return;
        }

        $count = 0;
        foreach ($items as $i => $item) {
            $count++;
            if (method_exists($item, 'validate')) {
                $item->validate($errors);
            } else {
                $errors[] = self::formatFieldError("$fieldName[$i]", 'does not support validation.');
            }
        }

        if ($count === 0) {
            $errors[] = self::formatFieldError($fieldName, 'must not be empty.');
        }
    }

    // @TODO: remove because it is redundant
    // public static function assertIterable(mixed $value, string $fieldName, array &$errors): void
    // {
    //     if (!is_iterable($value)) {
    //         $errors[] = self::formatFieldError($fieldName, 'must be iterable.');
    //     }
    // }

    public static function throwIfErrors(array $errors): void
    {
        if (!empty($errors)) {
            throw new RoutITAPIException("Validation error(s)", 0, null, $errors);
        }
    }

    // private function get_class_name($classname)
    // {
    //     if ($pos = strrpos($classname, '\\')) return substr($classname, $pos + 1);
    //     return $pos;
    // }

    /**
     * @param object $obj
     * @param string $property
     * @return bool Alias for hasInitializedProperty()
     */
    public static function isInitialized(object $obj, string $property): bool
    {
        return self::hasInitializedProperty($obj, $property);
    }

    public static function isDateString(string $value): bool
    {
        return (bool) \DateTime::createFromFormat('Y-m-d', $value);
    }
}

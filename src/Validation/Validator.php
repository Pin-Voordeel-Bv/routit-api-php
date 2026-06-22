<?php

namespace Inserve\RoutITAPI\Validation;

use ReflectionClass;
use Inserve\RoutITAPI\Exception\RoutITAPIException;

class Validator
{
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

    public static function assertRequiredFieldsPresent(object $obj, array $requiredFields, array &$errors): void
    {
        $ref = new \ReflectionClass($obj);
        foreach ($requiredFields as $field) {
            if (!$ref->hasProperty($field)) {
                $errors[] = "Missing required property '$field' on " . get_class($obj);
                continue;
            }
            $prop = $ref->getProperty($field);
            $prop->setAccessible(true);
            $val = $prop->getValue($obj);
            if ($val === null || (is_string($val) && trim($val) === '')) {
                $errors[] = "Required property '$field' is null or empty.";
            }
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

    public static function throwIfErrors(array $errors): void
    {
        if (!empty($errors)) {
            throw new RoutITAPIException("Validation error(s)", 0, null, $errors);
        }
    }
}

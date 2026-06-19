<?php

namespace Inserve\RoutITAPI\Validation;

use InvalidArgumentException;
use ReflectionClass;

class Validator
{
    public static function assertStringLength(?string $value, ?int $min, ?int $max, string $fieldName): void
    {
        if ($value === null) {
            throw new InvalidArgumentException("Field '$fieldName' is null.");
        }

        $min = $min ?? 0;
        $valueStr = (string) $value;
        if (strlen($valueStr) < $min) {
            throw new InvalidArgumentException("Field '$fieldName' is shorter than minimum length $min.");
        }
        if ($max !== null && strlen($valueStr) > $max) {
            throw new InvalidArgumentException("Field '$fieldName' is longer than maximum length $max.");
        }
    }

    public static function assertRequiredFieldsPresent(object $obj, array $requiredFields): void
    {
        foreach ($requiredFields as $field) {
            $getter = 'get' . ucfirst($field);
            $value = null;

            if (method_exists($obj, $getter)) {
                $value = $obj->$getter();
            } else {
                $ref = new \ReflectionClass($obj);
                if ($ref->hasProperty($field)) {
                    $prop = $ref->getProperty($field);
                    $prop->setAccessible(true);
                    $value = $prop->getValue($obj);
                }
            }

            if ($value === null || (is_string($value) && trim($value) === '')) {
                throw new \InvalidArgumentException("Required property '$field' is null or empty.");
            }
        }
    }

    public static function assertOptionalStringLength(
        mixed $value,
        ?int $minLength,
        ?int $maxLength,
        string $fieldName
    ): void {
        if ($value !== null) {
            self::assertStringLength($value, $minLength, $maxLength, $fieldName);
        }
    }

    public static function assertEnumValue(string $value, array $allowedValues, string $fieldName): void
    {
        if (!in_array($value, $allowedValues, true)) {
            throw new InvalidArgumentException("Invalid value for '$fieldName': $value. Allowed: " . implode(', ', $allowedValues));
        }
    }

    public static function assertOptionalEnumValue(?string $value, array $allowedValues, string $fieldName): void
    {
        if ($value !== null) {
            self::assertEnumValue($value, $allowedValues, $fieldName);
        }
    }
}

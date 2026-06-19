<?php

namespace Inserve\RoutITAPI\Validation;

use InvalidArgumentException;
use ReflectionClass;

class Validator
{
    public static function assertStringLength(string $value, string $field, int $min, int $max): void
    {
        $len = mb_strlen($value);
        if ($len < $min || $len > $max) {
            throw new InvalidArgumentException("Field '$field' must be between $min and $max characters, got $len.");
        }
    }

    public static function assertRequiredFieldsPresent(object $obj, array $requiredFields): void
    {
        $ref = new ReflectionClass($obj);
        foreach ($requiredFields as $field) {
            if (!$ref->hasProperty($field)) {
                throw new InvalidArgumentException("Missing required property '$field' on " . get_class($obj));
            }
            $prop = $ref->getProperty($field);
            $prop->setAccessible(true);
            $val = $prop->getValue($obj);
            if ($val === null || (is_string($val) && trim($val) === '')) {
                throw new InvalidArgumentException("Required property '$field' is null or empty.");
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
}

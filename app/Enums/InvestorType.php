<?php

namespace App\Enums;

class InvestorType
{
    const SUBDIDIARIES = 1;
    const SISTER_COMPANIES = 2;

    /**
     * Get all possible values as an array.
     *
     * @return string[]
     */
    public static function getValues(): array
    {
        return [
            self::SUBDIDIARIES,
            self::SISTER_COMPANIES,
        ];
    }

    /**
     * Get the name for a specific value.
     *
     * @param string $value
     * @return string|null
     */
    public static function getName(string $value): ?string
    {
        $names = [
            self::SUBDIDIARIES => 'subsidiaries',
            self::SISTER_COMPANIES => 'Sister Companies',
        ];

        return $names[$value] ?? null;
    }

    /**
     * Validate if a given value is a valid enum value.
     *
     * @param string $value
     * @return bool
     */
    public static function isValid(string $value): bool
    {
        return in_array($value, self::getValues(), true);
    }
}

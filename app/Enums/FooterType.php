<?php

namespace App\Enums;

class FooterType
{
    const CERTIFICATIONS = 1;
    const PORTALS = 2;
    const SUBSIDIARIES = 3;

    /**
     * Get all possible values as an array.
     *
     * @return string[]
     */
    public static function getValues(): array
    {
        return [
            self::CERTIFICATIONS,
            self::PORTALS,
            self::SUBSIDIARIES,
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
            self::CERTIFICATIONS => 'certifications',
            self::PORTALS => 'portals',
            self::SUBSIDIARIES => 'subsidiaries',
        ];

        return $names[$value] ?? null;
    }

    /**
     * Get the value for a specific type.
     *
     * @param string $value
     * @return int|null
     */
    public static function getValue(string $value): ?string
    {
        $names = [
             'certifications' => self::CERTIFICATIONS ,
             'portals' => self::PORTALS ,
             'subsidiaries' => self::SUBSIDIARIES ,
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

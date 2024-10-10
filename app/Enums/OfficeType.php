<?php

namespace App\Enums;

class OfficeType
{
    const REGIONAL_OFFICES = 1;
    const AUTHORIZED_OFFICES = 2;
    const REGIONAL_REPRESENTATIVES = 3;

    /**
     * Get all possible values as an array.
     *
     * @return string[]
     */
    public static function getValues(): array
    {
        return [
            self::REGIONAL_OFFICES,
            self::AUTHORIZED_OFFICES,
            self::REGIONAL_REPRESENTATIVES,
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
            self::REGIONAL_OFFICES => 'Regional Offices',
            self::AUTHORIZED_OFFICES => 'Authorized Offices',
            self::REGIONAL_REPRESENTATIVES => 'Regional Representatives',
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
             'regional-offices' => self::REGIONAL_OFFICES ,
             'authorized-offices' => self::AUTHORIZED_OFFICES ,
             'regional-representatives' => self::REGIONAL_REPRESENTATIVES ,
        ];

        return $names[$value] ?? null;
    }

    /**
     * Get the color for a specific type.
     *
     * @param string $value
     * @return int|null
     */
    public static function getColor(string $value): ?string
    {
        $names = [
              self::REGIONAL_OFFICES => "#FF5733" ,
              self::AUTHORIZED_OFFICES => "#33C1FF" ,
              self::REGIONAL_REPRESENTATIVES => "#33FF57" ,
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

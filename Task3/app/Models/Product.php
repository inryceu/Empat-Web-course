<?php

namespace App\Models;

class Product
{
    private static $items = [
        ["name" => "some_name", "price" => 100, "is_available" => true],
        ["name" => "some_name2", "price" => 200, "is_available" => true],
        ["name" => "some_name3", "price" => 300, "is_available" => false]
    ];

    public static function getAll()
    {
        return self::$items;
    }

    public static function getAvailable()
    {
        $available = [];

        foreach (self::$items as $item) {
            if ($item["is_available"]) $available[] = $item;
        }

        return $available;
    }

    public static function findByName($name)
    {
        foreach (self::$items as $item) {
            if ($item["name"] === $name) return $item;
        }

        return null;
    }

    public static function addItem($item)
    {
        self::$items[] = $item;
    }

    public static function deleteByName($name)
    {
        $res = [];
        foreach (self::$items as $item) {
            if ($item["name"] != $name) $res[] = $item;
        }
        self::$items = $res;
    }
}

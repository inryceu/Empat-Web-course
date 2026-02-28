<?php

namespace App\Models;

class Product
{
    private static $id = 2;

    public static function getId()
    {
        self::$id++;
        return self::$id;
    }

    private static $items = [
        ["id" => 0, "name" => "some_name", "price" => 100, "is_available" => true],
        ["id" => 1, "name" => "some_name2", "price" => 200, "is_available" => true],
        ["id" => 2, "name" => "some_name3", "price" => 300, "is_available" => false]
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

    public static function findById($id)
    {
        foreach (self::$items as $item) {
            if ((int)$item["id"] === (int)$id) return $item;
        }

        return null;
    }

    public static function addItem($item)
    {
        $item['id'] = self::getId();
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

    public static function deleteById($id)
    {
        $res = [];
        foreach (self::$items as $item) {
            if ((int)$item["id"] !== (int)$id) $res[] = $item;
        }
        self::$items = $res;
    }
}

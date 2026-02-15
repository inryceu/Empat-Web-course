<?php

echo "<h1>Task2 Maluiev Pavlo</h1>";

echo "<hr>";

echo "<h2>1. Базовий синтаксис</h2>";

$int = 10;
$float = 3.14;
$string = "Павло";
$bool = true;

echo "Змінні: $int, $float, $string<br>";

$name = "Павло";
$age = 18;
$isStudying = true;
echo "Мене звати " . $name . ", мені " . $age . " років. Чи навчаюся я в EMPAT? " . ($isStudying ? "ТАК!" : "ні :(") . "<br>";

$array = [1, 2, 3];
$map = [
    "name" => "Павло",
    "email" => "pavel.maluev@mail.com"
];

echo "Перший елемент масиву: {$array[0]}<br>";
echo "Name: {$map['name']}<br>";
echo "Email: {$map['email']}<br>";

$csv = "PHP,JS,Dart";
$languages = explode(",", $csv);
echo "Explode: ";
print_r($languages);
echo "<br>";

$dashSeparated = implode(" - ", $languages);
echo "Implode: $dashSeparated<br>";

$var = "newVar";
$$var = "вміст";
echo "Розіменування: $newVar<br>";

$a = 0;
$b = "0";
$c = false;
echo "== : ";
var_dump($a == $b);
var_dump($a == $c);
var_dump($c == $b);
echo "<br>=== : ";
var_dump($a === $b);
var_dump($a === $c);
var_dump($c === $b);
echo "<br>";

$strNum = "123";
$intNum = (int)$strNum;
$boolNum = (bool)$intNum;
echo "Приведення типів: $intNum, $boolNum<br>";

echo "<hr>";

echo "<h2>2. ООП</h2>";

class User
{
    public string $name;
    private string $password;

    public function __construct(string $name, string $password)
    {
        $this->name = $name;
        $this->password = $password;
    }

    public function __get($var)
    {
        return $this->$var ?? null;
    }

    public function __set($var, $value)
    {
        $this->$var = $value;
    }

    public function __toString(): string
    {
        return "User: {$this->name}";
    }

    public function getName(): string
    {
        return $this->name;
    }
}

class Admin extends User
{
    private string $role;

    public function __construct(string $name, string $password, string $role)
    {
        parent::__construct($name, $password);
        $this->role = $role;
    }

    public function getRole(): string
    {
        return $this->role;
    }
}

class Math
{
    public static function sum($a, $b)
    {
        return $a + $b;
    }
}

interface Logger
{
    public function log(string $message): void;
}

class FileLogger implements Logger
{
    public function log(string $message): void
    {
        echo "Log in file: $message<br>";
    }
}

trait Timestamp
{
    public function now(): string
    {
        return date("Y-m-d H:i:s");
    }
}

class Post
{
    private string $postMessage;

    public function __construct(string $msg)
    {
        $this->postMessage = $msg;
    }

    public function publish()
    {
        echo "Log: $this->postMessage (was posted at {$this->now()})<br>";
    }

    use Timestamp;
}

class Database
{
    private static ?Database $instance = null;

    private function __construct() {}

    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}

$user = new User("Павло", "1234");
echo $user . "<br>";

$admin = new Admin("admin", "superuser", "root");
echo "Ім'я адміна: " . $admin->getName() . "<br>";
echo "Роль адміна: " . $admin->getRole() . "<br>";

echo "статичний метод: " . Math::sum(2, 5) . "<br>";

$logger = new FileLogger();
$logger->log("Це тестовий лог");

$post = new Post("Це тестовий пост");
$post->publish();

$db1 = Database::getInstance();
$db2 = Database::getInstance();
echo "Робота сінглтона: ";
var_dump($db1 === $db2);
echo "<br>";

$user->name = "Pavlo";
$user->password = "newPassword";
echo "Оновлений користувач: " . $user->getName() . "<br>";

echo "<hr>";

echo "<h2>3. HTTP-запити</h2>";

echo "GET name: <b>" . ($_GET['name'] ?? 'немає') . "</b><br>";

echo "POST email: <b>" . ($_POST['email'] ?? 'немає') . "</b><br>";

echo "REQUEST data: <b>" . ($_REQUEST['data'] ?? 'немає') . "</b><br>";

class Request
{
    public static function get(string $key, $default = null)
    {
        return $_GET[$key] ?? $default;
    }

    public static function post(string $key, $default = null)
    {
        return $_POST[$key] ?? $default;
    }
}

echo "Wrapper GET: " . Request::get("name", "—") . "<br>";

setcookie("user", "Pavlo", time() + 5);
echo "Cookie user: " . ($_COOKIE['user'] ?? 'ще не встановлено') . "<br>";

session_start();
$_SESSION["user_id"] = 42;
echo "Session user_id: " . $_SESSION["user_id"] . "<br>";

echo "<hr>";

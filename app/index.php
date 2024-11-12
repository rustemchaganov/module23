<?php

abstract class Vehicle
{
    protected string $name;
    protected string $wheelType;
    protected string $engine;
    protected string $body;

    public function __construct(string $name, string $wheelType, string $engine, string $body)
    {
        $this->name = $name;
        $this->wheelType = $wheelType;
        $this->engine = $engine;
        $this->body = $body;
    }

    public function moveForward(): void
    {
        echo $this->name . " двигается вперёд ↑ <br>";
    }

    public function moveBackward(): void
    {
        echo $this->name . " двигается назад ↓ <br>";
    }

    public function moveLeft(): void
    {
        echo $this->name . " двигается влево ← <br>";
    }

    public function moveRight(): void
    {
        echo $this->name . " двигается вправо → <br>";
    }

    public function vehicleHonk(): void
    {
        echo $this->name . " сигналит <br>";
    }

    public function vehicleWipersActivate(): void
    {
        echo $this->name . " включает дворники <br>";
    }
}

interface VehicleInterface
{
    public function activeAbility();

    public function lightsOn();
}

class Car extends Vehicle implements VehicleInterface
{
    public string $interior;

    public function __construct(string $name, string $wheelType, string $engine, string $body, string $interior)
    {
        parent::__construct($name, $wheelType, $engine, $body);
        $this->interior = $interior;
    }

    public function activeAbility(): void
    {
        echo $this->name . " валит боком ↪ <br>";
    }

    public function lightsOn(): void
    {
        echo $this->name . " включает фары <br>";
    }
}

class Tank extends Vehicle implements VehicleInterface
{
    public string $tankCrew;

    public function __construct(string $name, string $wheelType, string $engine, string $body, string $tankCrew)
    {
        parent::__construct($name, $wheelType, $engine, $body);
        $this->tankCrew = $tankCrew;
    }

    public function activeAbility(): void
    {
        echo $this->name . " стреляет ↯,есть пробитие ⟴ <br>";
    }

    public function lightsOn(): void
    {
        echo $this->name . " включает фары <br>";
    }

    public function vehicleWipersActivate(): void
    {
        echo "У " . $this->name . " дворников нет <br>";
    }
}

class Tractor extends Vehicle implements VehicleInterface
{
    public function activeAbility(): void
    {
        echo $this->name . " убирает ковшом ⇋ <br>";
    }

    public function lightsOn(): void
    {
        echo $this->name . " включает фары <br>";
    }
}

//function vehicleController(Vehicle vehicle): void
//{
//    vehicle->activeAbility();
//    vehicle− > moveForward();
//    vehicle− > moveForward();
//    vehicle->moveRight();
//    vehicle− > moveLeft();
//    vehicle− > moveLeft();
//    vehicle->moveBackward();
//    vehicle− > vehicleHonk();
//    vehicle− > vehicleHonk();
//    vehicle->vehicleWipersActivate();
//    $vehicle->lightsOn();
//}

function vehicleController(Vehicle $vehicle): void
{
    $methods = [
        'activeAbility',
        'moveForward',
        'moveRight',
        'moveLeft',
        'moveBackward',
        'vehicleHonk',
        'vehicleWipersActivate',
        'lightsOn',
    ];

    shuffle($methods);

    $randomMethods = array_slice($methods, 0, 4);

    foreach ($randomMethods as $method) {
        if (method_exists($vehicle, $method)) {
            $vehicle->$method();
        }
    }
}

$Car = new Car("Ford", "R21x4", "EcoBoost V6 engine", "sedan", "red interior");
$Tank = new Tank("Conqueror", "road wheels", "	Rolls-Royce Meteor M120", "5 inch armor", "5 people");
$Tractor = new Tractor("John Deere", "12.4-24 и 16.9-28", "John Deere 3029HTD", "open cab");

vehicleController($Car);
vehicleController($Tank);
vehicleController($Tractor);

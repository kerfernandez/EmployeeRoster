<?php

class HourlyEmployee {
    private string $name;
    private string $address;
    private int $age;
    private string $companyName;
    private float $hoursWorked;
    private float $hourlyRate;

    public function __construct($name, $address, $age, $companyName, $hoursWorked, $hourlyRate) {
        $this->name = $name;
        $this->address = $address;
        $this->age = $age;
        $this->companyName = $companyName;
        $this->hoursWorked = $hoursWorked;
        $this->hourlyRate = $hourlyRate;
    }

    public function getName() {
        return $this->name;
    }

    public function calculatePay() {
        return $this->hoursWorked * $this->hourlyRate;
    }
}
?>

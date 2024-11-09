<?php

class CommissionEmployee {
    private string $name;
    private string $address;
    private int $age;
    private string $companyName;
    private float $regularSalary;
    private int $itemsSold;
    private float $commissionRate;

    public function __construct($name, $address, $age, $companyName, $regularSalary, $itemsSold, $commissionRate) {
        $this->name = $name;
        $this->address = $address;
        $this->age = $age;
        $this->companyName = $companyName;
        $this->regularSalary = $regularSalary;
        $this->itemsSold = $itemsSold;
        $this->commissionRate = $commissionRate;
    }

    public function getName() {
        return $this->name;
    }

    public function calculatePay() {
        return $this->regularSalary + ($this->itemsSold * $this->commissionRate / 100);
    }
}
?>

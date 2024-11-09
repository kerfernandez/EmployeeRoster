<?php

require_once 'Employee.php';

class CommissionEmployee extends Employee {
    public function __construct(
        string $name, 
        string $address, 
        int $age, 
        string $companyName, 
        private float $regularSalary, 
        private int $itemSold, 
        private float $commissionRate
    ) {
        parent::__construct($name, $address, $age, $companyName);
        $this->commissionRate /= 100;  
    }

    public function getRegularSalary(): float {
        return $this->regularSalary;
    }

    public function getItemSold(): int {
        return $this->itemSold;
    }

    public function getCommissionRate(): float {
        return $this->commissionRate;
    }

    public function earnings(): float {
        return $this->regularSalary + ($this->itemSold * $this->commissionRate);
    }

    public function __toString(): string {
        return sprintf(
            "%s, Regular Salary: %.2f, Items Sold: %d, Commission Rate: %.2f", 
            parent::__toString(), 
            $this->regularSalary, 
            $this->itemSold, 
            $this->commissionRate
        );
    }
}
?>

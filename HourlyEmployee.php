<?php

require_once 'Employee.php';

class HourlyEmployee extends Employee {
    public function __construct(
        string $name, 
        string $address, 
        int $age, 
        string $companyName, 
        private int $hoursWorked, 
        private float $rate
    ) {
        parent::__construct($name, $address, $age, $companyName);
    }

    public function getHoursWorked(): int {
        return $this->hoursWorked;
    }

    public function getRate(): float {
        return $this->rate;
    }

    public function earnings(): float {
        $overtimeHours = max(0, $this->hoursWorked - 40);
        $regularHours = min(40, $this->hoursWorked);
        return ($regularHours * $this->rate) + ($overtimeHours * $this->rate * 1.5);
    }

    public function __toString(): string {
        return sprintf(
            "%s, Hours Worked: %d, Rate: %.2f", 
            parent::__toString(), 
            $this->hoursWorked, 
            $this->rate
        );
    }
}
?>

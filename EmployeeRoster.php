<?php

class EmployeeRoster {
    private array $employees = [];
    private int $maxSize;

    public function __construct(int $maxSize) {
        $this->maxSize = $maxSize;
    }

    public function add($employee) {
        if (count($this->employees) < $this->maxSize) {
            $this->employees[] = $employee;
        } else {
            echo "Roster is full.\n";
        }
    }

    public function remove(int $index) {
        if (isset($this->employees[$index - 1])) {
            unset($this->employees[$index - 1]);
            $this->employees = array_values($this->employees); // Reindex the array
        } else {
            echo "Invalid employee number.\n";
        }
    }

    public function display() {
        foreach ($this->employees as $index => $employee) {
            echo ($index + 1) . ". " . get_class($employee) . " - " . $employee->getName() . "\n";
        }
    }

    public function count() {
        return count($this->employees);
    }

    // Count methods for different types of employees (example placeholders):
    public function countCE() { return count(array_filter($this->employees, fn($e) => $e instanceof CommissionEmployee)); }
    public function countHE() { return count(array_filter($this->employees, fn($e) => $e instanceof HourlyEmployee)); }
    public function countPE() { return count(array_filter($this->employees, fn($e) => $e instanceof PieceWorker)); }

    // Payroll method for example purposes:
    public function payroll() {
        foreach ($this->employees as $employee) {
            echo $employee->getName() . " will be paid: " . $employee->calculatePay() . "\n";
        }
    }
}
?>

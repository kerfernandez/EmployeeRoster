<?php

require_once 'Person.php';

abstract class Employee extends Person {
    public function __construct(
        string $name, 
        string $address, 
        int $age, 
        private string $companyName
    ) {
        parent::__construct($name, $address, $age);
    }

    public function getCompanyName(): string {
        return $this->companyName;
    }

    public function setCompanyName(string $companyName): void {
        $this->companyName = $companyName;
    }

    abstract public function earnings(): float;

    public function __toString(): string {
        return sprintf("%s, Company: %s", parent::__toString(), $this->companyName);
    }
}
?>

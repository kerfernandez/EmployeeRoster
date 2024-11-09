<?php

class Person {
    private string $fullName;
    private string $residentialAddress;
    private int $yearsOld;

    public function __construct(string $fullName, string $residentialAddress, int $yearsOld) {
        $this->fullName = $fullName;
        $this->residentialAddress = $residentialAddress;
        $this->yearsOld = $yearsOld;
    }

    public function getFullName(): string {
        return $this->fullName;
    }
    public function setFullName(string $fullName): void {
        $this->fullName = $fullName;
    }

    public function getResidentialAddress(): string {
        return $this->residentialAddress;
    }
    public function setResidentialAddress(string $residentialAddress): void {
        $this->residentialAddress = $residentialAddress;
    }

    public function getYearsOld(): int {
        return $this->yearsOld;
    }
    public function setYearsOld(int $yearsOld): void {
        $this->yearsOld = $yearsOld;
    }

    public function __toString(): string {
        return "Name: $this->fullName, Address: $this->residentialAddress, Age: $this->yearsOld";
    }
}
?>

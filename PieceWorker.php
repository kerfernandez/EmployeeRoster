<?php

require_once 'Employee.php';

class PieceWorker extends Employee {
    private int $itemsProduced;
    private float $ratePerItem;

    public function __construct(string $name, string $address, int $age, string $companyName, int $itemsProduced, float $ratePerItem) {
        parent::__construct($name, $address, $age, $companyName);
        $this->itemsProduced = $itemsProduced;
        $this->ratePerItem = $ratePerItem;
    }

    public function getItemsProduced(): int {
        return $this->itemsProduced;
    }

    public function getRatePerItem(): float {
        return $this->ratePerItem;
    }

    public function earnings(): float {
        return $this->itemsProduced * $this->ratePerItem;
    }

    public function __toString(): string {
        return parent::__toString() . ", Items Produced: $this->itemsProduced, Rate per Item: $this->ratePerItem";
    }
}
?>

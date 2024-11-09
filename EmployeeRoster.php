<?php
    class EmployeeRoster {
        private array $roster;
        
        public function __construct(private int $size) {
            $this->roster = array_fill(0, $size, null);
        }

        public function add(Employee $employee): void {
            $index = array_search(null, $this->roster, true);
            if ($index !== false) {
                $this->roster[$index] = $employee;
                echo "Employee added at position " . ($index + 1) . "\n";
            } else {
                echo "Roster is full! Cannot add more employees.\n";
            }
        }

        public function remove(int $employeeNumber): void {
            $index = $employeeNumber - 1;
            if ($this->isValidIndex($index) && $this->roster[$index] !== null) {
                echo "Removing Employee at position " . $employeeNumber . ":\n" . $this->roster[$index] . "\n";
                $this->roster[$index] = null;
                echo "Employee removed successfully.\n";
            } else {
                echo "Invalid employee number or employee already removed.\n";
            }
        }

        public function count(): int {
            return count(array_filter($this->roster));
        }

        public function countByType(string $classType): int {
            return count(array_filter($this->roster, fn($employee) => $employee instanceof $classType));
        }

        public function display(): void {
            echo "*** List of Employees on the Current Roster ***\n";
            foreach ($this->roster as $index => $employee) {
                echo "Employee #" . ($index + 1) . ":\n";
                if ($employee !== null) {
                    echo "Name       : " . $employee->getName() . "\n";
                    echo "Address    : " . $employee->getAddress() . "\n";
                    echo "Age        : " . $employee->getAge() . "\n";
                    echo "Company    : " . $employee->getCompanyName() . "\n";
                    echo "Type       : " . $this->getEmployeeType($employee) . "\n";
                } else {
                    echo "Empty Slot\n";
                }
                echo "------------------------------\n";
            }
        }

        public function displayByType(string $classType): void {
            echo "*** " . $classType . " Employees ***\n";
            foreach ($this->roster as $employee) {
                if ($employee instanceof $classType) {
                    echo $employee . "\n";
                }
            }
        }

        public function payroll(): void {
            echo "*** Payroll for All Employees ***\n";
            foreach ($this->roster as $employee) {
                if ($employee !== null) {
                    echo $employee . " - Earnings: $" . $employee->earnings() . "\n";
                }
            }
        }

        private function isValidIndex(int $index): bool {
            return $index >= 0 && $index < $this->size;
        }

        private function getEmployeeType($employee): string {
            return match(true) {
                $employee instanceof CommissionEmployee => 'Commission',
                $employee instanceof HourlyEmployee => 'Hourly',
                $employee instanceof PieceWorker => 'Piece Worker',
                default => 'Unknown'
            };
        }
    }
?>

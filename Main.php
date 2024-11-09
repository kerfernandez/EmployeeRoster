<?php
class Main {

private EmployeeRoster $roster;
private int $size;
private bool $repeat;

public function start() {
    $this->clear();
    $this->repeat = true;

    $this->size = (int)readline("Enter the size of the roster: ");
    if ($this->size < 1) {
        echo "Invalid input. Please try again.\n";
        readline("Press \"Enter\" key to continue...");
        $this->start();
    }

    
    $this->roster = new EmployeeRoster($this->size);
    $this->entrance(); 
}

public function entrance() {
    while ($this->repeat) {
        $this->clear();
        $this->menu();

        $choice = (int)readline("Select an option: ");

        switch ($choice) {
            case 1:
                $this->addMenu();
                break;
            case 2:
                $this->deleteMenu();
                break;
            case 3:
                $this->otherMenu();
                break;
            case 0:
                $this->repeat = false; 
                break;
            default:
                echo "Invalid input. Please try again.\n";
                readline("Press \"Enter\" key to continue...");
                break;
        }
    }
    echo "Process terminated.\n";
    exit;
}

public function menu() {
    echo "*** EMPLOYEE ROSTER MENU ***\n";
    echo "[1] Add Employee\n";
    echo "[2] Delete Employee\n";
    echo "[3] Other Menu\n";
    echo "[0] Exit\n";
}

public function addMenu() {
    $name = readline("Enter employee name: ");
    $address = readline("Enter employee address: ");
    $age = (int)readline("Enter employee age: ");
    $companyName = readline("Enter company name: ");

    $this->empType($name, $address, $age, $companyName);
}

public function empType($name, $address, $age, $cName) {
    $this->clear();
    echo "--- Employee Details ---\n";
    echo "Name: $name\n";
    echo "Address: $address\n";
    echo "Company Name: $cName\n";
    echo "Age: $age\n";
    echo "[1] Commission Employee\n";
    echo "[2] Hourly Employee\n";
    echo "[3] Piece Worker\n";
    
    $type = (int)readline("Type of Employee: ");

    switch ($type) {
        case 1:
            $regularSalary = (float)readline("Enter regular salary: ");
            $itemsSold = (int)readline("Enter items sold: ");
            $commissionRate = (float)readline("Enter commission rate (%): ");
            $employee = new CommissionEmployee($name, $address, $age, $cName, $regularSalary, $itemsSold, $commissionRate);
            $this->roster->add($employee);
            break;
        case 2:
            $hoursWorked = (float)readline("Enter hours worked: ");
            $rate = (float)readline("Enter hourly rate: ");
            $employee = new HourlyEmployee($name, $address, $age, $cName, $hoursWorked, $rate);
            $this->roster->add($employee);
            break;
        case 3:
            $numberItems = (int)readline("Enter number of items: ");
            $wagePerItem = (float)readline("Enter wage per item: ");
            $employee = new PieceWorker($name, $address, $age, $cName, $numberItems, $wagePerItem);
            $this->roster->add($employee);
            break;
        default:
            echo "Invalid input. Please try again.\n";
            readline("Press \"Enter\" key to continue...");
            $this->empType($name, $address, $age, $cName);
            return;
    }

    $this->repeat(); 
}

public function deleteMenu() {
    $this->clear();
    echo "*** List of Employees on the Current Roster ***\n";
    $this->roster->display(); 
    $employeeNumber = (int)readline("Enter the employee number to delete (0 to cancel): ");

    if ($employeeNumber > 0 && $employeeNumber <= $this->size) {
        $this->roster->remove($employeeNumber);
        echo "Employee removed successfully.\n";
    } else if ($employeeNumber !== 0) {
        echo "Invalid employee number.\n";
    }

    readline("\nPress \"Enter\" key to continue...");
}

public function otherMenu() {
    $this->clear();
    echo "[1] Display\n";
    echo "[2] Count\n";
    echo "[3] Payroll\n";
    echo "[0] Return\n";
    
    $choice = (int)readline("Select Menu: ");

    switch ($choice) {
        case 1:
            $this->roster->display(); 
            break;
        case 2:
            echo "Total Employees: " . $this->roster->count() . "\n";
            echo "Commission Employees: " . $this->roster->countCE() . "\n";
            echo "Hourly Employees: " . $this->roster->countHE() . "\n";
            echo "Piece Workers: " . $this->roster->countPE() . "\n";
            break;
        case 3:
            $this->roster->payroll(); 
            break;
        case 0:
            return; 
        default:
            echo "Invalid input. Please try again.\n";
            break;
    }

    readline("\nPress \"Enter\" key to continue...");
    $this->otherMenu();
}

public function clear() {
    system('cls'); 
}

public function repeat() {
    echo "Employee Added!\n";
    if ($this->roster->count() < $this->size) {
        $c = readline("Add more? (y to continue): ");
        if (strtolower($c) == 'y')
            $this->addMenu();
        else
            $this->entrance();
    } else {
        echo "Roster is Full\n";
        readline("Press \"Enter\" key to continue...");
        $this->entrance();
    }
}
}


$main = new Main();
$main->start();
?>
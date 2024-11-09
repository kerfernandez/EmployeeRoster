<?php


include_once 'Person.php';
include_once 'Employee.php';
include_once 'CommissionEmployee.php';
include_once 'HourlyEmployee.php';
include_once 'PieceWorker.php';
include_once 'EmployeeRoster.php';
include_once 'MainController.php';


$app = new MainController();
$app->initialize();
?>
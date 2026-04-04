<?php
session_start();
require_once "./controller/StudentController.php";

$controller = new StudentController();
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

switch ($action) {
    case 'add':
        $controller->add();
        break;
    case 'edit':
        $controller->edit();
        break;
    case 'delete':
        $controller->delete();
        break;
    case 'list':
    default:
        $controller->list();
        break;
}
?>
<?php
require_once "./model/Student.php";

class StudentController {
    public function list() {
        $students = Student::getAll();
        include "./view/student_list.php";
    }

    public function add() {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $major = trim($_POST['major']);

            if (empty($name) || empty($major)) {
                $error = "Không được để trống dữ liệu!";
            } elseif (strlen($name) < 3) {
                $error = "Tên phải từ 3 ký tự trở lên!";
            } else {
                Student::add($name, $major);
                header("Location: index.php?action=list");
                exit;
            }
        }
        include "./view/student_form.php";
    }

    public function edit() {
        $error = '';
        $id = $_GET['id'] ?? 0;
        $student = Student::getById($id);

        if (!$student) {
            die("Không tìm thấy sinh viên!");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $major = trim($_POST['major']);

            if (empty($name) || empty($major)) {
                $error = "Không được để trống dữ liệu!";
            } elseif (strlen($name) < 3) {
                $error = "Tên phải từ 3 ký tự trở lên!";
            } else {
                Student::update($id, $name, $major);
                header("Location: index.php?action=list");
                exit;
            }
        }
        include "./view/student_form.php";
    }

    public function delete() {
        $id = $_GET['id'] ?? 0;
        Student::delete($id);
        header("Location: index.php?action=list");
        exit;
    }
}
?>
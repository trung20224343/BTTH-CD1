<?php
class Student {
    public static function init() {
        if (!isset($_SESSION['students'])) {
            $_SESSION['students'] = [
                ["id" => 1, "name" => "Nguyen Van A", "major" => "CNTT"],
                ["id" => 2, "name" => "Tran Thi B", "major" => "Kinh tế"],
            ];
        }
    }

    public static function getAll() {
        self::init();
        return $_SESSION['students'];
    }

    public static function getById($id) {
        self::init();
        foreach ($_SESSION['students'] as $st) {
            if ($st['id'] == $id) return $st;
        }
        return null;
    }

    public static function add($name, $major) {
        self::init();
        $newId = count($_SESSION['students']) > 0 ? max(array_column($_SESSION['students'], 'id')) + 1 : 1;
        $_SESSION['students'][] = ["id" => $newId, "name" => $name, "major" => $major];
    }

    public static function update($id, $name, $major) {
        self::init();
        foreach ($_SESSION['students'] as $key => $st) {
            if ($st['id'] == $id) {
                $_SESSION['students'][$key]['name'] = $name;
                $_SESSION['students'][$key]['major'] = $major;
                break;
            }
        }
    }

    public static function delete($id) {
        self::init();
        foreach ($_SESSION['students'] as $key => $st) {
            if ($st['id'] == $id) {
                unset($_SESSION['students'][$key]);
                break;
            }
        }
        $_SESSION['students'] = array_values($_SESSION['students']);
    }
}
?>
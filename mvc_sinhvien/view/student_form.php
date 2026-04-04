<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?= isset($student) ? 'Sửa sinh viên' : 'Thêm sinh viên' ?></title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f7f6; color: #333; margin: 0; padding: 20px; }
        .container { max-width: 500px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #2c3e50; margin-bottom: 25px; }
        
        .error { color: #e74c3c; background: #fadbd8; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center; border: 1px solid #f5b7b1; }
        
        label { font-weight: bold; display: block; margin-bottom: 8px; color: #34495e; }
        input[type="text"] { width: 100%; padding: 12px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; font-size: 15px; transition: 0.3s; }
        input[type="text"]:focus { border-color: #3498db; outline: none; box-shadow: 0 0 5px rgba(52, 152, 219, 0.4); }
        
        .btn-submit { background: #3498db; color: white; border: none; padding: 12px; font-size: 16px; border-radius: 5px; cursor: pointer; width: 100%; font-weight: bold; transition: 0.3s; margin-bottom: 15px; }
        .btn-submit:hover { background: #2980b9; }
        .btn-cancel { display: block; text-align: center; color: #7f8c8d; text-decoration: none; font-size: 14px; }
        .btn-cancel:hover { color: #34495e; text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h2><?= isset($student) ? 'Sửa thông tin sinh viên' : 'Thêm sinh viên mới' ?></h2>
        
        <?php if(!empty($error)): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <label>Họ và tên:</label>
            <input type="text" name="name" value="<?= isset($student) ? htmlspecialchars($student['name']) : (isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '') ?>" placeholder="Nhập họ tên...">
            
            <label>Ngành học:</label>
            <input type="text" name="major" value="<?= isset($student) ? htmlspecialchars($student['major']) : (isset($_POST['major']) ? htmlspecialchars($_POST['major']) : '') ?>" placeholder="Nhập chuyên ngành...">
            
            <button type="submit" class="btn-submit">Lưu thông tin</button>
            <a href="index.php?action=list" class="btn-cancel">Quay lại danh sách</a>
        </form>
    </div>
</body>
</html>
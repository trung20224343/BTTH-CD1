<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f7f6; color: #333; margin: 0; padding: 20px; }
        .container { max-width: 800px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #2c3e50; margin-bottom: 20px; }
        
        .btn-add { display: inline-block; background: #28a745; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; font-weight: bold; transition: 0.3s; margin-bottom: 15px; }
        .btn-add:hover { background: #218838; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #34495e; color: white; font-weight: bold; }
        tr:hover { background-color: #f1f1f1; }
        
        .btn-action { color: #fff; padding: 6px 12px; text-decoration: none; border-radius: 4px; font-size: 14px; transition: 0.3s; margin-right: 5px; }
        .btn-edit { background: #f39c12; }
        .btn-edit:hover { background: #d68910; }
        .btn-delete { background: #e74c3c; }
        .btn-delete:hover { background: #c0392b; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Danh sách sinh viên</h2>
        <a href="index.php?action=add" class="btn-add">+ Thêm sinh viên mới</a>
        
        <table>
            <tr>
                <th>STT</th>
                <th>Họ tên</th>
                <th>Ngành học</th>
                <th>Hành động</th>
            </tr>
            
            <?php $stt = 1; foreach ($students as $st): ?>
            <tr>
                <td><?= $stt++ ?></td>
                <td><?= $st["name"] ?></td>
                <td><?= $st["major"] ?></td>
                <td>
                    <a href="index.php?action=edit&id=<?= $st['id'] ?>" class="btn-action btn-edit">Sửa</a>
                    <a href="index.php?action=delete&id=<?= $st['id'] ?>" class="btn-action btn-delete" onclick="return confirm('Bạn chắc chắn muốn xóa sinh viên này?');">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
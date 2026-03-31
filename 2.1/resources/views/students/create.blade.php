<h2>Thêm sinh viên mới</h2>

<form method="POST" action="/students/store">
    @csrf  Tên sinh viên: <input type="text" name="name"><br>
    Ngành học: <input type="text" name="major"><br>
    
    <button type="submit">Lưu</button>
</form>

<br>
<a href="/students">Quay lại danh sách</a>
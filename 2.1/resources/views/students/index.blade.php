<h2>Danh sách sinh viên</h2>

<a href="/students/create">Thêm sinh viên mới</a>
<br><br>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên sinh viên</th>
            <th>Ngành học</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $st)
        <tr>
            <td>{{ $st->id }}</td>
            <td>{{ $st->name }}</td>
            <td>{{ $st->major }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
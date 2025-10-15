<!DOCTYPE html>
<html>
<head>
    <title>Data Author</title>
</head>
<body>
    <h1>Daftar Author</h1>
    <table border="1" cellpadding="6">
        <tr>
            <th>ID</th>
            <th>Nama Author</th>
        </tr>
        @foreach ($authors as $author)
            <tr>
                <td>{{ $author['id'] }}</td>
                <td>{{ $author['name'] }}</td>
            </tr>
        @endforeach
    </table>

    <br>
    <a href="/genre">Lihat Data Genre</a>
</body>
</html>

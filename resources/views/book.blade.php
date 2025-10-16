<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f8fafc;
            margin: 0;
            padding: 40px;
            color: #333;
        }
        h1 {
            text-align: center;
            margin-bottom: 25px;
            letter-spacing: 1px;
        }
        .nav {
            text-align: center;
            margin-bottom: 25px;
        }
        .nav a {
            text-decoration: none;
            background: #28a745;
            color: white;
            padding: 10px 16px;
            margin: 0 5px;
            border-radius: 6px;
            font-size: 14px;
            transition: 0.2s;
        }
        .nav a:hover {
            background: #1e7e34;
        }
        table {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        }
        th, td {
            padding: 12px 14px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }
        th {
            background: #28a745;
            color: white;
            text-transform: uppercase;
            font-size: 14px;
        }
        tr:hover {
            background: #f4fff4;
        }
    </style>
</head>
<body>
    <h1>Daftar Buku</h1>

    <div class="nav">
        <a href="/author">Author</a>
        <a href="/book">Book</a>
        <a href="/genre">Genre</a>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Judul Buku</th>
            <th>Genre</th>
            <th>Tahun</th>
            <th>Author</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->genre }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->author->name }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Data Genre</title>
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
            background: #6f42c1;
            color: white;
            padding: 10px 16px;
            margin: 0 5px;
            border-radius: 6px;
            font-size: 14px;
            transition: 0.2s;
        }
        .nav a:hover {
            background: #5a32a3;
        }
        table {
            width: 70%;
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
            background: #6f42c1;
            color: white;
            text-transform: uppercase;
            font-size: 14px;
        }
        tr:hover {
            background: #f4f0ff;
        }
    </style>
</head>
<body>
    <h1>Daftar Genre</h1>

    <div class="nav">
        <a href="/author">Author</a>
        <a href="/book">Book</a>
        <a href="/genre">Genre</a>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama Genre</th>
        </tr>
        @foreach ($genres as $genre)
            <tr>
                <td>{{ $genre->id }}</td>
                <td>{{ $genre->name }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         header,
        footer {
            text-align: center;
            border: 2px solid black;
            margin-bottom: 100px;
        }

        footer{
            margin-bottom: 0;
            inset: 0;
        }

        ul {
            list-style: none;
        }

        a {
            text-decoration: none;
            margin: 5px;
            color: black;
        }

        .content{
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .pagination {
            margin: 50px;
            text-align: center;
        }
        .pagination a {
            margin: 0 5px;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header>
        <ul>
            <li>
                <a href="">Home</a>
                <a href="#" style="font-weight: bold;">Đăng xuất</a>
            </li>
        </ul>
    </header>
    <div class="content">
        <h2>Danh sách user</h2>
    <table>
    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th>{{ $user->id }}</th>
                                <th>{{ $user->name }}</th>
                                <th>{{ $user->email }}</th>
                                <th>
                                    <a href="{{ route('user.readUser', ['id' => $user->id]) }}">View</a> |
                                    <a href="{{ route('user.updateUser', ['id' => $user->id]) }}">Edit</a> |
                                    <a href="{{ route('user.deleteUser', ['id' => $user->id]) }}">Delete</a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
    </table>
    </div>
    <div class="pagination">
        <a href="#">Previous</a>
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">Next</a>
    </div>
    <footer>
        <h4>Lập trình web @2024</h4>
    </footer>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Simple Login System</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #333;
        }

        .navbar {
            background: #1f2937;
            color: white;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            font-size: 22px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .header p {
            color: #666;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #f1f3f5;
            font-weight: bold;
        }

        .role {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .admin {
            background: #e8d5ff;
            color: #6b21a8;
        }

        .user {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .empty {
            text-align: center;
            color: #777;
            padding: 30px;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #2563eb;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2>Simple Login System</h2>

        <div>
            <a href="/dashboard">Dashboard</a>
        </div>
    </div>

    <div class="container">

        <div class="header">
            <h1>Admin Panel</h1>
            <p>Manage and review registered user accounts.</p>
        </div>

        <div class="card">

            @if ($users->count() > 0)

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Registered</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>

                                <td>{{ $user->name }}</td>

                                <td>{{ $user->username }}</td>

                                <td>{{ $user->email }}</td>

                                <td>
                                    @if ($user->role === 'admin')
                                        <span class="role admin">Administrator</span>
                                    @else
                                        <span class="role user">Regular User</span>
                                    @endif
                                </td>

                                <td>
                                    {{ $user->created_at->format('M d, Y') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @else

                <div class="empty">
                    No registered users found.
                </div>

            @endif

        </div>

        <a href="/dashboard" class="back">← Back to Dashboard</a>

    </div>

</body>
</html>
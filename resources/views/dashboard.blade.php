<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Simple Login System</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
        }

        .header {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        h1 {
            color: #1f2937;
            margin-bottom: 8px;
        }

        .welcome {
            color: #666;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.1);
        }

        .card h2 {
            color: #1f2937;
            margin-bottom: 20px;
        }

        .info {
            display: grid;
            gap: 15px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 14px;
            background: #f8fafc;
            border-radius: 6px;
            border: 1px solid #e5e7eb;
        }

        .label {
            font-weight: bold;
            color: #374151;
        }

        .value {
            color: #555;
            text-align: right;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        .btn {
            flex: 1;
            min-width: 150px;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }

        .btn-danger {
            background: #dc2626;
            color: white;
        }

        .btn-danger:hover {
            background: #b91c1c;
        }

        .admin-badge {
            display: inline-block;
            margin-top: 15px;
            padding: 6px 12px;
            background: #fef3c7;
            color: #92400e;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .employee-badge {
            display: inline-block;
            margin-top: 15px;
            padding: 6px 12px;
            background: #dbeafe;
            color: #1e40af;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="header">

            <h1>Welcome, {{ Auth::user()->name }}!</h1>

            <p class="welcome">
                You are successfully logged in to the system.
            </p>

            @if (Auth::user()->role === 'admin')
                <span class="admin-badge">
                    Administrator
                </span>
            @else
                <span class="employee-badge">
                    Employee
                </span>
            @endif

        </div>

        <div class="card">

            <h2>Account Information</h2>

            <div class="info">

                <div class="info-row">
                    <span class="label">Full Name</span>

                    <span class="value">
                        {{ Auth::user()->name }}
                    </span>
                </div>

                <div class="info-row">
                    <span class="label">Employee ID</span>

                    <span class="value">
                        {{ Auth::user()->employee_id ?? 'N/A' }}
                    </span>
                </div>

                <div class="info-row">
                    <span class="label">Branch</span>

                    <span class="value">
                        {{ Auth::user()->branch ?? 'N/A' }}
                    </span>
                </div>

                <div class="info-row">
                    <span class="label">Role</span>

                    <span class="value">
                        {{ Auth::user()->role === 'admin' ? 'Administrator' : 'Employee' }}
                    </span>
                </div>

            </div>

            <div class="buttons">

                <a href="/profile" class="btn btn-primary">
                    My Profile
                </a>

                @if (Auth::user()->role === 'admin')
                    <a href="/admin" class="btn btn-secondary">
                        Admin Panel
                    </a>
                @endif

                <form method="POST" action="/logout" style="flex: 1; min-width: 150px;">

                    @csrf

                    <button type="submit" class="btn btn-danger" style="width: 100%;">
                        Logout
                    </button>

                </form>

            </div>

        </div>

    </div>

</body>
</html>
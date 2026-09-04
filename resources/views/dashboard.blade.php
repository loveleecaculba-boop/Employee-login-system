<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Simple Login System</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }

        .navbar {
            background: #222;
            color: white;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            margin: 0;
        }

        .logout-button {
            background: #fff;
            color: #222;
            border: none;
            padding: 9px 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .welcome-card {
            background: white;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .welcome-card h1 {
            margin-top: 0;
        }

        .info {
            margin-top: 25px;
            padding: 20px;
            background: #f4f6f8;
            border-radius: 8px;
        }

        .info p {
            margin: 10px 0;
        }

        .role {
            font-weight: bold;
            text-transform: capitalize;
        }

        .links {
            margin-top: 25px;
        }

        .links a {
            display: inline-block;
            margin-right: 10px;
            padding: 10px 15px;
            background: #222;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<nav class="navbar">

    <h2>Simple Login System</h2>

    <form method="POST" action="/logout">
        @csrf

        <button type="submit" class="logout-button">
            Logout
        </button>
    </form>

</nav>

<div class="container">

    <div class="welcome-card">

        <h1>Welcome, {{ Auth::user()->name }}!</h1>

        <p>
            You have successfully logged in to your account.
        </p>

        <div class="info">

            <p>
                <strong>Full Name:</strong>
                {{ Auth::user()->name }}
            </p>

            <p>
                <strong>Username:</strong>
                {{ Auth::user()->username }}
            </p>

            <p>
                <strong>Email:</strong>
                {{ Auth::user()->email }}
            </p>

            <p>
                <strong>Role:</strong>
                <span class="role">
                    {{ Auth::user()->role }}
                </span>
            </p>

        </div>

        <div class="links">

            <a href="/profile">
                My Profile
            </a>

            @if (Auth::user()->role === 'admin')
                <a href="/admin">
                    Admin Panel
                </a>
            @endif

        </div>

    </div>

</div>

</body>
</html>
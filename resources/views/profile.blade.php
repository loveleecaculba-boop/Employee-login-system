<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Simple Login System</title>

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

        .back-link {
            color: white;
            text-decoration: none;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        h1 {
            margin-top: 0;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #222;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #444;
        }

        .success {
            background: #e5f6e5;
            color: #246b24;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .errors {
            background: #ffe5e5;
            color: #b00020;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .errors ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>

<body>

<nav class="navbar">
    <h2>Simple Login System</h2>

    <a href="/dashboard" class="back-link">
        Back to Dashboard
    </a>
</nav>

<div class="container">

    <div class="card">

        <h1>My Profile</h1>

        <p>View and update your account information.</p>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/profile">

            @csrf

            @method('PUT')

            <div class="form-group">
                <label for="name">Full Name</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', Auth::user()->name) }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="username">Username</label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    value="{{ old('username', Auth::user()->username) }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', Auth::user()->email) }}"
                    required
                >
            </div>

            <button type="submit">
                Update Profile
            </button>

        </form>

    </div>

</div>

</body>
</html>
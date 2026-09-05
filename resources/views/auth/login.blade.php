<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Simple Login System</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 420px;
            background: white;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 25px;
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

        input:focus {
            outline: none;
            border-color: #333;
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

        .register-link {
            text-align: center;
            margin-top: 20px;
        }

        .register-link a {
            color: #222;
            font-weight: bold;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .admin-link {
            text-align: center;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }

        .admin-link a {
            color: #222;
            font-weight: bold;
            text-decoration: none;
        }

        .admin-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Welcome</h1>

    <p class="subtitle">
        Sign in to your account
    </p>

    @if (session('success'))
        <div style="
            background: #e5f7e5;
            color: #176b17;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        ">
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

    <form method="POST" action="/login">

        @csrf

        <div class="form-group">
            <label for="login">Username or Email</label>

            <input
                type="text"
                id="login"
                name="login"
                value="{{ old('login') }}"
                required
                autofocus
            >
        </div>

        <div class="form-group">
            <label for="password">Password</label>

            <input
                type="password"
                id="password"
                name="password"
                required
            >
        </div>

        <button type="submit">
            Sign In
        </button>

    </form>

    <div class="register-link">
        Don't have an account?
        <a href="/register">Create an account</a>
    </div>

    <div class="admin-link">
        <a href="/admin/login">Admin Login</a>
    </div>

</div>

</body>
</html>
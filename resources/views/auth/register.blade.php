<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Account - Simple Login System</title>

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
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .container {
            width: 100%;
            max-width: 500px;
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 10px;
            color: #1f2937;
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
            color: #374151;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
        }

        .password-requirements {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 12px;
            margin-top: 8px;
            font-size: 13px;
            color: #555;
        }

        .password-requirements p {
            margin-bottom: 6px;
            font-weight: bold;
        }

        .password-requirements ul {
            padding-left: 20px;
        }

        .password-requirements li {
            margin-bottom: 3px;
        }

        .error-box {
            background: #fee2e2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .error-box ul {
            padding-left: 20px;
        }

        .error-box li {
            margin-bottom: 4px;
        }

        button {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 6px;
            background: #2563eb;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }

        .login-link a {
            color: #2563eb;
            text-decoration: none;
            font-weight: bold;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Create Account</h1>

        <p class="subtitle">
            Register a new account to access the system.
        </p>

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/register">

            @csrf

            <div class="form-group">
                <label for="name">Full Name</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="username">Username</label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    value="{{ old('username') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
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

                <div class="password-requirements">
                    <p>Password must:</p>

                    <ul>
                        <li>Be at least 8 characters</li>
                        <li>Contain at least one uppercase letter</li>
                        <li>Contain at least one lowercase letter</li>
                        <li>Contain at least one number</li>
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>

                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    required
                >
            </div>

            <button type="submit">
                Create Account
            </button>

        </form>

        <div class="login-link">
            Already have an account?
            <a href="/login">Sign in here</a>
        </div>

    </div>

</body>
</html>
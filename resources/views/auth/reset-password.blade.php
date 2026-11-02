<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Simple Login System</title>

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
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 420px;
            background: #fff;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #1f2937;
            font-size: 25px;
            margin-bottom: 12px;
            text-align: center;
        }

        .description {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.6;
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #374151;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 15px;
            margin-bottom: 18px;
        }

        input:focus {
            outline: none;
            border-color: #29458d;
            box-shadow: 0 0 0 3px rgba(41, 69, 141, 0.12);
        }

        button {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 6px;
            background: #29458d;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #20376f;
        }

        .message {
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 18px;
            font-size: 14px;
            line-height: 1.5;
            background: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #29458d;
            text-decoration: none;
            font-size: 14px;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Reset Password</h1>

        <p class="description">
            Enter your new password below.
        </p>

        @if ($errors->any())
            <div class="message">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <label for="email">Email Address</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $email) }}"
                required
                readonly
            >

            <label for="password">New Password</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="At least 8 characters"
                required
                autocomplete="new-password"
            >

            <label for="password_confirmation">Confirm New Password</label>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="Re-enter your new password"
                required
                autocomplete="new-password"
            >

            <button type="submit">Reset Password</button>
        </form>

        <a href="{{ route('login') }}" class="back-link">
            Back to Login
        </a>
    </div>
</body>
</html>

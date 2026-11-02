<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | INCS</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6fb;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            color: #1f2937;
        }

        .container {
            width: 100%;
            max-width: 440px;
            background: #ffffff;
            padding: 36px;
            border: 1px solid #e5eaf2;
            border-radius: 14px;
            box-shadow: 0 8px 30px rgba(25, 42, 80, 0.08);
        }

        h1 {
            color: #172b57;
            font-size: 25px;
            text-align: center;
            margin-bottom: 12px;
        }

        .description {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.7;
            text-align: center;
            margin-bottom: 28px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            color: #374151;
            margin-bottom: 9px;
        }

        input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #d5dcea;
            border-radius: 7px;
            background: #ffffff;
            color: #1f2937;
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin-bottom: 20px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input::placeholder {
            color: #9ca3af;
        }

        input:focus {
            outline: none;
            border-color: #29458d;
            box-shadow: 0 0 0 3px rgba(41, 69, 141, 0.12);
        }

        button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 7px;
            background: #29458d;
            color: #ffffff;
            font-family: Arial, sans-serif;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }

        button:hover {
            background: #20376f;
        }

        button:focus-visible,
        .back-link:focus-visible {
            outline: 3px solid #8da8ed;
            outline-offset: 3px;
        }

        .message {
            padding: 13px 14px;
            border-radius: 7px;
            margin-bottom: 20px;
            font-size: 13px;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .success {
            background: #ecfdf5;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .error {
            background: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        .back-link {
            display: block;
            margin-top: 24px;
            text-align: center;
            color: #29458d;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .footer {
            text-align: center;
            color: #9ca3af;
            font-size: 12px;
            margin-top: 30px;
        }

        @media (max-width: 480px) {
            body {
                padding: 16px;
            }

            .container {
                padding: 28px 22px;
            }

            h1 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>
    <main class="container">
        <h1>Forgot Password?</h1>

        <p class="description">
            Don't worry! Enter the email address associated with your account.
            If your account is registered, we'll send you instructions to reset
            your password.
        </p>

        @if (session('status'))
            <div class="message success" role="status">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="message error" role="alert">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <label for="email">Email Address</label>

            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Enter your registered email"
                required
                autocomplete="email"
                autofocus
            >

            <button type="submit">
                Send Password Reset Link
            </button>
        </form>

        <a href="{{ route('login') }}" class="back-link">
            &larr; Back to Login
        </a>

        <footer class="footer">
            INCS &copy; {{ date('Y') }}. All rights reserved.
        </footer>
    </main>
</body>
</html>

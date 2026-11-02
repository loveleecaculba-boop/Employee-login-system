<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - INCS</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --navy: #172554;
            --blue: #29458D;
            --blue-hover: #20376F;
            --background: #F4F6FB;
            --border: #D5DCEA;
            --text: #1F2937;
            --muted: #64748B;
            --white: #FFFFFF;
        }

        body {
            font-family: Arial, sans-serif;
            background: var(--background);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: var(--text);
        }

        /* HEADER */
        .navbar {
            width: 100%;
            min-height: 76px;
            padding: 18px 5%;
            background: var(--navy);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            box-shadow: 0 3px 10px rgba(15, 23, 42, 0.12);
        }

        .brand {
            color: var(--white);
            font-size: 28px;
            font-weight: bold;
            letter-spacing: 1px;
            text-decoration: none;
        }

        .header-label {
            color: #E5E7EB;
            font-size: 14px;
        }

        /* MAIN CONTENT */
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .container {
            width: 100%;
            max-width: 440px;
            padding: 36px;
            background: var(--white);
            border: 1px solid #E5EAF3;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(23, 37, 84, 0.08);
        }

        h1 {
            color: var(--navy);
            text-align: center;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .subtitle {
            color: var(--muted);
            text-align: center;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 28px;
        }

        /* SUCCESS MESSAGE */
        .success-message {
            background: #F0FDF4;
            color: #166534;
            border: 1px solid #BBF7D0;
            padding: 13px 15px;
            border-radius: 7px;
            margin-bottom: 20px;
            font-size: 14px;
            line-height: 1.5;
        }

        /* VALIDATION ERRORS */
        .errors {
            background: #FEF2F2;
            color: #B91C1C;
            border: 1px solid #FECACA;
            padding: 13px 15px;
            border-radius: 7px;
            margin-bottom: 20px;
            font-size: 13px;
            line-height: 1.6;
        }

        .errors ul {
            padding-left: 20px;
        }

        /* FORM */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #334155;
            font-size: 14px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid var(--border);
            border-radius: 7px;
            background: var(--white);
            color: var(--text);
            font-family: Arial, sans-serif;
            font-size: 14px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input::placeholder {
            color: #94A3B8;
        }

        input:focus {
            outline: none;
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(41, 69, 141, 0.12);
        }

        /* FORGOT PASSWORD */
        .forgot-password {
            text-align: right;
            margin-top: -5px;
            margin-bottom: 22px;
        }

        .forgot-password a {
            color: var(--blue);
            font-size: 13px;
            font-weight: bold;
            text-decoration: none;
        }

        .forgot-password a:hover {
            color: var(--blue-hover);
            text-decoration: underline;
        }

        /* SIGN IN BUTTON */
        .login-button {
            width: 100%;
            padding: 14px;
            background: var(--blue);
            color: var(--white);
            border: none;
            border-radius: 7px;
            font-family: Arial, sans-serif;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }

        .login-button:hover {
            background: var(--blue-hover);
        }

        /* DIVIDER */
        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 25px 0 20px;
            color: #94A3B8;
            font-size: 12px;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #E2E8F0;
        }

        /* REGISTER LINK */
        .register-link {
            text-align: center;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.7;
        }

        .register-link a {
            color: var(--blue);
            font-weight: bold;
            text-decoration: none;
        }

        .register-link a:hover {
            color: var(--blue-hover);
            text-decoration: underline;
        }

        /* FOOTER */
        .footer {
            padding: 18px 20px;
            text-align: center;
            color: var(--muted);
            font-size: 12px;
        }

        /* RESPONSIVE */
        @media (max-width: 480px) {
            .navbar {
                min-height: 64px;
                padding: 16px 20px;
            }

            .brand {
                font-size: 24px;
            }

            .header-label {
                font-size: 12px;
            }

            .main-content {
                padding: 28px 16px;
            }

            .container {
                padding: 28px 22px;
            }

            h1 {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header class="navbar">
        <a href="/login" class="brand">INCS</a>
        <span class="header-label">Portal</span>
    </header>

    <!-- LOGIN CONTENT -->
    <main class="main-content">
        <div class="container">

            <h1>Welcome Back</h1>

            <p class="subtitle">
                Sign in to access your INCS account.
            </p>

            @if (session('success'))
                <div class="success-message" role="status">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="errors" role="alert">
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
                        placeholder="Enter your username or email"
                        autocomplete="username"
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
                        placeholder="Enter your password"
                        autocomplete="current-password"
                        required
                    >
                </div>

                <div class="forgot-password">
                    <a href="{{ route('password.request') }}">
                        Forgot Password?
                    </a>
                </div>

                <button type="submit" class="login-button">
                    Sign In
                </button>
            </form>

            <div class="divider">OR</div>

            <div class="register-link">
                Don't have an account?
                <a href="/register">Create an account</a>
            </div>

        </div>
    </main>

    <!-- FOOTER -->
    <footer class="footer">
        INCS &copy; {{ date('Y') }}. All rights reserved.
    </footer>

</body>
</html>
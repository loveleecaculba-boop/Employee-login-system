<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login - INCS</title>

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
            --error-bg: #FEF2F2;
            --error-border: #FECACA;
            --error-text: #B91C1C;
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
            min-height: 70px;
            background: var(--navy);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 7%;
        }

        .brand {
            color: var(--white);
            font-size: 25px;
            font-weight: bold;
            letter-spacing: 1.5px;
            text-decoration: none;
        }

        .header-label {
            color: #E2E8F0;
            font-size: 14px;
        }

        /* MAIN CONTENT */
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 45px 20px;
        }

        .login-container {
            width: 100%;
            max-width: 440px;
            background: var(--white);
            padding: 38px;
            border: 1px solid #E5EAF3;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(23, 37, 84, 0.08);
        }

        .admin-icon {
            width: 58px;
            height: 58px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            background: #E9EEF7;
            color: var(--blue);
            border-radius: 12px;
            font-size: 25px;
            font-weight: bold;
        }

        h1 {
            color: var(--navy);
            font-size: 27px;
            text-align: center;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 22px;
        }

        .admin-label {
            display: block;
            width: fit-content;
            margin: 0 auto 25px;
            padding: 8px 14px;
            border-radius: 20px;
            background: #E9EEF7;
            color: var(--blue);
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        /* FORM */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: bold;
            color: #334155;
        }

        input {
            display: block;
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

        .error-box {
            background: var(--error-bg);
            border: 1px solid var(--error-border);
            color: var(--error-text);
            padding: 13px 15px;
            border-radius: 7px;
            margin-bottom: 22px;
            font-size: 13px;
            line-height: 1.6;
        }

        .error-box ul {
            padding-left: 20px;
        }

        .error-box li {
            margin-bottom: 4px;
        }

        .error-box li:last-child {
            margin-bottom: 0;
        }

        .login-button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 7px;
            background: var(--blue);
            color: var(--white);
            font-family: Arial, sans-serif;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s, transform 0.2s;
        }

        .login-button:hover {
            background: var(--blue-hover);
        }

        .login-button:active {
            transform: scale(0.99);
        }

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

        .back-link {
            text-align: center;
        }

        .back-link a {
            color: var(--blue);
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
        }

        .back-link a:hover {
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
                min-height: 62px;
                padding: 0 20px;
            }

            .brand {
                font-size: 22px;
            }

            .header-label {
                font-size: 12px;
            }

            .main-content {
                padding: 30px 16px;
            }

            .login-container {
                padding: 28px 22px;
            }

            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

    <header class="navbar">
        <a href="/login" class="brand">INCS</a>
        <span class="header-label">Administrator Portal</span>
    </header>

    <main class="main-content">
        <div class="login-container">

            <div class="admin-icon" aria-hidden="true">A</div>

            <h1>Admin Login</h1>

            <p class="subtitle">
                Sign in using your authorized administrator account.
            </p>

            <div class="admin-label">
                Administrator Access
            </div>

            @if ($errors->any())
                <div class="error-box" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/admin/login">
                @csrf

                <div class="form-group">
                    <label for="login">Username or Email</label>

                    <input
                        type="text"
                        id="login"
                        name="login"
                        value="{{ old('login') }}"
                        placeholder="Enter admin username or email"
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
                        placeholder="Enter admin password"
                        autocomplete="current-password"
                        required
                    >
                </div>

                <button type="submit" class="login-button">
                    Sign In to Admin Panel
                </button>
            </form>

            <div class="divider">OR</div>

            <div class="back-link">
                <a href="/login">Back to Employee Login</a>
            </div>

        </div>
    </main>

    <footer class="footer">
        INCS &copy; {{ date('Y') }}. All rights reserved.
    </footer>

</body>
</html>

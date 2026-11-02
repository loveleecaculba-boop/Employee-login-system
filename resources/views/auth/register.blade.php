<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Account - INCS</title>

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
            box-shadow: 0 3px 10px rgba(15, 23, 42, 0.12);
        }

        .brand {
            color: var(--white);
            font-size: 28px;
            font-weight: bold;
            letter-spacing: 1px;
            text-decoration: none;
        }

        /* MAIN CONTENT */
        .main-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 40px 20px;
        }

        .container {
            width: 100%;
            max-width: 560px;
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

        /* ERROR MESSAGE */
        .error-box {
            background: #FEF2F2;
            border: 1px solid #FECACA;
            color: #B91C1C;
            padding: 13px 15px;
            border-radius: 7px;
            margin-bottom: 20px;
            font-size: 13px;
            line-height: 1.6;
        }

        .error-box ul {
            padding-left: 20px;
        }

        .error-box li {
            margin-bottom: 4px;
        }

        /* SUCCESS MESSAGE */
        .success-box {
            background: #F0FDF4;
            border: 1px solid #BBF7D0;
            color: #166534;
            padding: 13px 15px;
            border-radius: 7px;
            margin-bottom: 20px;
            font-size: 14px;
            line-height: 1.5;
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

        input,
        select {
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

        input:focus,
        select:focus {
            outline: none;
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(41, 69, 141, 0.12);
        }

        .employee-note {
            margin-top: 7px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.5;
        }

        /* PASSWORD REQUIREMENTS */
        .password-requirements {
            background: #F8FAFC;
            border: 1px solid #E2E8F0;
            border-radius: 7px;
            padding: 13px 15px;
            margin-top: 10px;
            color: #475569;
            font-size: 12px;
            line-height: 1.7;
        }

        .password-requirements p {
            margin-bottom: 5px;
            font-weight: bold;
            color: #334155;
        }

        .password-requirements ul {
            padding-left: 20px;
        }

        /* CREATE ACCOUNT BUTTON */
        .submit-button {
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

        .submit-button:hover {
            background: var(--blue-hover);
        }

        /* LOGIN LINK */
        .login-link {
            text-align: center;
            margin-top: 24px;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.7;
        }

        .login-link a {
            color: var(--blue);
            font-weight: bold;
            text-decoration: none;
        }

        .login-link a:hover {
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
        @media (max-width: 600px) {
            .navbar {
                min-height: 64px;
                padding: 16px 20px;
            }

            .brand {
                font-size: 24px;
            }

            .main-content {
                padding: 25px 14px;
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
    </header>

    <!-- REGISTRATION CONTENT -->
    <main class="main-content">
        <div class="container">

            <h1>Create Account</h1>

            <p class="subtitle">
                Register as an employee to access the INCS system.
            </p>

            @if ($errors->any())
                <div class="error-box" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="success-box" role="status">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="/register">
                @csrf

                <!-- FULL NAME -->
                <div class="form-group">
                    <label for="name">Full Name</label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Enter your full name"
                        maxlength="255"
                        autocomplete="name"
                        required
                    >
                </div>

                <!-- EMPLOYEE ID -->
                <div class="form-group">
                    <label for="employee_id">Employee ID Number</label>

                    <input
                        type="text"
                        id="employee_id"
                        name="employee_id"
                        value="{{ old('employee_id') }}"
                        placeholder="XX-XXXXXX"
                        pattern="[0-9]{2}-[0-9]{6}"
                        maxlength="9"
                        inputmode="numeric"
                        aria-describedby="employee-note"
                        required
                    >

                    <p class="employee-note" id="employee-note">
                        Format: 2 numbers, a hyphen, then 6 numbers.
                        Example: 12-345678
                    </p>
                </div>

                <!-- BRANCH -->
                <div class="form-group">
                    <label for="branch">Branch</label>

                    <select id="branch" name="branch" required>
                        <option value="">Select your branch</option>

                        <option
                            value="Pasig"
                            {{ old('branch') == 'Pasig' ? 'selected' : '' }}
                        >
                            Pasig
                        </option>

                        <option
                            value="Mandaluyong"
                            {{ old('branch') == 'Mandaluyong' ? 'selected' : '' }}
                        >
                            Mandaluyong
                        </option>

                        <option
                            value="Manila"
                            {{ old('branch') == 'Manila' ? 'selected' : '' }}
                        >
                            Manila
                        </option>
                    </select>
                </div>

                <!-- USERNAME -->
                <div class="form-group">
                    <label for="username">Username</label>

                    <input
                        type="text"
                        id="username"
                        name="username"
                        value="{{ old('username') }}"
                        placeholder="Enter your username"
                        maxlength="50"
                        autocomplete="username"
                        required
                    >
                </div>

                <!-- EMAIL -->
                <div class="form-group">
                    <label for="email">Email Address</label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Enter your email address"
                        maxlength="255"
                        autocomplete="email"
                        required
                    >
                </div>

                <!-- PASSWORD -->
                <div class="form-group">
                    <label for="password">Password</label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Create a password"
                        autocomplete="new-password"
                        aria-describedby="password-requirements"
                        required
                    >

                    <div
                        class="password-requirements"
                        id="password-requirements"
                    >
                        <p>Password must:</p>

                        <ul>
                            <li>Be at least 8 characters long</li>
                            <li>Contain at least one uppercase letter</li>
                            <li>Contain at least one lowercase letter</li>
                            <li>Contain at least one number</li>
                        </ul>
                    </div>
                </div>

                <!-- CONFIRM PASSWORD -->
                <div class="form-group">
                    <label for="password_confirmation">
                        Confirm Password
                    </label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Re-enter your password"
                        autocomplete="new-password"
                        required
                    >
                </div>

                <!-- SUBMIT -->
                <button type="submit" class="submit-button">
                    Create Account
                </button>

            </form>

            <div class="login-link">
                Already have an account?
                <a href="/login">Sign in here</a>
            </div>

        </div>
    </main>

    <!-- FOOTER -->
    <footer class="footer">
        INCS &copy; {{ date('Y') }}. All rights reserved.
    </footer>

    <!-- FULL NAME INPUT RESTRICTION -->
    <script>
        const fullNameInput = document.getElementById('name');

        fullNameInput.addEventListener('input', function () {
            this.value = this.value.replace(
                /[^A-Za-zÀ-ÖØ-öø-ÿÑñ .'-]/g,
                ''
            );
        });
    </script>

</body>
</html>
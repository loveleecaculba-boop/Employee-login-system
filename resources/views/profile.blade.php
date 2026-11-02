<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Profile - INCS</title>

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
            color: #1f2937;
        }

        /* Navigation */
        .navbar {
            width: 100%;
            min-height: 76px;
            background: #172554;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            padding: 18px 5%;
            box-shadow: 0 3px 10px rgba(15, 23, 42, 0.12);
        }

        .brand {
            color: white;
            text-decoration: none;
            font-size: 28px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        .nav-link {
            color: #e5e7eb;
            text-decoration: none;
            font-size: 15px;
            font-weight: bold;
        }

        .nav-link:hover,
        .nav-link.active {
            color: white;
        }

        .logout-form {
            margin: 0;
        }

        .logout-button {
            border: 1px solid #93a4c7;
            border-radius: 6px;
            background: transparent;
            color: white;
            padding: 9px 16px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }

        .logout-button:hover {
            background: #29458d;
            border-color: #29458d;
        }

        /* Page Layout */
        .container {
            width: 100%;
            max-width: 800px;
            margin: 40px auto;
            padding: 0 24px;
        }

        .page-heading {
            margin-bottom: 24px;
        }

        .page-heading h1 {
            color: #172554;
            font-size: 30px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #64748b;
            font-size: 14px;
            line-height: 1.6;
        }

        .card {
            background: white;
            padding: 30px;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(15, 23, 42, 0.05);
            margin-bottom: 24px;
        }

        .card h2 {
            color: #172554;
            font-size: 20px;
            margin-bottom: 22px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0 20px;
        }

        .form-group {
            min-width: 0;
            margin-bottom: 20px;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #334155;
            font-size: 14px;
        }

        input,
        select {
            width: 100%;
            min-height: 44px;
            padding: 11px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            background: white;
            color: #1f2937;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #29458d;
            box-shadow: 0 0 0 3px rgba(41, 69, 141, 0.12);
        }

        .role-box {
            width: 100%;
            padding: 13px 12px;
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
            border-radius: 7px;
            color: #334155;
            font-size: 14px;
        }

        .note {
            margin-top: 7px;
            font-size: 12px;
            color: #64748b;
            line-height: 1.5;
        }

        .success-box {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
            padding: 13px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            line-height: 1.5;
            font-size: 14px;
        }

        .error-box {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            padding: 13px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            line-height: 1.5;
            font-size: 14px;
        }

        .error-box ul {
            padding-left: 20px;
        }

        .error-box li + li {
            margin-top: 5px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 8px;
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-height: 44px;
            padding: 12px 20px;
            border: 1px solid transparent;
            border-radius: 7px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-primary {
            background: #29458d;
            color: white;
        }

        .btn-primary:hover {
            background: #20376f;
        }

        .btn-secondary {
            background: white;
            color: #1e3a8a;
            border-color: #cbd5e1;
        }

        .btn-secondary:hover {
            background: #f1f5f9;
        }

        /* Password Section */
        .security-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 20px;
            border: 1px solid #e2e8f0;
            border-radius: 9px;
            background: #f8fafc;
        }

        .security-info h2 {
            font-size: 17px;
            margin-bottom: 7px;
        }

        .security-info p {
            color: #64748b;
            font-size: 13px;
            line-height: 1.6;
        }

        .password-button {
            flex-shrink: 0;
            padding: 12px 17px;
            min-height: 42px;
            border: none;
            border-radius: 7px;
            background: #29458d;
            color: white;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }

        .password-button:hover {
            background: #20376f;
        }

        .password-form {
            margin-top: 18px;
            padding: 24px;
            border: 1px solid #e2e8f0;
            border-radius: 9px;
            background: white;
        }

        .password-form-header {
            margin-bottom: 22px;
        }

        .password-form-header h2 {
            margin-bottom: 7px;
        }

        .password-form-header p {
            color: #64748b;
            font-size: 13px;
            line-height: 1.6;
        }

        .password-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 22px;
        }

        [hidden] {
            display: none !important;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 16px 20px;
                gap: 16px;
            }

            .brand {
                font-size: 24px;
            }

            .nav-actions {
                gap: 14px;
            }

            .nav-link {
                font-size: 13px;
            }

            .logout-button {
                padding: 8px 10px;
                font-size: 12px;
            }

            .container {
                margin: 25px auto;
                padding: 0 14px;
            }

            .page-heading h1 {
                font-size: 25px;
            }

            .card {
                padding: 22px 18px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full-width {
                grid-column: auto;
            }

            .form-actions .btn {
                width: 100%;
            }

            .security-card {
                align-items: stretch;
                flex-direction: column;
            }

            .password-button {
                width: 100%;
            }

            .password-form {
                padding: 18px;
            }

            .password-actions {
                flex-direction: column-reverse;
            }

            .password-actions button {
                width: 100%;
            }
        }

        @media (max-width: 360px) {
            .navbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .nav-actions {
                width: 100%;
                justify-content: space-between;
            }
        }
    </style>
</head>

<body>

    <!-- MAIN NAVIGATION -->
    <header class="navbar">
        <a href="/dashboard" class="brand">INCS</a>

        <nav class="nav-actions" aria-label="Main navigation">
            <a href="/dashboard" class="nav-link">
                Dashboard
            </a>

            <form method="POST" action="/logout" class="logout-form">
                @csrf
                <button type="submit" class="logout-button">
                    Logout
                </button>
            </form>
        </nav>
    </header>

    <main class="container">

        <div class="page-heading">
            <h1>My Profile</h1>
            <p class="subtitle">
                View and update your account information.
            </p>
        </div>

        @if (session('success'))
            <div class="success-box" role="status">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error-box" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- PROFILE INFORMATION -->
        <section class="card">
            <h2>Account Information</h2>

            <form method="POST" action="/profile">
                @csrf
                @method('PUT')

                <div class="form-grid">

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
                        <label for="employee_id">Employee ID Number</label>
                        <input
                            type="text"
                            id="employee_id"
                            name="employee_id"
                            value="{{ old('employee_id', Auth::user()->employee_id) }}"
                            placeholder="XX-XXXXXX"
                            pattern="[0-9]{2}-[0-9]{6}"
                            maxlength="9"
                            inputmode="numeric"
                            required
                        >
                        <p class="note">
                            Format: 2 numbers - 6 numbers (example: 12-345678)
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="branch">Branch</label>
                        <select id="branch" name="branch" required>
                            <option value="">Select your branch</option>
                            <option value="Pasig"
                                {{ old('branch', Auth::user()->branch) == 'Pasig' ? 'selected' : '' }}>
                                Pasig
                            </option>
                            <option value="Mandaluyong"
                                {{ old('branch', Auth::user()->branch) == 'Mandaluyong' ? 'selected' : '' }}>
                                Mandaluyong
                            </option>
                            <option value="Manila"
                                {{ old('branch', Auth::user()->branch) == 'Manila' ? 'selected' : '' }}>
                                Manila
                            </option>
                        </select>
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

                    <div class="form-group full-width">
                        <label for="email">Email Address</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email', Auth::user()->email) }}"
                            required
                        >
                    </div>

                    <div class="form-group full-width">
                        <label>Account Role</label>
                        <div class="role-box">
                            {{ Auth::user()->role === 'admin' ? 'Administrator' : 'Employee' }}
                        </div>
                        <p class="note">
                            Account role cannot be changed from the profile page.
                        </p>
                    </div>

                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        Save Changes
                    </button>
                </div>
            </form>
        </section>

        <!-- CHANGE PASSWORD: EMPLOYEES ONLY -->
        @if (Auth::user()->role !== 'admin')
            <section class="card">
                <div class="security-card">
                    <div class="security-info">
                        <h2>Password &amp; Security</h2>
                        <p>
                            Change your password regularly to help keep your account secure.
                        </p>
                    </div>

                    <button
                        type="button"
                        id="togglePasswordForm"
                        class="password-button"
                        aria-expanded="{{ $errors->has('current_password') || $errors->has('password') || $errors->has('password_confirmation') ? 'true' : 'false' }}"
                        aria-controls="passwordForm"
                    >
                        Change Password
                    </button>
                </div>

                <div
                    id="passwordForm"
                    class="password-form"
                    {{ $errors->has('current_password') || $errors->has('password') || $errors->has('password_confirmation') ? '' : 'hidden' }}
                >
                    <div class="password-form-header">
                        <h2>Change Password</h2>
                        <p>
                            Enter your current password, then enter and confirm your new password.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('profile.password.update') }}">
                        @csrf

                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input
                                type="password"
                                id="current_password"
                                name="current_password"
                                placeholder="Enter current password"
                                autocomplete="current-password"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Enter new password"
                                autocomplete="new-password"
                                minlength="8"
                                required
                            >
                            <p class="note">
                                At least 8 characters, including an uppercase letter,
                                a lowercase letter, and a number.
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm New Password</label>
                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                placeholder="Re-enter new password"
                                autocomplete="new-password"
                                minlength="8"
                                required
                            >
                        </div>

                        <div class="password-actions">
                            <button
                                type="button"
                                id="cancelPasswordForm"
                                class="btn btn-secondary"
                            >
                                Cancel
                            </button>

                            <button type="submit" class="password-button">
                                Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </section>
        @endif

    </main>

    <script>
        const toggleButton = document.getElementById('togglePasswordForm');
        const passwordForm = document.getElementById('passwordForm');
        const cancelButton = document.getElementById('cancelPasswordForm');

        if (toggleButton && passwordForm && cancelButton) {
            function openPasswordForm() {
                passwordForm.hidden = false;
                toggleButton.setAttribute('aria-expanded', 'true');
            }

            function closePasswordForm() {
                passwordForm.hidden = true;
                toggleButton.setAttribute('aria-expanded', 'false');
            }

            toggleButton.addEventListener('click', function () {
                if (passwordForm.hidden) {
                    openPasswordForm();
                } else {
                    closePasswordForm();
                }
            });

            cancelButton.addEventListener('click', function () {
                closePasswordForm();
                passwordForm.querySelector('form').reset();
            });

            @if ($errors->has('current_password') || $errors->has('password') || $errors->has('password_confirmation'))
                openPasswordForm();
            @endif
        }
    </script>

</body>
</html>
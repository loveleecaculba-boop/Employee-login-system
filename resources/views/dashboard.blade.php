<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - INCS</title>

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

        /* Navigation Header */
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
            transition: color 0.2s;
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
            transition: background 0.2s, border-color 0.2s;
        }

        .logout-button:hover {
            background: #29458d;
            border-color: #29458d;
        }

        /* Main Content */
        .container {
            width: 100%;
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 24px;
        }

        .welcome-card {
            background: white;
            padding: 32px;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(15, 23, 42, 0.05);
            margin-bottom: 24px;
        }

        .welcome-card h1 {
            color: #172554;
            font-size: 30px;
            line-height: 1.3;
            margin-bottom: 8px;
        }

        .welcome {
            color: #64748b;
            font-size: 15px;
            line-height: 1.6;
        }

        .admin-badge,
        .employee-badge {
            display: inline-block;
            margin-top: 18px;
            padding: 7px 13px;
            background: #e8eefb;
            color: #1e3a8a;
            border: 1px solid #d4def5;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .card {
            background: white;
            padding: 32px;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(15, 23, 42, 0.05);
        }

        .card h2 {
            color: #172554;
            font-size: 22px;
            margin-bottom: 24px;
        }

        .info {
            display: grid;
            gap: 14px;
        }

        .info-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 17px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
        }

        .label {
            color: #334155;
            font-size: 15px;
            font-weight: bold;
        }

        .value {
            color: #475569;
            font-size: 15px;
            text-align: right;
            overflow-wrap: anywhere;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 26px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            flex: 1;
            min-width: 150px;
            padding: 13px 18px;
            border: 1px solid transparent;
            border-radius: 7px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.2s, border-color 0.2s;
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
            border-color: #cbd5e1;
            color: #1e3a8a;
        }

        .btn-secondary:hover {
            background: #f1f5f9;
            border-color: #94a3b8;
        }

        /* Responsive Layout */
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
                margin: 24px auto;
                padding: 0 14px;
            }

            .welcome-card,
            .card {
                padding: 22px 18px;
            }

            .welcome-card h1 {
                font-size: 24px;
            }

            .card h2 {
                font-size: 20px;
            }

            .info-row {
                align-items: flex-start;
                flex-direction: column;
                gap: 7px;
                padding: 14px;
            }

            .value {
                text-align: left;
            }

            .buttons {
                flex-direction: column;
            }

            .btn {
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
            <a href="/dashboard" class="nav-link active" aria-current="page">
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

    <!-- DASHBOARD CONTENT -->
    <main class="container">

        <section class="welcome-card">
            <h1>Welcome, {{ Auth::user()->name }}!</h1>

            <p class="welcome">
                You are successfully logged in to the system.
            </p>

            @if (Auth::user()->role === 'admin')
                <span class="admin-badge">Administrator</span>
            @else
                <span class="employee-badge">Employee</span>
            @endif
        </section>

        <section class="card">
            <h2>Account Information</h2>

            <div class="info">

                <div class="info-row">
                    <span class="label">Full Name</span>
                    <span class="value">{{ Auth::user()->name }}</span>
                </div>

                <div class="info-row">
                    <span class="label">Employee ID</span>
                    <span class="value">
                        {{ Auth::user()->employee_id ?? 'N/A' }}
                    </span>
                </div>

                <div class="info-row">
                    <span class="label">Branch</span>
                    <span class="value">
                        {{ Auth::user()->branch ?? 'N/A' }}
                    </span>
                </div>

                <div class="info-row">
                    <span class="label">Role</span>
                    <span class="value">
                        {{ Auth::user()->role === 'admin' ? 'Administrator' : 'Employee' }}
                    </span>
                </div>

            </div>

            <div class="buttons">
                <a href="/profile" class="btn btn-primary">
                    My Profile
                </a>

                @if (Auth::user()->role === 'admin')
                    <a href="/admin" class="btn btn-secondary">
                        Admin Panel
                    </a>
                @endif
            </div>
        </section>

    </main>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Panel - INCS</title>

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
            color: var(--text);
            min-height: 100vh;
        }

        /* NAVIGATION */
        .navbar {
            width: 100%;
            min-height: 76px;
            padding: 18px 5%;
            background: var(--navy);
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            box-shadow: 0 3px 10px rgba(15, 23, 42, 0.12);
        }

        .brand {
            color: var(--white);
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
            color: #E5E7EB;
            text-decoration: none;
            font-size: 15px;
            font-weight: bold;
            transition: color 0.2s;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--white);
        }

        .logout-form {
            margin: 0;
        }

        .logout-button {
            padding: 9px 16px;
            border: 1px solid #93A4C7;
            border-radius: 6px;
            background: transparent;
            color: var(--white);
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s, border-color 0.2s;
        }

        .logout-button:hover {
            background: var(--blue);
            border-color: var(--blue);
        }

        /* MAIN CONTENT */
        .container {
            width: 100%;
            max-width: 1400px;
            margin: 40px auto;
            padding: 0 28px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 28px;
        }

        .page-header h1 {
            color: var(--navy);
            font-size: 30px;
            line-height: 1.3;
            margin-bottom: 8px;
        }

        .page-header p {
            color: var(--muted);
            font-size: 15px;
            line-height: 1.6;
        }

        .page-label {
            display: inline-block;
            margin-top: 14px;
            padding: 7px 12px;
            background: #E9EEF7;
            color: var(--blue);
            border: 1px solid #D5DFF0;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        /* SUMMARY */
        .summary-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            background: var(--white);
            border: 1px solid #E5EAF3;
            border-radius: 10px;
            padding: 22px 26px;
            margin-bottom: 24px;
            box-shadow: 0 4px 16px rgba(15, 23, 42, 0.04);
        }

        .summary-label {
            color: var(--muted);
            font-size: 14px;
            margin-bottom: 8px;
        }

        .summary-number {
            color: var(--navy);
            font-size: 30px;
            font-weight: bold;
        }

        .summary-icon {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: #E9EEF7;
            color: var(--blue);
            font-size: 24px;
            font-weight: bold;
        }

        /* TABLE CARD */
        .card {
            background: var(--white);
            border: 1px solid #E5EAF3;
            border-radius: 12px;
            padding: 26px;
            box-shadow: 0 4px 16px rgba(15, 23, 42, 0.05);
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 22px;
        }

        .card-header h2 {
            color: var(--navy);
            font-size: 20px;
        }

        .record-count {
            color: var(--muted);
            font-size: 13px;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            border: 1px solid #E2E8F0;
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
            background: var(--white);
        }

        th,
        td {
            padding: 16px;
            text-align: left;
            border-bottom: 1px solid #E8EDF5;
            font-size: 14px;
            white-space: nowrap;
        }

        th {
            background: #F4F6FB;
            color: #334155;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        td {
            color: #475569;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #F8FAFD;
        }

        .user-name {
            color: var(--navy);
            font-weight: bold;
        }

        .role {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .role.admin {
            background: #E9EEF7;
            color: #20376F;
            border: 1px solid #D5DFF0;
        }

        .role.employee {
            background: #F1F5F9;
            color: #475569;
            border: 1px solid #E2E8F0;
        }

        .empty {
            padding: 48px 20px;
            text-align: center;
        }

        .empty-title {
            color: var(--navy);
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .empty-description {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.6;
        }

        /* FOOTER */
        .footer {
            text-align: center;
            color: var(--muted);
            font-size: 12px;
            padding: 24px 20px;
        }

        /* RESPONSIVE */
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
                margin: 26px auto;
                padding: 0 14px;
            }

            .page-header h1 {
                font-size: 25px;
            }

            .summary-card {
                padding: 20px;
            }

            .summary-number {
                font-size: 26px;
            }

            .card {
                padding: 18px 14px;
            }

            .card-header h2 {
                font-size: 18px;
            }

            th,
            td {
                padding: 13px;
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
            <a href="/dashboard" class="nav-link">Dashboard</a>

            <form method="POST" action="/logout" class="logout-form">
                @csrf

                <button type="submit" class="logout-button">
                    Logout
                </button>
            </form>
        </nav>
    </header>

    <!-- ADMIN CONTENT -->
    <main class="container">

        <section class="page-header">
            <div>
                <h1>Admin Panel</h1>

                <p>
                    Manage and review registered employee accounts.
                </p>

                <span class="page-label">Administrator Access</span>
            </div>
        </section>

        <!-- ACCOUNT SUMMARY -->
        <section class="summary-card">
            <div>
                <p class="summary-label">Total Registered Accounts</p>

                <p class="summary-number">
                    {{ $users->count() }}
                </p>
            </div>

<div class="summary-icon" aria-hidden="true">
    👥
</div>
        </section>

        <!-- REGISTERED ACCOUNTS TABLE -->
        <section class="card">

            <div class="card-header">
                <h2>Registered Accounts</h2>

                <span class="record-count">
                    {{ $users->count() }}
                    {{ $users->count() === 1 ? 'account' : 'accounts' }}
                </span>
            </div>

            @if ($users->count() > 0)

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Employee ID</th>
                                <th>Branch</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Registered</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>

                                    <td class="user-name">
                                        {{ $user->name }}
                                    </td>

                                    <td>
                                        {{ $user->employee_id ?? 'N/A' }}
                                    </td>

                                    <td>
                                        {{ $user->branch ?? 'N/A' }}
                                    </td>

                                    <td>
                                        {{ $user->username }}
                                    </td>

                                    <td>
                                        {{ $user->email }}
                                    </td>

                                    <td>
                                        @if ($user->role === 'admin')
                                            <span class="role admin">
                                                Administrator
                                            </span>
                                        @else
                                            <span class="role employee">
                                                Employee
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        {{ $user->created_at->format('M d, Y') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            @else

                <div class="empty">
                    <p class="empty-title">No registered accounts</p>

                    <p class="empty-description">
                        Registered employee accounts will appear here.
                    </p>
                </div>

            @endif

        </section>

    </main>

    <footer class="footer">
        INCS &copy; {{ date('Y') }}. All rights reserved.
    </footer>

</body>
</html>

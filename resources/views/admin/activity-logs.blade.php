<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Logs | INCS</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #F4F6FB;
            color: #172554;
        }

        .navbar {
            background: #172554;
            color: white;
            padding: 18px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .brand {
            font-size: 23px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .nav-actions a {
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        .nav-actions a:hover {
            color: #BFDBFE;
        }

        .logout-btn {
            background: #29458D;
            color: white;
            border: 1px solid rgba(255,255,255,.3);
            padding: 9px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
        }

        .logout-btn:hover {
            background: #3B5BA5;
        }

        .container {
            width: 92%;
            max-width: 1500px;
            margin: 35px auto;
        }

        .page-header {
            margin-bottom: 25px;
        }

        .page-header h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .page-header p {
            color: #64748B;
            font-size: 14px;
        }

        .summary-card {
            background: white;
            border: 1px solid #E2E8F0;
            border-radius: 10px;
            padding: 22px;
            margin-bottom: 22px;
            max-width: 280px;
        }

        .summary-card p {
            color: #64748B;
            font-size: 13px;
            margin-bottom: 10px;
        }

        .summary-card h2 {
            font-size: 30px;
            color: #29458D;
        }

        .content-card {
            background: white;
            border: 1px solid #E2E8F0;
            border-radius: 10px;
            padding: 22px;
        }

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .content-header h2 {
            font-size: 19px;
        }

        .filters {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .filters input,
        .filters select {
            padding: 10px 12px;
            border: 1px solid #CBD5E1;
            border-radius: 6px;
            font-size: 13px;
            outline: none;
            background: white;
        }

        .filters input {
            width: 250px;
        }

        .filters input:focus,
        .filters select:focus {
            border-color: #29458D;
        }

        .search-btn,
        .clear-btn {
            padding: 10px 16px;
            border-radius: 6px;
            font-size: 13px;
            text-decoration: none;
            cursor: pointer;
        }

        .search-btn {
            background: #29458D;
            color: white;
            border: none;
        }

        .search-btn:hover {
            background: #1E3675;
        }

        .clear-btn {
            background: #E9EEF7;
            color: #29458D;
            border: 1px solid #D5DCEA;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 1100px;
            border-collapse: collapse;
        }

        th {
            background: #F4F6FB;
            color: #475569;
            text-align: left;
            padding: 14px 12px;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .4px;
            white-space: nowrap;
        }

        td {
            padding: 15px 12px;
            border-bottom: 1px solid #E9EEF7;
            font-size: 13px;
            vertical-align: top;
        }

        tbody tr:hover {
            background: #F8FAFC;
        }

        .employee-name {
            font-weight: bold;
            color: #172554;
            margin-bottom: 5px;
        }

        .muted {
            color: #64748B;
            font-size: 12px;
        }

        .activity-label {
            display: inline-block;
            background: #E9EEF7;
            color: #29458D;
            padding: 6px 9px;
            border-radius: 5px;
            font-size: 11px;
            font-weight: bold;
            white-space: nowrap;
        }

        .description {
            max-width: 230px;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .user-agent {
            max-width: 200px;
            color: #64748B;
            overflow-wrap: anywhere;
            line-height: 1.5;
        }

        .empty-state {
            text-align: center;
            padding: 45px 15px;
            color: #64748B;
        }

        .empty-state h3 {
            color: #172554;
            margin-bottom: 8px;
        }

        .pagination {
            margin-top: 22px;
        }

        .pagination nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .pagination a,
        .pagination span {
            display: inline-block;
            padding: 8px 12px;
            margin: 2px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 13px;
        }

        .pagination a {
            background: #E9EEF7;
            color: #29458D;
        }

        .pagination span[aria-current="page"] {
            background: #29458D;
            color: white;
        }

        .pagination span[aria-disabled="true"] {
            color: #94A3B8;
            background: #F1F5F9;
        }

        footer {
            text-align: center;
            color: #94A3B8;
            font-size: 12px;
            padding: 25px 10px;
        }

        @media (max-width: 650px) {
            .navbar {
                padding: 16px 5%;
            }

            .nav-actions {
                gap: 12px;
            }

            .container {
                margin-top: 25px;
            }

            .page-header h1 {
                font-size: 23px;
            }

            .content-card {
                padding: 15px;
            }

            .filters {
                width: 100%;
            }

            .filters input {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="brand">INCS</div>

        <div class="nav-actions">
            <a href="/dashboard">Dashboard</a>
            <a href="/admin">Registered Accounts</a>
            <a href="{{ route('admin.activity-logs') }}">Activity Logs</a>

            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </nav>

    <main class="container">

        <div class="page-header">
            <h1>Activity Logs</h1>
            <p>Monitor employee and administrator activities recorded in the system.</p>
        </div>

        <div class="summary-card">
            <p>Total Recorded Activities</p>
            <h2>{{ number_format($activityCount) }}</h2>
        </div>

        <section class="content-card">

            <div class="content-header">
                <h2>System Activity History</h2>

                <form action="{{ route('admin.activity-logs') }}"
                      method="GET"
                      class="filters">

                    <input
                        type="text"
                        name="search"
                        placeholder="Search employee or activity..."
                        value="{{ request('search') }}"
                    >

                    <select name="action">
                        <option value="">All Activities</option>

                        @php
                            $actions = [
                                'login' => 'Successful Login',
                                'failed_login' => 'Failed Login',
                                'logout' => 'Logout',
                                'registration' => 'Registration',
                                'profile_update' => 'Profile Update',
                                'password_change' => 'Password Change',
                                'password_reset' => 'Password Reset',
                                'admin_panel_access' => 'Admin Panel Access',
                            ];
                        @endphp

                        @foreach ($actions as $value => $label)
                            <option value="{{ $value }}"
                                {{ request('action') === $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>

                    <button type="submit" class="search-btn">Search</button>

                    <a href="{{ route('admin.activity-logs') }}" class="clear-btn">
                        Clear
                    </a>
                </form>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Employee</th>
                            <th>Employee ID</th>
                            <th>Activity</th>
                            <th>Description</th>
                            <th>Date & Time</th>
                            <th>IP Address</th>
                            <th>Browser / Device</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($activityLogs as $log)
                            <tr>
                                <td>
                                    <div class="employee-name">
                                        {{ $log->user?->name ?? 'Unmatched / Deleted Account' }}
                                    </div>
                                    <div class="muted">
                                        {{ $log->user?->username ?? 'N/A' }}
                                    </div>
                                </td>

                                <td>
                                    {{ $log->user?->employee_id ?? 'N/A' }}
                                </td>

                                <td>
                                    <span class="activity-label">
                                        {{ $actions[$log->action] ?? ucwords(str_replace('_', ' ', $log->action)) }}
                                    </span>
                                </td>

                                <td>
                                    <div class="description">
                                        {{ $log->description ?? 'No description available.' }}
                                    </div>
                                </td>

                                <td>
                                    {{ $log->created_at
                                        ? $log->created_at->format('M d, Y') . ' at ' . $log->created_at->format('h:i A')
                                        : 'N/A' }}
                                </td>

                                <td>
                                    {{ $log->ip_address ?? 'N/A' }}
                                </td>

                                <td>
                                    <div class="user-agent">
                                        {{ $log->user_agent ?? 'N/A' }}
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div class="empty-state">
                                        <h3>No Activity Records Found</h3>
                                        <p>There are no recorded activities matching your search.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pagination">
                {{ $activityLogs->links() }}
            </div>

        </section>
    </main>

    <footer>
        INCS &copy; {{ date('Y') }}. All Rights Reserved.
    </footer>

</body>
</html>
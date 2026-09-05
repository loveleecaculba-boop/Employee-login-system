<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Profile - Simple Login System</title>

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
            padding: 40px 20px;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #1f2937;
            margin-bottom: 8px;
        }

        .subtitle {
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

        input,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            background: white;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #2563eb;
        }

        input[readonly] {
            background: #f3f4f6;
            color: #666;
        }

        .role-box {
            width: 100%;
            padding: 12px;
            background: #f3f4f6;
            border: 1px solid #ddd;
            border-radius: 6px;
            color: #374151;
        }

        .note {
            margin-top: 6px;
            font-size: 13px;
            color: #666;
        }

        .success-box {
            background: #dcfce7;
            border: 1px solid #bbf7d0;
            color: #166534;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
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

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>My Profile</h1>

        <p class="subtitle">
            View and update your account information.
        </p>

        @if (session('success'))
            <div class="success-box">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/profile">

            @csrf
            @method('PUT')

            <!-- Full Name -->
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

            <!-- Employee ID -->
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

            <!-- Branch -->
            <div class="form-group">
                <label for="branch">Branch</label>

                <select
                    id="branch"
                    name="branch"
                    required
                >
                    <option value="">Select your branch</option>

                    <option
                        value="Pasig"
                        {{ old('branch', Auth::user()->branch) == 'Pasig' ? 'selected' : '' }}
                    >
                        Pasig
                    </option>

                    <option
                        value="Mandaluyong"
                        {{ old('branch', Auth::user()->branch) == 'Mandaluyong' ? 'selected' : '' }}
                    >
                        Mandaluyong
                    </option>

                    <option
                        value="Manila"
                        {{ old('branch', Auth::user()->branch) == 'Manila' ? 'selected' : '' }}
                    >
                        Manila
                    </option>
                </select>
            </div>

            <!-- Username -->
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

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email Address</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', Auth::user()->email) }}"
                    required
                >
            </div>

            <!-- Role -->
            <div class="form-group">
                <label>Account Role</label>

                <div class="role-box">
                    {{ Auth::user()->role === 'admin' ? 'Administrator' : 'Employee' }}
                </div>

                <p class="note">
                    Account role cannot be changed from the profile page.
                </p>
            </div>

            <div class="buttons">

                <a href="/dashboard" class="btn btn-secondary">
                    Back to Dashboard
                </a>

                <button type="submit" class="btn btn-primary">
                    Save Changes
                </button>

            </div>

        </form>

    </div>

</body>
</html>
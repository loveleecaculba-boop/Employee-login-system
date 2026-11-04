<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        AuditLog::create([
            'user_id' => Auth::id(),
            'action' => 'admin_panel_access',
            'description' => 'Administrator accessed the admin panel.',
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        $users = User::orderBy('created_at', 'desc')->get();

        return view('admin.index', compact('users'));
    }

    public function activityLogs(Request $request)
    {
        $query = AuditLog::with('user')
            ->latest();

        // Search employee details and activity
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('action', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('ip_address', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', "%{$search}%")
                            ->orWhere('employee_id', 'like', "%{$search}%")
                            ->orWhere('username', 'like', "%{$search}%");
                    });
            });
        }

        // Filter by activity type
        if ($request->filled('action')) {
            $query->where('action', $request->action);
        }

        $activityLogs = $query->paginate(15)->withQueryString();

        $activityCount = AuditLog::count();

        return view('admin.activity-logs', compact(
            'activityLogs',
            'activityCount'
        ));
    }
}
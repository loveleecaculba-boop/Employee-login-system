<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AuditLog;
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
}
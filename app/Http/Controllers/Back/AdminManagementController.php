<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminManagementController extends Controller
{
    /**
     * Display a listing of all admins.
     */
    public function index()
    {
        $admins = Admin::orderBy('created_at', 'desc')->get();
        return view('back.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new admin.
     */
    public function create()
    {
        return view('back.admins.create');
    }

    /**
     * Store a newly created admin in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:admins,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        Admin::create([
            'name'           => $request->name,
            'email'          => $request->email,
            'password'       => Hash::make($request->password),
            'is_super_admin' => false, // New admins are regular admins by default
        ]);

        return redirect()->route('admin.admins.index')
            ->with('success', 'Admin account created successfully.');
    }

    /**
     * Show the form for editing an admin.
     */
    public function edit(Admin $admin)
    {
        return view('back.admins.edit', compact('admin'));
    }

    /**
     * Update an admin in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:admins,email,' . $admin->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $admin->update($data);

        return redirect()->route('admin.admins.index')
            ->with('success', 'Admin account updated successfully.');
    }

    /**
     * Delete an admin account (cannot delete self or other super admins).
     */
    public function destroy(Admin $admin)
    {
        // Prevent deleting your own account
        if ($admin->id === auth()->guard('admin')->id()) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        // Prevent deleting other super admins
        if ($admin->is_super_admin) {
            return back()->with('error', 'Cannot delete a Super Admin account.');
        }

        $admin->delete();

        return redirect()->route('admin.admins.index')
            ->with('success', 'Admin account deleted successfully.');
    }
}

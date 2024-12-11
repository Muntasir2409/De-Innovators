<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{



    public function index(Request $request)
    {

        $search = $request->query('search');
        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'LIKE', '%' . $search . '%');
        })->paginate(10);

        return view('admin.index', compact('users'));
    }
    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:admin,editor,user',
        ]);

        $user->update([
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users')->with('success', 'User role updated successfully.');
    }
}

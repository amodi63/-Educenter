<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('id')->paginate(5);

        return view('admin.users.index', compact('users'));
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('admin.users.index')->with('msg', 'User deleted successfully')->with('type', 'danger');
    }
}

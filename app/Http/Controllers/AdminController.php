<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $users = User::where('role', 'user')->get();
        
        return view('admin.dashboard', compact('users'));
    }
}

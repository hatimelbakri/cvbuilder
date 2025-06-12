<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
//use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class backendController extends Controller
{
    public function Usercv()
    {
        return view('backend.basicinfo');
    }

    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();
        
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Request;

class LoginController extends Controller
{
    public function logout() {
        Auth::logout();
        return redirect('/');
      }
}
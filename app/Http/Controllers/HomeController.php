<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        if (Auth::user()->role == 'Admin') {
            return redirect('admin/dashboard');
        }
        if (Auth::user()->role == 'User') {
            return redirect('user/apartment/create');
        }
    }
}

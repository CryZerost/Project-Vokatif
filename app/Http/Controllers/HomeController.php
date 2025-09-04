<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * 
     */

     // ---- function public ------
    public function index()
    {
        return view('page.public.home');
    }

    public function home()
    {
        return view('page.public.home');
    }

    public function category()
    {
        return view('page.public.category');
    }


    // ---- function user ------
     public function userupdate()
    {
        return view('user.update');
        
    }

    // ---- function category ------


    public function categoryphotography()
    {
        return view('page.category.photography');
    }
    
}

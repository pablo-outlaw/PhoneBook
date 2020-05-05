<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Users;
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
        $user = Auth::user();

        return view('profile', compact('user'));
    }


    public function update(Request $request)
    {

        Auth::user()->update([
            'name' => $request['name'],
            'adress' => $request['adress']

        ]);






        return redirect('/profile');
    }
}

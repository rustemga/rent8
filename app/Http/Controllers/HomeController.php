<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        switch (auth()-> user() ->role) {
            case 'rent_service_owner';
                $currentView = 'homeRentServiceOwner';
                break;
            case 'admin';
                $currentView = 'homeAdmin';
                break;
            default:
                $currentView = 'home';
        }

        return view($currentView);
    }

    public function indexAdmin()
    {
        return view('homeAdmin');
    }

    public function indexRentOwner()
    {
        return view('homeRentServiceOwner');
    }
}

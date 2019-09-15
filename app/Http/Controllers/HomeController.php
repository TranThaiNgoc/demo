<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\bu;
use App\bucategory;

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
    public function getAdmin()
    {
        $data = [
            'bu' => bu::all(),
            'bucategory' => bucategory::where('is_deleted', 0)->get(),
        ];
        return view('admin.themes.bu.list', $data);
    }
}

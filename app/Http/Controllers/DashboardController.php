<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App;
use Auth;
use DB;

class DashboardController extends Controller
{

    public function index(){
        die('dashboard');
        return view('dashboard');

    }

}

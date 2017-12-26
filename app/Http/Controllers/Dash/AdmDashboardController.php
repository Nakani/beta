<?php

namespace App\Http\Controllers\Dash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App;
use Auth;
use DB;
class AdmDashboardController extends Controller
{

    public function index(){

        return view('dashboard');

    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index()
    {
        $data = [
            'products' => DB::table('products')->count(),

        ];

        return view('dashboard.index', $data);
    }
}

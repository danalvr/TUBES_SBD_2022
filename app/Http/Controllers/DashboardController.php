<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $users = count(DB::select('select * from users'));

        return view('dashboard.index', [
            'users' => $users
        ]);
    }
}

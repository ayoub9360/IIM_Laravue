<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class Dashboard extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard', [
            'customers' => Customers::all(),
            'projects' => Projects::all(),
            'projectsIncrease' => DB::table('projects')->where('start_date', '>=', now()->subMonth())->get(),
            'customersIncrease' => DB::table('customers')->where('created_at', '>=', now()->subMonth())->get(),
        ]);
    }
}

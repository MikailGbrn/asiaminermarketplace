<?php

namespace App\Http\Controllers\CompanyAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardCompany extends Controller
{
    public function index()
    {
        echo '<a href='.url('company/logout').'>log out </a>';
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalStudents = User::count();
        $totalCourses = User::count();

        return view('dashboard', compact('totalUsers', 'totalStudents', 'totalCourses'));
    }
}
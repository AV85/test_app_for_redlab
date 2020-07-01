<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $employees = Employee::all();
        $departments = Department::all();
        return view('home.index', [
            'employees' => $employees,
            'departments' => $departments
        ]);
    }
}

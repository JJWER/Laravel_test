<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $totalEmployees = Employee::count();
    $newEmployeesThisMonth = Employee::whereMonth('hired_date', now()->month)->count();
    $largestDepartment = Employee::select('position')
                            ->groupBy('position')
                            ->orderByRaw('COUNT(*) DESC')
                            ->limit(1)
                            ->value('position');

    $positions = Employee::select('position')->distinct()->pluck('position');
    $positionCounts = $positions->map(fn($position) => Employee::where('position', $position)->count());

    return view('dashboard', compact('totalEmployees', 'newEmployeesThisMonth', 'largestDepartment', 'positions', 'positionCounts'));
}

}

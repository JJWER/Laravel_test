<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Barryvdh\DomPDF\Facade as PDF;


class ReportController extends Controller
{
    public function index()
    {
        $positions = Employee::select('position')->distinct()->pluck('position');
        return view('reports.index', compact('positions'));
    }


    public function generate(Request $request)
    {
        // Validate the request
        $request->validate([
            'start_date' => 'nullable|date|before_or_equal:end_date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        // Get employees based on the filters
        $query = Employee::query();

        if ($request->position && $request->position !== 'ทั้งหมด') {
            $query->where('position', $request->position);
        }

        if ($request->start_date) {
            $query->whereDate('hired_date', '>=', $request->start_date);
        }

        if ($request->end_date) {
            $query->whereDate('hired_date', '<=', $request->end_date);
        }

        $employees = $query->get();

        return view('reports.generate', compact('employees'));

    }


    public function downloadPDF(Request $request)
    {
        
        // Validate the inputs (if necessary)
        $request->validate([
            'position' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        // Query the employees based on filters
        $employees = Employee::query();

        if ($request->position && $request->position !== 'ทั้งหมด') {
            $employees->where('position', $request->position);
        }

        if ($request->start_date) {
            $employees->where('hired_date', '>=', $request->start_date);
        }

        if ($request->end_date) {
            $employees->where('hired_date', '<=', $request->end_date);
        }

        $employees = $employees->get();

        // Generate PDF using DomPDF
        $pdf = PDF::loadView('reports.pdf', ['employees' => $employees]);

        // Download the PDF file
        return $pdf->download('employee_report.pdf');
    }
    
}

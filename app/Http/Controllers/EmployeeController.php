<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        // Query สำหรับค้นหาข้อมูล
        $query = Employee::query();

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('position', 'like', '%' . $request->search . '%');
        }

        // ดึงข้อมูลแบบแบ่งหน้า (Pagination)
        $employees = $query->paginate(10);
        //dd($employees); // Debug ข้อมูลพนักงานทั้งหมด
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'nullable|string|max:20',
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
            'hired_date' => 'required|date',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'เพิ่มพนักงานสำเร็จ!');
    }



    public function show($id)
    {
        // ค้นหาพนักงานด้วย ID
        $employee = Employee::findOrFail($id);

        // ส่งข้อมูลไปยัง View
        return view('employees.show', compact('employee'));
    }

    public function edit($id)
    {
        // ค้นหาพนักงานด้วย ID
        $employee = Employee::findOrFail($id);

        // ส่งข้อมูลไปยัง View สำหรับแก้ไข
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        // Validate ข้อมูลที่ส่งมา
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
            'hired_date' => 'required|date',
        ]);

        // ค้นหาและอัปเดตข้อมูลพนักงาน
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'อัปเดตข้อมูลพนักงานสำเร็จ!');
    }

    public function destroy($id)
    {
        // ค้นหาและลบข้อมูลพนักงาน
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'ลบข้อมูลพนักงานสำเร็จ!');
    }

}

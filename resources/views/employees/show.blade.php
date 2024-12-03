@extends('layouts.app')

@section('content')
<div class="container">
    <h1>ข้อมูลพนักงาน</h1>
    
    <div class="mb-3">
        <label class="form-label">ชื่อ:</label>
        <p>{{ $employee->name }}</p>
    </div>
    <div class="mb-3">
        <label class="form-label">อีเมล:</label>
        <p>{{ $employee->email }}</p>
    </div>
    <div class="mb-3">
        <label class="form-label">เบอร์โทรศัพท์:</label>
        <p>{{ $employee->phone }}</p>
    </div>
    <div class="mb-3">
        <label class="form-label">ตำแหน่ง:</label>
        <p>{{ $employee->position }}</p>
    </div>
    <div class="mb-3">
        <label class="form-label">เงินเดือน:</label>
        <p>{{ $employee->salary }}</p>
    </div>
    <div class="mb-3">
        <label class="form-label">วันที่เริ่มงาน:</label>
        <p>{{ $employee->hired_date }}</p>
    </div>
    
    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">แก้ไขข้อมูล</a>
    <a href="{{ route('employees.index') }}" class="btn btn-secondary">กลับ</a>
</div>
@endsection

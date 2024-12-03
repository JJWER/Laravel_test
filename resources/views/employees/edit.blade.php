@extends('layouts.app')

@section('content')
<div class="container">
    <h1>แก้ไขข้อมูลพนักงาน</h1>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">ชื่อ - นามสกุล</label>
            <input type="text" name="name" class="form-control" value="{{ $employee->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">อีเมล</label>
            <input type="email" name="email" class="form-control" value="{{ $employee->email }}" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">เบอร์โทรศัพท์</label>
            <input type="text" name="phone" class="form-control" value="{{ $employee->phone }}">
        </div>
        <div class="mb-3">
            <label for="position" class="form-label">ตำแหน่ง</label>
            <input type="text" name="position" class="form-control" value="{{ $employee->position }}" required>
        </div>
        <div class="mb-3">
            <label for="salary" class="form-label">เงินเดือน</label>
            <input type="number" step="0.01" name="salary" class="form-control" value="{{ $employee->salary }}" required>
        </div>
        <div class="mb-3">
            <label for="hired_date" class="form-label">วันที่เริ่มงาน</label>
            <input type="date" name="hired_date" class="form-control" value="{{ $employee->hired_date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">ยกเลิก</a>
    </form>
</div>
@endsection

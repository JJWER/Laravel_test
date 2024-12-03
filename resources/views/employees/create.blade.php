@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- แสดง Flash Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h1 class="py-2 ">เพิ่มข้อมูลพนักงานใหม่</h1>
        
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">ชื่อ - นามสกุล</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">อีเมล</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">เบอร์โทรศัพท์</label>
                <input type="text" name="phone" class="form-control">
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">ตำแหน่ง</label>
                <input type="text" name="position" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">เงินเดือน</label>
                <input type="number" step="0.01" name="salary" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="hired_date" class="form-label">วันที่เริ่มงาน</label>
                <input type="date" name="hired_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">เพิ่มพนักงาน</button>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">ยกเลิก</a>
        </form>
    </div>
@endsection

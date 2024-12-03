@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="py-3">รายชื่อพนักงาน</h1>

    <!-- ฟอร์มค้นหา -->
    <form method="GET" action="{{ route('employees.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="ค้นหาชื่อ, อีเมล หรือ ตำแหน่ง" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">ค้นหา</button>
        </div>
    </form>

    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">เพิ่มพนักงานใหม่</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>รหัส</th>
                <th>ชื่อ</th>
                <th>อีเมล</th>
                <th>ตำแหน่ง</th>
                <th>เงินเดือน</th>
                <th>วันที่เริ่มงาน</th>
                <th>การจัดการ</th>
            </tr>
        </thead>
        <tbody>
            @forelse($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>{{ $employee->salary }}</td>
                    <td>{{ $employee->hired_date }}</td>
                    <td>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">แก้ไข</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">ลบ</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">ไม่พบข้อมูลพนักงาน</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    {{ $employees->links() }}
</div>
@endsection

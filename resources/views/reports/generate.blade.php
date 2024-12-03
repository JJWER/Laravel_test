@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="py-2">รายงานพนักงาน</h1>
        @if ($employees->isEmpty())
            <div class="alert alert-warning" role="alert">
                ไม่มีข้อมูลพนักงานในช่วงเวลาที่เลือก
            </div>
        @else
            <table id="employee-report" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ชื่อ - นามสกุล</th>
                        <th>อีเมล</th>
                        <th>เบอร์โทร</th>
                        <th>ตำแหน่ง</th>
                        <th>เงินเดือน</th>
                        <th>วันที่เริ่มงาน</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>{{ $employee->position }}</td>
                            <td>{{ number_format($employee->salary, 2) }}</td>
                            <td>{{ $employee->hired_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <div class="d-flex gap-2 mt-3">
            <!-- Back Button -->
            <a href="{{ route('reports.index') }}" class="btn btn-secondary flex-fill">กลับ</a>

            <!-- Download PDF Form -->
            <form action="{{ route('reports.download') }}" method="POST" class="flex-fill">
                @csrf
                <input type="hidden" name="position" value="{{ request('position', 'ทั้งหมด') }}">
                <input type="hidden" name="start_date" value="{{ request('start_date', '') }}">
                <input type="hidden" name="end_date" value="{{ request('end_date', '') }}">
                <button type="submit" class="btn btn-danger w-100">ดาวน์โหลด PDF</button>
            </form>

            <!-- Print Button -->
            <button class="btn btn-success flex-fill" onclick="window.print()">พิมพ์รายงาน</button>
        </div>

        <!-- DataTables Scripts -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#employee-report').DataTable();
            });
        </script>

        <style>
            @media print {
                .btn, form {
                    display: none;
                }
            }
        </style>
    </div>
@endsection

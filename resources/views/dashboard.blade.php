@extends('layouts.app')

@section('title', 'แดชบอร์ดระบบ HR')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('แดชบอร์ดระบบ HR') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <!-- การ์ดข้อมูล -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- การ์ด: จำนวนพนักงานทั้งหมด -->
                <div class="bg-blue-500 text-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="font-semibold">พนักงานทั้งหมด</h3>
                        <p class="text-4xl mt-4">{{ $totalEmployees }}</p>
                    </div>
                </div>
                <div class="bg-green-500 text-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="font-semibold">พนักงานใหม่เดือนนี้</h3>
                        <p class="text-4xl mt-4">{{ $newEmployeesThisMonth }}</p>
                    </div>
                </div>
                <div class="bg-yellow-500 text-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="font-semibold">แผนกที่มีพนักงานมากที่สุด</h3>
                        <p class="text-4xl mt-4">{{ $largestDepartment }}</p>
                    </div>
                </div>
            </div>

            <!-- แผนภูมิ -->
            <div class="mt-8 bg-white shadow-sm sm:rounded-lg p-6 flex justify-center items-center">
                <div style="width: 400px; height: 300px; margin: auto;">
                    <h3 class="font-semibold text-gray-800 text-center mb-4">สัดส่วนพนักงานตามตำแหน่ง</h3>
                    <canvas id="positionChart"></canvas>
                </div>
            </div>

            <!-- เมนูลัด -->
            <div class="mt-8 grid grid-cols-2 sm:grid-cols-4 gap-4">
                <a href="{{ url('/employees/create') }}"
                    class="block bg-blue-500 text-white text-center py-3 rounded-md shadow-md hover:bg-blue-600 mt-4">
                    เพิ่มพนักงานใหม่
                </a>
                <a href="{{ route('employees.index') }}"
                    class="block bg-green-500 text-white text-center py-3 rounded-md shadow-md hover:bg-green-600 mt-4">
                    ดูรายชื่อพนักงาน
                </a>
                <a href="{{ route('reports.index') }}"
                    class="block bg-yellow-500 text-white text-center py-3 rounded-md shadow-md hover:bg-yellow-600 mt-4">
                    สร้างรายงาน
                </a>
                <a href="{{ route('settings.index')}}"
                    class="block bg-red-500 text-white text-center py-3 rounded-md shadow-md hover:bg-red-600 mt-4">
                    ตั้งค่าระบบ
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('positionChart').getContext('2d');
        const positionChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($positions) !!}, // ชื่อของตำแหน่ง
                datasets: [{
                    label: 'จำนวนพนักงาน',
                    data: {!! json_encode($positionCounts) !!}, // จำนวนพนักงานตามตำแหน่ง
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b'], // สี
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // ปิดการบังคับสัดส่วน
                plugins: {
                    legend: {
                        position: 'top', // ตำแหน่ง Legend
                    },
                    tooltip: {
                        enabled: true, // เปิด Tooltip
                    },
                },
            }
        });
    </script>
@endsection

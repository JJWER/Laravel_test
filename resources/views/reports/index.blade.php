@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="py-2">สร้างรายงานพนักงาน</h1>
        <form action="{{ route('reports.generate') }}" method="POST" id="report-form">
            @csrf
            <div class="mb-3">
                <label for="position" class="form-label">ตำแหน่ง</label>
                <select name="position" id="position" class="form-select">
                    <option value="ทั้งหมด">ทั้งหมด</option>
                    @foreach ($positions as $position)
                        <option value="{{ $position }}">{{ $position }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">จากวันที่...</label>
                <input type="date" name="start_date" id="start_date" class="form-control">
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">ถึงวันที่...</label>
                <input type="date" name="end_date" id="end_date" class="form-control">
            </div>

            <div class="d-flex">
                <button type="submit" class="btn btn-primary me-2">สร้างรายงาน</button>
                <button type="button" class="btn btn-secondary" id="reset-button">รีเซ็ตฟอร์ม</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('reset-button').addEventListener('click', function () {
            document.getElementById('report-form').reset();
        });
    </script>
@endsection

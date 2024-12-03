@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="th">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ตั้งค่าระบบ</title>
        <!-- เพิ่ม Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background-color: #f8f9fa;
            }

            .form-container {
                margin-top: 50px;
            }

            .card {
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }

            .btn-primary {
                background-color: #007bff;
                border: none;
            }

            .btn-primary:hover {
                background-color: #0056b3;
            }
        </style>
    </head>

    <body>
        <div class="container form-container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card p-4">
                        <h1 class="text-center mb-4">ตั้งค่าระบบ</h1>
                        <!-- ฟอร์มตั้งค่า -->
                        <form method="POST" action="{{ route('settings.update') }}">
                            @csrf
                            @method('PUT')

                            <!-- ชื่อบริษัท -->
                            <div class="mb-3">
                                <label for="company_name" class="form-label">ชื่อบริษัท:</label>
                                <input type="text" name="company_name" id="company_name" class="form-control"
                                    value="{{ $settings->company_name ?? '' }}" placeholder="ใส่ชื่อบริษัท" required>
                            </div>

                            <!-- อีเมลติดต่อ -->
                            <div class="mb-3">
                                <label for="contact_email" class="form-label">อีเมลติดต่อ:</label>
                                <input type="email" name="contact_email" id="contact_email" class="form-control"
                                    value="{{ $settings->contact_email ?? '' }}" placeholder="ใส่อีเมลติดต่อ" required>
                            </div>

                            <!-- ปุ่มบันทึก -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-100">บันทึก</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
@endsection

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee; // Import Model
use Illuminate\Support\Facades\DB;


class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ตัวอย่างการเพิ่มข้อมูลพนักงานแบบกำหนดเอง
        Employee::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
            'position' => 'Developer',
            'salary' => 50000,
            'hired_date' => '2023-01-15',
        ]);

        // ตัวอย่างการเพิ่มข้อมูลพนักงานหลายคน
        Employee::insert([
            [
                'name' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'phone' => '0987654321',
                'position' => 'Manager',
                'salary' => 80000,
                'hired_date' => '2023-02-10',
            ],
            [
                'name' => 'Alice Brown',
                'email' => 'alicebrown@example.com',
                'phone' => '1122334455',
                'position' => 'Designer',
                'salary' => 40000,
                'hired_date' => '2023-03-20',
            ],
                        
        ]);
    }
}

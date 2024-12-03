<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    // ระบุคอลัมน์ที่อนุญาตให้กรอกข้อมูล (mass assignable)
    protected $fillable = [
        'company_name',
        'contact_email',
    ];
}

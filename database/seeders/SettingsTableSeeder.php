<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    public function run()
    {
        Setting::create([
            'company_name' => 'Default Company',
            'contact_email' => 'default@example.com',
        ]);
    }
}

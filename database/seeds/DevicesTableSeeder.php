<?php

use Illuminate\Database\Seeder;
use App\Models\Device;

class DevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('devices')->truncate();
        
        Device::create([
            'user_id' => '1',
            'endpoint' => '1',
        ]);

        Device::create([
            'user_id' => '2',
            'endpoint' => '15',
        ]);
    }
}

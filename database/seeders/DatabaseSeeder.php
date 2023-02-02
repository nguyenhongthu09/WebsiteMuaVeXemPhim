<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\LichChieu;
use App\Models\Phong;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $this->call(AdminSeeder::class);
        $this->call(BaiVietSeeder::class);
        $this->call(PhongSeeder::class);
        $this->call(PhimSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(LichChieuSeeder::class);
        Schema::enableForeignKeyConstraints();
    }
}

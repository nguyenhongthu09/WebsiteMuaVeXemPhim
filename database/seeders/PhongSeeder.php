<?php

namespace Database\Seeders;

use App\Models\Ghe;
use App\Models\Phong;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PhongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phongs')->delete();
        DB::table('ghes')->delete();

        // Reset id về lại 1
        DB::table('phongs')->truncate();
        DB::table('ghes')->truncate();

        // 2. Ta sẽ thêm mới phim bằng lệnh create
        DB::table('phongs')->insert([
            [
                'ten_phong'     =>"DZ FullStack 1",
                'tinh_trang'    => rand(0,1),
                'hang_doc'      => 7,
                'hang_ngang'    => 9,
            ],
            [
                'ten_phong'     =>"DZ FullStack 2",
                'tinh_trang'    => rand(0,1),
                'hang_doc'      => 7,
                'hang_ngang'    => 9,
            ],
            [
                'ten_phong'     =>"DZ FullStack 3",
                'tinh_trang'    => rand(0,1),
                'hang_doc'      => 7,
                'hang_ngang'    => 9,
            ],
            [
                'ten_phong'     =>"DZ FullStack 3",
                'tinh_trang'    => rand(0,1),
                'hang_doc'      => 7,
                'hang_ngang'    => 9,
            ],
            [
                'ten_phong'     =>"DZ FullStack 4",
                'tinh_trang'    => rand(0,1),
                'hang_doc'      => 7,
                'hang_ngang'    => 9,
            ],
            [
                'ten_phong'     =>"DZ FullStack 5",
                'tinh_trang'    => rand(0,1),
                'hang_doc'      => 6,
                'hang_ngang'    => 8,
            ],
            [
                'ten_phong'     =>"DZ FullStack 6",
                'tinh_trang'    => rand(0,1),
                'hang_doc'      => 6,
                'hang_ngang'    => 8,
            ],
            [
                'ten_phong'     =>"DZ FullStack 7",
                'tinh_trang'    => rand(0,1),
                'hang_doc'      => 6,
                'hang_ngang'    => 8,
            ],[
                'ten_phong'     =>"DZ FullStack 8",
                'tinh_trang'    => rand(0,1),
                'hang_doc'      => 6,
                'hang_ngang'    => 8,
            ],[
                'ten_phong'     =>"DZ FullStack 9",
                'tinh_trang'    => rand(0,1),
                'hang_doc'      => 6,
                'hang_ngang'    => 8,
            ],[
                'ten_phong'     =>"DZ FullStack 10",
                'tinh_trang'    => rand(0,1),
                'hang_doc'      => 6,
                'hang_ngang'    => 8,
            ],
        ]);

        $list_phong = Phong::get();
        foreach ($list_phong as $key => $value) {
            for($dong = 1; $dong <= $value->hang_ngang; $dong++) {
                $chu = chr($dong + 64);
                for($cot = 1; $cot <= $value->hang_doc; $cot++) {
                    $ten_ghe = $chu . $cot;
                    $ghe = Ghe::create([
                        'ten_ghe'       => $ten_ghe,
                        'tinh_trang'    => 1,
                        'id_phong'      => $value->id,
                    ]);
                }
            }
        }
    }
}

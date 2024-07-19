<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Loaitin;

class LoaitinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tạo dữ liệu mẫu
        Loaitin::create([
            'tenLoai' => 'Tin Thế Giới',
            'ThuTu' => 1,
            'AnHien' => true,
        ]);

        Loaitin::create([
            'tenLoai' => 'Tin Kinh Tế',
            'ThuTu' => 2,
            'AnHien' => true,
        ]);

        // Thêm dữ liệu mẫu khác nếu cần
    }
}

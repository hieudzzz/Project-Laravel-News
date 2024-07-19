<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LoaiTinSeeder::class, // Nếu có seeder cho bảng loaitins
            NewsSeeder::class,
            // Thêm các seeder khác nếu cần
        ]);
    }
}

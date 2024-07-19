<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\LoaiTin;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $loaitins = LoaiTin::all();

        if ($loaitins->isEmpty()) {
            $this->command->info('Không có loại tin nào để chọn.');
            return;
        }

        foreach (range(1, 10) as $index) {
            News::create([
                'tieuDe' => 'Tiêu đề tin ' . $index,
                'noiDung' => 'Nội dung tin số ' . $index,
                'tomTat' => 'Tóm tắt tin số ' . $index,
                'ngayDang' => now(),
                'xem' => rand(0, 1000),
                'idLT' => $loaitins->random()->id,
                'image' => 'http://example.com/image' . $index . '.jpg', // Dữ liệu mẫu cho cột 'image'
            ]);
        }
    }
}

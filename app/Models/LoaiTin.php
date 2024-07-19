<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    use HasFactory;

    protected $table = 'loaitins'; // Tên của bảng trong cơ sở dữ liệu

    protected $fillable = [
        'tenLoai',
        'ThuTu',
        'AnHien'
    ];
}

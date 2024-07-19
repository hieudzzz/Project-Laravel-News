<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'tieuDe', 'noiDung', 'tomTat', 'ngayDang', 'xem', 'image', 'idLT'
    ];
    protected $casts = [
        'ngayDang' => 'datetime', // Ensures 'ngayDang' is treated as a Carbon instance
    ];
    public function loaiTins()
    {
        return $this->belongsTo(LoaiTin::class, 'idLT');
    }
}

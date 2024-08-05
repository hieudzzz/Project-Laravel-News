<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    public function show($id)
    {
        $news = News::with('comments.user')->findOrFail($id);
        return view('client.view.news.detail', compact('news'));
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    protected $fillable = [
        'tieuDe', 'noiDung', 'tomTat', 'ngayDang', 'xem', 'image', 'idLT'
    ];
    protected $casts = [
        'ngayDang' => 'datetime',
    ];
    public function loaiTins()
    {
        return $this->belongsTo(LoaiTin::class, 'idLT');
    }
}

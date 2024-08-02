<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TinController extends Controller
{
    public function index()
    {
        $tinNoiBat = News::orderBy('ngayDang', 'desc')->limit(3)->get();
        $tinMoiNhat = News::orderBy('ngayDang', 'desc')->limit(5)->get();
        $tinXemNhieu = News::orderBy('xem', 'desc')->limit(5)->get();
        $tinMoiNhatThem = News::orderBy('ngayDang', 'desc')->limit(10)->get();

        return view('client.view.home', compact('tinNoiBat', 'tinMoiNhat', 'tinXemNhieu','tinMoiNhatThem'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Tìm kiếm các tin tức có tiêu đề chứa từ khóa
        $tinNoiBat = News::where('tieuDe', 'like', "%$query%")->get();

        // Trả về một phần của view với kết quả tìm kiếm
        return view('client.view.search-results', [
            'tinNoiBat' => $tinNoiBat
        ])->render(); // Render phần view dưới dạng HTML
    }

    public function chitiet($id)
    {
        $news = News::findOrFail($id);
        return view('client.view.chitiet', compact('news'));
    }

    public function tintrongloai($idLT)
    {
        $tenLoai = DB::table('loaitins')->where('id', $idLT)->value('tenLoai');
        $listtin = DB::table('news')->where('idLT', $idLT)->get();
        return view('client.view.tintrongloai', compact('listtin', 'tenLoai'));
    }
}

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

   // app/Http/Controllers/TinController.php


   // app/Http/Controllers/Client/TinController.php

   public function store(Request $request)
   {
       $request->validate([
           'tieuDe' => 'required|string|max:255',
           'tomTat' => 'required',
           'noiDung' => 'required',
           'ngayDang' => 'required|date',
           'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);

       $newsData = $request->only(['tieuDe', 'tomTat', 'noiDung', 'ngayDang']);

       if ($request->hasFile('image')) {
           $imageName = time() . '.' . $request->file('image')->extension();
           $request->file('image')->storeAs('public', $imageName);
           $newsData['image'] = asset('storage/' . $imageName); // Lưu URL đầy đủ
       }

       News::create($newsData);

       return redirect()->route('client.home');
   }

public function chitiet($id)
{
    $news = News::findOrFail($id);
    // Ngày tháng sẽ tự động được chuyển thành đối tượng Carbon nhờ vào thuộc tính $casts trong model News
    return view('client.view.chitiet', compact('news'));
}

    public function tintrongloai($idLT)
    {
        $tenLoai = DB::table('loaitins')->where('id', $idLT)->value('tenLoai');
        $listtin = DB::table('news')->where('idLT', $idLT)->get();
        return view('client.view.tintrongloai', compact('listtin', 'tenLoai'));
    }
}


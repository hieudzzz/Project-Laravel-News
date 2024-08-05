<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\LoaiTin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eager load the loaiTin relationship
        $news = News::with('loaiTins')->get();

        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $loaitins = LoaiTin::all(); // Lấy danh sách loại tin
        return view('admin.news.create', compact('loaitins')); // Trả về view thêm tin tức
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tieuDe' => 'required|string|max:255',
            'noiDung' => 'required',
            'tomTat' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'idLT' => 'required|exists:loaitins,id',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $path = $request->file('image')->storeAs('images', $imageName, 'public');

        News::create([
            'tieuDe' => $request->tieuDe,
            'noiDung' => $request->noiDung,
            'tomTat' => $request->tomTat,
            'ngayDang' => now(),
            'image' => $imageName,
            'idLT' => $request->idLT,
        ]);

        return redirect()->route('news.index')->with('success', 'Tin tức đã được thêm thành công.');
    }


    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.show', compact('news'));
    }


    public function edit($id)
{
    $news = News::findOrFail($id);
    $loaitins = LoaiTin::all();

    return view('admin.news.edit', compact('news', 'loaitins'));
}

    public function update(Request $request, $id)
    {
        $request->validate([
            'tieuDe' => 'required|string|max:255',
            'noiDung' => 'required',
            'tomTat' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Thay đổi xác thực cho hình ảnh
            'idLT' => 'required|exists:loaitins,id',
        ]);

        $news = News::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete('images/' . $news->image);
            }

            $imageName = time() . '.' . $request->image->extension();
            $path = $request->file('image')->storeAs('images', $imageName, 'public');
            $news->image = $imageName; // Cập nhật tên tệp hình ảnh
        }

        $news->tieuDe = $request->tieuDe;
        $news->noiDung = $request->noiDung;
        $news->tomTat = $request->tomTat;
        $news->idLT = $request->idLT;

        $news->save();

        return redirect()->route('news.index')->with('success', 'Tin tức đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect()->route('news.index')->with('success', 'Tin tức đã được xóa thành công.');
    }
}

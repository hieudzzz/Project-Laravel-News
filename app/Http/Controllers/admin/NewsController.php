<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\LoaiTin;
use Illuminate\Http\Request;

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
        $loaitins = LoaiTin::all();
        return view('admin.news.create', compact('loaitins'));
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
            'ngayDang' => 'required|date',
            'xem' => 'required|integer',
            'image' => 'nullable|url',
            'idLT' => 'required|exists:loaitins,id',
        ]);

        News::create($request->all());
        return redirect()->route('news.index')->with('success', 'Tin tức đã được thêm thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        $loaitins = LoaiTin::all(); // Get all LoaiTin records

        return view('admin.news.edit', compact('news', 'loaitins'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tieuDe' => 'required|string|max:255',
            'noiDung' => 'required',
            'tomTat' => 'nullable',
            'ngayDang' => 'required|date',
            'xem' => 'required|integer',
            'image' => 'nullable|url',
            'idLT' => 'required|exists:loaitins,id',
        ]);

        $news = News::findOrFail($id);
        $news->update($request->all());
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

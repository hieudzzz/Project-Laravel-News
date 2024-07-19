<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoaiTin;
use Illuminate\Http\Request;

class LoaiTinController extends Controller
{
    public function index()
    {
        $loaiTins = LoaiTin::all();
        return view('admin.loaitin.index', compact('loaiTins'));
    }

    public function create()
    {
        return view('admin.loaitin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tenLoai' => 'required|unique:loaitins|max:100',
            'ThuTu' => 'required|integer',
            'AnHien' => 'required|boolean',
        ]);

        LoaiTin::create($request->all());

        return redirect()->route('loaitin.index')->with('success', 'Loại tin created successfully.');
    }

    public function show($id)
    {
        $loaiTin = LoaiTin::find($id);
        return view('admin.loaitin.show', compact('loaiTin'));
    }

    public function edit($id)
    {
        $loaiTin = LoaiTin::find($id);
        return view('admin.loaitin.edit', compact('loaiTin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tenLoai' => 'required|max:100|unique:loaitins,tenLoai,' . $id,
            'ThuTu' => 'required|integer',
            'AnHien' => 'required|boolean',
        ]);

        $loaiTin = LoaiTin::find($id);
        $loaiTin->update($request->all());

        return redirect()->route('loaitin.index')->with('success', 'Loại tin updated successfully.');
    }

    public function destroy($id)
    {
        $loaiTin = LoaiTin::find($id);
        $loaiTin->delete();

        return redirect()->route('loaitin.index')->with('success', 'Loại tin deleted successfully.');
    }
}


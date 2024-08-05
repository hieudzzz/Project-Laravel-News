<?php
// CommentController.php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Chỉ cho phép người dùng đã đăng nhập
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $news = News::findOrFail($id);

        $comment = new Comment();
        $comment->content = $request->comment;
        $comment->user_id = Auth::id(); // Lấy ID của người dùng đã đăng nhập
        $comment->news_id = $news->id; // Gán ID bài viết
        $comment->save();

        return redirect()->back()->with('success', 'Bình luận đã được gửi thành công!');
    }
}


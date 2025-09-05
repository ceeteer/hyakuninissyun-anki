<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Inquiry;

// ユーザー用：フォーム表示
Route::get('/contact', function () {
    return view('contact');
});

// 外部フォームからの問い合わせ受け取り（CSRFなし）
Route::post('/contact/api', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'subject' => 'nullable|string|max:255',
        'message' => 'required|string',
    ]);

    Inquiry::create($validated);

    return response()->json(['message' => '保存完了'], 200);
});


// 管理者用：一覧表示
Route::get('/admin/inquiries', function () {
    $inquiries = Inquiry::latest()->paginate(10);
    return view('admin.inquiries', compact('inquiries'));
})->name('admin.inquiries');

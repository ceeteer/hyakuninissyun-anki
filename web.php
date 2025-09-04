<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Inquiry;

// ユーザー用：フォーム表示
Route::get('/contact', function () {
    return view('contact');
});

// ユーザー用：フォーム送信 → DB保存
Route::post('/contact', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'subject' => 'nullable|string|max:255',
        'message' => 'required|string',
    ]);

    Inquiry::create($validated);

    return back()->with('success', 'お問い合わせを受け付けました');
})->name('contact.store');

// 管理者用：一覧表示
Route::get('/admin/inquiries', function () {
    $inquiries = Inquiry::latest()->paginate(10);
    return view('admin.inquiries', compact('inquiries'));
})->name('admin.inquiries');

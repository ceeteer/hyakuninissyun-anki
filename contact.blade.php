<form action="{{ route('contact.store') }}" method="POST">
    @csrf
    <label>名前：</label>
    <input type="text" name="name"><br>

    <label>メール：</label>
    <input type="email" name="email"><br>

    <label>件名：</label>
    <input type="text" name="subject"><br>

    <label>内容：</label>
    <textarea name="message"></textarea><br>

    <button type="submit">送信</button>
</form>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

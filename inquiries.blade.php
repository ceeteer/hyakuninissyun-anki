<h2>お問い合わせ一覧</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>名前</th>
        <th>メール</th>
        <th>件名</th>
        <th>内容</th>
        <th>日時</th>
    </tr>
    @foreach($inquiries as $inquiry)
    <tr>
        <td>{{ $inquiry->id }}</td>
        <td>{{ $inquiry->name }}</td>
        <td>{{ $inquiry->email }}</td>
        <td>{{ $inquiry->subject }}</td>
        <td>{{ $inquiry->message }}</td>
        <td>{{ $inquiry->created_at->format('Y-m-d H:i') }}</td>
    </tr>
    @endforeach
</table>

{{ $inquiries->links() }}

<div style="width: 300px;height: 150px;margin: auto;margin-top: 100px;">
<form action="{{ route('post_login') }}" method="POST" enctype="multipart/form-data">
    @csrf
    username
    <input name="username" type="text">
    password
    <input name="password" type="password">
    <button type="submit">Login</button>
</form>
</div>
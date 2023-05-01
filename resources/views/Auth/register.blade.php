
<body class="container-sm">
<form method="post" action="{{route('api.register')}}">
    @csrf
    <label>
        <input placeholder="name" name="name" type="text">
    </label>
    <label>
        <input placeholder="email" name="email" type="email">
    </label>
    <label>
        <input placeholder="password" name="password" type="password">
    </label>
    <button type="submit">register</button>
</form>
</body>


<form method="post" action="{{route('api.login')}}" >
@csrf
    <label>
        <input placeholder="email" name="email" type="email">
    </label>
    <label>
        <input placeholder="password" name="password" type="password">
    </label>
    <button type="submit">Login</button>
</form>


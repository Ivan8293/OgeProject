студент<br>

<form method="POST" action="{{route('logout')}}">
    @csrf
    <input type="hidden" name="user_type" value='{{"student"}}'>

    <button type="submit">Выйти post</button>
</form>


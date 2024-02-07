@extends("parent")
@section("content")
    <form action="{{route('change_name')}}" method="POST">
        @csrf
        <label for=""><input name="name" type="text" value="{{$current_name}}"> - Имя</label>
        <input type="submit" value="Ок">
    </form>
@endsection
@extends('layouts.main')

@section('content')
    <form action="/selform" method="POST">
        @csrf
        <input name="name" placeholder="Имя">
        <input name="surname" placeholder="Фамилия">
        <input name="abbreviation" placeholder="Код">
        <input type="submit">
    </form>
    @if ($item)
        {{ $item->name }}
        <br>
        {{ $item->surname }}
        <br>
        {{ $item->abbreviation }}
    @endif
@endsection



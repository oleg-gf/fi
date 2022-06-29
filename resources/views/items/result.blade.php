@extends('layouts.main')
@section('title')
    {{ $item['name'] }}
@endsection   
@section('content')
    {{ $item['name'] }}
    <br>
    {{ $item['price'] }}
@endsection
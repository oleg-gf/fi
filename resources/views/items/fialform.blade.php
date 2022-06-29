@extends('layouts.main')

@section('content')
<div class="row">
    <form action="/fialform" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group col-3">
        <input name="name" class="form-control" placeholder="Название" value="{!! old('name')!!}">
        </div>
        <div class="form-group col-3">
        <input name="price" class="form-control" placeholder="Цена" value="{!! old('price')!!}">
        </div>
            <select name="selectioner_id" class="form-control col-3" id="selectioner_id">
                @foreach ($selectioners as $sel)
                    <option value="{{ $sel->id }}">{{ $sel->abbreviation }}</option>
                @endforeach
            </select>
        <div class="form-group col-3">
            <input type="file" class="form-control" name="image">
        </div>
        <input type="submit" class="btn btn-success">
    </form>
</div>

    @if ($item)
        {{ $item->name }}
        <br>
        {{ $item->price }}
        <br>
        {{ $selectioner->surname }}
        @foreach ($images as $image)
            <br>
            <img src="{{ $image->url }}" alt=""> 
        @endforeach
        
    @endif
@endsection



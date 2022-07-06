@extends('layouts.admin')
@section('title')
Селекционер @parent
@endsection
@section('content')
    <div class="row m-2">
        <b>Добавление селекционера</b>
    </div>
    <div class="row">

        <div class="col-6 m-2">
            @include('inc.messages')
            <form action="{{ route('admin.selectioners.store')}}"
                    method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-3 mb-2">
                    <input name="abbreviation" class="form-control" placeholder="Аббревиатура" value="{!! old('abbreviation')!!}" required> 
                </div>
                <div class="form-group col-3 mb-2">
                    <input name="name" class="form-control" placeholder="Имя" value="{!! old('name')!!}" required>
                </div>
                <div class="form-group col-3 mb-2">
                    <input name="surname" class="form-control" placeholder="Фамилия" value="{!! old('surname')!!}" required>
                </div>


                <input type="submit" class="btn btn-success" value="Сохранить">
            </form>
        </div>
    </div>
@endsection
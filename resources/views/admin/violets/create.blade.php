@extends('layouts.admin')
@section('title')
Фиалка @parent
@endsection
@section('content')
    <div class="row m-2">
        <b>Добавление фиалки</b>
    </div>
    <div class="row">

        <div class="col-6 m-2">
            @include('inc.messages')
            <form action="{{ route('admin.violets.store')}}"
                    method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-6">
                    <select name="selectioner_id" class="form-control" id="selectioner_id">
                        @foreach ($selectioners as $sel)
                            <option value="{{ $sel->id }}">{{ $sel->abbreviation }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-6">
                <input name="name" class="form-control" placeholder="Название" value="{!! old('name')!!}">
                </div>
                <div class="form-group col-6">
                <input name="price" class="form-control" placeholder="Цена" value="{!! old('price')!!}">
                </div>
                <div class="form-group col-6">
                <textarea name="description" class="form-control"cols="30" rows="10" placeholder="Описание">{!! old('description')!!}</textarea>
                </div>
                <div class="form-group col-6">
                    <input type="file" class="form-control" name="images[]" multiple>Загрузить фото
                </div>
                <input type="submit" class="btn btn-success">
            </form>
        </div>
    </div>
@endsection
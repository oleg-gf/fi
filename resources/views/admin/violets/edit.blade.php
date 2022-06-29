@extends('layouts.admin')
@section('title')
Фиалка @parent
@endsection
@section('content')
    <div class="row m-2">
        <b>Редактирование фиалки №{{ $violet->id }}</b>
        @include('inc.messages')
    </div>
    <div class="row">
        <div class="col-12 m-2">
            <form action="{{ route('admin.violets.update', ['violet' => $violet,
                                                            ])}}"
                    method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group col-6">
                    <select name="selectioner_id" class="form-control" id="selectioner_id">
                        @foreach ($selectioners as $sel)
                            <option value="{{ $sel->id }}">{{ $sel->abbreviation }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-6">
                <input name="name" class="form-control" placeholder="Название" value="{{ $violet->name }}">
                </div>
                <div class="form-group col-6">
                <input name="price" class="form-control" placeholder="Цена" value="{{ $violet->price }}">
                </div>
                <div class="form-group col-6">
                <textarea name="description" class="form-control" placeholder="Описание" cols="30" rows="10">{{ $violet->description }}</textarea>
                </div>
                <div class="form-group col-6">
                    <input type="file" class="form-control" name="image">Загрузить фото
                </div>
                <input type="submit" class="btn btn-success">
            </form>
        </div>

    </div>
    <div class="row">
        
            @foreach ($images as $image)
            <div class="col-3 m-2 image">
                <img src="{{ $image->url }}" alt="">
                
                <div class="cl-btn-2 imagedel-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <div>
                        <div class="leftright"></div>
                        <div class="rightleft"></div>

                        <span class="close-btn">удалить</span>
                    </div>
                </div>
            </div>
            
            @endforeach
            
        
    </div>
    Удалить фото?
    Да
    Нет

@endsection
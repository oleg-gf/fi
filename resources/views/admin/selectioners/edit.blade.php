@extends('layouts.admin')
@section('title')
Селекционер @parent
@endsection
@section('content')

    <div class="row m-2">
        <b>Редактирование: {{ $selectioner->name }} {{ $selectioner->surname }}</b>
        @include('inc.messages')
    </div>
    <div class="row">
        <div class="col-12 m-2">
            <form action="{{ route('admin.selectioners.update', ['selectioner' => $selectioner,
                                                            ])}}"
                    method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group col-6">
                    {{ $selectioner->abbreviation }}
                    
                </div>

             
                <div class="form-group col-3 mb-2">
                    <input name="name" class="form-control" placeholder="Имя" value="{{ $selectioner->name }}" required>
                </div>
                <div class="form-group col-3 mb-2">
                    <input name="surname" class="form-control" placeholder="Фамилия" value="{{ $selectioner->surname }}" required>
                </div>
                <input type="submit" class="btn btn-success" value="Сохранить">
            </form>
        </div>

    </div>

    
    
    

@endsection
@extends('layouts.admin')
@section('title')
Селекционеры @parent
@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Селекционеры</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">

        <a href="{{ route('admin.selectioners.create')}}" class="btn btn-sm btn-outline-secondary">Добавить селекционера</a>
        </div>

        </div>
    </div>

        @include('inc.messages')

                @forelse ($selectioners as $selectioner)
                <div class="d-flex justify-content-start pt-3 pb-2 mb-3 border-bottom">
                    <div class="col-12 col-sm-6">
                        <b>{{ $selectioner->id }}  {{ $selectioner->abbreviation }}   {{ $selectioner->name }} {{ $selectioner->surname }}</b>
                    </div>
                    <div class="col-12 col-sm-3">
                        @forelse ($selectioner->violets as $violet)
                            {{ $violet->name }}<br>
                        @empty

                        @endforelse
                    </div>
                    <div class="col-12 col-sm-3">
                        <a href="{{ route('admin.selectioners.edit', ['selectioner' => $selectioner]) }}">
                                Редактировать</a>
                    </div>
                </div>
                @empty
                   Нема
                @endforelse



    <div>
        {{ $selectioners->links() }}
    </div>
@endsection

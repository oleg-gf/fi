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
    <div class="table-responsive">
        @include('inc.messages')
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Селекционер</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Фиалки</th>
                    
                    
                </tr>
            </thead>  
            <tbody>
                @forelse ($selectioners as $selectioner)
               
                    <tr>
                        <td>{{ $selectioner->id }}</td>

                        <td>{{ $selectioner->abbreviation }}</td>
                        <td>{{ $selectioner->name }}</td>
                        <td>{{ $selectioner->surname }}</td>
                        <td>
                            @forelse ($selectioner->violets as $violet)
                                {{ $violet->name }}<br>
                            @empty
                                
                            @endforelse
                        </td>
                        <td><a href="{{ route('admin.selectioners.edit', ['selectioner' => $selectioner]) }}">
                            Редактировать</a>  
                        </td>
                   </tr>
                            
                @empty
                    <tr>
                        <td>Нема</td>
                    </tr>
                @endforelse        
                
                
            </tbody>  
        </table>
    </div>
    <div>
        {{ $selectioners->links() }}
    </div>
@endsection
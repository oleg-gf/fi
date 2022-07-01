@extends('layouts.admin')
@section('title')
Фиалки @parent
@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Фиалки</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            
        <a href="{{ route('admin.violets.create')}}" class="btn btn-sm btn-outline-secondary">Добавить фиалку</a>
        </div>
        
        </div>
    </div>
    <div class="table-responsive">
        @include('inc.messages')
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Изображение</th>
                    <th>Селекционер</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Описание</th>
                    <th>Дата редактирования</th>
                    
                </tr>
            </thead>  
            <tbody>
                @forelse ($violets as $violet)
               
                    <tr>
                        <td>{{ $violet->id }}</td>
                        <td class="table-image-cell">
                            @if ($violet->image->count() > 1)
                            <!-- Slider main container -->
                            <div class="swiper">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                <!-- Slides -->
                                @foreach ($violet->image as $image)
                                <div class="swiper-slide"><img src="{{ $image->url }}" alt=""></div>
                                @endforeach
                                </div>
                                <!-- If we need pagination -->
                                <div class="swiper-pagination"></div>
                            
                                <!-- If we need navigation buttons -->
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            
                                <!-- If we need scrollbar -->
                                <div class="swiper-scrollbar"></div>
                            </div>
                            @else
                                <div><img src="{{ $violet->image->first()->url }}" alt=""></div>
                            @endif
                        </td>
                        <td>{{ $violet->selectioner->abbreviation }}</td>
                        <td>{{ $violet->name }}</td>
                        <td>{{ $violet->price }}</td>
                        <td>{{ $violet->description }}</td>
                        <td>@if($violet->updated_at) {{ $violet->updated_at->format('d-m-Y H:i') }} @endif</td>
                        <td><a href="{{ route('admin.violets.edit', ['violet' => $violet]) }}">
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
        {{ $violets->links() }}
    </div>
@endsection
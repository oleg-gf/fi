@extends('layouts.main')
@section('title')
Фиалки @parent
@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Фиалки</h1>
        
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
                                @elseif ($violet->image->count() == 1)
                                    <div><img src="{{ $violet->image->first()->url }}" alt=""></div>
                                @endif





                        <td>
                            <a href="{{ route('violet', ['id' => $violet->id]) }}">
                                {{ $violet->selectioner->abbreviation }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('violet', ['id' => $violet->id]) }}">
                                {{ $violet->name }}
                            </a>
                        </td>
                        <td>{{ $violet->price }}</td>
                        <td>{{ $violet->description }}</td>

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

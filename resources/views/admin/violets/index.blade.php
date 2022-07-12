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

        @include('inc.messages')
         @forelse ($violets as $violet)
        <div class="row d-flex justify-content-start pt-3 pb-2 mb-3 border-bottom">

            <div class="col-12 col-sm-3 table-image-cell">



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
            </div>
            <div class="col-12 col-sm-6 p-3 violet-cell">
                        <div>№ {{ $violet->id }}</div>
                        <div>{{ $violet->selectioner->abbreviation }}-{{ $violet->name }}</div>
                        <div>{{ $violet->price }}</div>
                        <div>{{ $violet->description }}</div>
                        <div><a href="{{ route('admin.violets.edit', ['violet' => $violet]) }}" class="btn btn-primary">
                            Редактировать</a>
                        </div>
            </div>
        </div>



        @empty
            Нема

        @endforelse



    <div>
        {{ $violets->links() }}
    </div>
@endsection

@extends('layouts.main')
@section('title')
Фиалки @parent
@endsection
@section('content')
<div class="main">
    <div class="violets_sidebar p-2">
        <div class="container"></div>
        <h3 class="h3">Селекционеры</h3>
        {!! Form::checkbox($name, $value, $checked, [$options]) !!}
        @forelse ($selectioners as $selectioner)
            <div class="row d-flex justify-content-start p-2 mb-3 border-bottom">
                <div class="col-12">

                        <p><input type="checkbox" value="{{ $selectioner->id }}">   {{ $selectioner->abbreviation }}-{{ $selectioner->name }} {{ $selectioner->surname }}</p>

                </div>
            </div>
        @empty

        @endforelse
        </div>
    </div>
<div class="violets_wrapper">
<div class="container">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Фиалки</h1>

    </div>

        @include('inc.messages')

                @forelse ($violets as $violet)

                <div class="row d-flex justify-content-start pt-3 pb-2 mb-3 border-bottom">

                    <div class="col-12 col-sm-5 table-image-cell">



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
                    <div class="col-12 col-sm-7 p-3 violet-cell">
                                <div>№ {{ $violet->id }}</div>
                                <div>{{ $violet->selectioner->abbreviation }}-{{ $violet->name }}</div>
                                <div>{{ $violet->price }}</div>
                                <div>{{ $violet->description }}</div>
                                <div><a href="{{ route('violet', ['id' => $violet]) }}" class="btn btn-primary">
                                    Посмотреть</a>
                                </div>
                    </div>
                </div>

                @empty
                    Нема

                @endforelse


    <div>
        {{ $violets->withQueryString()->links() }}
    </div>
</div> <!-- container  -->
</div>
</div> <!-- main  -->
@endsection

@extends('layouts.main')
@section('title')
    {{ $violet->name }}
@endsection
@section('content')
</nav>

</div>
    <div class="row mt-3">
        <div class="col-6 mr-2">
            @if ($violet->image->count() > 1)
                <!-- Slider main container -->
                <div class="swiper lightbox">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach ($violet->image as $image)
                            <div class="swiper-slide">
                                <a href="{{ $image->url }}"><img src="{{ $image->url }}" alt=""></a>
                            </div>
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
                <div class="lightbox">
                    <a href="{{ $violet->image->first()->url }}">
                        <img src="{{ $violet->image->first()->url }}" alt="">
                    </a>
                </div>
            @endif

        </div>
        <div class="col-6 violet-cell">
            <div>
                <div>№ {{ $violet->id }}</div>
                <div>
                    <h1>{{ $selectioner->abbreviation }} {{ $violet->name }}</h1>
                </div>

                <div> Цена: {{ $violet->price }}р.</div>

                <div>{{ $violet->description }}</div>
            </div>

            <div><a href="{{ route('home', ["selectioner_id" => $selectioner->id]) }}" class="btn btn-primary">
                    К списку</a>
            </div>
        </div>

    </div>

@endsection

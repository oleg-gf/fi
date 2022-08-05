@extends('layouts.main')
@section('title')
Фиалки @parent
@endsection
@section('content')
    <div class="violets_sidebar_600 p-3">
        <div class="container"></div>
        <h3 class="h3">Селекционеры</h3>

        <form action="{{ route('home')}}" method="GET">
            <div class="row d-flex justify-content-start p-2 mb-3 border-bottom">
                <div class="col-12">
                    <input type=radio
                        name="selectioner_id"
                        id="selectioner_id-0"
                        value="0">
                    <label for="selectioner_id-0" class="selectioner_id_0-label">  Все</label>
                </div>
            </div>
            @forelse ($selectioners as $selectioner)
            <div class="row d-flex justify-content-start p-2 mb-3 border-bottom">
                <div class="col-12">
                <input type=radio
                    name="selectioner_id"
                    id="selectioner_id-{{ $selectioner->id }}"
                    value="{{ $selectioner->id }}"
                    @if ($selectioner->id == $get_selectioner_id)
                        checked
                    @endif>
                    <label for="selectioner_id-{{ $selectioner->id }}"> {{ $selectioner->abbreviation }}-{{ $selectioner->name }} {{ $selectioner->surname }}</label>
                </div>
            </div>
            @empty

            @endforelse
            <input type="submit" class="btn btn-primary" value="Применить">
        </form>
        </div>
    </div>
</nav>

</div>
<div class="main">
    <div class="violets_sidebar p-3">
        <div class="container"></div>
        <h3 class="h3">Селекционеры</h3>

        <form action="{{ route('home')}}" method="GET">
            <div class="row d-flex justify-content-start p-2 mb-3 border-bottom">
                <div class="col-12">
                    <input type=radio
                        name="selectioner_id"
                        id="selectioner_id-0"
                        value="0">
                    <label for="selectioner_id-0" class="selectioner_id_0-label">  Все</label>
                </div>
            </div>
            @forelse ($selectioners as $selectioner)
            <div class="row d-flex justify-content-start p-2 mb-3 border-bottom">
                <div class="col-12">
                <input type=radio
                    name="selectioner_id"
                    id="selectioner_id-{{ $selectioner->id }}"
                    value="{{ $selectioner->id }}"
                    @if ($selectioner->id == $get_selectioner_id)
                        checked
                    @endif>
                    <label for="selectioner_id-{{ $selectioner->id }}"> {{ $selectioner->abbreviation }}-{{ $selectioner->name }} {{ $selectioner->surname }}</label>
                </div>
            </div>
            @empty

            @endforelse
            <input type="submit" class="btn btn-primary" value="Применить">
        </form>
        </div>
    </div>
<div class="violets_wrapper">


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Фиалки</h1>
    </div>

        @include('inc.messages')

                @forelse ($violets as $violet)

                <div class="row d-flex justify-content-start pt-3 pb-2 mb-3 border-bottom">

                    <div class="col-12 col-sm-5 table-image-cell">



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
                                    @elseif ($violet->image->count() == 1)
                                        <div class="lightbox">
                                            <a href="{{ $violet->image->first()->url }}">
                                                <img src="{{ $violet->image->first()->url }}" alt="">
                                            </a>
                                        </div>
                                    @endif
                    </div>
                    <div class="col-12 col-sm-7 p-3 violet-cell">
                                <div>№ {{ $violet->id }}</div>
                                <div class="violet_selectioner">{{ $violet->selectioner->abbreviation }}-{{ $violet->name }}</div>
                                <div>{{ $violet->price }}</div>
                                <div>{{ $violet->description }}</div>
                                <div><a href="{{ route('violet', ['id' => $violet, ]) }}" class="btn btn-primary">
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
<!--</div>  container  -->
</div>
</div> <!-- main  -->
@endsection

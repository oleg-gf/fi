@extends('layouts.admin')
@section('title')
    {{ $violet->name }}
@endsection   
@section('content')
<div class="row mt-3">
    <div class="col-6 mr-2">
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
        
    </div>
    <div class="col-6">
        <h1>{{ $selectioner->abbreviation }} {{ $violet->name }}</h1> 
        <br>
        Цена: {{ $violet->price }}р.
        <br>
        {{ $violet->description }}
    </div>    
</div>
     
@endsection
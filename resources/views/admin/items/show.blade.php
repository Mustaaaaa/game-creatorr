@extends('layouts.app')

@section('title', 'item')

@section('content')
<div class="char-bg">
<section class="mt-5 py-1">
    <div class="container title-container p-2 mb-3 rounded-3 shadow-jg text-center">
        <h1 class="">Your Item!</h1>
    </div>
</section>


<section class="mb-5 py-1">
    <div class="container py-4 card-bg rounded-3">
        <div class="row justify-content-center">
            <div class="card my-card card-bg">
                <div class="card-body text-center">
                    <h2 class="mb-3">{{ $item->name }}</h2> 
                    <img class="icon" src="{{Vite::asset("resources/img/$item->image.png")}}" alt="">
                    <p class="mt-3"> <span class="fw-bold"> Type: </span> {{ $item->type }}</p>
                    <p> <span class="fw-bold"> Category: </span> {{ $item->category }}</p>
                    <p> <span class="fw-bold"> Weight: </span> {{ $item->weight . ' ' . $item->unit }}</p>
                    <p> <span class="fw-bold"> Cost: </span> {{$item->cost . ' ' . $item->coin}}</p>
                    <p> <span class="fw-bold"> Damage Dice:  </span>{{$item->damage_dice}}</p>
                    <h4>Description:</h4>
                    <p>
                        {{$item->description}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection

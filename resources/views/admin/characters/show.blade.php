@extends('layouts.app')

@section('title', 'Character')



@section('content')
<div class="char-bg">

    <section >
        <div class="container title-container p-2 mb-3 rounded-3 shadow-jg position-relative">
            <h1 class="title text-center">Your Character!</h1>
            <a class="btn btn-orange my-btn" href="{{ route('admin.characters.edit', $character) }}">Edit</a>
        </div>
    </section>
    
    
    <section class="mb-5 py-1">
        <div class="container py-4 card-bg rounded-3">
            <div class="row justify-content-center gap-5">
                <div class="card my-card char-card ">
                    <img class="my-card-img" src="{{Vite::asset("resources/img/$img.png")}}" alt="">
                </div>
                <div class="card my-card char-card ">
                    <div class="card-body text-center">
                        <h2 class="card-title mb-4">{{ $character->name }}</h2>
                        <p> <span class="fw-bold"> Class:  </span>{{ $character->type->name }}</p>
                        <p> <span class="fw-bold"> Defence:  </span>{{ $character->defence }}</p>
                        <p> <span class="fw-bold"> Speed: </span> {{ $character->speed }}</p>
                        <p> <span class="fw-bold"> Life: </span> {{ $character->life }}</p>
                        <p> <span class="fw-bold"> Attack: </span> {{ $character->attack }}</p>
                        <h5 class="fw-bold text-start">Description: </h5>                    
                        <p class="text-start">
                            {{ $character->description }}
                        </p>
                    </div>
                </div>
                <div class="card my-card char-card">
                    <div class="card-body text-center">
                        <h2 class="card-title mb-2">Inventory</h2>
                        <ul>
                            @foreach ($character->items as $item )
                                <li class="text-start">
                                <p>
                                    <span class="fw-bold">{{ $item->name }}:</span>
                                    {{ $item->pivot->qty }}
                                </p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
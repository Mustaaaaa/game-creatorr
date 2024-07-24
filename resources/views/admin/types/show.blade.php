@extends('layouts.app')

@section('title', 'Type')

@section('content')
<div class="char-bg">
<section class="mt-5 py-1">
    <div class="container title-container p-2 mb-3 rounded-3 shadow-jg text-center">
        <h1 class=""> {{$type->name}} Class.</h1>
    </div>
</section>


<section class="mb-5 py-1">
    <div class="container py-4 card-bg rounded-3 position-relative">
        <div class="row justify-content-center">
            <div class="card my-card char-card">
                <div class="card-body text-center">
                    
                    <h5 class="fw-bold text-start">Description: </h5>                    
                    <p class="text-start">
                        {{ $type->description }}
                    </p>
                </div>
            </div>
        </div>

        <span class="back-to-types">
            <a class="btn btn-orange" href="{{route('admin.types.index')}}"> ← </a>
        </span>
    </div>
</section>
</div>
@endsection
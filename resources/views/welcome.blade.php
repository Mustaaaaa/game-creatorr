@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="welcome-outer-container container mt-5 d-flex direction-column">
    <div class="dragon-container">
        <img class="dragon-img" src="{{Vite::asset('resources/img/dragon.png')}}" alt="">
    </div>
    <div class="p-5 mb-4 rounded-3 welcome-inner-container">
        <h1>Welcome!</h1>
        <p>This is our humble site. You can create your character and store his equipment. Is still a work in progress, but we will constantly update it!</p>
        <p>If you have some feedback, please don't hold back and let us know! We are eager to improve our work!</p>
    </div>
</div>

@endsection
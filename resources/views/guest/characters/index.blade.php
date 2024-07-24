@extends('layouts.app')

@section('title', 'Characters')

@section('content')
<div class="char-bg">
    <section class="mt-5 py-1">
        <div class="container bg-dark py-4 text-center">
            <h1 class="title  text-success">Characters!</h1>
            <a href="{{ route('admin.characters.create') }}" class="btn btn-success mt-3">Login to Create your Character</a>
        </div>
    </section>
    
    
    <section class="mb-5 py-1">
        <div class="bg-light container py-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th class="text-center" scope="col">Attack</th>
                        <th class="text-center" scope="col">Defence</th>
                        <th class="text-center" scope="col">Speed</th>
                        <th class="text-center" scope="col">Life</th>
                        <th class="text-center" scope="col">Class</th>
                        <th class="text-center" scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($characters as $character)                
                        <tr class="position-relative">
                            <td>{{$character->name}}</td>
                            <td class="text-center">{{$character->attack}}</td>
                            <td class="text-center">{{$character->defence}}</td>
                            <td class="text-center">{{$character->speed}}</td>
                            <td class="text-center">{{$character->life}}</td>
                            <td class="text-center">{{$character->type->name}}</td>
                            <td class="text-center">
                                <a class="btn link-success" href="{{ route('guest.characters.show', $character) }}">Show</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection
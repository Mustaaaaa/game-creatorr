@extends('layouts.app')

@section('title', 'Characters')

@section('content')
<div class="char-bg">
<section class="mt-5 py-1">
    <div class="container title-container p-2 mb-3 rounded-3 shadow-jg text-center">
        <h1 class="">Characters!</h1>
        <a href="{{ route('admin.characters.create') }}" class="btn btn-orange mt-3">Create your Character</a>
    </div>
</section>


<section class="mb-5 py-1">
    <div class="card-bg container rounded-3 py-4">
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
                    <th class="text-center" scope="col"></th>
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
                            <a class="btn link-success" href="{{ route('admin.characters.show', $character) }}">Show</a>
                        </td>
                        <td class="text-center">
                            <a class="btn link-primary" href="{{ route('admin.characters.edit', $character) }}">Edit</a>
                        </td>
                        <td class="text-center">
                            <form class="item-delete-form" action="{{ route('admin.characters.destroy', $character) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn link-danger">X</button>

                                <div class="my-modal">
                                    <div class="my-modal__box">
                                        <h5 class="text-center me-5">Do you really want to delete this Character?!</h5>
                                        <span class="link link-danger my-modal-yes mx-5">Yes</span>
                                        <span class="link link-success my-modal-no">No</span>
                                    </div>
                                </div>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
</div>
@endsection
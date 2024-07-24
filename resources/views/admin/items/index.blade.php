@extends('layouts.app')

@section('title', 'Items')

@section('content')
<div class="char-bg">
<section class="mt-5 py-1">
    <div class="container title-container p-2 mb-3 rounded-3 shadow-jg text-center">
        <h1 class="">Items!</h1>
        <a href="{{ route('admin.items.create') }}" class="btn btn-orange mt-3">Create your Item</a>

    </div>
</section>


<section class="mb-5 py-1">
    <div class="card-bg container rounded-3 py-4">
        <table class=" card-bg table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Type</th>
                    <th scope="col">Category</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Cost</th>
                    <th class="text-center" scope="col">Damage Dice</th>
                    <th scope="col">Image</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)                
                    <tr class="position-relative">
                        <td>{{$item->name}}</td>
                        <td>{{$item->slug}}</td>
                        <td>{{$item->type}}</td>
                        <td>{{$item->category}}</td>
                        <td>{{$item->weight . ' ' . $item->unit}}.</td>
                        <td>{{$item->cost . ' ' . $item->coin}}</td>
                        <td class="text-center">{{$item->damage_dice}}</td>
                        <td><img class="icon" src="{{Vite::asset("resources/img/$item->image.png")}}" alt=""></td>
                        <td class="text-center">
                            <a class="btn link-success" href="{{ route('admin.items.show', $item) }}">Show</a>
                        </td>
                        <td class="text-center">
                            <a class="btn link-primary" href="{{ route('admin.items.edit', $item) }}">Edit</a>
                        </td>
                        <td class="text-center">
                            <form class="item-delete-form" action="{{ route('admin.items.destroy', $item) }}" method="POST">
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
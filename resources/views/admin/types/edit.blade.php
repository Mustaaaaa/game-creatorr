@extends('layouts.app')

@section('title', 'Edit Type')

@section('content')
<div class="char-bg">
<section class="mt-5 py-1">
    <div class="container title-container p-2 mb-3 rounded-3 shadow-jg">
        <h1 class="title text-center">Edit your type!</h1>
    </div>
</section>


<section class="mb-5 py-1">
    <div class="container rounded-3 char-card py-4">
        <form action="{{ route('admin.types.update', $type) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label fw-bold text-coral">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Inserisci il nome"
                    value="{{ old('name', $type->name) }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fw-bold text-coral">Description</label>
                <textarea class="form-control" id="description" name="description"
                    placeholder="Inserisci la descrizione">{{ old('description', $type->description) }}</textarea>
            </div>
            <button class="btn btn-orange">Save</button>
        </form>
    </div>

    <div class="container mt-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</section>
</div>
@endsection
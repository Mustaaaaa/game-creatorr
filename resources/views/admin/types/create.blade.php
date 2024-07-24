@extends('layouts.app')

@section('title', 'Type Creation')

@section('content')
<div class="char-bg">
<section class="mt-5 py-1">
    <div class="container title-container p-2 mb-3 rounded-3 shadow-jg">
        <h1 class="title text-center">Add a new Type!</h1>
    </div>
</section>


<section class="mb-5 py-1">
    <div class="container rounded-3 char-card py-4">
        <form action="{{ route('admin.types.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label fw-bold text-coral">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Insert mew Type's name"
                    value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label fw-bold text-coral">Description</label>
                <textarea class="form-control" id="description" name="description"
                    placeholder="Describe your type">{{ old('description') }}</textarea>
            </div>
            <button class="btn btn-orange">Add</button>
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
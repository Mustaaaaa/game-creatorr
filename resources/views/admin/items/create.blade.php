@extends('layouts.app')

@section('title', 'Character')

@section('content')
<div class="char-bg">
<section class="mt-5 py-1">
    <div class="container title-container p-2 mb-3 rounded-3 shadow-jg">
        <h1 class="title text-center">Create your Item!</h1>
    </div>
</section>


<section class="mb-5 py-1">
    <div class="container rounded-3 char-card py-4">
        <form action="{{ route('admin.items.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label fw-bold text-coral">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Insert your item's name"
                    value="{{ old('name') }}">
            </div>

            <label for="category" class="form-label fw-bold text-coral">Category</label>
            <select class="form-select mb-3" aria-label="Default select example" name="category" id="category">
                <option value="Simple Melee Weapons">Simple Melee Weapon</option>
                <option value="Simple Ranged Weapons">Simple Ranged Weapon</option>
                <option value="Martial Melee Weapons">Martial Melee Weapon</option>
                <option value="Martial Ranged Weapons">Martial Ranged Weapon</option>
            </select>
            
            <div class="mb-3">
                <label for="weight" class="form-label fw-bold text-coral">Weight (lb)</label>
                <input type="number" class="form-control" id="weight" name="weight" placeholder="Insert value es. 15"
                    value="{{ old('weight') }}">
            </div>

            <div class="mb-3">
                <label for="cost" class="form-label fw-bold text-coral">Cost</label>
                <input type="number" class="form-control" id="cost" name="cost" placeholder="Insert value es. 21"
                    value="{{ old('cost') }}">
            </div>

            <label for="coin"  class="form-label fw-bold text-coral">Coin</label>
            <select class="form-select mb-3" aria-label="Default select example" name="coin" id="coin">
                <option value="cp">cp</option>
                <option value="sp">sp</option>
                <option value="gp">gp</option>
            </select>
            
            <label for="damage_dice"  class="form-label fw-bold text-coral">Damage Dice</label>
            <select class="form-select mb-3" aria-label="Default select example" name="damage_dice" id="damage_dice">
                <option value="0">0</option> 
                <option value="1">1</option>     
                <option value="1d4">1d4</option> 
                <option value="1d6">1d6 </option>
                <option value="1d8">1d8</option>
                <option value="1d10">1d10</option>
                <option value="1d12">1d12</option>
                <option value="2d6">2d6</option>
            </select>


            <div class="mb-3">
                <label for="description" class="form-label fw-bold text-coral">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Describe your item">
                    {{ old('description') }}
                </textarea>
            </div>


            <button class="btn btn-orange">Create</button>
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
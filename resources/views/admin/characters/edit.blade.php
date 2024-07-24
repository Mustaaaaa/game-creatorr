@extends('layouts.app')

@section('title', 'Character')

@section('content')
<div class="char-bg">
<section class="mt-5 py-1">
    <div class="container title-container p-2 mb-3 rounded-3 shadow-jg">
        <h1 class="title text-center">Edit your character!</h1>
    </div>
</section>


<section class="mb-5 py-1">
    <div class=" container rounded-3 char-card py-4">
        <form action="{{ route('admin.characters.update', $character) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Character Name -->
            <div class="mb-3">
                <label for="name" class="form-label fw-bold text-coral">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Inserisci il nome"
                    value="{{ old('name', $character->name) }}">
            </div>

            <!-- Character Class -->
            <div class="form-group mb-3">
                <label for="type_id" class="form-label fw-bold text-coral">Character Class</label>
                <select class="form-control" name="type_id" id="type_id">
                    <option value="">-- Select your Class --</option>
                    @foreach ($types as $type)                        
                        <option @selected($type->id == old('type_id', $character->type_id)) value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
            </div>

            <!-- Character Attack -->
            <div class="mb-3">
                <label for="attack" class="form-label fw-bold text-coral">Attack</label>
                <input type="number" class="form-control" id="attack" name="attack" placeholder="Inserisci il valore"
                    value="{{ old('attack', $character->attack) }}">
            </div>

            <!-- Character Defence -->
            <div class="mb-3">
                <label for="defence" class="form-label fw-bold text-coral">Defence</label>
                <input type="number" class="form-control" id="defence" name="defence" placeholder="Inserisci il valore"
                    value="{{ old('defence', $character->defence) }}">
            </div>

            <!-- Character Life -->
            <div class="mb-3">
                <label for="life" class="form-label fw-bold text-coral">Life</label>
                <input type="number" class="form-control" id="life" name="life" placeholder="Inserisci il valore"
                    value="{{ old('life', $character->life) }}">
            </div>

            <!-- Character Speed -->
            <div class="mb-3">
                <label for="speed" class="form-label fw-bold text-coral">Speed</label>
                <input type="number" class="form-control" id="speed" name="speed" placeholder="Inserisci il valore"
                    value="{{ old('speed', $character->speed) }}">
            </div>

            <!-- Character Description -->
            <div class="mb-3">
                <label for="description" class="form-label fw-bold text-coral">Description</label>
                <textarea class="form-control" id="description" name="description"
                    placeholder="Inserisci la descrizione">{{ old('description', $character->description) }}</textarea>
            </div>

            <!-- Character Items -->
            <div class="form-group mb-3 ">
                <label class="form-label fw-bold text-coral" for="item_id">Select your Items</label>

                <div class="d-flex gap-2 my-form-container">

                    <inventory
                    
                     :items="{{ $items }}"

                     :inventory="{{$character->items}}"
                     
                     has-error="{{ $errors->any() === false ? 'false' : 'true' }}"
                    ></inventory>
                    
                </div>
            </div>


            {{--
            <div class="form-group mb-3">
                <label for="item_id">Select your items</label>
                <div class="d-flex gap-2 my-form-container">
                                        
                    @foreach ($items as $item)                        
                        <div class="form-check ">
                            <input @checked( in_array($item->id, old('items', $character->items->pluck('id')->all()))) name="items[]" class="form-check-input" type="checkbox" value="{{$item->id}}" id="item-{{$item->id}}">
                            <label class="form-check-label" for="item-{{$item->id}}">
                                {{$item->name}}
                            </label>
                        </div>
                    @endforeach
                </div>                    
            </div>
            --}}

            <!-- Form Submit -->
            <button class="btn btn-orange ms-3">Edit</button>
        </form>
    </div>

    <!-- Errors Display -->
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
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;
use App\Models\Character;
use App\Models\Item;
use App\Models\Type;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::orderBy('name', 'asc')->get();
        $characters = Character::with(['type'])->get();

        return view("admin.characters.index", compact("characters", 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $items = Item::orderBy('name', 'asc')->get();
        $types = Type::orderBy('name', 'asc')->get();

        return view("admin.characters.create", compact('items', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCharacterRequest $request)
    {
        // dd($request->all());


        //VALIDATION SPOSTATA NELLO StoreCharacterRequest

        $form_data = $request->validated();



        
        $new_character = Character::create($form_data);


        if($request->has('item'))
        {
            //$project->items()->attach($request['items']);

            foreach ($request->item as $item) {
                $qty[$item['id']] = ['qty' => $item['qty']];
            }


            $new_character->items()->attach($qty);

        }


        return to_route("admin.characters.show", $new_character);
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {

        $character->load(['items', 'type']);

        $img = $character->type->name;

        return view("admin.characters.show", compact("character", 'img'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {

        $character->load(['items', 'type']);

        $items = Item::orderBy('name', 'asc')->get();
        $types = Type::orderBy('name', 'asc')->get();

        return view("admin.characters.edit", compact("character", 'items', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCharacterRequest $request, Character $character)
    {
        // VALIDATION SPOSTATA NELL'UpdateCharacterRequest

        

        $form_data = $request->validated();
        $character->fill($form_data);

        $character->save();

        // $character->items()->sync($request->items ?? []);



        if($request->item === null){
            $request->item = [];
        }

        foreach ($request->item as $item) {
            $qty[$item['id']] = ['qty' => $item['qty']];
        }

        $character->items()->sync($qty ?? []);

        return to_route("admin.characters.show", $character);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        $character->delete();
        return to_route("admin.characters.index");
    }
}

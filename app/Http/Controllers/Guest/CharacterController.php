<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\Type;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
    */
    public function index(Request $request)
    {
        $types = Type::orderBy('name', 'asc')->get();
        $characters = Character::with(['type'])->get();

        
        $characters = Character::all();


        return view('guest.characters.index', compact('characters', 'types'));
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {


        $character->load(['items', 'type']);

        $img = $character->type->name;


        return view("guest.characters.show", compact("character", 'img'));
    }









    /** Unused CRUD Functions */


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Character $character)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        //
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        
        return view('admin.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.items.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        // VALIDATION SPOSTATA NELLO StoreItemRequest
        
        $form_data = $request->validated();



        $form_data['slug'] = Item::getUniqueSlug($form_data['name']);
        $form_data['type'] = 'Weapons';
        $form_data['unit'] = 'lb';
        $form_data['image'] = strtolower(str_replace(' ', '-', $form_data['category']));


        $new_item = Item::create($form_data);

        dump($form_data);

        return to_route('admin.items.show', $new_item);
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view("admin.items.show", compact("item"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view("admin.items.edit", compact("item"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {

        // VALIDATION SPOSTATA NELL'UpdateItemRequest
        $form_data = $request->validated();
        

        $form_data['type'] = 'Weapons';
        $form_data['unit'] = 'lb';
        $form_data['image'] = strtolower(str_replace(' ', '-', $form_data['category']));


       


       // dd($form_data);

        $item->update($form_data);

        return to_route('admin.items.show', $item);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return to_route("admin.items.index");
    }
}

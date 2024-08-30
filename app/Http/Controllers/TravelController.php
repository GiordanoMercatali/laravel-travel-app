<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTravelRequest;
use App\Http\Requests\UpdateTravelRequest;
use App\Models\Travel;
use App\Models\Stage;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function index()
    {
        $travels = Travel::all();
        return view('admin.travels.index', compact('travels'));
    }

    public function create()
    {
        $stages = Stage::all();
        return view('admin.travels.create', compact ('stages'));
    }

    public function store(StoreTravelRequest $request)
    {
        $form_data = $request->validated();
        $travel = new Travel();
        $travel->fill($form_data);
        $travel->save();

        if($request->has('stages')) {
            $travel->ingredients()->attach($request->stages);
        }

        return redirect()->route('travels.show', ['travel' => $travel->id]);
    }

    public function show($id)
    {
        $travel = Travel::where('id', $id)->first();
        return view('admin.travels.show', compact('travel'));
    }

    public function edit(Travel $travel)
    {
        $stages = Stage::all();
        return view('admin.travels.edit', compact('travel', 'stages'));
    }

    public function update(UpdateTravelRequest $request, Travel $travel)
    {
        $travel_to_update = $request->validated();
        $travel->update($travel_to_update);

        if($request->has('ingredients')) {
            $travel->ingredients()->sync($request->ingredients);
        } else {
            $travel->tags()->sync([]);
        }

    return redirect()->route('travels.show', ['travel' => $travel->id]);
    }

    public function destroy(Travel $travel)
    {
        $travel->delete();

        return redirect()->route('travels.index')->with('message', "$travel->title has been deleted");
    }
}

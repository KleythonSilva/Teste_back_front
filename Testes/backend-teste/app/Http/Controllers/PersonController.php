<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $people = Person::with('contacts')->get();
        return response()->json($people);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user' => 'required|string',
            'name' => 'required|string',
        ]);

        $person = Person::create($request->only(['user', 'name']));
        return response()->json($person, 201);
    }

    public function show($id)
    {
        $person = Person::with('contacts')->find($id);
        return response()->json($person);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'user' => 'string',
            'name' => 'string',
        ]);

        $person = Person::find($id);
        $person->update($request->only(['user', 'name']));

        return response()->json($person);
    }

    public function destroy($id)
    {
        Person::destroy($id);
        return response()->json(['message' => 'Person deleted successfully']);
    }
}


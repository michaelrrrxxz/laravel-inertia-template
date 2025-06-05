<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Location;

class LocationController extends Controller
{
    public function index()
    {
        return inertia('Location/Index', [
            'locations' => Location::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'x' => 'required|numeric',
            'y' => 'required|numeric',
            'floor' => 'required|integer',
        ]);

        Location::create($request->only('name', 'x', 'y', 'floor'));

        return redirect()->back()->with('success', 'Location created.');
    }

    public function api()
    {
        return Location::all();
    }
}


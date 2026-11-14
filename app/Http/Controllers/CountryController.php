<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;


class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::orderBy('name', 'asc')->paginate(5);

    return view('country.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('country.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $data = $request->validate([
        'code' => 'required|string|size:2|alpha:ascii|unique:country,code',
        'name' => 'required|string|max:52',
        'population' => 'required|integer|min:0|max:2147483647'
    ]);

    Country::create($data);

    return redirect()->route('country.index');
}
    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
     return view('country.show', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        return view('country.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Country $country)
    {
     $data = $request->validate([
        'name' => 'required|string|max:52',
        'population' => 'required|integer|min:0|max:2147483647'
    ]);

    $country->update($data);

    return redirect()->route('country.show', $country);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
      $country->delete();

    return redirect()->route('country.index');
    }
}

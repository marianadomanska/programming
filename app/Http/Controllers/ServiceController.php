<?php

namespace App\Http\Controllers;

use App\Models\service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
       
public function index()
{
    $services = service::orderBy('category', 'asc')
        ->orderBy('name', 'asc')
        ->paginate(5);

    return view('services.index', compact('services'));
}

    public function create()
    {
       return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|in:Перукарські послуги,Манікюрні послуги,Послуги візажиста,Послуги лашмейкера',
        'price_master' => 'required|integer|min:0|max:9999',
        'price_top_master' => 'required|integer|min:0|max:9999|gte:price_master',
        'description' => 'nullable|string'
    ]);

    Service::create($data);

    return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(service $service)
    {
      return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(service $service)
    {
      return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, service $service)
    {
           $data = $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|in:Перукарські послуги,Манікюрні послуги,Послуги візажиста,Послуги лашмейкера',
        'price_master' => 'required|integer|min:0|max:9999',
        'price_top_master' => 'required|integer|min:0|max:9999|gte:price_master',
        'description' => 'nullable|string'
    ]);

    $service->update($data);

    return redirect()->route('services.show', $service);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(service $service)
    {
           $service->delete();

    return redirect()->route('services.index');
    }
}

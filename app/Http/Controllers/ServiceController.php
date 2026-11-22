<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */


public function index()
{
    $lang = request()->query('lang', 'uk');

    if (!is_string($lang) || !preg_match('/^[a-z]{2,10}$/', $lang)) {
        $lang = 'uk';
    }

    $services = Service::with(['translations' => function ($query) use ($lang) {
            $query->where('lang', $lang);
        }])
        ->orderBy('category', 'asc')
        ->orderBy('name', 'asc')
        ->paginate(5)
        ->withQueryString();

    return view('services.index', compact('services', 'lang'));
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

public function show(Service $service)
{
    $lang = request()->query('lang', 'uk');

    if (!is_string($lang) || !preg_match('/^[a-z]{2,10}$/', $lang)) {
        $lang = 'uk';
    }

    $translation = $service->translations()
        ->where('lang', $lang)
        ->first();

    return view('services.show', compact('service', 'lang', 'translation'));
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
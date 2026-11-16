<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Tracker;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function pages(Request $request)
    {
        $type = $request->query('type', 'page');

        if (!in_array($type, ['page', 'ip'], true)) {
            abort(400, 'Невідомий тип групування.');
        }

        $rows = Tracker::query()
            ->selectRaw(
                "{$type}, count(*) as hits, max(visited_at) as last_visit"
            )
            ->groupBy($type)
            ->orderByDesc('hits')
            ->get();

        return view('stats.pages', compact('rows', 'type'));
    }
	
public function detail(Request $request)
{
    $type = $request->query('type', 'page');
    $item = $request->query('item');

    if (!in_array($type, ['page', 'ip'], true)) {
        abort(400, 'Невідомий тип фільтрації.');
    }

    $rows = Tracker::query()
        ->when($item, function ($query, $value) use ($type) {
            $query->where($type, $value);
        })
        ->orderByDesc('visited_at')
        ->paginate(15)
        ->withQueryString();

    return view('stats.detail', compact('rows', 'type', 'item'));
}

public function popularServices()
{
    $visits = Tracker::query()
        ->selectRaw('page, COUNT(*) as hits')
        ->where('method', 'GET')
        ->where('page', 'like', 'services/%')
        ->groupBy('page')
        ->orderByDesc('hits')
        ->get();

    $rows = [];

    foreach ($visits as $visit) {
        if (!preg_match('#^services/([0-9]+)$#', $visit->page, $matches)) {
            continue;
        }

        $service = Service::find((int) $matches[1]);

        if (!$service) {
            continue;
        }

        $rows[] = [
            'id' => $service->id,
            'name' => $service->name,
            'hits' => $visit->hits
        ];
    }

    return view('stats.services', compact('rows'));
}


}

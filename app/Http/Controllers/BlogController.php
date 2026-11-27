<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Filter;
use App\Models\Service;
use App\Queries\BlogFilter;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'filter' => [
                'nullable',
                'integer',
                'exists:filter,filter_id',
            ],
        ]);

        $filterId = $request->query('filter');

        $blogs = Blog::query()
            ->with(['category', 'author', 'filters'])
            ->when($filterId, function ($query) use ($filterId) {
                $query->whereHas('filters', function ($q) use ($filterId) {
                    $q->whereKey($filterId);
                });
            })
            ->orderByDesc('dt_created')
            ->paginate(6)
            ->withQueryString();

        $filters = Filter::orderBy('filter_name')
            ->pluck('filter_name', 'filter_id');

        return view('blog.index', compact('blogs', 'filters', 'filterId'));
    }

    public function create()
    {
        return view('blog.create', [
            'categories' => Category::orderBy('category_name')
                ->pluck('category_name', 'category_id'),

            'filters' => Filter::orderBy('filter_name')
                ->pluck('filter_name', 'filter_id'),

            'services' => Service::orderBy('name')
                ->pluck('name', 'id'),
        ]);
    }

    public function store(BlogRequest $request)
    {
        $data = $request->validated();

        $blog = Blog::create([
            ...\Illuminate\Support\Arr::except($data, ['filters', 'services']),
            'user_id' => auth()->id(),
        ]);

        $blog->filters()->sync($data['filters'] ?? []);
        $blog->services()->sync($data['services'] ?? []);

        return redirect()->route('blog.show', $blog);
    }

    public function show(Blog $blog)
    {
        $blog->load(['category', 'author', 'filters', 'services']);

        return view('blog.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        $blog->load(['filters', 'services']);

        return view('blog.edit', [
            'blog' => $blog,

            'categories' => Category::orderBy('category_name')
                ->pluck('category_name', 'category_id'),

            'filters' => Filter::orderBy('filter_name')
                ->pluck('filter_name', 'filter_id'),

            'selected' => $blog->filters
                ->pluck('filter_id')->all(),

            'services' => Service::orderBy('name')
                ->pluck('name', 'id'),

            'selectedServices' => $blog->services
                ->pluck('id')->all(),
        ]);
    }

    public function update(BlogRequest $request, Blog $blog)
    {
        $data = $request->validated();

        $blog->update(
            \Illuminate\Support\Arr::except($data, ['filters', 'services'])
        );

        $blog->filters()->sync($data['filters'] ?? []);
        $blog->services()->sync($data['services'] ?? []);

        return redirect()->route('blog.show', $blog);
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blog.index');
    }


public function admin(Request $request, BlogFilter $filter)
{
    $input = $request->validate([
        'title' => ['nullable', 'string', 'max:200'],
        'categoryName' => ['nullable', 'string', 'max:100'],

        'category_id' => [
            'nullable',
            'integer',
            'exists:category,category_id',
        ],

        'filter_id' => [
            'nullable',
            'integer',
            'exists:filter,filter_id',
        ],

        'serviceName' => [
            'nullable',
            'string',
            'max:200',
        ],

        'service_id' => [
            'nullable',
            'integer',
            'exists:services,id',
        ],

        'sort' => ['nullable', 'string', 'max:30'],
    ]);

    $blogs = $filter->apply($input)
        ->paginate(10)
        ->withQueryString();

    return view('blog.admin', [
        'blogs' => $blogs,

        'categories' => Category::orderBy('category_name')
            ->pluck('category_name', 'category_id'),

        'filters' => Filter::orderBy('filter_name')
            ->pluck('filter_name', 'filter_id'),

        'services' => Service::orderBy('name')
            ->pluck('name', 'id'),
    ]);
}


    public function tags(Blog $blog)
    {
        $blog->load('filters');

        return view('blog.tags', [
            'blog' => $blog,
            'filters' => Filter::pluck('filter_name', 'filter_id'),
            'selected' => $blog->filters->pluck('filter_id')->all(),
        ]);
    }

    public function tagsStore(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'filters' => ['sometimes', 'array'],

            'filters.*' => [
                'integer',
                'distinct',
                'exists:filter,filter_id',
            ],
        ]);

        $blog->filters()->sync($data['filters'] ?? []);

        return redirect()->route('blog.show', $blog);
    }
}

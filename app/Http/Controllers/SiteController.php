<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntryRequest;
use App\Http\Requests\MasterBookingRequest;

class SiteController extends Controller
{
    public function say(string $message = 'Привіт')
    {
        return view('site.say', ['message' => $message]);
    }

    public function entry()
    {
        return view('site.entry');
    }

    public function entryStore(EntryRequest $request)
    {
        return view(
            'site.entry-confirm',
            $request->validated()
        );
    }

public function masters()
{
    $masters = [
        ['name' => 'Анна Коваль', 'specialty' => 'Перукар-стиліст', 'id' => 'hair'],
        ['name' => 'Марія Поліщук', 'specialty' => 'Майстер манікюру', 'id' => 'nails'],
        ['name' => 'Олена Зайцева', 'specialty' => 'Візажист', 'id' => 'makeup'],
    ];

    return view('site.masters', compact('masters'));
}

public function masterBooking(MasterBookingRequest $request)
{
    return view('site.master-confirm', $request->validated());
}

}
<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntryRequest;
use App\Http\Requests\MasterBookingRequest;
use App\Enums\MasterSpecialty;

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
        ['name' => 'Анна', 'specialty' => MasterSpecialty::Hair->label(), 'id' => MasterSpecialty::Hair->value],
        ['name' => 'Марія', 'specialty' => MasterSpecialty::Nails->label(), 'id' => MasterSpecialty::Nails->value],
        ['name' => 'Олена', 'specialty' => MasterSpecialty::Makeup->label(), 'id' => MasterSpecialty::Makeup->value],
    ];

    return view('site.masters', compact('masters'));
}

public function masterBooking(MasterBookingRequest $request)
{
    return view('site.master-confirm', $request->validated());
}

}
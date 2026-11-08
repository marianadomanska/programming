<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntryRequest;
use App\Http\Requests\MasterBookingRequest;
use App\Enums\MasterSpecialtyEnum;

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
        ['name' => 'Анна', 'specialty' => MasterSpecialtyEnum::Hair->label(), 'id' => MasterSpecialtyEnum::Hair->value],
        ['name' => 'Марія', 'specialty' => MasterSpecialtyEnum::Nails->label(), 'id' => MasterSpecialtyEnum::Nails->value],
        ['name' => 'Олена', 'specialty' => MasterSpecialtyEnum::Makeup->label(), 'id' => MasterSpecialtyEnum::Makeup->value],
    ];

    return view('site.masters', compact('masters'));
}

public function masterBooking(MasterBookingRequest $request)
{
    return view('site.master-confirm', $request->validated());
}

}

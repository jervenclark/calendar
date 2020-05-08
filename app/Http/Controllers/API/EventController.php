<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        return Event::paginate(5);
    }

    public function show($event)
    {
        return Event::find($event);
    }

    public function store(StoreEventRequest $request)
    {
        $validatedData = $request->only(['name', 'from_date', 'to_date']);
        return Event::create($validatedData);
    }
}

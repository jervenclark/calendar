<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}

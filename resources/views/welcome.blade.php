@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Calendar</h1>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <calendar-input-component></calendar-input-component>
            </div>
            <div class="col-md-7">
                <calendar-display-component></calendar-display-component>
            </div>
        </div>
    </div>
@endsection

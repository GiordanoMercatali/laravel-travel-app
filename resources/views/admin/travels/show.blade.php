@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1> {{ $travel->name }} </h1>
        <img src="{{ $travel->cover_image }}" alt="{{ $travel->title }}">

        <hr>

        <ul>
            <li>
                <b>Description:</b> {{ $travel->description }}
            </li>

            <li>
                <b>Start Date:</b> {{ $travel->start_date }}
            </li>

            <li>
                <b>End Date:</b> {{ $travel->end_date }}
            </li>

            <li>
                <b>Stages:</b>
                @foreach ($travel->stages as $stage)
                    <span>{{$stage->name}}</span>
                @endforeach
            </li>
        </ul>

    </div>
@endsection
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
                @if ($travel->rating == 1)
                    <b>Rating:</b> 1 Star
                @elseif ($travel->rating == 2)
                    <b>Rating:</b> 2 Stars
                @elseif ($travel->rating == 3)
                    <b>Rating:</b> 3 Stars
                @elseif ($travel->rating == 4)
                    <b>Rating:</b> 4 Stars
                @else
                    <b>Rating:</b> 5 Stars
                @endif
            </li>

            <li>
                @if ($travel->rating)
                <b>1 Star</b>
                @elseif
                @else
                <b>È alcolico?</b> No
                @endif
            </li>
        </ul>

    </div>
@endsection
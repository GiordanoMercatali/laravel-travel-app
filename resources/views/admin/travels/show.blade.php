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
                    <b>Rating:</b> <i class="fa-solid fa-star"></i>
                @elseif ($travel->rating == 2)
                    <b>Rating:</b> <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                @elseif ($travel->rating == 3)
                    <b>Rating:</b> <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                @elseif ($travel->rating == 4)
                    <b>Rating:</b> <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                @else
                    <b>Rating:</b> <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                @endif
            </li>

            <li>
                <b>Travel stages:</b>
                    <ul>
                        @foreach ($travel->stages as $stage)
                            <li>{{$stage->location}}</li>
                        @endforeach
                    </ul>
            </li>
        </ul>

    </div>
@endsection
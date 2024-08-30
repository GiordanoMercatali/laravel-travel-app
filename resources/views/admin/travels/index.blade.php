@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <h1>Travel App</h1>
        <h2>Scheduled Travels</h2>

        <div class="text-end">
          <a class="btn btn-primary" href="{{ route('admin.travels.create' )}}"><i class="fa-solid fa-plus"></i></a>
        </div>

        @if (count($travels)>0)
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Title</th>
              <th scope="col">Cover Image</th>
              <th scope="col">Description</th>
              <th scope="col">Start Date</th>
              <th scope="col">End Date</th>
            </tr>
          </thead>
          <tbody>
              @foreach($travels as $travel)
              <tr>
                  <th scope="row">{{ $travel->id }}</th>
                  <td>{{ $travel->title }}</td>
                  <td>{{ $travel->cover_image }}</td>
                  <td>{{ $travel->description }}</td>
                  <td>{{ $travel->start_date }}</td>
                  <td>{{ $travel->end_date }}</td>
                  <td>
                    <a class="btn btn-success" href="{{ route('admin.travels.show', ['travel' => $travel->id]) }}"><i class="fa-solid fa-info"></i></a>
                    <a class="btn btn-warning" href="{{ route('admin.travels.edit', ['travel' => $travel->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form action="{{ route('admin.travels.destroy', ['travel' => $travel->id]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                    </form>
                  </td>
              </tr>
              @endforeach
          </tbody>
        </table>
        @else
            <div class="alert alert-warning mt-4">
              <p>No travels?<a href="{{ route('admin.travels.create' )}}"> Schedule one now! </a></p>
            </div>
        @endif
    </div>
@endsection
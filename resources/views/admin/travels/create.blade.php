@extends('layouts.admin')

@section('content')
    <div class="container mt-5">

        <h2 class="text-center">Create Travel</h2>


        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
        @endif


        <form class="mt-5" action="{{ route('admin.travels.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control " id="title" name="title" value="{{ old('title') }}">
            </div>

            <label for="cover_image" class="form-label">Image</label>
            <input type="file" class="mb-3 form-control" id="cover_image" name="cover_image">

            <div class="mb-3">
                <label for="content" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{ old('description') }}</textarea>
            </div>  
            
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control " id="start_date" name="start_date" value="2024-06-01"
                min="2024-06-01" max="2024-08-31">
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" class="form-control " id="end_date" name="end_date" value="2024-08-31"
                min="2024-06-01" max="2024-08-31">
            </div>

            <div class="mb-3">
                <label for=""><b>Travel stages</b></label>
                @foreach($stages as $stage)
                <div class="form-check">
                    <input type="checkbox" name="stages[]" id="stage-{{$stage->id}}" value="{{$stage->id}}">
                    <label for="stage-{{$stage->id}}">{{$stage->name}}</label>
                </div>
                @endforeach
            </div>

            <div class="mb-3 ">
                <label for="rating" class="form-label"><b>Rating</b></label>
                <select id="rating" class="form-select" name="rating">
                    <option selected>Rate your travel</option>
                    <option value="1"><i class="fa-solid fa-star"></i></option>
                    <option value="2"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></option>
                    <option value="3"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></option>
                    <option value="4"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></option>
                    <option value="5"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></option>
                </select>
            </div>
            
            <a class="btn btn-warning" href="{{ route('admin.travels.index') }}"><i class="fa-solid fa-backward"></i></a>
            
            <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk"></i></button>

        </form>
    </div>
@endsection
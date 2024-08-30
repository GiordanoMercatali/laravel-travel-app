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


        <form class="mt-5" action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control " id="title" name="title" value="{{ old('title') }}">
            </div>

            <label for="cover-image" class="form-label">Image</label>
            <input type="file" class="mb-3 form-control" id="cover-image" name="cover_image">

            <div class="mb-3">
                <label for="content" class="form-label">Description</label>
                <textarea class="form-control" id="content" rows="3" name="content">{{ old('description') }}</textarea>
            </div>  
            
            <div class="mb-3">
                <label for="start" class="form-label">Start Date</label>
                <input type="date" class="form-control " id="start" name="start-date" value="2024-06-01"
                min="2024-06-01" max="2024-08-30">
            </div>

            <div class="mb-3">
                <label for="end" class="form-label">End Date</label>
                <input type="date" class="form-control " id="end" name="end-date" value="2024-08-31"
                min="2024-06-02" max="2024-08-31">
            </div>

            <div class="mb-3">
                @foreach ($stages as $stage)
                <div class="form-check">
                    <label for="technology-{{ $stage->id }}">{{ $stage->name }}</label>
                    <input @checked(in_array($stage->id, old('technologies', []))) type="checkbox" name="stage_id" id="stage-{{ $stage->id }}" value="{{ $stage->id }}">
                    {{-- in_array() Checks if a value exists in an array --}}

                </div>
                    @endforeach
            </div>
            
            <a class="btn btn-warning" href="{{ route('admin.projects.index') }}"><i class="fa-solid fa-backward"></i></a>
            
            <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk"></i></button>

        </form>
    </div>
@endsection
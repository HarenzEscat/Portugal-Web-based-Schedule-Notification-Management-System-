@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('updatedSchedule', $schedule->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="schedulename" class="form-label">Schedule Name</label>
                <input type="text" class="form-control" id="schedulename" name="schedulename" value="{{ old('schedulename', $schedule->schedulename) }}" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $schedule->description) }}" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{  old('date', $schedule->date) }}" required>
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input type="time" class="form-control" id="time" name="time" value="{{  old('time') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

@section('title')
    Update Schedule
@endsection
@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-md-12 mb-4">
            <h1>Schedule Management</h1>
        </div>
    </div>

    <div class="row">
        <!-- Schedule Form -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Add New Schedule
                </div>
                <div class="card-body">
                    <form action="{{ route('schedule.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="schedulename" class="form-label">Schedule Name</label>
                            <input type="text" class="form-control" id="schedulename" name="schedulename" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description" required>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="mb-3">
                            <label for="time" class="form-label">Select Time:</label>
                            <input type="time" class="form-control" id="time" name="time" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
@endsection
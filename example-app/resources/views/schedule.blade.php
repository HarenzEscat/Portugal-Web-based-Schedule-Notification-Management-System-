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
                    <form action="{{ route('schedule') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>
                        <div class="mb-3">
                            <label for="teacher" class="form-label">Teacher</label>
                            <input type="text" class="form-control" id="teacher" name="teacher" required>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="mb-3">
                            <label for="time" class="form-label">Time</label>
                            <input type="time" class="form-control" id="time" name="time" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Schedule</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Schedule List -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-success text-white">
                    Current Schedule
                </div>
                <ul class="list-group list-group-flush">
                    @foreach([
                        ['id' => 1, 'subject' => 'Mathematics', 'teacher' => 'John Doe', 'date' => '2024-06-15', 'time' => '09:00 AM - 11:00 AM'],
                        ['id' => 2, 'subject' => 'Physics', 'teacher' => 'Jane Smith', 'date' => '2024-06-16', 'time' => '10:30 AM - 12:30 PM'],
                        ['id' => 3, 'subject' => 'Chemistry', 'teacher' => 'Michael Johnson', 'date' => '2024-06-17', 'time' => '11:45 AM - 01:45 PM'],
                    ] as $schedule)
                        <li class="list-group-item">
                            <h5 class="card-title">{{ $schedule['subject'] }}</h5>
                            <p class="card-text">
                                <small class="text-muted">Teacher: {{ $schedule['teacher'] }}</small><br>
                                <small class="text-muted">Date: {{ $schedule['date'] }}</small><br>
                                <small class="text-muted">Time: {{ $schedule['time'] }}</small>
                            </p>
                            <form action="{{#" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger float-end">Delete</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

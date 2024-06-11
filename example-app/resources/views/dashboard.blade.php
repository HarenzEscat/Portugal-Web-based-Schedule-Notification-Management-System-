@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <h1 class="mb-4">Class Schedule Dashboard</h1>
        </div>
    </div>

    <div class="row">
        <!-- Upcoming Classes Widget -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Upcoming Classes
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h5 class="card-title">Mathematics</h5>
                        <p class="card-text">
                            <small class="text-muted">Teacher: John Doe</small><br>
                            <small class="text-muted">Date: 2024-06-15</small><br>
                            <small class="text-muted">Time: 09:00 AM - 11:00 AM</small>
                        </p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Details</a>
                    </li>
                    <li class="list-group-item">
                        <h5 class="card-title">Physics</h5>
                        <p class="card-text">
                            <small class="text-muted">Teacher: Jane Smith</small><br>
                            <small class="text-muted">Date: 2024-06-16</small><br>
                            <small class="text-muted">Time: 10:30 AM - 12:30 PM</small>
                        </p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Details</a>
                    </li>
                    <li class="list-group-item">
                        <h5 class="card-title">Chemistry</h5>
                        <p class="card-text">
                            <small class="text-muted">Teacher: Michael Johnson</small><br>
                            <small class="text-muted">Date: 2024-06-17</small><br>
                            <small class="text-muted">Time: 11:45 AM - 01:45 PM</small>
                        </p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Details</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Class Attendance Widget -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-success text-white">
                    Class Attendance
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h5 class="card-title">Mathematics</h5>
                        <p class="card-text">
                            <small class="text-muted">Attendance: 25/30 students</small>
                        </p>
                        <a href="#" class="btn btn-sm btn-outline-success">View Attendance</a>
                    </li>
                    <li class="list-group-item">
                        <h5 class="card-title">Physics</h5>
                        <p class="card-text">
                            <small class="text-muted">Attendance: 28/30 students</small>
                        </p>
                        <a href="#" class="btn btn-sm btn-outline-success">View Attendance</a>
                    </li>
                    <li class="list-group-item">
                        <h5 class="card-title">Chemistry</h5>
                        <p class="card-text">
                            <small class="text-muted">Attendance: 22/30 students</small>
                        </p>
                        <a href="#" class="btn btn-sm btn-outline-success">View Attendance</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

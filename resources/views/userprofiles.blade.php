@extends('layouts.apps')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <!-- Profile Details -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h2 class="mb-0">Profile</h2>
                    </div>
                    <div class="card-body text-center">
                        <img src="{{ asset('css/aa.jpg') }}" alt="Profile Photo" class="img-thumbnail mb-3">
                        <h3>John Doe</h3>
                        <p><strong>Email:</strong> john.doe@example.com</p>
                        <p><strong>Phone:</strong> 123-456-7890</p>
                        <p><strong>Address:</strong> 123 Main St, Anytown, USA</p>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <!-- Schedule List -->
                <div class="card mb-4">
                    <div class="card-header bg-success text-white">
                        <h2 class="mb-0">My Schedules</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="schedule-item">
                                    <strong>08:00 - Math Class</strong>
                                    <p>Monday</p>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="schedule-item">
                                    <strong>10:00 - Physics Class</strong>
                                    <p>Tuesday</p>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="schedule-item">
                                    <strong>14:00 - Chemistry Class</strong>
                                    <p>Wednesday</p>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="schedule-item">
                                    <strong>16:00 - History Class</strong>
                                    <p>Thursday</p>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="schedule-item">
                                    <strong>18:00 - Art Class</strong>
                                    <p>Friday</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .card-header h2 {
        margin-bottom: 0;
    }
    .profile-card {
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f8f9fa;
    }
    .profile-header {
        background-color: #007bff;
        color: white;
        padding: 10px;
        border-radius: 5px 5px 0 0;
    }
    .profile-body {
        padding: 20px;
        text-align: center;
    }
    .profile-body img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
    }
    .schedule-card {
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f8f9fa;
    }
    .schedule-header {
        background-color: #28a745;
        color: white;
        padding: 10px;
        border-radius: 5px 5px 0 0;
    }
    .schedule-body {
        padding: 20px;
    }
    .schedule-list {
        list-style: none;
        padding: 0;
    }
    .schedule-item {
        padding: 10px;
        margin-bottom: 10px;
        background-color: #e9ecef;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
</style>
@endsection

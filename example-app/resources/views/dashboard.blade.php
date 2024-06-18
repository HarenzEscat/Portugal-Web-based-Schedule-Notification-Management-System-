@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <h1 class="mb-4">Class Schedule Dashboard</h1>
        </div>
    </div>

    <div class="row">
        <!-- Upcoming Classes Widget -->
        <div class="col-md-3 mb-4">
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
                    <li class="list-group-item">
                        <h5 class="card-title">Biology</h5>
                        <p class="card-text">
                            <small class="text-muted">Teacher: Lisa Brown</small><br>
                            <small class="text-muted">Date: 2024-06-18</small><br>
                            <small class="text-muted">Time: 09:00 AM - 11:00 AM</small>
                        </p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Details</a>
                    </li>
                    <li class="list-group-item">
                        <h5 class="card-title">English</h5>
                        <p class="card-text">
                            <small class="text-muted">Teacher: Robert White</small><br>
                            <small class="text-muted">Date: 2024-06-19</small><br>
                            <small class="text-muted">Time: 10:30 AM - 12:30 PM</small>
                        </p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Details</a>
                    </li>
                    <li class="list-group-item">
                        <h5 class="card-title">History</h5>
                        <p class="card-text">
                            <small class="text-muted">Teacher: Karen Green</small><br>
                            <small class="text-muted">Date: 2024-06-20</small><br>
                            <small class="text-muted">Time: 11:45 AM - 01:45 PM</small>
                        </p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Details</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Calendar -->
        <div class="col-md-9 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="8" class="text-center bg-primary text-white" style="position: sticky; top: 0; width: 100%; z-index: 999;">{{ date('F Y') }}</th>
                                </tr>
                                <tr class="text-center">
                                    <th class="border bg-light">Time</th>
                                    @php
                                        // Get the current day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
                                        $currentDayOfWeek = date('w');
                                    @endphp
                                    @for ($i = 0; $i < 7; $i++)
                                        @php
                                            // Calculate the date for each day of the week
                                            $day = date('j', strtotime("+$i days"));
                                            // Calculate the day name (e.g., Sun, Mon, Tue, ...)
                                            $dayName = date('D', strtotime("+$i days"));
                                        @endphp
                                        <th class="border bg-light">{{ $dayName }} {{ $day }}</th>
                                    @endfor
                                </tr>
                            </thead>
                            <tbody>
                                @for ($hour = 8; $hour <= 17; $hour++)
                                    <tr>
                                        <td class="border text-center align-middle">{{ sprintf('%02d:00', $hour) }}</td>
                                        @for ($i = 0; $i < 7; $i++)
                                            @php
                                                // Determine the event for this cell
                                                $event = null;
                                                if ($hour == 9 && $i == 0) {
                                                    $event = 'Mathematics Class';
                                                } elseif ($hour == 10 && $i == 1) {
                                                    $event = 'Physics Class';
                                                } elseif ($hour == 11 && $i == 2) {
                                                    $event = 'Chemistry Class';
                                                } elseif ($hour == 9 && $i == 3) {
                                                    $event = 'Biology Class';
                                                } elseif ($hour == 10 && $i == 4) {
                                                    $event = 'English Class';
                                                } elseif ($hour == 11 && $i == 5) {
                                                    $event = 'History Class';
                                                } elseif ($hour == 14 && $i == 0) {
                                                    $event = 'Math Review';
                                                } elseif ($hour == 15 && $i == 1) {
                                                    $event = 'Physics Lab';
                                                } elseif ($hour == 16 && $i == 2) {
                                                    $event = 'Chemistry Experiment';
                                                } elseif ($hour == 14 && $i == 3) {
                                                    $event = 'Biology Lab';
                                                } elseif ($hour == 15 && $i == 4) {
                                                    $event = 'English Workshop';
                                                } elseif ($hour == 16 && $i == 5) {
                                                    $event = 'History Seminar';
                                                }
                                            @endphp
                                            <td class="calendar-cell">
                                                @if ($event)
                                                    <div class="events-list">
                                                        <ul>
                                                            <li>{{ $event }}</li>
                                                        </ul>
                                                    </div>
                                                @endif
                                            </td>
                                        @endfor
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6; /* Default border color */
        }

        .calendar-cell {
            position: relative; /* Ensure positioning context for absolute children */
            height: 100px; /* Set height for each cell */
            font-size: 14px; /* Fixed font size */
        }

        .events-list {
            display: block; /* Always show events list */
        }

        .table-responsive {
            overflow-x: hidden; /* Remove horizontal scroll for the table */
        }
    </style>
@endsection

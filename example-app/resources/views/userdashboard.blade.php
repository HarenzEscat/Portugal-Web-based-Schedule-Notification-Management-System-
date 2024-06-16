@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center mb-4">Calendar</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th colspan="8" class="text-center bg-primary text-white" style="position: sticky; top: 0; width: 100%; z-index: 999;">{{ date('F Y') }}</th>

                                <tr class="text-center">
                                    <th class="border"></th>
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
                                @php
                                    // Example schedules (replace with your dynamic data)
                                    $schedules = [
                                        '08:00' => [
                                            ['Class Subject: Math', 'Payment Due', 'Announcement: School Holiday'],
                                        ],
                                        '10:00' => [
                                            ['Examination: Science', 'Class Subject: Physics', 'Announcement: Staff Meeting'],
                                        ],
                                        '14:00' => [
                                            ['Class Subject: Chemistry', 'Announcement: Sports Day', 'Payment Due'],
                                        ],
                                        '16:00' => [
                                            ['Class Subject: History', 'Examination: Mathematics', 'Announcement: Field Trip'],
                                        ],
                                        '18:00' => [
                                            ['Class Subject: Art', 'Announcement: Cultural Festival', 'Payment Due'],
                                        ]
                                    ];
                                @endphp

                                @foreach ($schedules as $time => $events)
                                    <tr>
                                        <td class="border text-center bg-light">{{ $time }}</td>
                                        @for ($day = 1; $day <= 7; $day++)
                                            <td class="p-0 border position-relative text-center calendar-cell">
                                                <ul class="list-unstyled mb-0 position-absolute events-list">
                                                    @foreach ($events as $event)
                                                        <li>{{ $event[$day - 1] ?? '' }}</li>
                                                    @endforeach
                                                </ul>
                                                <button class="btn btn-sm btn-outline-success notify-btn"
                                                        data-time="{{ $time }}"
                                                        data-day="{{ $day }}"
                                                        data-toggle="modal" data-target="#notificationModal">Notify</button>
                                            </td>
                                        @endfor
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Schedules
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($schedules as $time => $events)
                            @foreach ($events as $event)
                                <li class="list-group-item">
                                    <strong class="text-primary">{{ $time }}</strong>
                                    <ul class="list-unstyled">
                                        @foreach ($event as $schedule)
                                            <li>{{ $schedule }}</li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notificationModalLabel">Notify Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="modal-body">
                    <p id="notificationDetails"></p>
                    <input type="hidden" name="time" id="notificationTime">
                    <input type="hidden" name="day" id="notificationDay">
                    <input type="hidden" name="event" id="notificationEvent">
                    <div class="form-group">
                        <label for="priorityLevel">Priority Level</label>
                        <select class="form-control" id="priorityLevel" name="priority" required>
                            <option value="High">High</option>
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="notificationType">Notification Type</label>
                        <select class="form-control" id="notificationType" name="type" required>
                            <option value="Popup Alert">Popup Alert</option>
                            <option value="Sound Alert">Sound Alert</option>
                            <option value="Vibration Alert">Vibration Alert</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="notificationMessage">Notification Message</label>
                        <textarea class="form-control" id="notificationMessage" name="message" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Notification</button>
                </div>
            </form>
        </div>
    </div>
</div>


@section('scripts')
<script>
    $(document).ready(function() {
        $('.calendar-cell').hover(function() {
            $(this).find('.events-list').fadeIn();
        }, function() {
            $(this).find('.events-list').fadeOut();
        });

        $('.notify-btn').click(function() {
            var time = $(this).data('time');
            var day = $(this).data('day');
            var eventDetails = `${time} - Day ${day}`;
            $('#notificationDetails').text(eventDetails);
            $('#notificationTime').val(time);
            $('#notificationDay').val(day);
        });
    });
</script>
@endsection

<style>
    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6; /* Default border color */
        width: 150px; /* Adjusted width of calendar cells */
        min-width: 150px; /* Ensure minimum width */
        position: relative; /* Ensure positioning context */
    }

    .events-list {
        display: none; /* Hide events list by default */
        position: absolute;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        border: 1px solid #ccc;
        padding: 5px;
        z-index: 100;
        left: 50%;
        transform: translateX(-50%);
        bottom: 100%;
        width: 100%; /* Adjusted width for events list */
        max-width: 200px; /* Maximum width for events list */
    }

    .calendar-cell {
        position: relative; /* Ensure positioning context for absolute children */
        height: 100px; /* Set height for each cell */
    }

    .calendar-cell:hover .events-list {
        display: block; /* Show events list on hover */
    }

    .notify-btn {
        position: absolute;
        bottom: 5px;
        left: 50%;
        transform: translateX(-50%);
        display: none;
    }

    .calendar-cell:hover .notify-btn {
        display: block;
    }

    .table-responsive {
        overflow-x: auto; /* Add horizontal scroll for the table */
    }
</style>

@endsection
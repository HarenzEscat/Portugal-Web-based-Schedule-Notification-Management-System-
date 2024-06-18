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
                                </tr>
                                <tr class="text-center">
                                    <th class="border"></th>
                                    @php
                                        // Start on Monday
                                        $startDay = strtotime('next Monday');
                                    @endphp
                                    @for ($i = 0; $i < 7; $i++)
                                        @php
                                            $day = date('j', strtotime("+$i days", $startDay));
                                            $dayName = date('D', strtotime("+$i days", $startDay));
                                        @endphp
                                        <th class="border bg-light">{{ $dayName }} {{ $day }}</th>
                                    @endfor
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    // Define schedules for each time slot and day
                                    $schedules = [
                                        '08:00' => [
                                            'Mon' => 'Class Subject: Math',
                                            'Tue' => '',
                                            'Wed' => 'Announcement: School Holiday',
                                            'Thu' => '',
                                            'Fri' => '',
                                            'Sat' => 'Payment Due',
                                            'Sun' => '',
                                        ],
                                        '10:00' => [
                                            'Mon' => 'Examination: Science',
                                            'Tue' => 'Class Subject: Physics',
                                            'Wed' => '',
                                            'Thu' => '',
                                            'Fri' => 'Announcement: Staff Meeting',
                                            'Sat' => '',
                                            'Sun' => '',
                                        ],
                                        '14:00' => [
                                            'Mon' => 'Class Subject: Chemistry',
                                            'Tue' => '',
                                            'Wed' => 'Announcement: Sports Day',
                                            'Thu' => '',
                                            'Fri' => '',
                                            'Sat' => 'Payment Due',
                                            'Sun' => '',
                                        ],
                                        '16:00' => [
                                            'Mon' => 'Class Subject: History',
                                            'Tue' => 'Examination: Mathematics',
                                            'Wed' => '',
                                            'Thu' => '',
                                            'Fri' => 'Announcement: Field Trip',
                                            'Sat' => '',
                                            'Sun' => '',
                                        ],
                                        '18:00' => [
                                            'Mon' => 'Class Subject: Art',
                                            'Tue' => '',
                                            'Wed' => 'Announcement: Cultural Festival',
                                            'Thu' => '',
                                            'Fri' => '',
                                            'Sat' => 'Payment Due',
                                            'Sun' => '',
                                        ],
                                    ];
                                @endphp

                                @foreach ($schedules as $time => $events)
                                    <tr>
                                        <td class="border text-center bg-light">{{ $time }}</td>
                                        @foreach (['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'] as $dayName)
                                            <td class="p-0 border position-relative text-center calendar-cell">
                                                @if (!empty($events[$dayName]))
                                                    <ul class="list-unstyled mb-0 position-relative events-list">
                                                        <li>{{ $events[$dayName] }}</li>
                                                    </ul>
                                                    <button class="btn btn-sm btn-outline-success notify-btn"
                                                            data-time="{{ $time }}"
                                                            data-day="{{ array_search($dayName, ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']) + 1 }}"
                                                            data-toggle="modal" data-target="#notificationModal">Notify</button>
                                                @endif
                                            </td>
                                        @endforeach
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
                            @if (count(array_filter($events)) > 0)
                                <li class="list-group-item">
                                    <strong class="text-primary">{{ $time }}</strong>
                                    <ul class="list-unstyled">
                                        @foreach ($events as $day => $schedule)
                                            @if (!empty($schedule))
                                                <li>{{ $day }}: {{ $schedule }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
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

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.calendar-cell').hover(
            function() {
                $(this).find('.notify-btn').css('display', 'block');
            },
            function() {
                $(this).find('.notify-btn').css('display', 'none');
            }
        );

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
        border: 1px solid #dee2e6;
        width: 150px;
        min-width: 150px;
        position: relative;
    }

    .events-list {
        position: relative;
        background-color: #fff;
        width: 100%;
    }

    .calendar-cell {
        position: relative;
        height: 100px;
    }

    .notify-btn {
        position: absolute;
        bottom: 5px;
        left: 50%;
        transform: translateX(-50%);
        display: none; /* Initially hidden */
    }

    .calendar-cell:hover .notify-btn {
        display: block; /* Display on hover */
    }

    .table-responsive {
        overflow-x: auto;
    }
</style>

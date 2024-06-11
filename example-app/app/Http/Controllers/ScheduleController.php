<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    // Array to store schedules (simulating database)
    private $schedules = [];

    public function __construct()
    {
        // Example schedules for demonstration
        $this->schedules = [
            ['id' => 1, 'subject' => 'Mathematics', 'teacher' => 'John Doe', 'date' => '2024-06-15', 'time' => '09:00 AM - 11:00 AM'],
            ['id' => 2, 'subject' => 'Physics', 'teacher' => 'Jane Smith', 'date' => '2024-06-16', 'time' => '10:30 AM - 12:30 PM'],
            ['id' => 3, 'subject' => 'Chemistry', 'teacher' => 'Michael Johnson', 'date' => '2024-06-17', 'time' => '11:45 AM - 01:45 PM'],
        ];
    }

    public function index()
    {
        $schedules = $this->schedules;
        return view('schedule', compact('schedules'));
    }

    public function store(Request $request)
    {
        $schedule = [
            'id' => count($this->schedules) + 1,
            'subject' => $request->subject,
            'teacher' => $request->teacher,
            'date' => $request->date,
            'time' => $request->time,
        ];

        $this->schedules[] = $schedule;

        return redirect()->route('schedule');
    }

    public function destroy($id)
    {
        $this->schedules = array_values(array_filter($this->schedules, function ($schedule) use ($id) {
            return $schedule['id'] != $id;
        }));

        return redirect()->route('schedule');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    public function index(){   
        $schedules = Schedule::all();
        $schedules = Schedule::paginate(10);
        return view('schedule', compact('schedules'));
    }

    public function createSchedule(){
        return view('create');
    }

    public function storeSchedule(Request $request){
        $request->validate([
            'schedulename' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        $schedule = Schedule::create([
            'schedulename' => $request->input('schedulename'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
        ]);

        return redirect()->route('schedule')
            ->with('success', 'Schedule added successfully!');
    }

    public function deleteSchedule($id){
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return back()
            ->with('success', 'Schedule deleted successfully!');
    }

    public function updateSchedule($id){
        $schedule = Schedule::findOrFail($id);
        return view('updateSchedule')->with('schedule', $schedule);
    }

    public function updatedSchedule(Request $request, $id){

        $schedule = Schedule::findOrFail($id);
        
        $request->validate([
            'schedulename' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        $schedule->update([
            'schedulename' => $request->input('schedulename'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
        ]);

        return redirect()->route('schedule')
            ->with('success', 'Schedule updated successfully!');
    }
}

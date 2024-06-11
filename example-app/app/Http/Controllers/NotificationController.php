<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // Array to store notifications (simulating database)
    private $notifications = [];

    public function __construct()
    {
        // Example notifications for demonstration
        $this->notifications = [
            ['id' => 1, 'title' => 'Class Reminder', 'content' => 'Mathematics class at 9:00 AM', 'type' => 'info'],
            ['id' => 2, 'title' => 'Assignment Due', 'content' => 'Submit Physics assignment by Friday', 'type' => 'warning'],
            ['id' => 3, 'title' => 'Exam Schedule', 'content' => 'Chemistry exam on June 30th', 'type' => 'danger'],
        ];
    }

    public function index()
    {
        $notifications = $this->notifications;
        return view('notifications', compact('notifications'));
    }

    public function store(Request $request)
    {
        $notification = [
            'id' => count($this->notifications) + 1,
            'title' => $request->title,
            'content' => $request->content,
            'type' => $request->type,
        ];

        $this->notifications[] = $notification;

        return redirect()->route('notifications');
    }

    public function edit($id)
    {
        $notification = collect($this->notifications)->where('id', $id)->first();
        return view('notificationsedit', compact('notification'));
    }

    public function update(Request $request, $id)
    {
        foreach ($this->notifications as &$notification) {
            if ($notification['id'] == $id) {
                $notification['title'] = $request->title;
                $notification['content'] = $request->content;
                $notification['type'] = $request->type;
                break;
            }
        }

        return redirect()->route('notifications');
    }

    public function destroy($id)
    {
        $this->notifications = array_values(array_filter($this->notifications, function ($notification) use ($id) {
            return $notification['id'] != $id;
        }));

        return redirect()->route('notifications');
    }
}

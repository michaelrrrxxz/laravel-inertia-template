<?php

namespace App\Http\Controllers;
use App\Models\Attendance;
use App\Models\Attendee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class AttendanceController extends Controller
{
public function store(Request $request)
{
    $request->validate([
        'attendee_id' => 'required|integer',
    ]);

    $attendee = Attendee::find($request->attendee_id);

    if (! $attendee) {
        return redirect()->back()->with('error', 'Attendee not found');
    }

    $today = Carbon::today();

    $alreadyMarked = Attendance::where('attendee_id', $attendee->id)
        ->where('date', $today)
        ->exists();

    if ($alreadyMarked) {
        return redirect()->back()->with('message', 'Already marked today');
    }

    Attendance::create([
        'attendee_id' => $attendee->id,
        'date' => $today,
    ]);

    return redirect()->back()->with('message', 'Attendance recorded');
}

}

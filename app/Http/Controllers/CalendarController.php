<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Event;

class CalendarController extends Controller
{
    public function index()
    {
        $events = Event::where('user_id', auth()->id())->get();
        return view('calendar.index', compact('events'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'reminder_time' => 'required|integer|min:0'
        ]);

        $validated['user_id'] = auth()->id();

        Event::create($validated);

        return redirect()->route('calendar')->with('success', 'Event Added Successfully');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:events,id',
            'title' => 'required|string',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'reminder_time' => 'required|integer|min:0'
        ]);

        $validated['user_id'] = auth()->id();

        Event::findOrFail($request->id)->update($validated);

        return redirect()->route('calendar')->with('success', 'Event Updated Successfully');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('calendar')->with('success', 'Event Deleted Successfully');
    }
    public function dragUpdate(Request $request)
    {
        try {
            $validated = $request->validate([
            'id' => 'required|exists:events,id',
            // 'title' => 'required|string',
            // 'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            // 'reminder_time' => 'required|integer|min:0'
        ]);

             Event::findOrFail($request->id)->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Event updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);

       }
   }


}


<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
class CalendarController extends Controller
{
    public function index()
    {
        // Get all events including recurring instances
        $events = Event::whereNull('parent_event_id')
            ->orWhere('parent_event_id', '!=', null)
            ->get();
        return view('calendar.index', compact('events'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'reminder_time' => 'required|integer|min:0',
            'repeat_type' => 'nullable|in:none,daily,weekly,monthly,yearly',
            'repeat_interval' => 'nullable|integer|min:1|max:365',
            'repeat_until' => 'nullable|date|after:start_date'
        ]);

        $event = Event::create($validated);

        // If this is a repeating event, create the recurring instances
        if (isset($validated['repeat_type']) && $validated['repeat_type'] && $validated['repeat_type'] !== 'none' && isset($validated['repeat_until']) && $validated['repeat_until']) {
            $this->createRecurringEvents($event);
        }

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
            'reminder_time' => 'required|integer|min:0',
            'repeat_type' => 'nullable|in:none,daily,weekly,monthly,yearly',
            'repeat_interval' => 'nullable|integer|min:1|max:365',
            'repeat_until' => 'nullable|date|after:start_date'
        ]);

        $event = Event::findOrFail($request->id);
        $event->update($validated);

        // If this is a repeating event, update or create recurring instances
        if ($validated['repeat_type'] && $validated['repeat_type'] !== 'none' && $validated['repeat_until']) {
            // Delete existing recurring instances
            Event::where('parent_event_id', $event->id)->delete();
            // Create new recurring instances
            $this->createRecurringEvents($event);
        } else {
            // Delete recurring instances if repeating is turned off
            Event::where('parent_event_id', $event->id)->delete();
        }

        return redirect()->route('calendar')->with('success', 'Event Updated Successfully');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        // If this is a parent event, delete all recurring instances
        if ($event->parent_event_id === null) {
            Event::where('parent_event_id', $event->id)->delete();
        }

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

   private function createRecurringEvents($parentEvent)
   {
       $startDate = Carbon::parse($parentEvent->start_date);
       $endDate = Carbon::parse($parentEvent->end_date);
       $repeatUntil = Carbon::parse($parentEvent->repeat_until);
       $duration = $startDate->diffInSeconds($endDate);

       $currentDate = $startDate->copy();
       $interval = (int) $parentEvent->repeat_interval;

       while ($currentDate <= $repeatUntil) {
           // Skip the original event date
           if ($currentDate->eq($startDate)) {
               $currentDate = $this->getNextDate($currentDate, $parentEvent->repeat_type, $interval);
               continue;
           }

           $newStartDate = $currentDate;
           $newEndDate = $currentDate->copy()->addSeconds($duration);

           Event::create([
               'title' => $parentEvent->title,
               'description' => $parentEvent->description,
               'start_date' => $newStartDate,
               'end_date' => $newEndDate,
               'reminder_time' => $parentEvent->reminder_time,
               'repeat_type' => 'none', // Individual instances don't repeat
               'repeat_interval' => 1,
               'repeat_until' => null,
               'parent_event_id' => $parentEvent->id
           ]);

           $currentDate = $this->getNextDate($currentDate, $parentEvent->repeat_type, $interval);
       }
   }

   private function getNextDate($date, $repeatType, $interval)
   {
       // Cast interval to integer to ensure Carbon methods work correctly
       $interval = (int) $interval;

       switch ($repeatType) {
           case 'daily':
               return $date->addDays($interval);
           case 'weekly':
               return $date->addWeeks($interval);
           case 'monthly':
               return $date->addMonths($interval);
           case 'yearly':
               return $date->addYears($interval);
           default:
               return $date;
       }
   }
}

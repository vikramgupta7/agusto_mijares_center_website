<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;


class EventController extends Controller
{
    public function index()
    {
            $events = Event::all();
    
            return view('events', ['events' => $events]);
    }


    public function admin_page()
    {
            $events = Event::all();
    
            return view('admin.events', ['events' => $events]);
    }

    public function admin_edit(Request $eventsForm)
    {
        $events = Event::all();
        $eventsForm = $eventsForm->input();
        return view('admin.events_edit', compact('eventsForm', 'events'));
    }

    public function admin_update(Request $updateForm)
    {
        if($updateForm->input('type') == 'added')
        {
            $event = new Event;
            $event->page_id = 5;
            $event->event_title = $updateForm->input('event_title');
            $event->event_desc = $updateForm->input('event_description');
            $event->event_image = $updateForm->input('event_image');
            $event->save();

            $events = Event::all();
            return view('admin.events', ['events' => $events]);
        }
    }
}

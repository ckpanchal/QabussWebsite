<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Events;
use Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'day' => date("Y-m-d"),
            'event' => Events::all(),

        );
        return view('Admin.Event.index', $data);
        // return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['events'] = Events::all();
        return view('Admin.Event.AddEvent', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Events();
        $eventid = "QEVENT" . rand(999, 9999999);
        $userId = Auth::user()->registerid;
        $event->userId = $userId;
        $event->eventid = $eventid;
        $event->headingEn = $request->eventname;
        $event->headingArb = $request->eventnamearb;
        $event->descriptionEn = $request->eventdesc;
        $event->descriptionArb = $request->eventdescarb;
        $event->summeryEn = $request->summeryen;
        $event->summeryArb = $request->summeryarb;
        $event->startdate = $request->start;
        $event->enddate = $request->end;
        $event->amount = $request->amount;
        $event->phone = $request->phone;
        $event->email = $request->email;
        $event->lat = $request->latitude;
        $event->lng = $request->longitude;
        $event->location = $request->location;
        $event->locationArb = $request->locationarb;
        $event->category = "0";
        $event->view = "0";
        $event->status = "1";

        $image = $request->file('image');
        $main_image_src = '/image/event/'.$eventid .".png";
        $imagepath = 'image/event/';
        $image->move($imagepath, $main_image_src);
        $event->image = $main_image_src;


        $event->save();
        // (new \App\Libraries\NotificationLib())->sendNotification($event->headingEn,$event->headingArb,substr(strip_tags($event->descriptionEn),0,50),substr(strip_tags($event->descriptionArb),0,50),url($main_image_src),'App\Model\Events',$event->id,$event);
        return redirect()->route('event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array(
            'day' => date("Y-m-d h:i:s"),
            'events' => Events::where('eventid', $id)->first(),
        );
        return view('Admin.Event.ViewEvent', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = [];
        $event['event'] = Events::where('eventid', $id)->first();
        return view('Admin.Event.EditEvent', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Events::findorfail($id);
        $eventid = rand(999, 9999999);
        $event->headingEn = $request->eventname;
        $event->headingArb = $request->eventnamearb;
        $event->descriptionEn = $request->eventdesc;
        $event->descriptionArb = $request->eventdescarb;
        $event->summeryEn = $request->summeryen;
        $event->summeryArb = $request->summeryarb;
        $event->startdate = $request->start;
        $event->enddate = $request->end;
        $event->amount = $request->amount;
        $event->phone = $request->phone;
        $event->email = $request->email;
        $event->lat = $request->latitude;
        $event->lng = $request->longitude;
        $event->location = $request->location;
        $event->locationEn = $request->location;
        $event->locationArb = $request->locationarb;
        $event->category = "0";
        $event->view = "0";
        $event->status = "1";

        // Event image

        if($request->image != ''){

            $image = $request->file('image');
            $main_image_src = '/image/event/'.$eventid .".png";
            $imagepath = 'image/event/';
            $image->move($imagepath, $main_image_src);
            $event->image = $main_image_src;

        }
        else{
            $event->image = $request->oldimage;
        }

        $event->save();
        return redirect()->route('event.index');
        // return $main_image_src;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = Events::where('eventid', $id)->first();
        $news->delete();
        return redirect()->route('event.index');
    }
}

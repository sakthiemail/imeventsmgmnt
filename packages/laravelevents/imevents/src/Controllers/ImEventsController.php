<?php

namespace Laravelevents\ImEvents\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Laravelevents\ImEvents\Models\ImEvents as ImEvents;
use Laravelevents\ImEvents\Models\Invitee as Invitee;
use Laravelevents\ImEvents\Models\User as User;
use Auth;
use Session;
use Calendar;

class ImEventsController extends BaseController
{
    public function __construct()
    {
        $this->middleware(['auth', 'clearance'])->except('calenderView');
    }

    public function calenderView()
    {
        $events = [];

        $data = ImEvents::all();

        if($data->count()){

            foreach ($data as $key => $value) {

                $events[] = \Calendar::event(

                    $value->subject.", ".$value->location,

                    true,

                    new \DateTime($value->start_date),

                    new \DateTime($value->end_date.' +1 day')

                );

            }

        }

        $calendar = \Calendar::addEvents($events);

        return view('imevents::calendar', compact('calendar'));

    }

    public function index()
    {
        $imevents = ImEvents::All();
        return view('imevents::index', compact('imevents'));
    }

    public function create()
    {
        $users = User::pluck('name', 'id');
        $users->prepend('-- Select --', 0);
        return view('imevents::create',compact('users'));
    }

    public function store(Request $request)
    {
        $userslist = $request->get('userslist');
        //dd($userslist);
        $imevent = ImEvents::create([
            'type'=>$request->$request->type,
            'subject'=>$request->subject,
            'description'=>$request->description,
            'start_date'=>Carbon::parse($request->start_date),
            'end_date'=>Carbon::parse($request->end_date),
            'location'=>$request->location,
            'billable'=>($request->location)?1:0,
            'status' => 1,
            'remainder_interval'=>$request->remainder_interval,
            'user_id'=>Auth::user()->id
            ]);
        foreach($userslist as $uid) {
           Invitee::create([
                'user_id'=> $uid,
                'imevent_id'=> $imevent->id,
            ]);
        }
        $imevents = ImEvents::All();
        return view('imevents::index',compact('imevents'));
    }

    public function edit($id)
    {
        $users = User::pluck('name', 'id');
        $imevent = ImEvents::findOrFail($id);
        return view('imevents::edit', compact('imevent','users'));
    }

    public function update(Request $request, $id)
    {
        $imevent = ImEvents::findOrFail($id);
        $imevent->subject = $request->subject;
        $imevent->description = $request->description;
        $imevent->start_date =Carbon::parse($request->start_date);
        $imevent->end_date = Carbon::parse($request->end_date);
        $imevent->location = $request->location;
        $imevent->billable = ($request->billable)?1:0;
        $imevent->status  = $request->status;
        $imevent->remainder_interval = $request->remainder_interval;
        $imevent->save();
        return view('imevents::index',compact('imevents'));
    }

    public function destroy($id)
    {

    }
}

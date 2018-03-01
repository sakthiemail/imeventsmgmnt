<?php

namespace Laravelevents\ImEvents\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Laravelevents\ImEvents\Models\ImEvents as ImEvents;
use Laravelevents\ImEvents\Models\User as User;
use Auth;
use Session;

class ImEventsController extends BaseController
{
    public function __construct()
    {
        $this->middleware(['auth', 'clearance']);
    }

    public function index($timezone = NULL)
    {
        $imevents = ImEvents::all();
        return view('imevents::index', compact('imevents'));
    }

    public function create()
    {
        $users=User::All();
        return view('imevents::create',compact('users'));
    }

    public function store(Request $request){

        ImEvents::create([
                    'title'=>$request->get('title'),
                    'description'=>$request->get('description'),
                    'start_date'=>$request->get('start_date'),
                    'end_date'=>$request->get('end_date'),
                    'user_id'=>Auth::user()->id,
                ]);
        return view('imevents::index');
    }

}

<?php


namespace App\Http\Controllers;
use App\Models\Counters;
use Illuminate\Http\Request;
use SebastianBergmann\LinesOfCode\Counter;

class CountersController extends Controller
{
    //
    public function store(Request $request)
    {


        $Counter = new Counters();
        $Counter->counter_mode = $request->counter_mode;
        $Counter->counter_name = $request->counter_name;
        $Counter->counter_status = $request->counter_status;
        $Counter->user_id = $request->user_id;



        $Counter->save();
        return $Counter;
    }

    public function index()
    {
        $Counter = Counters::all();

        return $Counter;

        //
    }

}

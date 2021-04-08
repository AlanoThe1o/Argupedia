<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debate;
use App\Models\DebateArgument;
use App\Models\Argument;
use App\Models\Scheme;
use App\Models\PositionToKnow;
use App\Models\PopularOpinion;
use App\Models\ExpertOpinion;
use Auth;
use DB;




class DebateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $debates = Debate::paginate(5);
        return view('debate.debate', ['debates' => $debates]);
    }

    public function recentlyCreated()
    {
        $debates = Debate::orderBy('created_at', 'desc')->paginate(5);
        return view('debate.debate', ['debates' => $debates]);
    }

    public function mostViews()
    {
        $debates = Debate::orderBy('views', 'desc')->paginate(5);
        return view('debate.debate', ['debates' => $debates]);
    }

    public function myDebates()
    {
        $userId = Auth::id();
        $debates = Debate::where('userId', $userId)->paginate(5);
        return view('debate.mydebate', ['debates' => $debates]);
    }

    public function search()
    {
        $searchText = $_GET['searchVal'];
        $debates = Debate::where('debate_name', 'LIKE', '%'.$searchText."%")->paginate(5);
        return view('search', ['debates' => $debates]);
    }

    /**
     * Returns view that displays all the arguments within a debate.
     *
     * @param  int  $id -- id from Debate model. 
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $debate = Debate::where('id', $id)->first();
        $debateViews = $debate->views + 1;
        DB::table('debates')->where('id', $id)->update(['views' => $debateViews]);
        $debate_arguments = DebateArgument::where('debateId',$id)->get(); /* Selecting all the arguments within the debate.*/
        $arguments = array();
        $argument_labelling = array();
        foreach($debate_arguments as $i){
                    array_push($arguments, Argument::where('id', $i->argumentId)->first()); 
        }
        foreach($arguments as $a){
            $argumentId = ($a->id);
            array_push($argument_labelling, ArgumentController::getArgumentLabelling($argumentId)); 
        }
        $argumentCount = count($arguments);
        return view('debate.show' , ['arguments' => $arguments, 'argument_labelling' => $argument_labelling, 'argumentCount' => $argumentCount]);
    }

    
}
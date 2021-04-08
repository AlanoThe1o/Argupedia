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
use App\Models\Action;
use App\Models\Attack;
use DB;


class ArgumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $argument = Argument::where('id', $id)->first();//
        $debate_arguments = DebateArgument::where('argumentId',$id)->first();
        $debate = Debate::where('id', $debate_arguments->debateId)->first();
        $schemeId = $argument->schemeId;
        $scheme = Scheme::where('id',$schemeId)->first();
        if($scheme->scheme_name == "Expert Opinion"){
            $variables = ExpertOpinion::where('schemeId',$schemeId)->first();
            return view('expopinion.show', ['variables' => $variables, 'argument' => $argument, 'debate'=> $debate]);
        }
        elseif($scheme->scheme_name == "Popular Opinion"){
            $variables = PopularOpinion::where('schemeId',$schemeId)->first();
            return view('popularopinion.show', ['variables' => $variables, 'argument' =>$argument, 'debate'=> $debate]);

        }
        elseif($scheme->scheme_name == "Position to Know"){
            $variables = PositionToKnow::where('schemeId',$schemeId)->first();
            return view('postoknow.show', ['variables' => $variables, 'argument' =>$argument, 'debate'=> $debate]);

        }
        elseif($scheme->scheme_name == "Action"){
            $variables = Action::where('schemeId',$schemeId)->first();
            return view('action.show', ['variables' => $variables, 'argument' =>$argument, 'debate'=> $debate]);

        }
    }

    public function updatePlusVote($id){
        $argument = Argument::where('id', $id)->first();
        $argumentVotes = $argument->votes + 1;
        DB::table('arguments')->where('id', $id)->update(['votes' => $argumentVotes]);
        return back()->with('success','Vote Casted');
    }

    public function updateNegVote($id){
        $argument = Argument::where('id', $id)->first();
        $argumentVotes = $argument->votes - 1;
        DB::table('arguments')->where('id', $id)->update(['votes' => $argumentVotes]);
        return back()->with('success','Vote Casted');
    }

    public static function getArgumentLabelling($argumentId)
    {
        $argument = Argument::where('id', $argumentId)->first();
        $attacked_by = Attack::where('argumentB', $argumentId)->get(); 
        $attackingArguments = array();
        foreach($attacked_by as $attack){
            $attacker_argument = Argument::where('id', $attack->argumentA)->first();//
            array_push($attackingArguments, $attacker_argument);
        }
        if(count($attackingArguments) == 0){
            return "In";
        }
        else
        {
            $attackerHighestVote = $attackingArguments[0]->votes;
            foreach($attackingArguments as $attacker)
            {
                if($attacker->votes > $attackerHighestVote)
                    {
                        $attackerHighestVote = $attacker->votes;
                    }
            }
        }
        if($attackerHighestVote == $argument->votes){
            return "Undecided";
        }
        elseif($attackerHighestVote > $argument->votes){
            return "Out";
        }
        else{
            return "In";
        }
        
    }
}
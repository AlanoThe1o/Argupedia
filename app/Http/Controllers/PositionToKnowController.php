<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PositionToKnow;
use App\Models\Debate;
use App\Models\Argument;
use App\Models\Scheme;
use App\Models\User;
use App\Models\DebateArgument;
use App\Models\Attack;

use Illuminate\Support\Facades\Auth;

class PositionToKnowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('postoknow.create');//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('postoknow.create');//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'debateName'=>'required',
            'argumentName'=>'required',
            'person' => 'required',
            'circumstance' => 'required',
            'boolVal' => 'required'
        ]);//
        
        $boolVal;

        if($request->get('boolVal') != "true"){
            if($request->get('boolVal') != "false"){
                return redirect()->route('postoknow.create')->with('incorrect','please enter lowercase true or false');
            }
        }

        if($request->get('boolVal') == "true"){
            $boolVal = 1;
        }
        elseif($request->get('boolVal') == "false"){
            $boolVal = 0;
        }


        $userId = Auth::id();
        $current_date_time = date('Y-m-d H:i:s');
        $debate = new Debate([
            'debate_name' => $request->get('debateName'),
            'created_at' => $current_date_time,
            'userId' => $userId
        ]);

        $scheme = new Scheme([
            'scheme_name' => 'Position to Know'
        ]);
        $scheme->save();
        $schemeid = $scheme->getkey();

        
        $postoknowvalues = new PositionToKnow([
            'person'=> $request->get('person'),
            'proposition' =>$request->get('circumstance'),
            'schemeId' => $schemeid,
            'state' => $boolVal
        ]);
        $postoknowvalues->save();

        $argument = new Argument([
            'argument_name' => $request->get('argumentName'),
            'schemeId' => $schemeid,
            'userId' => $userId,
            'votes' => 0
        ]);
        $debate->save();
        $argument->save();

        $debate_arguments = new DebateArgument([
            'argumentId' => $argument->getkey(),
            'debateId' => $debate->getkey()
        ]);
        $debate_arguments->save();
        return redirect()->route('postoknow.create')->with('success','Debate created');


    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeAttack(Request $request, $debateId, $argumentId)
    {
        $this->validate($request,[
            'argumentName'=>'required',
            'person' => 'required',
            'circumstance' => 'required',
            'boolVal' => 'required'
        ]);//
        
        $boolVal;

        if($request->get('boolVal') != "true"){
            if($request->get('boolVal') != "false"){
                return redirect()->back()->with('incorrect','please enter lowercase true or false');
            }
        }

        if($request->get('boolVal') == "true"){
            $boolVal = 1;
        }
        elseif($request->get('boolVal') == "false"){
            $boolVal = 0;
        }

        $scheme = new Scheme([
            'scheme_name' => 'Position to Know'
        ]);
        $scheme->save();
        $schemeid = $scheme->getkey();

        
        $postoknowvalues = new PositionToKnow([
            'person'=> $request->get('person'),
            'proposition' =>$request->get('circumstance'),
            'schemeId' => $schemeid,
            'state' => $boolVal
        ]);
        $postoknowvalues->save();
        $userId = Auth::id();
        $argument = new Argument([
            'argument_name' => $request->get('argumentName'),
            'schemeId' => $schemeid,
            'userId' => $userId,
            'votes' => 0
        ]);
        $argument->save();

        $debate_arguments = new DebateArgument([
            'argumentId' => $argument->getkey(),
            'debateId' => $debateId
        ]);
        $debate_arguments->save();

        $attackRelation1 = new Attack([
            'argumentA' => $argument->getkey(),
            'argumentB' => $argumentId
        ]);
        $attackRelation2 = new Attack([
            'argumentA' => $argumentId,
            'argumentB' => $argument->getkey()
        ]);
        $attackRelation1->save();
        $attackRelation2->save();
        return redirect()->back()->with('success','Your argument attack has been created');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

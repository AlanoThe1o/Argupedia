<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Action;
use App\Models\Debate;
use App\Models\Argument;
use App\Models\Scheme;
use App\Models\User;
use App\Models\DebateArgument;
use App\Models\Attack;
use Illuminate\Support\Facades\Auth;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    return view('action.create');//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('action.create');//
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
            'circumstance' => 'required',
            'action' => 'required',
            'goal' => 'required',
            'value' => 'required',
        ]);//
        
        $userId = Auth::id();
        $current_date_time = date('Y-m-d H:i:s');
        $debate = new Debate([
            'debate_name' => $request->get('debateName'),
            'created_at' => $current_date_time,
            'userId' => $userId
        ]);

        $scheme = new Scheme([
            'scheme_name' => 'Action'
        ]);
        $scheme->save();
        $schemeid = $scheme->getkey();

        
        $action = new Action([
            'circumstance'=>$request->get('circumstance'),
            'action'=>$request->get('action'),
            'goal'=>$request->get('goal'),
            'value'=>$request->get('value'),
            'schemeId' => $schemeid,
        ]);
        $action->save();

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
        return redirect()->route('action.create')->with('success','Debate created');
// //
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
            'circumstance' => 'required',
            'action' => 'required',
            'goal' => 'required',
            'value' => 'required',
        ]);//
        

        $scheme = new Scheme([
            'scheme_name' => 'Action'
        ]);
        $scheme->save();
        $schemeid = $scheme->getkey();

        $action = new Action([
            'circumstance'=>$request->get('circumstance'),
            'action'=>$request->get('action'),
            'goal'=>$request->get('goal'),
            'value'=>$request->get('value'),
            'schemeId' => $schemeid,
        ]);
        $action->save();
        
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

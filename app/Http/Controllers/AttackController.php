<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Argument;

class AttackController extends Controller
{
    public function schemes($debateId, $argumentId){
        return view('attack.schemes',['debate' => $debateId, 'argument' =>$argumentId]);
     }

     public function popappeal($debateId, $argumentId){
         $argument = Argument::where('id', $argumentId)->first();
        return view('attack.popop',['debate' => $debateId, 'argument' =>$argumentId, 'attacking' => $argument]);
     }

     public function action($debateId, $argumentId){
        $argument = Argument::where('id', $argumentId)->first();
        return view('attack.action',['debate' => $debateId, 'argument' =>$argumentId, 'attacking' => $argument]);
     }

     public function expop($debateId, $argumentId){
        $argument = Argument::where('id', $argumentId)->first();
        return view('attack.expop',['debate' => $debateId, 'argument' =>$argumentId, 'attacking' => $argument]);
     }

     public function postoknow($debateId, $argumentId){
        $argument = Argument::where('id', $argumentId)->first();
        return view('attack.postoknow',['debate' => $debateId, 'argument' =>$argumentId, 'attacking' => $argument]);
     }
     
}

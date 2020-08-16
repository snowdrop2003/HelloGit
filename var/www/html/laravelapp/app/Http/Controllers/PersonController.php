<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function find(Request $request)
    {
        return view('person.find', ['input'=>'']);
    }

    public function search(Request $request)
    {
        $min = $request->input * 1;
        $max = $min + 10;

        $item  = Person::ageGreaterThan($min)->ageLessThan($max)->first();
        $param = ['input'=> $request->input, 'item'=>$item];
        return view('person.find',$param);
    }
}

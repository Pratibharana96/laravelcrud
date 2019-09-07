<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pratibha;
use View;
class PratibhaController extends Controller
{
    public function index()
    {
  $prdata= Pratibha::all();
  return View::make('pratibha', compact('prdata'));
 // return view::make('pratibha');
    }


    public function edit(Request $request,$prdata)
    {
    $predit= Pratibha::find($prdata);
   // dd($predit);exit;
    return response()->json($predit);
    }
    
    //save
    public function save(Request $request)
    {
    $link= Pratibha::create($request->all());
   // dd($predit);exit;
    return response()->json($link);
    }
    //update

    public function update(Request $request,$prdata)
    {
      $link = Pratibha::find($prdata);
      $link->name = $request->name;
      $link->designation = $request->designation;
      $link->githublink = $request->githublink;
      $link->save();
      return response()->json($link);
   
    }
    //delete 
    public function delete(Request $request,$prdata)
    {
     $link= pratibha::destroy($prdata);
     return response()->json($link);
    }
}


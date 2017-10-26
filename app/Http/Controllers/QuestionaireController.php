<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Questionaire;
use Auth;
class QuestionaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['result']=Questionaire::with('questions')->get();
        
        // dd($data['result']);
        return view('questionairs/questionairs',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('questionairs.create');

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
      /*dd($request->all());*/
     $questionairs = new Questionaire;

     $questionairs->user_id_fk = Auth::user()->id;
     $questionairs->name = $request->input('name');
     $questionairs->duration = $request->input('duration');
     $questionairs->time = $request->input('time');
     $questionairs->resumeable = $request->input('resume');
     $questionairs->publish = 1;
     $questionairs->status = 1;
     

     if ($questionairs->save()) {
         return redirect('/questionairs');
     }




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
    public function update(Request $request)
    {
        // dd($request);
       $questionairs = Questionaire::find($request->input('id'));
         $questionairs->name = $request->input('name');
         $questionairs->duration = $request->input('duration');
         $questionairs->resumeable = $request->input('resume');
         $questionairs->time = $request->input('time');
        if ($questionairs->save()) {
         return redirect('/questionairs');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        /*$result=$request->input('id');*/
       $result = Questionaire::find($request->input('id'));
       
       if ($result->delete()) {
          return response()->json(['response' => 'ok','id'=>$request->input('id')]);
       }else{
        return response()->json(['response' => 'error']);
       }
     
    }
}

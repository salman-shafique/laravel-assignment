<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Questions;
use App\Answers;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $res['id']=$id;
        return view('questionairs/crud', $res);
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
       // dd('asdfasd');

        // if (isset($request->data)) {
        //     foreach ($request->data as  $result ) {
        //         $question = new Questions;
        //         $answer = new Answers;                
        //         $question->questionair_id_fk=$request->input('id');
        //         $question->question_type=$result['question_type'];
        //         $question->question=$result['question'];
        //        /* $question->save();*/
        //         if ($question->save()) {
        //             $answer->question_id_fk=$question->id;
        //             $answer->answers=$result['answer'];
        //             $answer->status=1;
        //             $answer->save();
        //         };


        //     }
        // }
        $mainData =  $request->all();
        if (isset($mainData['data'])) {
            
           
            // dd($mainData);
            foreach ($mainData['data'] as $key => $value) {
                // dd($mainData['data'][$key]['question']);
                $theQuestion = new Questions;
                $theQuestion->questionair_id_fk=(int)$request->input('questionaire_id');
                $theQuestion->question=$mainData['data'][$key]['question'];
                $theQuestion->question_type=$mainData['data'][$key]['qt'];

                if($theQuestion->save()){
                    foreach ($mainData['data'][$key]['answer'] as $key2 => $value2) {
                    $answer = new Answers();
                    $answer->question_id_fk=$theQuestion->id;
                    $answer->answers=$value2;
                    $answer->status=1;
                    $answer->save();

               }  
                }

            }
        }
         return redirect()->route('questionairs');

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

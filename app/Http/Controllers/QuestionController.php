<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $question = Question::all();
        return view('question.question', ['question' => $question]);
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
        $request->validate([
            'question'=>'required',
            'a'=>'required',
            'b'=>'required',
            'c'=>'required',
            'd'=>'required',
            'answer'=>'required',

        ]);
        $question = Question::updateOrCreate(['id' => $request->id], [
            'question' => $request->question,
            'a' => $request->a,
            'b'=>$request->b,
            'c'=>$request->c,
            'd'=>$request->d,
            'answer'=>$request->answer

        ]);

        return response()->json(
            [      'code'=>200,
                'message'=>'Question Created successfully',
                'data' => $question
            ],
            200);
    }
//    public  function  startquiz()
//    {
//        Session::put('nextq',1);
//        Session::put('wrongans',0);
//        Session::put('correctans',0);
//
//        $question = Question::all()->first();
//        return view('question.answer')->with(['question'=> $question]);
//    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        return response()->json($question);
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
        $question = Question::find($id);
        return response()->json($question);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id)->delete();

        return response()->json(
            ['success'=>'Question Deleted successfully']
        );
    }
}

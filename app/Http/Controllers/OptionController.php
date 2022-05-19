<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;
use App\Imports\OptionsImport;
use Maatwebsite\Excel\Facades\Excel;

class OptionController extends Controller
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
        //validate the request
        $this->validate($request, [
            'options' => 'required',    
            'question_id' => 'required|exists:questions,id',
            'values' => 'required',
        ]);


        $options = $request->options;
        $values = $request->values;
        $question_id = $request->question_id;

        foreach ($options as $key => $option) {
            $newOption = new Option;
            $newOption->option = $option;
            $newOption->value = $values[$key];
            $newOption->question_id = $question_id;
            $newOption->save();
        
        }

        return redirect()->back();


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
        
        $option = Option::find($id);
        $option->delete();
        return redirect()->back();
    }

    public function import( $id ) 
    {
        $question_id = $id;
        Excel::import(new OptionsImport( $question_id ), 'options.xlsx', 'admin');
        
        return redirect()->back()->with('success', 'All good!');
    }

    public function deleteAll ( Request $request )
    {
      $questionId = $request->question_id;
        Option::where('question_id', $questionId)->delete();
        return redirect()->back();
    }


}

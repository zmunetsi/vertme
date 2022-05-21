<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assessment;
use App\Models\AssessmentCategory;
use App\Exports\AssessmentsExport;
use Maatwebsite\Excel\Facades\Excel;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( 'assessment.index' );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $assessmentCategories = AssessmentCategory::all();
        return view( 'assessment.create', compact( 'assessmentCategories' ) );
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
            'title' => 'required',
            'description' => 'required',
        ]);
        //store assessment
        $assessment = new Assessment();
        $assessment->title = $request->title;
        $assessment->description = $request->description;
        $assessment->user_id = auth()->user()->id;
        $assessment->status = 1;
        $assessment->save();
        // attach assessment categories
        $assessment->categories()->attach($request->assessment_category_id);

        return redirect()->route('assessment.index')->with('success', 'Assessment created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assessment = Assessment::find($id);
        return view('assessment.show', compact('assessment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $assessmentCategories = AssessmentCategory::all();
        $assessment = Assessment::find($id);
        return view('assessment.edit', compact('assessment', 'assessmentCategories'));
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
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $assessment = Assessment::find( $id );
        $assessment->title = $request->title;
        $assessment->description = $request->description;
        $assessment->save();

        // attach assessment categories
        $assessment->categories()->sync($request->assessment_category_id);
        
        return redirect()->route('assessment.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assessment = Assessment::find( $id );
        $assessment->categories()->detach();
        $assessment->delete();
        return redirect()->back();
    }

    public function export() 
    {
        return Excel::download(new AssessmentsExport, 'assessments.xlsx');
    }

}

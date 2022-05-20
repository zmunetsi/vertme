<?php

namespace App\Http\Controllers;

use App\Models\AssessmentCategory;
use Illuminate\Http\Request;

class AssessmentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assessmentCategories = AssessmentCategory::all();
        return view('assessment.category.index', compact('assessmentCategories'));
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
    //    validate request
        $this->validate($request, [
            'categories' => 'required',
        ]);

        $categories = $request->categories;

        foreach ($categories as $category) {
            $newCategory = new AssessmentCategory;
            $newCategory->name = $category;
            $newCategory->save();
        }

        return redirect()->back()->with('success', 'Categories created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssessmentCategory  $assessmentCategory
     * @return \Illuminate\Http\Response
     */
    public function show(AssessmentCategory $assessmentCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssessmentCategory  $assessmentCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(AssessmentCategory $assessmentCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssessmentCategory  $assessmentCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssessmentCategory $assessmentCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssessmentCategory  $assessmentCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssessmentCategory $assessmentCategory)
    {
        //
    }
}

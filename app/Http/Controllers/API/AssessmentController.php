<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assessment;
use App\Models\Question;
use App\Models\Option;
use App\Models\AssessmentTrack;

class AssessmentController extends Controller
{

    
    private function calculateScore($assessment, $answers)
    {
        
        if(!$assessment) {
            return false;
        }
        $score = 0;
        // llop over object answers
        foreach( $answers as $key => $answer ) {
            $questionId = $key;
            $answerId = $answer;
            // get value for answer
            $answerValue = Option::where('id', $answerId)->first()->value;
            $score += $answerValue;
        }   
        return $score;
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //api call to get all assessments with categories
        $assessments = Assessment::with('categories')->get();
        return response()->json($assessments);
        
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
        //
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

    public function updateStatus(Request $request)
    {
        $assessmentId = $request->assessmentId;
        $status = $request->status;

        $assessment = Assessment::find($assessmentId);
        $assessment->status = $status;
        $assessment->save();
        
        if($assessment){
            return response()->json([
                'status' => 'success',
                'message' => 'Assessment status updated successfully'
            ]);
        }
        else{
            return response()->json([
                'status' => 'false',
                'message' => 'Assessment status not updated'
            ]);
        }
        
    }

    public function trackAssessment(Request $request)
    {
        $assessmentId = $request->assessmentId;
        $userId = $request->user()->id;
        $answers = $request->answers;
        return response()->json([
            'status' => 'success',
            'message' => 'Assessment tracked successfully'
        ]);
        $assessment = Assessment::find($assessmentId);
        $score = $this->calculateScore( $assessmentId, $answers);

        // if score issset and is a number
        if(isset($score) && is_numeric($score)){
            $assessmentTrack = new AssessmentTrack();
            $assessmentTrack->user_id = $userId;
            $assessmentTrack->assessment_id = $assessmentId;
            $assessmentTrack->score = $score;
            if( $assessment->pass_mark > 0){
                $assessmentTrack->completed = ($score >= $assessment->pass_mark) ? true : false;
            }
            else{
                $assessmentTrack->completed = true;
            }
            if($assessmentTrack->save()){
                return response()->json([
                        'status' => 'success',
                        'message' => 'Assessment tracked successfully',
                        'track' => $assessmentTrack      
                ]);
            }
            else{
                return response()->json([
                    'status' => 'false',
                    'message' => 'Assessment not tracked'
                ]);
            }
          
        }
        else{
            return response()->json([
                'status' => 'false',
                'message' => 'Assessment not tracked',
            ]);
        }

    }

    public function getAssessmentTrack(Request $request)
    {
       
        $userId = $request->user()->id;
        $assessmentTrack = AssessmentTrack::where('user_id', $userId)->orderBy('id', 'desc')->first();
         if($assessmentTrack){
              return response()->json([
                'status' => 'success',
                'message' => 'Assessment track found',
                'assessmentTrack' => $assessmentTrack
              ]);
         }
         else{
              return response()->json([
                'status' => 'false',
                'message' => 'Assessment track not found',
              ]);
         }
    }

    
}

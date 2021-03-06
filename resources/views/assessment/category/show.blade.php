
@extends('adminlte::page')
@section('plugins.czMore', true)

@section('title', 'Assessment')

@section('content_header')
<div class="row">
    <div class="col-md-12">
     <h1>Assessments | </h1>
    </div>
</div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">
                {{ $assessment->title }}
            </h5>
            <div class="card-body">
                <p class="card-text">{!! $assessment->description !!}</p>
            </div>
        </div>
        </div>
    </div>
<!-- collapsable card for questions -->
    <div class="row">
        <div class="col-md-12">
        <ul class="list-group">
            <!-- include the assessment partial -->
            @include('partials.assessment')
        </ul>
        </div>
    </div>
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
    <script>
        jQuery(document).ready(function($){
            $("#czContainer").czMore();
            $("#czoptionContainer").czMore();

            $('#createOptionModal').on('show.bs.modal', function(e) {

                var questionId = $(e.relatedTarget).data('question-id');
                $(e.currentTarget).find('input[name="question_id"]').val( questionId );

            });

            $('#deleteQuestionModal').on('show.bs.modal', function(e) {
                var questionId = $(e.relatedTarget).data('questionid');
                $(e.currentTarget).find('form').attr('action', '/admin/question/' + questionId);
            });

            $('#deleteOptionModal').on('show.bs.modal', function(e) {
                var optionId = $(e.relatedTarget).data('optionid');
                $(e.currentTarget).find('form').attr('action', '/admin/option/' + optionId);
            });

            $('#deleteAllQuestionModal').on('show.bs.modal', function(e) {

                var assessmentId = $(e.relatedTarget).data('assessmentid');
                $(e.currentTarget).find('input[name="assessment_id"]').val( assessmentId );

            });

            $('#deleteAllOptionModal').on('show.bs.modal', function(e) {

                var questionId = $(e.relatedTarget).data('questionid');
                $(e.currentTarget).find('input[name="question_id"]').val( questionId );

            });


        });
    </script>
@stop

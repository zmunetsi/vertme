
@extends('adminlte::page')

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
    </script>
@stop

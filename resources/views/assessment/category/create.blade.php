@extends('adminlte::page')

@section('title', 'Assessment')

@section('content_header')
<div class="row">
    <div class="col-md-12">
     <h1>Assessments | Create</h1>
    </div>
</div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- form to create asessments -->
            <form action="{{ route('assessment.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                    <!-- errors -->
                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5" placeholder="Enter description"></textarea>
                    <!-- errors -->
                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>

        </div>
    </div>
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
    <script>
    jQuery(document).ready(function($) {
        $('#description').summernote();
    });
    </script>
@stop

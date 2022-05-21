@extends('adminlte::page')

@section('title', 'Assessment')

@section('content_header')
<div class="row">
    <div class="col-md-12">
     <h1>Assessments | Edit</h1>
    </div>
</div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- form to create asessments -->
            <form action="{{ route('assessment.update', $assessment->id) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $assessment->title }}" placeholder="Enter title">
                    <!-- errors -->
                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
                <!-- categories -->
                <div class="form-group">
                    <label for="categories">Categories</label>
                    <select class="form-control" id="assessment_category_id" name="assessment_category_id[]" multiple>
                        @foreach ($assessmentCategories as $category)
                            <option value="{{ $category->id }}" {{ in_array($category->id, $assessment->categories->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <!-- errors -->
                    @if ($errors->has('assessment_category_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('assessment_category_id') }}</strong>
                        </span>
                    @endif
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5" placeholder="Enter description">
                    {{ $assessment->description }}
                    </textarea>
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

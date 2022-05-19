<!-- assessment partial -->
<!-- include createQuestionModal -->
@include('partials.modals.question')
<li class="list-group-item d-flex justify-content-between align-items-center active">
                <div>
                        Questions
                        @if($assessment->questions->count() > 0)
                        <span class="badge badge-danger badge-pill">{{ $assessment->questions->count() }}</span>
                        @else
                        <span class="badge badge-danger badge-pill">0</span>
                        @endif
                </div>
                <!-- icon to toggle modal -->
                <div class="d-flex">
                    <a class="btn" href="{{ route('question.import', $assessment->id) }}">
                    Import questions
                        <span class="badge badge-xs badge-light badge-pill">
                            <i class="fas fa-file-import"></i>
                        </span>
                    </a>
                    <button class="btn" data-toggle="modal" data-target="#createQuestionModal">
                        Add questions
                        <span class="badge badge-xs badge-danger badge-pill">
                            <i class="fas fa-plus"></i>
                        </span>
                    </button>
                    <button class="btn" data-assessmentid={{ $assessment->id }} data-toggle="modal" data-target="#deleteAllQuestionModal">
                        Delete questions
                        <span class="badge badge-xs badge-light badge-pill">
                            <i class="fas fa-trash"></i>
                        </span>
                    </button>
                </div>
</li>
<!-- include the question partial -->
@if(count($assessment->questions) > 0)  
    @foreach($assessment->questions as $question)
        @include('partials.question')
    @endforeach
@else
<!-- no questions -->
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <div>
            No questions
        </div>
    </li>
@endif




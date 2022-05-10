<!-- assessment partial -->

<li class="list-group-item d-flex justify-content-between align-items-center active">
                <div>
                        Questions
                        <span class="badge badge-xs badge-danger badge-pill">14</span>
                </div>
                <!-- icon to toggle modal -->
                <div class="d-flex">
                    <button class="btn">
                    Import questions
                        <span class="badge badge-xs badge-light badge-pill">
                            <i class="fas fa-file-import"></i>
                        </span>
                    </button>
                    <button class="btn">
                        Add questions
                        <span class="badge badge-xs badge-danger badge-pill">
                            <i class="fas fa-plus"></i>
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




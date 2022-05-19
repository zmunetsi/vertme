@include( 'partials.modals.option' )

<li class="list-group-item d-flex justify-content-between flex-column">
                <div class="d-flex justify-content-between flex-row my-3 active">
<!-- show question  -->
                    <div class="d-flex flex-column">
                        <h6 class="mb-0">{{ $question->question }}</h6>
                    </div>  
                <!-- actions to edit and delete question -->
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="#" class="btn btn-primary">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button  href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteQuestionModal" data-questionid="{{ $question->id }}" >
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center active bg-secondary">
                    <div>
                        Options
                        @if($question->options->count() > 0)
                        <span class="badge badge-primary badge-pill">{{ $question->options->count() }}</span>
                        @else
                        <span class="badge badge-primary badge-pill">0</span>
                        @endif
                </div>
                <!-- icon to toggle modal -->
                <div class="d-flex">
                <a class="btn" href="{{ route('option.import', $question->id) }}">
                    Import options
                        <span class="badge badge-xs badge-light badge-pill">
                            <i class="fas fa-file-import"></i>
                        </span>
                    </a>
                    <button class="btn" data-question-id={{ $question->id }} data-toggle="modal" data-target="#createOptionModal">
                        Add options
                        <span class="badge badge-xs badge-primary badge-pill">
                            <i class="fas fa-plus"></i>
                        </span>
                    </button>
                    <button class="btn" data-questionid={{ $question->id }} data-toggle="modal" data-target="#deleteAllOptionModal">
                        Delete options
                        <span class="badge badge-xs badge-light badge-pill">
                            <i class="fas fa-trash"></i>
                        </span>
                    </button>
                </div>
                    </li>
                <!-- if options show  -->
                @if(count($question->options) > 0)
                    @foreach($question->options as $option)
                        @include('partials.option')
                    @endforeach
                @else
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            No options
                        </div>
                    </li>
                @endif

        </ul>

 </li>
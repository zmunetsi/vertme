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
                    <a href="#" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center active bg-secondary">
                    <div>
                        Options
                        <span class="badge badge-xs badge-danger badge-pill">5</span>
                </div>
                <!-- icon to toggle modal -->
                <div class="d-flex">
                    <button class="btn">
                    Import options
                        <span class="badge badge-xs badge-light badge-pill">
                            <i class="fas fa-file-import"></i>
                        </span>
                    </button>
                    <button class="btn">
                        Add options
                        <span class="badge badge-xs badge-danger badge-pill">
                            <i class="fas fa-plus"></i>
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
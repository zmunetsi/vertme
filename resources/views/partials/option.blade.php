<li class="list-group-item">
    <div class="d-flex justify-content-between flex-row my-3">
        <!-- show muted option -->
        <div class="d-flex flex-column">
            <h6 class="mb-0 text-muted">{{ $option->option }}</h6>
            <small class="text-muted">{{ $option->value }}</small>
        </div>
        
    <!-- actions to edit and delete question -->
    <div class="btn-group" role="group" aria-label="Option actions">
        <a href="#" class="btn btn-primary">
            <i class="fas fa-edit"></i>
        </a>
        <button href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteOptionModal" data-optionid="{{ $option->id }}">
            <i class="fas fa-trash-alt"></i>
        </button>
    </div>
    </div>
</li>

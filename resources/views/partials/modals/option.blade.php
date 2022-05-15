<!-- create option modal -->
<div class="modal fade" id="createOptionModal" tabindex="-1" role="dialog" aria-labelledby="createOptionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createOptionModalLabel">Create option</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('option.store') }}" method="POST">
                    @csrf
                    <!-- hidden input for question id -->
                    <input type="hidden" name="question_id" value="{{ $question->id }}">
                    <div class="form-group">
                        <label for="option">Option</label>
                        <input type="text" class="form-control" id="option" name="options[]" placeholder="Enter option">
                        <label for="option">Value</label>
                        <input type="text" class="form-control" id="value" name="values[]" placeholder="Enter value">
                    </div>

                    <div id="czoptionContainer">
                        <div id="first">
                            <div class="recordset">
                            <div class="form-group">
                                <label for="option">Option</label>
                                <input type="text" class="form-control" id="option" name="options[]" placeholder="Enter option">
                                <label for="option">Value</label>
                                <input type="text" class="form-control" id="value" name="values[]" placeholder="Enter value">
                            </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

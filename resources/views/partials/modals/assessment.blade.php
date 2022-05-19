<!-- delete assessment modal -->
<div class="modal fade" id="deleteAssessmentModal" tabindex="-1" role="dialog" aria-labelledby="deleteAssessmentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAssessmentModalLabel">Are you sure?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="deleteAssessmentForm" action="" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="form-group">
                        <p> This assessment and its associated questions will be deleted
                    </div>
                    <button type="submit" class="btn btn-primary" data-dismiss="modal" aria-label="Close">No</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>


                   
              
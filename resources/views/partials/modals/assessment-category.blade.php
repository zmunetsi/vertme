<!-- creat category modal -->
<div class="modal fade" id="createAssessmentCategoryModal" tabindex="-1" role="dialog" aria-labelledby="createAssessmentCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createAssessmentCategoryModalLabel">Create Assessment Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="question">Name</label>
                        <input type="text" class="form-control" id="category" name="categories[]" placeholder="Enter Category">
                    </div>
               
                    <div id="czAssessmentCategoryContainer">
                        <div id="first">
                            <div class="recordset">
                            <div class="form-group">
                                <label for="question">Name</label>
                                <input type="text" class="form-control" id="category" name="categories[]" placeholder="Enter Category">
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

<!-- delete question modal -->
<div class="modal fade" id="deleteAssessmentCategoryModal" tabindex="-1" role="dialog" aria-labelledby="deleteQuestionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAssessmentCategoryModalLabel">Are you sure?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="deleteQuestionForm" action="" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="form-group">
                        <p> This question will be deleted
                    </div>
                    <button type="submit" class="btn btn-primary" data-dismiss="modal" aria-label="Close">No</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
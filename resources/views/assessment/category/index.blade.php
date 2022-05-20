@extends('adminlte::page')
@section('plugins.czMore', true)

@section('title', 'Assessment Category')

@section('content_header')
<div class="row">
    <div class="col-md-12">
     <h1>Assessments Category | </h1> 
    </div>
</div>
@stop

@section('content')
@include('partials.modals.assessment-category')
    <div class="row">
        <div class="col-md-12">
        <table style="width: 100% !important" id="assessment-category-table" class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th></th>
                </tr>
            </thead>
        </table>
        </div>
    </div>
@stop

@section('css')
<style>

</style>
@stop

@section('js')
    <script> 
    jQuery(document).ready( function ( $ ) {
        $("#czAssessmentCategoryContainer").czMore();

        $('#assessment-category-table').DataTable({
            language: {
                        "emptyTable": "No assessments categories. Start creating categories"
                        },
            dom: 'Bfrtip',
            buttons: [
                        'selectAll',
                        'selectNone',
                        {
                            text: '<i class="fa fa-import"></i> Create Category',
                            action: function ( e, dt, node, config ) {
                                $('#createAssessmentCategoryModal').modal('show'); 
                            }
                        }

                    ],
                    ajax: {
                        url: '/api/assessments/categories',
                        dataSrc: ''
                    },
                    rowId: 'id',
                    columns: [
                        { data: 'name' },
                        { data: '', render: function ( data, type, row ) {
                            return '<div class="d-flex justify-content-end"><a href="assessment/'+ row.id +'" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a><a href="assessment/'+ row.id +'/edit" class="btn btn-sm btn-secondary mx-2"><i class="fa fa-edit"></i></a><button data-assessmentid="'+ row.id +'" data-toggle="modal" data-target="#deleteAssessmentModal" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></div>';

                          }
                        }
                    ]

        });

        // 
        $('#deleteAssessmentModal').on('show.bs.modal', function(e) {
        var assessmentId = $(e.relatedTarget).data('assessmentid');
        $(e.currentTarget).find('form').attr('action', '/admin/assessment/' + assessmentId);
        });
        //
     


    } );
    </script>
    <script>
        function statusChange(){
            $this = event.target;
            var status = $this.checked ? 1 : 0;  

            var assessmentId = $($this).data('assessmentid');
            var token = $('input[name="_token"]').val();
            // add token to header

            $.ajax({
                url: '{{  route('assessment.update-status') }}',
                type: 'POST',
                data: {
                    status: status,
                    assessmentId: assessmentId
                },
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function( response ){
                    
                    if(response.status == 'success'){
                        
                        $(document).Toasts('create', {
                            title: 'Assessment Status Updated',
                            body: 'Assessment status updated successfully',
                            class: 'bg-success',
                            autohide: true,
                            delay: 3000
                        })

                    }else{
                        $(document).Toasts('create', {
                            title: 'Assessment Status Update Failed',
                            body: 'Assessment status update failed',
                            class: 'bg-danger',
                            autohide: true,
                            delay: 3000
                        })
                    }

                }
            });
        }
    </script>
@stop
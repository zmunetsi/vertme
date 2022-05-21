@extends('adminlte::page')
@section('plugins.moment', true)
@section('title', 'Assessment')

@section('content_header')
<div class="row">
    <div class="col-md-12">
     <h1>Assessments | </h1> 
    </div>
</div>
@stop

@section('content')
@include('partials.modals.assessment')
    <div class="row">
        <div class="col-md-12">
        <table style="width: 100% !important" id="assessment-table" class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Categories</th>
                    <th>Status</th>
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
        $('#assessment-table').DataTable({
            language: {
                        "emptyTable": "No assessments created yet. Start creating assessments"
                        },
            dom: 'Bfrtip',
            buttons: [
                        'selectAll',
                        'selectNone',
                        {
                            text: '<i class="fa fa-import"></i> Export Assessments',
                            action: function ( e, dt, node, config ) {
                                window.location.href = "{{ route('assessment.export') }}";
                                
                            }
                        },
                        {
                            text: '<i class="fa fa-import"></i> Create Assessment',
                            action: function ( e, dt, node, config ) {
                                window.location.href = "{{ route('assessment.create') }}";
                                
                            }
                        }

                    ],
                    ajax: {
                        url: '/api/assessments',
                        dataSrc: ''
                    },
                    rowId: 'id',
                    columns: [
                        { data: 'title' },
                        { data: 'description' },
                        { data: '', render:  function ( data, type, row){
                            return moment(row.created_at).format('MMMM Do YYYY, h:mm:ss a');
                        } },
                        { data: '',
                            render: function ( data, type, row ) {
                                var categories = row.categories;
                                var category_string = "";
                                for (var i = 0; i < categories.length; i++) {
                                    category_string += '<span class="badge badge-primary mr-2">' + categories[i].name + '</span>';
                                }
                                return category_string;
                            }
                         },
                        { data: '', render: function ( data, type, row ) {
                            // return form to update status
                            var statusChecked = row.status == 1 ? 'checked' : '';
                            return '<form action="/assessment/'+row.id+'/status" method="POST">'+
                            '<input type="hidden" name="_token" value="{{ csrf_token() }}">'+
                            '<div class="custom-control custom-switch">'+
                            '<input data-assessmentid="'+ row.id +'" onchange="statusChange();" type="checkbox" class="custom-control-input assessment-status" id="assessment-status-'+ row.id + '" ' + statusChecked +'>'+
                            '<label class="custom-control-label assessment-status-label" for="assessment-status-'+row.id + '"></label>'+
                            '</div>'+
                            '</form>';
                        } },
                        { data: '', render: function ( data, type, row ) {
                            return '<div class="d-flex justify-content-around"><a href="assessment/'+ row.id +'" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a><a href="assessment/'+ row.id +'/edit" class="btn btn-sm btn-secondary mx-2"><i class="fa fa-edit"></i></a><button data-assessmentid="'+ row.id +'" data-toggle="modal" data-target="#deleteAssessmentModal" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></div>';

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
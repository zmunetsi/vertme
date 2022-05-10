@extends('adminlte::page')

@section('title', 'Assessment')

@section('content_header')
<div class="row">
    <div class="col-md-12">
     <h1>Assessments | </h1> 
    </div>
</div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
        <table style="width: 100% !important" id="assessment-table" class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
        </table>
        </div>
    </div>
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
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
                            text: '<i class="fa fa-import"></i> Import Assessments',
                            action: function ( e, dt, node, config ) {
                                
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
                        { data: 'created_at' },
                        { data: '', render: function ( data, type, row ) {
                            if(row.status == 1) {
                                return '<span class="badge badge-success">Active</span>';
                            } else {
                                return '<span class="badge badge-danger">Inactive</span>';
                            }
                        } },
                        { data: '', render: function ( data, type, row ) {
                            return '<a href="assessment/'+ row.id +'" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>';

                          }
                        }
                    ]

        });
    } );
    </script>
@stop
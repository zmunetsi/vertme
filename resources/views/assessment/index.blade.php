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
                                
                            }
                        }

                    ],
                    ajax: { 
                        url: 'api/assessment',
                        type: 'GET',
                        dataType: 'json',
                        dataSrc: function( json){
                            console.log( json );
                            return json;
                        }

                    },
                    rowId: 'id',
                    columns: [
                        { "data": "id" },
                        { "data": "name"},
                        { "data": "description"},
                        { "data": "" }
                    ]

        });
    } );
    </script>
@stop
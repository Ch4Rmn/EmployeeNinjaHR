@extends('layouts.app')

@section('title', 'Employee Index Page')

@section('customCss')
    <style>
        /* Add custom styles here if needed */
    </style>
@endsection

@section('content')
    <div class="">
        {{-- @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif --}}
        @if (session('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

    </div>


    <div class="container-fluid">
        <div class="">
            <div class="card-header text-center">
                <h3>Employee Users</h3>

            </div>
            {{--  --}}
            <div class="row my-3">

                {{-- <div class="col-1"><a href="{{ route('employee.create') }}" class="btn btn-primary"><i --}}
                <div class="col-1"><a href="{{ url('employee/create') }}" class="btn btn-primary"><i
                            class="fa-solid fa-plus-circle mx-2"></i>Create</a>
                </div>
                {{-- <div class="col-1"><a href="" class="btn btn-danger">Create</a></div> --}}
            </div>


            {{--  --}}
            {{-- {{ $dataTable->table(['id' => 'employeeTable', 'class' => 'table table-striped table-bordered table-success']) }} --}}
            <table class="table table-striped table-warning border p-3 nowrap" style="width:100%" id="table">
                <div class="text-start mt-2">
                    <span class=" mt-3" id="dateRange">
                        <button class="btn border p-3">
                            <i class="fa-solid fa-calendar-days"></i>&nbsp;<span></span><i
                                class="fa fa-caret-down ms-2"></i>
                        </button>
                    </span>
                </div>
                <div class="card-body" style="">
                    {{--  --}}


                    {{-- Total - {{ count($users) }} --}}
                    <thead class="">
                        <tr>
                            <th>id</th>
                            <th class="" style="cursor: pointer">img</th>
                            <th>name</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>employee_id</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                            <th>is_present</th>
                            <th>department_name</th>
                            <th>action</th>
                        </tr>
                    </thead>
            </table>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {

            //
            @if (session('success'))
                Swal.fire({
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'Cool'
                })
            @else
            @endif

            // Set default to this month
            // var start_date = moment().startOf('month'); // First day of this month
            // var end_date = moment().endOf('day'); // End of today

            // // Set the initial date range display
            // $('#dateRange span').html(start_date.format('MMMM D, YYYY') + ' - ' + end_date.format('MMMM D, YYYY'));

            // // Initialize date range picker
            // $('#dateRange').daterangepicker({
            //     startDate: start_date,
            //     endDate: end_date,
            //     ranges: {
            //         'Today': [moment().startOf('day'), moment().endOf('day')],
            //         'Yesterday': [moment().subtract(1, 'days').startOf('day'), moment().subtract(1, 'days')
            //             .endOf('day')
            //         ],
            //         'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            //         'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            //         'This Month': [moment().startOf('month'), moment().endOf('month')],
            //         'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
            //             'month').endOf('month')]
            //     }
            // }, function(start, end) {
            //     start_date = start;
            //     end_date = end;
            //     $('#dateRange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
            //         'MMMM D, YYYY'));
            //     table.draw();
            // });
            $.fn.dataTable.ext.buttons.refresh = {
                text: 'Refresh',
                action: function(e, dt, node, config) {
                    dt.clear().draw();
                    dt.ajax.reload(null, false); // Reloads data without resetting pagination
                }
            };

            // Initialize DataTable
            var table = $('#table').DataTable({
                // responsive: true,
                ajax: {
                    url: '{!! route('ssd') !!}',
                    // data: function(d) {
                    //     d.start_date = start_date.format('YYYY-MM-DD');
                    //     d.end_date = end_date.format('YYYY-MM-DD');
                    // }
                },
                order: [
                    // sorting array -> array start 0
                    [0, 'desc']
                ],
                // dom: 'Bfrtip',

                layout: {
                    topStart: {
                        buttons: ['copy',
                            'csv',
                            'excel',
                            'pdf',
                            'print',
                            'colvis', // Show/hide columns
                            'pageLength', // Change page length
                            'selectAll', // Select all rows
                            'selectNone', // Deselect all rows
                            'refresh'
                        ]
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'img',
                        name: 'img'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'employee_id',
                        name: 'employee_id'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    },
                    {
                        data: 'is_present',
                        name: 'is_present'
                    },
                    {
                        data: 'department_name',
                        name: 'department_name'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },

                ],
                columnDefs: [{
                    target: 6,
                    visible: false,
                    searchable: false
                }],

                // processing: "<p>...Loading...</p>",

                // processing: "<img src='{{ asset('images/Ripple@1x-1.0s-200px-200px.png') }}'></img>",

            });
        });
    </script>
    {{-- {{ $dataTable->scripts(attributes: ['type' => 'module']) }} --}}
@endsection

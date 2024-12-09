@extends('layouts.app')

@section('title', 'Employee Index Page')

@section('customCss')
    <style>
        /* Add custom styles here if needed */
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="">
            <div class="card-header text-center">
                <h3>Employee Users</h3>
            </div>
            {{--  --}}

            {{--  --}}
            {{-- {{ $dataTable->table(['id' => 'employeeTable', 'class' => 'table table-striped table-bordered table-success']) }} --}}
            <table class="table table-striped table-warning border p-3" id="table">
                <div class="text-start mt-2">
                    <span class=" mt-3" id="dateRange">
                        <button class="btn border p-3">
                            <i class="fa-solid fa-calendar-days"></i>&nbsp;<span></span><i class="fa fa-caret-down ms-2"></i>
                        </button>
                    </span>
                </div>
                <div class="card-body" style="">
                    {{--  --}}


                    {{-- Total - {{ count($users) }} --}}
                    <thead class="">
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>employee_id</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                            <th>is_present</th>
                            <th>department_name</th>
                        </tr>
                    </thead>
            </table>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            var start_date = moment().subtract(1, 'M').startOf('day');
            var end_date = moment().endOf('day');
            $('#dateRange span').html(start_date.format('MMMM D, YYYY') + '-' + end_date.format('MMMM D, YYYY'));
            $('#dateRange').daterangepicker({
                startDate: start_date,
                endDate: end_date,
                ranges: {
                    'Today': [moment().startOf('day'), moment().endOf('day')],
                    'Yesterday': [moment().subtract(1, 'days').startOf('day'), moment().subtract(1, 'days')
                        .endOf('day')
                    ],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                }
            }, function(start, end) {
                start_date = start;
                end_date = end;
                $('#dateRange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                    'MMMM D, YYYY'));
                table.draw();
            });
            var table = $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{!! route('ssd') !!}',
                    data: function(d) {
                        d.start_date = start_date.format('YYYY-MM-DD');
                        d.end_date = end_date.format('YYYY-MM-DD');
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id'
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
                    }, {
                        data: 'is_present',
                        name: 'is_present'
                    }, {
                        data: 'department_name',
                        name: 'department_name'
                    }

                ],
            });
        });
    </script>
    {{-- {{ $dataTable->scripts(attributes: ['type' => 'module']) }} --}}
@endsection

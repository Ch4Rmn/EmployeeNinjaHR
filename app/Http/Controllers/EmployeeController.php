<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\DataTables\UsersDataTable;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UsersDataTable $dataTable)
    {
        //

        // $data = User::with('department')
        //     ->whereHas('department', function ($query) {
        //         $query->where('id', auth()->user()->department_id); // သက်ဆိုင်သော department_id ကို ထည့်သွင်းပါ။
        //     })->get();

        // dd($data);
        // dd($dataTable);
        return $dataTable->render('employee.index');
    }

    public function ssd(Request $request)
    {
        try {

            $employees = User::query();

            // dd($employees);
            // Apply date range filter if both start_date and end_date are provided
            if ($request->filled('start_date') && $request->filled('end_date')) {
                $employees->whereBetween('created_at', [
                    $request->start_date,
                    $request->end_date,
                ]);
            }
            $employees->whereNotIn('name', ['admin', 'admin2']);

            return Datatables::of($employees)
                ->addColumn('department_name', function ($each) {
                    return $each->department ? $each->department->name : 'NULL';
                })
                ->make(true);
        } catch (\Throwable $th) {
            Log::error('Error fetching employees: ' . $th->getMessage(), [
                'trace' => $th->getTraceAsString(),
            ]);
            return response()->json([
                'message' => 'An error occurred while fetching employees.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

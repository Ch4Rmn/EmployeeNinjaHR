<?php

namespace App\Http\Controllers;

use App\Utility;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\DataTables\UsersDataTable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EmployeeRequest;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Http\Requests\EmployeeUpdateRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UsersDataTable $dataTable)
    {
        //
        // $employees = User::with('department');
        // dd($employees);
        // $data = User::with('department')->get();

        // ->whereHas('department', function ($query) {
        //     $query->where('id', auth()->user()->department_id); // သက်ဆိုင်သော department_id ကို ထည့်သွင်းပါ။
        // })->get();

        // dd($data);
        // dd($dataTable);
        return $dataTable->render('employee.index');
    }

    public function ssd(Request $request)
    {
        try {
            $employees = User::with('department');

            // Apply date range filter if both start_date and end_date are provided
            // if ($request->filled('start_date') && $request->filled('end_date')) {
            //     $employees->whereBetween('created_at', [
            //         $request->start_date,
            //         $request->end_date,
            //     ]);
            // }

            $employees->whereNotIn('name', ['admin', 'admin2']);

            return Datatables::of($employees)
                ->addColumn('department_name', function ($employee) {
                    return $employee->department ? $employee->department->name : 'NULL';
                })
                ->addColumn('action', function ($employee) {
                    $editUrl = route('employee.edit', $employee->id); // Replace with your edit route
                    $showUrl = route('employee.show', $employee->id);
                    $deleteUrl = route('employee.destroy', $employee->id); // Replace with your delete route

                    return "
                    <div class='d-flex justify-content-around'>
                        <a href='{$editUrl}' class='btn btn-sm btn-primary' >
                            <i class='fas fa-edit'></i> Edit
                        </a>
                         <a href='{$showUrl}' class='btn btn-sm btn-info' >
                            <i class='fas fa-user'></i> Show
                        </a>
                        <form action='{$deleteUrl}' method='POST' onsubmit='return confirm(\"Are you sure you want to delete this employee?\")' style='display:inline-block;'>
                            " . csrf_field() . "
                            " . method_field('DELETE') . "
                            <button type='submit' class='btn btn-sm btn-danger'>
                                <i class='fas fa-trash'></i> Delete
                            </button>
                        </form>
                    </div>
                    ";
                })
                ->editColumn('is_present', function ($employee) {
                    if ($employee->is_present == 1) {
                        return "<span class='text-center shadow badge badge-success badge-pill'>Active</span>";
                    } else {
                        return "<span class='text-center shadow badge badge-danger badge-pill'>Ban</span>";
                    }
                })
                ->rawColumns(['is_present', 'action']) // Add 'action' to rawColumns
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
        $departments = Department::all();
        // dd($departments);
        return view('employee.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        DB::connection()->enableQueryLog();
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;
        $validator = $request->validated();
        $validator['github_id'] = $user_id;
        $validator['employee_id'] = $user_id;
        $validator['created_by'] = $user_name;
        $validator['updated_by'] = $user_name;
        $validator['deleted_by'] = $user_name;
        // dd($validator);
        $employee = User::create($validator);
        $queryLog = DB::getQueryLog();
        // dd($queryLog);
        Utility::saveDebugLog("EmployeeController::store", $queryLog);
        // dd($employee);
        if ($employee) {
            return view('employee.index');
        } else {
            return back();
        }
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $departments = Department::all();
        $employee = User::with('department')->find($id);
        if ($employee) {
            // dd($employee);
            return view('employee.edit', compact('employee', 'departments'));
        } else {
            return 'no';
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeUpdateRequest $request, string $id)
    {
        $validator = $request->validated();
        // dd($validator);
        if ($validator) {
            $employee = User::findOrFail($id);
            $employee->update($validator);
            // dd(true);
            Debugbar::info($employee);
            return redirect()->route('employee.index')->with('success', 'update success!');
            // $employee = User::findOrFail($id);
            // dd($employee);
        } else {
            dd(false);
        }
        // dd($request->all());
        // $employee = User::findOrFail($id);
        // if($employee->update())

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $employee = User::findOrFail($id);
            $employee->delete();
            // $employee->forceDelete();
            return redirect()->route('employee.index')->with('success', 'Employee deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting employee: ' . $e->getMessage());
            return redirect()->route('employee.index')->with('error', 'Error deleting employee.');
        }
    }
}


// ///
// <?php

// namespace App\Http\Controllers;

// use App\Models\Product;
// use Illuminate\Http\Request;
// use App\Http\Requests\ProductRequest;
// use App\Http\Requests\ProductUpdateRequest;
// use App\Http\Resources\ProductResource;
// use Illuminate\Support\Facades\Storage;

// class ProductController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         //
//         $product = Product::with('user')->latest()->paginate(5);
//         return $this->successResponse($product, "Product List");
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         //

//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(ProductRequest $request)
//     {
//         //
//         $validator = $request->validated();

//         if ($request->hasFile('image')) {
//             $file = $request->file('image');
//             $imgName = uniqid() . '_' . date('Y-m-d H:i:s') . '_' . $file->getClientOriginalName();
//             $path = $request->file('image')->storeAs('public/uploads', $imgName);
//             $validator['image'] = $imgName;
//         }
//         // $validator['user_id'] = auth()->user()->id;

//         $product = Product::create($validator);
//         if ($product) {
//             return $this->successResponse($product, 'Success! Data with Store');
//         } else {
//             return $this->errorResponse('Error! Empty data with Store');
//         }
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(Product $product)
//     {
//         if ($product = $product->with('user')) {
//             return $this->successResponse($product, 'Product With Id');
//         } else {
//             return $this->errorResponse('Error! Product With Id');
//         }
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(Product $product)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(ProductUpdateRequest $request, Product $product)
//     {
//         //
//         $validation = $request->validated();

//         if ($request->hasFile('image')) {
//             $file = $request->file('image');
//             $imgName = uniqid() . '_' . date('Y-m-d H:m:i') . '_' . $file->getClientOriginalName();
//             $path = $request->file('image')->storeAs('public/uploads', $imgName);
//             $validatedData['image'] = $imgName;

//             if (Storage::exists('public/uploads/' . $product->image)) {
//                 Storage::delete('public/uploads/' . $product->image);
//             }
//         }
//         // $updated = $product->update($validation);
//         if ($product->update($validation)) {
//             return $this->successResponse($product, 'Success! Data updated successfully');
//         } else {
//             return $this->errorResponse('Error! Unable to update data');
//         }
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(Product $product)
//     {
//         //
//         if ($product) {
//             if (Storage::exists($product->image)) {
//                 Storage::delete('public/uploads/' . $product->image);
//             }
//             $product->delete();
//             return $this->successResponse($product, 'Delete done');
//         } else {
//             return $this->errorResponse('update error');
//         }
//     }

//     public function search(Request $request, $keyword)
//     {
//         $product = Product::with('user')->where('name', 'LIKE', '%' . $keyword . '%')
//             ->orWhere('description', 'LIKE', '%' . $keyword . '%')
//             ->orWhere('price', 'LIKE', '%' . $keyword . '%')
//             ->orWhere('type', 'LIKE', '%' . $keyword . '%')
//             ->get();
//         if ($product) {
//             return $this->successResponse($product, 'Search done');
//         } else {
//             return $this->errorResponse('Search error');
//         }
//     }
// }

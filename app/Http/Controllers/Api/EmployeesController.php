<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Resources\SingleEmployeeResource;

class EmployeesController extends Controller
{
    public function store(StoreEmployeeRequest $request){

        Employee::create($request->validated());

        return response()->json('success');
    }

    public function index(){

        return EmployeeResource::collection(Employee::all());
    }

    public function edit(Employee $employee){

        return new SingleEmployeeResource($employee);
    }

    public function update(StoreEmployeeRequest $request, Employee $employee){

        $employee->update($request->validated());

        return response()->json('Updated');
    }

    public function destroy(Employee $employee){

        $employee->delete();

        return response()->json('Deleted');
    }
}

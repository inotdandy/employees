<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;

class EmployeesController extends Controller
{
    public function store(StoreEmployeeRequest $request){

        Employee::create($request->validated());

        return response()->json('success');
    }
}

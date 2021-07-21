<?php

namespace App\Http\Controllers\Api;

use App\Models\State;
use App\Models\Country;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeesDataController extends Controller
{
    public function getCountries(){

        $countries = Country::all();

        return response()->json($countries, 200);
    }

    public function getStates(Country $country){
        
        return response()->json($country->states, 200);
    }

    public function getCities(State $state){

        return response()->json($state->cities, 200);
    }

    public function getDepartments(){

        return response()->json(Department::all(), 200);
    }
}

<?php

namespace App\Http\Controllers;

use Nnjeim\World\Models\State;
use Nnjeim\World\Models\City;
use Nnjeim\World\Models\Country;

class LocationController extends Controller
{
    public function getStates($countryId)
    {
        $states = State::where('country_id', $countryId)->get(['id', 'name']);
        return response()->json($states);
    }

    public function getCities($stateId)
    {
        $cities = City::where('state_id', $stateId)->get(['id', 'name', 'postal_code']);
        return response()->json($cities);
    }

    public function index()
    {
        $countries = Country::all();
        return view('config.countries', compact('countries'));
    }
}

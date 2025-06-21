<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Patient;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Random\RandomError;
use RealRashid\SweetAlert\Facades\Alert;
use Nnjeim\World\Models\Country;
use Nnjeim\World\World;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    public function get_doctor(Request $request)
    {
        $id_special = $request->id_special;
        $doctors = User::where('Specialization', $id_special)->get();

        $opt = "<option value=''>Select Doctor</option>";
        foreach ($doctors as $doctor) {
            $opt .= "<option value='$doctor->id'>$doctor->name</option>";
        }

        echo $opt;
    }

    public function check()
    {
        $searchdata = "";
        return view('check-appointment', compact('searchdata'));
    }

    public function searchAppointment(Request $request)
    {
        $searchdata = $request->searchdata;

        $appointments = Appointment::where('AppointmentNumber', 'like', "$searchdata%")
            ->orWhere('Name', 'like', "$searchdata%")
            ->orWhere('MobileNumber', 'like', "$searchdata%")
            ->get();

        return view('check-appointment', compact('appointments', 'searchdata'));
    }

    public function newAppointment()
    {
        $appointments = Appointment::where('Status', 'NULL')->where('Doctor', Auth::user()->id)->get();
        return view('doctor.appointment.newAppointment.index', compact('appointments'));
    }

    public function cancelAppointment()
    {
        $appointments = Appointment::where('Status', 'Cancelled')->where('Doctor', Auth::user()->id)->get();
        return view('doctor.appointment.cancelAppointment.index', compact('appointments'));
    }

    public function aprvAppointment()
    {
        $appointments = Appointment::where('Status', 'Approved')->where('Doctor', Auth::user()->id)->get();
        return view('doctor.appointment.apprvAppointment.index', compact('appointments'));
    }

    public function allAppointment()
    {
        $appointments = Appointment::where('Doctor', Auth::user()->id)->get();
        return view('doctor.appointment.allAppointment.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();

        return view('patients.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'date_of_birth' => 'required|date',
            'gender'     => 'nullable|in:male,female,other',
            'email'      => 'nullable|email|max:150',
            'phone'      => 'nullable|string|max:20',
        ]);

        // ✅ Secure, unique, non-identifiable MRN
        $medicalRecordNumber = 'MRN-' . Str::upper(Str::random(4)) . '-' . rand(1000, 9999); // e.g., MRN-XKJL-8372

        $p = Patient::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address_line1' => $request->address,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'medical_record_number' => $medicalRecordNumber
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $patient = Patient::findorFail($id);
        return view('patients.show', compact('patient'));
    }

    public function searchPage()
    {
        $searchdata = "";
        return view('doctor.search.index', compact('searchdata'));
    }

    public function searchResult(Request $request)
    {
        $searchdata = $request->searchdata;

        $appointments = Appointment::where('AppointmentNumber', 'like', "$searchdata%")
            ->orWhere('Name', 'like', "$searchdata%")
            ->orWhere('MobileNumber', 'like', "$searchdata%")
            ->get();

        return view('doctor.search.index', compact('appointments', 'searchdata'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $countries = Country::all();
        $patient = Patient::findorFail($id);

        return view('patients.edit', compact('patient', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'gender' => 'nullable|in:male,female,other',
            'date_of_birth' => 'nullable|date|before:today',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:150',
            'address_line1' => 'nullable|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'emergency_contact_name' => 'nullable|string|max:100',
            'emergency_contact_phone' => 'nullable|string|max:20',
        ]);

        $patient = Patient::findorFail($id);

        // Update the patient
        $patient->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'gender' => $validated['gender'],
            'date_of_birth' => $validated['date_of_birth'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'address_line1' =>  $validated['address_line1'],
            'address_line2' =>  $validated['address_line2'],
            'emergency_contact_name' => $validated['emergency_contact_name'],
            'emergency_contact_phone' => $validated['emergency_contact_phone'],
            'updated_by' => Auth::id(),
        ]);

        return to_route('patients');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);

        $patient->delete();

        return redirect()->route('patients');
    }
}

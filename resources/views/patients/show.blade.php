@extends('layouts.doctor', ['title' => ' Details Appointment'])

@section('content')
<div class="row">
    <!-- DOM dataTable -->
    <div class="col-md-12">
        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title" style="color: blue">Appointment Details</h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">
                <div class="table-responsive">

                    <table border="1" class="table table-bordered mg-b-0">
                        <tr>
                            <th>Patient name</th>
                            <td>{{ $patient->first_name }} {{ $patient->last_name }}</td>
                            <th>Medical Record Number</th>
                            <td>{{ $patient->medical_record_number }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{ $patient->gender }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $patient->email }}</td>
                            <th>Mobile Number</th>
                            <td>{{ $patient->phone }}</td>
                        </tr>
                        <tr>
                            <th>Address 1</th>
                            <td>{{ $patient->address_line1 }}</td>
                            <th>Address 2</th>
                            <td>{{ $patient->address_line2 }}</td>
                        </tr>
                        <tr>
                            <th>City & Postal code</th>
                            <td>{{ $patient->city }} {{$patient->postal_code}}</td>
                            <th>State & Country</th>
                            <td>{{ $patient->state }} {{$patient->country}}</td>
                        </tr>
                        <tr>
                            <th>Insurance Provider</th>
                            <td>{{ $patient->insurance_provider }}</td>
                            <th>Insurance Policy Number</th>
                            <td>{{ $patient->insurance_policy_number }}</td>
                        </tr>
                        <tr>
                            <th>Allergies</th>
                            <td>{{ $patient->allergies }}</td>
                            <th>Existing Conditions</th>
                            <td>{{ $patient->existing_conditions }}</td>
                        </tr>
                        <tr>
                            <th>Emergency Contact Name</th>
                            <td>{{ $patient->emergency_contact_name }}</td>
                            <th>Emergency Contact Phone</th>
                            <td>{{ $patient->emergency_contact_phone }}</td>
                        </tr>
                    </table>
                    <br>

                    @if ($patient->Status == '')
                    <p align="center" style="padding-top: 20px">
                        <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal"
                            data-target="#myModal">Take Action</button>
                    </p>
                    @endif
                </div>
            </div><!-- .widget -->
        </div><!-- END column -->
    </div><!-- .row -->

</div>
@endsection

@extends('layouts.doctor', ['title' => ' Details Patient'])

@section('content')
<div class="row">
    <!-- DOM dataTable -->
    <div class="col-md-12">
        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title" style="color: blue">Patient Details</h4>
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

                    <div class="d-flex justify-content-center gap-2 pt-3 flex-wrap">
                        <a href="{{ route('patients') }}" class="btn btn-primary btn-sm">View all</a>
                        <a href="{{ route('patients.edit',$patient->id) }}" class="btn btn-success btn-sm">Edit</a>
                        <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression de ce patient ?');" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div><!-- .widget -->
        </div><!-- END column -->
    </div><!-- .row -->

</div>
@endsection

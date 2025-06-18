@extends('layouts.doctor', ['title' => ' All Patients'])

@section('content')
<div class="row">
    <!-- DOM dataTable -->
    <div class="col-md-12">
        <div class="widget">
            <header class="widget-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="widget-title mb-0">All Patients</h4>
                    <x-primary-button>New patient</x-primary-button>
                </div>
            </header>

            <!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Appointment Number</th>
                                <th>Patient Name</th>
                                <th>Mobile Number</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @if ($patients != null || $patients != 0)
                            @foreach ($patients as $patient)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $patient->AppointmentNumber }}</td>
                                <td>{{ $patient->Name }}</td>
                                <td>{{ $patient->MobileNumber }}</td>
                                <td>{{ $patient->Email }}</td>

                                @if ($patient->Status == '')
                                <td>Not Updated Yet</td>
                                @else
                                <td>{{ $patient->Status }}</td>
                                @endif

                                <td><a href="{{ route('detailAppointment.show', [$patient->id, $patient->AppointmentNumber]) }}"
                                        class="btn btn-primary">View</a></td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="8"> No record found against this search</td>
                            </tr>
                            @endif

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>S.No</th>
                                <th>Appointment Number</th>
                                <th>Patient Name</th>
                                <th>Mobile Number</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->


</div><!-- .row -->
@endsection

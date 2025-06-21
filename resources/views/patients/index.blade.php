@extends('layouts.doctor', ['title' => ' All Patients'])

@section('content')
<div class="row">
    <!-- DOM dataTable -->
    <div class="col-md-12">
        <div class="widget">
            <header class="widget-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="widget-title mb-0">All Patients</h4>
                    <a href="{{ route('patients.create') }}" class="btn btn-secondary">New patient</a>
                </div>
            </header>

            <!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                        <thead>
                            <tr>
                                <th>Medical Record Number</th>
                                <th>Patient Name</th>
                                <th>Mobile Number</th>
                                <th>Email</th>
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
                                <td>{{$patient->medical_record_number }}</td>
                                <td>{{ $patient->first_name }} {{$patient->last_name}}</td>
                                <td>{{ $patient->phone }}</td>
                                <td>{{ $patient->email }}</td>
                                <td>
                                    <a href="{{ route('patients.show',$patient->id) }}" class="btn btn-primary btn-sm">View</a>
                                    <a href="{{ route('patients.edit',$patient->id) }}" class="btn btn-success btn-sm">Edit</a>
                                    <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression de ce patient ?');" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
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
                                <th>Medical Record Number</th>
                                <th>Patient Name</th>
                                <th>Mobile Number</th>
                                <th>Email</th>
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

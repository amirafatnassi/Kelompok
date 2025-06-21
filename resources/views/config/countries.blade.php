@extends('layouts.doctor', ['title' => ' All Countries'])

@section('content')
<div class="row">
    <!-- DOM dataTable -->
    <div class="col-md-12">
        <div class="widget">
            <header class="widget-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="widget-title mb-0">All Countries</h4>
                </div>
            </header>

            <!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ISO2</th>
                                <th>Name</th>
                                <th>Phone Code</th>
                                <th>ISO3</th>
                                <th>Region</th>
                                <th>Sub region</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if ($countries != null || $countries != 0)
                            @foreach ($countries as $country)
                            <tr>
                                <td>{{$country->id }}</td>
                                <td>{{ $country->iso2 }}</td>
                                <td>{{ $country->name }}</td>
                                <td>{{ $country->phone_code }}</td>
                                <td>{{ $country->iso3 }}</td>
                                <td>{{ $country->region }}</td>
                                <td>{{ $country->subregion }}</td>
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
                                <th>ID</th>
                                <th>ISO2</th>
                                <th>Name</th>
                                <th>Phone Code</th>
                                <th>ISO3</th>
                                <th>Region</th>
                                <th>Sub region</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->


</div><!-- .row -->
@endsection

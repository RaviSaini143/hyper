@extends('layouts.detached', ['title' => 'Vector Maps'])

@section('css')
    @vite(['node_modules/jsvectormap/dist/jsvectormap.min.css'])
@endsection

@section('content')
    @include('layouts.shared/page-title', ['page_title' => 'Vector Maps', 'sub_title' => 'Maps'])

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">World Vector Map</h4>
                    <div id="world-map-markers" style="height: 360px"></div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Markers Line Vector Map</h4>
                    <div id="world-map-markers-line" style="height: 360px"></div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">India Vector Map</h4>
                    <div id="india-vector-map" style="height: 360px"></div>
                </div> <!-- end card-body-->
            </div> <!-- card end -->
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Canada Vector Map</h4>

                    <div id="canada-vector-map" style="height: 360px"></div>
                </div> <!-- end card-body-->
            </div> <!-- card end -->
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Russia Vector Map</h4>

                    <div id="russia-vector-map" style="height: 360px"></div>
                </div> <!-- end card-body-->
            </div> <!-- card end -->
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">US Vector Map</h4>
                    <div id="usa-vector-map" style="height: 360px"></div>
                </div> <!-- end card-body-->
            </div> <!-- card end -->
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Iraq Vector Map</h4>

                    <div id="iraq-vector-map" style="height: 360px"></div>
                </div> <!-- end card-body-->
            </div> <!-- card end -->
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Spain Vector Map</h4>
                    <div id="spain-vector-map" style="height: 360px"></div>
                </div> <!-- end card-body-->
            </div> <!-- card end -->
        </div>
    </div>
@endsection

@section('script')
    <!-- Vector Maps Demo js -->
    @vite(['resources/js/pages/demo.vector-maps.js'])
@endsection

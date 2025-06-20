@extends('layouts.detached', ['title' => 'Google Maps'])

@section('css')
@endsection

@section('content')
@include('layouts.shared/page-title',['page_title' => 'Google Maps','sub_title' => 'Maps'])

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Basic Google Map</h4>
                <div id="gmaps-basic" class="gmaps"></div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Markers Google Map</h4>
                <div id="gmaps-markers" class="gmaps"></div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<!-- end row-->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Street View Panoramas Google Map</h4>
                <div id="panorama" class="gmaps"></div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Google Map Types</h4>
                <div id="gmaps-types" class="gmaps"></div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<!-- end row-->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Ultra Light with Labels</h4>
                <div id="ultra-light" class="gmaps"></div>
            </div>
            <!-- end card-body-->
        </div>
        <!-- end card-->
    </div>
    <!-- end col-->
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                    <h4 class="header-title mb-3">Dark</h4>
                <div id="dark" class="gmaps"></div>
            </div>
            <!-- end card-body-->
        </div>
        <!-- end card-->
    </div>
    <!-- end col-->
</div>
<!-- end row-->
@endsection

@section('script')
    <!-- Google Maps API -->
    <script src="https://maps.google.com/maps/api/js"></script>
    @vite(['resources/js/pages/demo.google-maps.js'])
@endsection

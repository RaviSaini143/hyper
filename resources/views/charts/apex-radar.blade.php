@extends('layouts.detached', ['title' => 'Apex Radar'])

@section('css')
@endsection

@section('content')
    @include('layouts.shared/page-title', ['sub_title' => 'Apex', 'page_title' => 'Radar Charts'])

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Basic Radar Chart</h4>
                    <div dir="ltr">
                        <div id="basic-radar" class="apex-charts" data-colors="#727cf5"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->
        </div>
        <!-- end col-->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Radar with Polygon-fill</h4>
                    <div dir="ltr">
                        <div id="radar-polygon" class="apex-charts" data-colors="#FF4560"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->
        </div>
        <!-- end col-->
    </div>
    <!-- end row-->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Radar – Multiple Series</h4>
                    <div dir="ltr">
                        <div id="radar-multiple-series" class="apex-charts" data-colors="#727cf5,#02a8b5,#fd7e14"></div>
                        <div class="text-center mt-2">
                            <button id="update-radar-chart" class="btn btn-sm btn-primary">Update</button>
                        </div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->
        </div>
        <!-- end col-->
    </div>
    <!-- end row-->
@endsection

@section('script')
    @vite(['resources/js/pages/demo.apex-radar.js'])
@endsection

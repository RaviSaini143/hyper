@extends('layouts.detached', ['title' => 'Apex Polar'])

@section('css')
@endsection

@section('content')
    @include('layouts.shared/page-title', ['sub_title' => 'Apex', 'page_title' => 'Polar Area Charts'])
   
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Basic Polar Area Chart</h4>
                    <div dir="ltr">
                        <div id="basic-polar-area" class="apex-charts" data-colors="#727cf5,#6c757d,#0acf97,#fa5c7c,#ffbc00,#39afd1"></div>
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
                    <h4 class="header-title">Monochrome Polar Area</h4>
                    <div dir="ltr">
                        <div id="monochrome-polar-area" class="apex-charts" data-colors="#6c757d"></div>
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
    @vite(['resources/js/pages/demo.apex-polar-area.js'])
@endsection

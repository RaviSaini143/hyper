@extends('layouts.detached', ['title' => 'Brite Charts'])

@section('css')
    @vite(['node_modules/britecharts/dist/css/britecharts.min.css'])
@endsection

@section('content')
    @include('layouts.shared/page-title', ['sub_title' => 'Charts', 'page_title' => 'Brite Charts'])

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Bar Chart</h4>
                    <div dir="ltr">
                        <div class="bar-container" style="width: 100%;height: 300px;" data-colors="#39afd1"></div>
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
                    <h4 class="header-title mb-4">Horizontal Bar Chart</h4>
                    <div dir="ltr">
                        <div class="bar-container-horizontal" style="width: 100%;height: 300px;"
                            data-colors="#727cf5,#0acf97,#6c757d,#fa5c7c,#ffbc00,#39afd1,#e3eaef"></div>
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
    @vite(['resources/js/pages/demo.britechart.js'])
@endsection

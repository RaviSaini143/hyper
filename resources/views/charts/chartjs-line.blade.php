@extends('layouts.detached', ['title' => 'ChartJs Line'])

@section('css')
@endsection

@section('content')
    @include('layouts.shared/page-title', ['sub_title' => 'Charts', 'page_title' => 'Chartjs'])

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Interpolation</h4>

                    <div dir="ltr">
                        <div class="mt-3 chartjs-chart" style="height: 320px;">
                            <canvas id="interpolation-example" data-colors="#727cf5,#0acf97"></canvas>
                        </div>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Line</h4>

                    <div dir="ltr">
                        <div class="mt-3 chartjs-chart" style="height: 320px;">
                            <canvas id="line-example" data-colors="#727cf5,#0acf97"></canvas>
                        </div>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->


    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Multi-Axes</h4>

                    <div dir="ltr">
                        <div class="mt-3 chartjs-chart" style="height: 320px;">
                            <canvas id="multi-axes-example" data-colors="#727cf5,#0acf97"></canvas>
                        </div>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Point Styling</h4>

                    <div dir="ltr">
                        <div class="mt-3 chartjs-chart" style="height: 320px;">
                            <canvas id="point-styling-example" data-colors="#727cf5,#0acf97"></canvas>
                        </div>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Line Segment</h4>

                    <div dir="ltr">
                        <div class="mt-3 chartjs-chart" style="height: 320px;">
                            <canvas id="line-segment-example" data-colors="#727cf5,#0acf97"></canvas>
                        </div>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Stepped</h4>

                    <div dir="ltr">
                        <div class="mt-3 chartjs-chart" style="height: 320px;">
                            <canvas id="stepped-example" data-colors="#727cf5,#0acf97"></canvas>
                        </div>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
@endsection

@section('script')
    @vite(['resources/js/pages/demo.chartjs-line.js'])
@endsection

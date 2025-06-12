@extends('layouts.detached', ['title' => 'ChartJs Area'])

@section('css')
@endsection

@section('content')
@include('layouts.shared/page-title', ['sub_title' => 'Charts', 'page_title' => 'Chartjs'])

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Boundaries</h4>

                <div dir="ltr">
                    <div class="mt-3 chartjs-chart" style="height: 320px;">
                        <canvas id="boundaries-example" data-colors="#727cf5,#0acf97"></canvas>
                    </div>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Different Dataset</h4>

                <div dir="ltr">
                    <div class="mt-3 chartjs-chart" style="height: 320px;">
                        <canvas id="dataset-example"
                            data-colors="#727cf5,#fa5c7c,#0acf97,#ebeff2, #f56f36"></canvas>
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
                <h4 class="header-title mb-4">Draw Time</h4>

                <div dir="ltr">
                    <div class="mt-3 chartjs-chart" style="height: 320px;">
                        <canvas id="draw-time-example" data-colors="#727cf5,#0acf97"></canvas>
                    </div>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Stacked</h4>

                <div dir="ltr">
                    <div class="mt-3 chartjs-chart" style="height: 320px;">
                        <canvas id="stacked-example"
                            data-colors="#727cf5,#fa5c7c,#0acf97,#ebeff2, #f56f36"></canvas>
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
                <h4 class="header-title mb-4">Radar</h4>

                <div dir="ltr">
                    <div class="mt-3 chartjs-chart" style="height: 320px;">
                        <canvas id="radar-example"
                            data-colors="#727cf5,#fa5c7c,#0acf97,#ebeff2, #f56f36"></canvas>
                    </div>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->
@endsection

@section('script')
    @vite(['resources/js/pages/demo.chartjs-area.js'])
@endsection

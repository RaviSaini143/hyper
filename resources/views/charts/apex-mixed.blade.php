@extends('layouts.detached', ['title' => 'Apex Mixed'])

@section('css')
@endsection

@section('content')
@include('layouts.shared/page-title', ['sub_title' => 'Apex', 'page_title' => 'Mixed Charts'])    

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Line & Column Chart</h4>
                <div dir="ltr">
                    <div id="line-column-mixed" class="apex-charts" data-colors="#727cf5,#0acf97"></div>
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
                <h4 class="header-title">Multiple Y-Axis Chart</h4>
                <div dir="ltr">
                    <div id="multiple-yaxis-mixed" class="apex-charts" data-colors="#727cf5,#39afd1,#fa5c7c"></div>
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
                <h4 class="header-title">Line & Area Chart</h4>
                <div dir="ltr">
                    <div id="line-area-mixed" class="apex-charts" data-colors="#0acf97,#fa5c7c"></div>
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
                <h4 class="header-title">Line, Column & Area Chart</h4>
                <div dir="ltr">
                    <div id="all-mixed" class="apex-charts" data-colors="#727cf5,#39afd1,#fa5c7c"></div>
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
    @vite(['resources/js/pages/demo.apex-mixed.js'])
@endsection

@extends('layouts.detached', ['title' => 'Remix Icons'])

@section('content')
    @include('layouts.shared/page-title', ['sub_title' => 'Icons', 'page_title' => 'Remix Icons'])

    <div class="row">
        <div class="col-12" id="icons"></div> <!-- end col-->
    </div><!-- end row -->
    <!-- end row -->
@endsection

@section('script')
    <!-- Remixicons Icons Demo js -->
    @vite(['resources/js/pages/demo.remixicons.js'])
@endsection

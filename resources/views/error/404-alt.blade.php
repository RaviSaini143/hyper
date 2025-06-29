@extends('layouts.detached', ['title' => 'Error 404'])

@section('content')
    @include('layouts.shared/page-title', ['page_title' => '404 Error', 'sub_title' => 'Pages'])

    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="text-center">
                <img src="/images/svg/file-searching.svg" height="90" alt="File not found Image">

                <h1 class="text-error mt-4">404</h1>
                <h4 class="text-uppercase text-danger mt-3">Page Not Found</h4>
                <p class="text-muted mt-3">It's looking like you may have taken a wrong turn. Don't worry... it
                    happens to the best of us. Here's a
                    little tip that might help you get back on track.</p>

                <a class="btn btn-info mt-3" href="{{ route('any', 'index') }}"><i class="mdi mdi-reply"></i> Return Home</a>
            </div> <!-- end /.text-center-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->
@endsection
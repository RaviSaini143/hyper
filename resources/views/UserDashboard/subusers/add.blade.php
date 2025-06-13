@extends('layouts.user.detached', ['title' => __('Dashboard')])

@section('css')
    @vite(['node_modules/daterangepicker/daterangepicker.css', 'node_modules/jsvectormap/dist/jsvectormap.min.css'])
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane show active">
                        <div class="col-sm-5">
                            <a href="{{ route('subuser.listing') }}" class="btn btn-success mb-2">
                                <i class="mdi mdi-plus-circle me-2"></i> {{ __('View Sub User') }}
                            </a>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="mt-2">{{ __('Add Sub User') }}</h4>
                                <form method="post" action="{{ route('subuser.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="email-address" class="form-label">{{ __('Email Address') }}<span class="text-danger">*</span></label>
                                                <input class="form-control" type="email" placeholder="{{ __('Enter your email') }}" name="email" id="email-address" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="user_type" class="form-label">{{ __('User Type') }}</label>
                                                <select class="form-control" name="user_type" required>
                                                    <option>{{ __('Select User') }}</option>
                                                    <option>{{ __('subuser') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <a href="{{ url('/') }}" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                                <i class="mdi mdi-arrow-left"></i> {{ __('Back to Home') }}
                                            </a>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="text-sm-end">
                                                <button type="submit" name="submit" class="btn btn-danger">
                                                    {{ __('Add SubUser') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end tab content-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row-->
@endsection

@section('script')
@vite(['resources/js/pages/demo.checkout.js'])
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ($errors->has('email'))
<script>
    Swal.fire({
        icon: 'error',
        title: '{{ __("Email Already Exists!") }}',
        text: '{{ $errors->first('email') }}',
    });
</script>
@endif

@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ __("Success!") }}',
        text: '{{ session('success') }}',
    });
</script>
@endif
@endsection

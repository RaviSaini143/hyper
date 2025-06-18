@extends('layouts.detached', ['title' => __('User')])

@section('css')
@vite([
    'node_modules/select2/dist/css/select2.min.css',
])
@endsection

@section('content')
@include('layouts.shared.page-title', ['page_title' => __('User'), 'sub_title' => __('Add User')])

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="tab-content">

                    <div class="tab-pane show active">
                        <div class="col-sm-5">
                            <a href="{{ route('user.listing') }}" class="btn btn-success mb-2"><i class="mdi mdi-plus-circle me-2"></i> {{ __('View User') }}</a>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="mt-2">{{ __('Add User') }}</h4>
                                <form method="post" action="{{ route('user.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="first-name" class="form-label">{{ __('First Name') }}</label>
                                                <input class="form-control" type="text" placeholder="{{ __('Enter your first name') }}" name="firstname" id="first-name" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="last-name" class="form-label">{{ __('Last Name') }}</label>
                                                <input class="form-control" type="text" placeholder="{{ __('Enter your last name') }}" name="lastname" id="last-name" required/>
                                            </div>
                                        </div>
                                    </div> <!-- end row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="email-address" class="form-label">{{ __('Email Address') }} <span class="text-danger">*</span></label>
                                                <input class="form-control" type="email" placeholder="{{ __('Enter your email') }}" name="email" id="email-address" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">{{ __('Phone') }} <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text" placeholder="{{ __('(xx) xxx xxxx xxx') }}" name="phone" id="phone" required/>
                                            </div>
                                        </div>
                                    </div> <!-- end row -->
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="address" class="form-label">{{ __('Address') }}</label>
                                                <input class="form-control" type="text" placeholder="{{ __('Enter full address') }}" name="address" id="address" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="ipaddress" class="form-label">{{ __('IP Address') }}</label>
                                                <input class="form-control" type="text" placeholder="{{ __('Enter full IP address') }}" name="ipaddress" id="ipaddress" required>
                                            </div>
                                        </div>
                                    </div> <!-- end row -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="town-city" class="form-label">{{ __('Town / City') }}</label>
                                                <input class="form-control" type="text" placeholder="{{ __('Enter your city name') }}" name="city" id="town-city" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="state" class="form-label">{{ __('State') }}</label>
                                                <input class="form-control" type="text" placeholder="{{ __('Enter your state') }}" name="state" id="state" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="zip-postal" class="form-label">{{ __('Zip / Postal Code') }}</label>
                                                <input class="form-control" type="text" placeholder="{{ __('Enter your zip code') }}" name="zipcode" id="zip-postal" required/>
                                            </div>
                                        </div>
                                    </div> <!-- end row -->

                                    <div class="row">
									<div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="services_used" class="form-label">{{ __('Services') }}</label>
                                                <input class="form-control" type="text" placeholder="{{ __('Enter your services') }}" name="services_used" id="services_used" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                               <label for="timezone" class="form-label">{{ __('Select Timezone') }}</label>
													<select name="timezone" class="form-control" required>
														<option value="">{{ __('Select Timezone') }}</option>
														@foreach ($timezoneList as $tz)
															<option value="{{ $tz['name'] }}">
																{{ $tz['name'] }}
															</option>
														@endforeach
													</select>
                                            </div>
                                        </div>
                                    </div> <!-- end row -->
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                                <input class="form-control" type="password" placeholder="{{ __('Enter your password') }}" name="password" id="password" required/>
                                            </div>
                                        </div>
                                    </div> <!-- end row -->
                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <a href="{{ url('/') }}" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                                <i class="mdi mdi-arrow-left"></i> {{ __('Back to Home') }} </a>
                                        </div> <!-- end col -->
                                        <div class="col-sm-6">
                                            <div class="text-sm-end">
                                                <button type="submit" name="submit" class="btn btn-danger">
                                                    <!-- <i class="mdi mdi-truck-fast me-1"></i> --> {{ __('Add User') }}</button>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                </form>
                            </div>
                        </div> <!-- end row-->
                    </div>
                    <!-- End Billing Information Content-->
                </div> <!-- end tab content-->

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row-->
@endsection

@section('script')
@vite([
    'resources/js/pages/demo.checkout.js'
])
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    @if(session('success'))
        Swal.fire({
            title: 'Success!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    @endif

    @if($errors->any())
        Swal.fire({
            title: 'Error!',
            text: '{{ $errors->first() }}',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    @endif
</script>
@endsection
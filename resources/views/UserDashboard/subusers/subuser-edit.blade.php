@extends('layouts.user.detached', ['title' => __('Dashboard')])

@section('css')
    @vite(['node_modules/daterangepicker/daterangepicker.css', 'node_modules/jsvectormap/dist/jsvectormap.min.css'])
@endsection

@section('content')
@php
    $selectedPermissions = old('permissions', is_array($user->permissions) ? $user->permissions : json_decode($user->permissions, true));
@endphp
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane show active">
                        <div class="col-sm-5">
                          <!--  <a href="{{ route('subuser.listing') }}" class="btn btn-success mb-2">
                                <i class="mdi mdi-plus-circle me-2"></i> {{ __('View Sub User') }}
                            </a>-->
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="mt-2">{{ __('Edit Sub User') }}</h4>
                                <form method="post" action="{{ route('subuser.update',['id'=>$user->id]) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="first-name" class="form-label">{{ __('First Name') }}</label>
												<input class="form-control" type="hidden" value="{{$user->id}}" name="id">
                                                <input class="form-control" type="text" placeholder="{{ __('Enter your first name') }}" value="{{$user->firstname}}" name="firstname" id="first-name" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="last-name" class="form-label">{{ __('Last Name') }}</label>
                                                <input class="form-control" type="text" placeholder="{{ __('Enter your last name') }}" value="{{$user->lastname}}" name="lastname" id="last-name" required/>
                                            </div>
                                        </div>
                                    </div> <!-- end row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="email-address" class="form-label">{{ __('Email Address') }} <span class="text-danger">*</span></label>
                                                <input class="form-control" type="email" placeholder="{{ __('Enter your email') }}" value="{{$user->email}}" name="email" id="email-address" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">{{ __('Phone') }} <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text" placeholder="{{ __('(xx) xxx xxxx xxx') }}" value="{{$user->phone}}" name="phone" id="phone" required/>
                                            </div>
                                        </div>
                                    </div> <!-- end row -->
                                    <div class="row">
									<div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="services_used" class="form-label">{{ __('Services') }}</label>
                                                <input class="form-control" type="text" placeholder="{{ __('Enter your services') }}" value="{{$user->services_used}}" name="services_used" id="services_used" required/>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="address" class="form-label">{{ __('Address') }}</label>
                                                <input class="form-control" type="text" placeholder="{{ __('Enter full address') }}" value="{{$user->address}}" name="address" id="address" required>
                                            </div>
                                        </div>
                                        
                                    </div> <!-- end row -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="town-city" class="form-label">{{ __('Town / City') }}</label>
                                                <input class="form-control" type="text" placeholder="{{ __('Enter your city name') }}" value="{{$user->city}}" name="city" id="town-city" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="state" class="form-label">{{ __('State') }}</label>
                                                <input class="form-control" type="text" placeholder="{{ __('Enter your state') }}"  value="{{$user->state}}" name="state" id="state" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="zip-postal" class="form-label">{{ __('Zip / Postal Code') }}</label>
                                                <input class="form-control" value="{{$user->zipcode}}" type="text" placeholder="{{ __('Enter your zip code') }}" name="zipcode" id="zip-postal" required/>
                                            </div>
                                        </div>
                                    </div> <!-- end row -->

                                    

                                   <div class="row">
										<div class="col-6">
											<div class="mb-3">
												<label for="user_type" class="form-label">{{ __('User Type') }}</label>
												<select class="form-control" name="user_type" required>
													<option disabled {{ empty($user->user_type) ? 'selected' : '' }}>{{ __('Select User') }}</option>
													<option value="{{$user->user_type}}" {{ (isset($user) && $user->user_type == 'subuser') ? 'selected' : '' }}>
														{{ __('subuser') }}
													</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
										

											<div class="mb-1">
												<label class="form-label d-block">{{ __('Permissions') }}</label>
											</div>
											<div class="form-check mb-2">
												<input class="form-check-input" type="checkbox" name="permissions[]" id="read" value="read"
													{{ in_array('read', $selectedPermissions ?? []) ? 'checked' : '' }}>
												<label class="form-check-label" for="read">Read</label>
											</div>

											<div class="form-check mb-2">
												<input class="form-check-input" type="checkbox" name="permissions[]" id="change" value="change"
													{{ in_array('change', $selectedPermissions ?? []) ? 'checked' : '' }}>
												<label class="form-check-label" for="change">Change</label>
											</div>

											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="permissions[]" id="delete" value="delete"
													{{ in_array('delete', $selectedPermissions ?? []) ? 'checked' : '' }}>
												<label class="form-check-label" for="delete">Delete</label>
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
                                                    {{ __('Update SubUser') }}
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

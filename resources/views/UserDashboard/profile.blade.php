@extends('layouts.user.detached', ['title' => __('Dashboard')])

@section('css')
    @vite(['node_modules/daterangepicker/daterangepicker.css', 'node_modules/jsvectormap/dist/jsvectormap.min.css'])
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <!-- Profile -->
            <div class="card bg-primary">
                <div class="card-body profile-user-box">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="avatar-lg">
                                        <img src="/images/users/avatar-2.jpg" alt=""
                                            class="rounded-circle img-thumbnail">
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <h4 class="mt-1 mb-1 text-white">{{ $authUser->firstname }} {{ $authUser->lastname }}</h4>
                                        <p class="font-13 text-white-50">{{ __('Authorised Brand Seller') }}</p>
                                        <ul class="mb-0 list-inline text-light">
                                            <li class="list-inline-item me-3">
                                                <h5 class="mb-1 text-white">$ 25,184</h5>
                                                <p class="mb-0 font-13 text-white-50">{{ __('Total Revenue') }}</p>
                                            </li>
                                            <li class="list-inline-item">
                                                <h5 class="mb-1 text-white">5482</h5>
                                                <p class="mb-0 font-13 text-white-50">{{ __('Number of Orders') }}</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col-->

                        <div class="col-sm-4">
                            @if ($authUser->user_type !== 'subuser')
                                <div class="text-center mt-sm-0 mt-3 text-sm-end">
                                    <a href="{{ url('profile/edit/' . $authUser->id) }}" type="button" class="btn btn-light">
										<i class="mdi mdi-account-edit me-1"></i> {{ __('Edit Profile') }}
									</a>
                                </div>
                            @else
                                <div class="text-center mt-sm-0 mt-3 text-sm-end">
                                    <a href="{{ url('profile/edit/' . $authUser->id) }}" type="button" class="btn btn-light">
										<i class="mdi mdi-account-edit me-1"></i> {{ __('Edit Profile') }}
									</a>
                                </div>
                            @endif
                        </div> <!-- end col-->
                    </div> <!-- end row -->
                </div> <!-- end card-body/ profile-user-box-->
            </div>
            <!--end profile/ card -->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-4">
            <!-- Personal-Information -->
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">{{ __('Seller Information') }}</h4>
                    <p class="text-muted font-13">
                        {{ __('Hye, I’m Michael Franklin residing in this beautiful world. I create websites and mobile apps with great UX and UI design. I have done work with big companies like Nokia, Google and Yahoo. Meet me or Contact me for any queries. One Extra line for filling space. Fill as many you want.') }}
                    </p>

                    <hr />

                    <div class="text-start">
                        @if(!empty($authUser->firstname) || !empty($authUser->lastname))
                            <p class="text-muted"><strong>{{ __('Full Name') }} :</strong> <span class="ms-2">{{ $authUser->firstname }} {{ $authUser->lastname }}</span></p>
                        @endif
                        @if(!empty($authUser->phone))
                            <p class="text-muted"><strong>{{ __('Mobile') }} :</strong><span class="ms-2">{{ $authUser->phone }}</span></p>
                        @endif
                        @if(!empty($authUser->email))
                            <p class="text-muted"><strong>{{ __('Email') }} :</strong> <span class="ms-2">{{$authUser->email}}</span></p>
                        @endif
                        @if(!empty($authUser->ipaddress))
                            <p class="text-muted"><strong>{{ __('Location') }} :</strong> <span class="ms-2">{{ $authUser->ipaddress }}</span></p>
                        @endif
                        @if(!empty($authUser->address))
                            <p class="text-muted"><strong>{{ __('Address') }} :</strong> <span class="ms-2">{{ $authUser->address }}</span></p>
                        @endif
                        @if(!empty($authUser->city))
                            <p class="text-muted"><strong>{{ __('City') }} :</strong> <span class="ms-2">{{ $authUser->city }}</span></p>
                        @endif
                        @if(!empty($authUser->state))
                            <p class="text-muted"><strong>{{ __('state') }} :</strong> <span class="ms-2">{{ $authUser->state }}</span></p>
                        @endif
                        @if(!empty($authUser->zipcode))
                            <p class="text-muted"><strong>{{ __('Zipcode') }} :</strong> <span class="ms-2">{{ $authUser->zipcode }}</span></p>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Personal-Information -->

            <!-- Toll free number box-->
            <div class="card text-white bg-info overflow-hidden">
                <div class="card-body">
                    <div class="toll-free-box text-center">
                        <h4 class="text-reset"> <i class="mdi mdi-deskphone"></i> {{ __('Toll Free') }} : 1-234-567-8901</h4>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <!-- End Toll free number box-->

            <!-- Messages-->
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">{{ __('Messages') }}</h4>

                    <div class="inbox-widget">
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="/images/users/avatar-2.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">Tomaslau</p>
                            <p class="inbox-item-text">I've finished it! See you so...</p>
                            <p class="inbox-item-date">
                                <a href="#" class="btn btn-sm btn-link text-info font-13"> {{ __('Reply') }} </a>
                            </p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="/images/users/avatar-3.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">Stillnotdavid</p>
                            <p class="inbox-item-text">This theme is awesome!</p>
                            <p class="inbox-item-date">
                                <a href="#" class="btn btn-sm btn-link text-info font-13"> {{ __('Reply') }} </a>
                            </p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="/images/users/avatar-4.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">Kurafire</p>
                            <p class="inbox-item-text">Nice to meet you</p>
                            <p class="inbox-item-date">
                                <a href="#" class="btn btn-sm btn-link text-info font-13"> {{ __('Reply') }} </a>
                            </p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="/images/users/avatar-5.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">Shahedk</p>
                            <p class="inbox-item-text">Hey! there I'm available...</p>
                            <p class="inbox-item-date">
                                <a href="#" class="btn btn-sm btn-link text-info font-13"> {{ __('Reply') }} </a>
                            </p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="/images/users/avatar-6.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">Adhamdannaway</p>
                            <p class="inbox-item-text">This theme is awesome!</p>
                            <p class="inbox-item-date">
                                <a href="#" class="btn btn-sm btn-link text-info font-13"> {{ __('Reply') }} </a>
                            </p>
                        </div>
                    </div> <!-- end inbox-widget -->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-8">
            <!-- Chart-->
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">{{ __('Orders & Revenue') }}</h4>
                    <div dir="ltr">
                        <div style="height: 260px;" class="chartjs-chart">
                            <canvas id="high-performing-product"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Chart-->

            <div class="row">
                <div class="col-sm-4">
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <i class="ri-shopping-basket-2-line float-end text-muted"></i>
                            <h6 class="text-muted text-uppercase mt-0">{{ __('Orders') }}</h6>
                            <h2 class="m-b-20">1,587</h2>
                            <span class="badge bg-primary"> +11% </span> <span class="text-muted">{{ __('From previous period') }}</span>
                        </div> <!-- end card-body-->
                    </div>
                    <!--end card-->
                </div><!-- end col -->

                <div class="col-sm-4">
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <i class="ri-archive-line float-end text-muted"></i>
                            <h6 class="text-muted text-uppercase mt-0">{{ __('Revenue') }}</h6>
                            <h2 class="m-b-20">$<span>46,782</span></h2>
                            <span class="badge bg-danger"> -29% </span> <span class="text-muted">{{ __('From previous period') }}</span>
                        </div> <!-- end card-body-->
                    </div>
                    <!--end card-->
                </div><!-- end col -->

                <div class="col-sm-4">
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <i class="ri-vip-diamond-line float-end text-muted"></i>
                            <h6 class="text-muted text-uppercase mt-0">{{ __('Product Sold') }}</h6>
                            <h2 class="m-b-20">1,890</h2>
                            <span class="badge bg-primary"> +89% </span> <span class="text-muted">{{ __('Last year') }}</span>
                        </div> <!-- end card-body-->
                    </div>
                    <!--end card-->
                </div><!-- end col -->
            </div>
            <!-- end row -->

            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">{{ __('My Products') }}</h4>
                    <div class="table-responsive">
                        <table class="table table-hover table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>{{ __('Product') }}</th>
                                    <th>{{ __('Price') }}</th>
                                    <th>{{ __('Stock') }}</th>
                                    <th>{{ __('Amount') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ASOS Ridley High Waist</td>
                                    <td>$79.49</td>
                                    <td><span class="badge bg-primary">82 Pcs</span></td>
                                    <td>$6,518.18</td>
                                </tr>
                                <tr>
                                    <td>Marco Lightweight Shirt</td>
                                    <td>$128.50</td>
                                    <td><span class="badge bg-primary">37 Pcs</span></td>
                                    <td>$4,754.50</td>
                                </tr>
                                <tr>
                                    <td>Half Sleeve Shirt</td>
                                    <td>$39.99</td>
                                    <td><span class="badge bg-primary">64 Pcs</span></td>
                                    <td>$2,559.36</td>
                                </tr>
                                <tr>
                                    <td>Lightweight Jacket</td>
                                    <td>$20.00</td>
                                    <td><span class="badge bg-primary">184 Pcs</span></td>
                                    <td>$3,680.00</td>
                                </tr>
                                <tr>
                                    <td>Marco Shoes</td>
                                    <td>$28.49</td>
                                    <td><span class="badge bg-primary">69 Pcs</span></td>
                                    <td>$1,965.81</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!-- end table responsive-->
                </div> <!-- end col-->
            </div> <!-- end row-->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@section('script')
    @vite(['resources/js/pages/demo.profile.js'])
@endsection
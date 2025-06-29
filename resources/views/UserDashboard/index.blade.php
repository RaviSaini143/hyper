@extends('layouts.user.detached', ['title' => __('User Dashboard')])

@section('css')
    @vite(['node_modules/daterangepicker/daterangepicker.css', 'node_modules/jsvectormap/dist/jsvectormap.min.css'])
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="d-flex">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-light" id="dash-daterange">
                            <span class="input-group-text bg-primary border-primary text-white">
                                <i class="mdi mdi-calendar-range font-13"></i>
                            </span>
                        </div>
                        <a href="javascript: void(0);" class="btn btn-primary ms-2">
                            <i class="mdi mdi-autorenew"></i>
                        </a>
                        <a href="javascript: void(0);" class="btn btn-primary ms-1">
                            <i class="mdi mdi-filter-variant"></i>
                        </a>
                    </form>
                </div>
                @if($authUser->user_type !== 'subuser')
                    <h4 class="page-title">{{ __('User Dashboard') }}</h4>
                @else
                    <h4 class="page-title">{{ __('Sub User Dashboard') }}</h4>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-5 col-lg-6">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-account-multiple widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="{{ __('Customers') }}">{{ __('Customers') }}</h5>
                            <h3 class="mt-3 mb-3">36,254</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                                <span class="text-nowrap">{{ __('Since last month') }}</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-cart-plus widget-icon bg-success-lighten text-success"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="{{ __('Orders') }}">{{ __('Orders') }}</h5>
                            <h3 class="mt-3 mb-3">5,543</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 1.08%</span>
                                <span class="text-nowrap">{{ __('Since last month') }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-currency-usd widget-icon bg-success-lighten text-success"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="{{ __('Revenue') }}">{{ __('Revenue') }}</h5>
                            <h3 class="mt-3 mb-3">$6,254</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 7.00%</span>
                                <span class="text-nowrap">{{ __('Since last month') }}</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-pulse widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="{{ __('Growth') }}">{{ __('Growth') }}</h5>
                            <h3 class="mt-3 mb-3">+ 30.56%</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span>
                                <span class="text-nowrap">{{ __('Since last month') }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-7 col-lg-6">
            <div class="card card-h-100">
                <div class="d-flex card-header justify-content-between align-items-center">
                    <h4 class="header-title">{{ __('Projections Vs Actuals') }}</h4>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:void(0);" class="dropdown-item">{{ __('Sales Report') }}</a>
                            <a href="javascript:void(0);" class="dropdown-item">{{ __('Export Report') }}</a>
                            <a href="javascript:void(0);" class="dropdown-item">{{ __('Profit') }}</a>
                            <a href="javascript:void(0);" class="dropdown-item">{{ __('Action') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div dir="ltr">
                        <div id="high-performing-product" class="apex-charts" data-colors="#727cf5,#91a6bd40"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="d-flex card-header justify-content-between align-items-center">
                    <h4 class="header-title">{{ __('Revenue') }}</h4>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:void(0);" class="dropdown-item">{{ __('Sales Report') }}</a>
                            <a href="javascript:void(0);" class="dropdown-item">{{ __('Export Report') }}</a>
                            <a href="javascript:void(0);" class="dropdown-item">{{ __('Profit') }}</a>
                            <a href="javascript:void(0);" class="dropdown-item">{{ __('Action') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="chart-content-bg">
                        <div class="row text-center">
                            <div class="col-sm-6">
                                <p class="text-muted mb-0 mt-3">{{ __('Current Week') }}</p>
                                <h2 class="fw-normal mb-3">
                                    <small class="mdi mdi-checkbox-blank-circle text-primary align-middle me-1"></small>
                                    <span>$58,254</span>
                                </h2>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-muted mb-0 mt-3">{{ __('Previous Week') }}</p>
                                <h2 class="fw-normal mb-3">
                                    <small class="mdi mdi-checkbox-blank-circle text-success align-middle me-1"></small>
                                    <span>$69,524</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="dash-item-overlay d-none d-md-block" dir="ltr">
                        <h5>{{ __('Today\'s Earning') }}: $2,562.30</h5>
                        <p class="text-muted font-13 mb-3 mt-2">Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus...</p>
                        <a href="javascript: void(0);" class="btn btn-outline-primary">{{ __('View Statements') }} <i class="mdi mdi-arrow-right ms-2"></i></a>
                    </div>
                    <div dir="ltr">
                        <div id="revenue-chart" class="apex-charts mt-3" data-colors="#727cf5,#0acf97"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="d-flex card-header justify-content-between align-items-center">
                    <h4 class="header-title">{{ __('Revenue By Location') }}</h4>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:void(0);" class="dropdown-item">{{ __('Sales Report') }}</a>
                            <a href="javascript:void(0);" class="dropdown-item">{{ __('Export Report') }}</a>
                            <a href="javascript:void(0);" class="dropdown-item">{{ __('Profit') }}</a>
                            <a href="javascript:void(0);" class="dropdown-item">{{ __('Action') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="mb-4 mt-3">
                        <div id="world-map-markers" style="height: 217px"></div>
                    </div>
                    <h5 class="mb-1 mt-0 fw-normal">New York</h5>
                    <div class="progress-w-percent">
                        <span class="progress-value fw-bold">72k </span>
                        <div class="progress progress-sm">
                            <div class="progress-bar" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <h5 class="mb-1 mt-0 fw-normal">San Francisco</h5>
                    <div class="progress-w-percent">
                        <span class="progress-value fw-bold">39k </span>
                        <div class="progress progress-sm">
                            <div class="progress-bar" role="progressbar" style="width: 39%;" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <h5 class="mb-1 mt-0 fw-normal">Sydney</h5>
                    <div class="progress-w-percent">
                        <span class="progress-value fw-bold">25k </span>
                        <div class="progress progress-sm">
                            <div class="progress-bar" role="progressbar" style="width: 39%;" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <h5 class="mb-1 mt-0 fw-normal">Singapore</h5>
                    <div class="progress-w-percent mb-0">
                        <span class="progress-value fw-bold">61k </span>
                        <div class="progress progress-sm">
                            <div class="progress-bar" role="progressbar" style="width: 61%;" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 col-lg-12 order-lg-2 order-xl-1">
            <div class="card">
                <div class="d-flex card-header justify-content-between align-items-center">
                    <h4 class="header-title">{{ __('Top Selling Products') }}</h4>
                    <a href="javascript:void(0);" class="btn btn-sm btn-light">Export <i class="mdi mdi-download ms-1"></i></a>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-hover mb-0">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">ASOS Ridley High Waist</h5>
                                        <span class="text-muted font-13">07 April 2018</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">$79.49</h5>
                                        <span class="text-muted font-13">Price</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">82</h5>
                                        <span class="text-muted font-13">Quantity</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">$6,518.18</h5>
                                        <span class="text-muted font-13">Amount</span>
                                    </td>
                                </tr>
                                <!-- Repeat for other table rows -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 order-lg-1">
            <div class="card">
                <div class="d-flex card-header justify-content-between align-items-center">
                    <h4 class="header-title">{{ __('Total Sales') }}</h4>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:void(0);" class="dropdown-item">{{ __('Sales Report') }}</a>
                            <a href="javascript:void(0);" class="dropdown-item">{{ __('Export Report') }}</a>
                            <a href="javascript:void(0);" class="dropdown-item">{{ __('Profit') }}</a>
                            <a href="javascript:void(0);" class="dropdown-item">{{ __('Action') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div id="average-sales" class="apex-charts mb-4 mt-2" data-colors="#727cf5,#0acf97,#fa5c7c,#ffbc00"></div>
                    <div class="chart-widget-list">
                        <p>
                            <i class="mdi mdi-square text-primary"></i> Direct
                            <span class="float-end">$300.56</span>
                        </p>
                        <p>
                            <i class="mdi mdi-square text-danger"></i> Affiliate
                            <span class="float-end">$135.18</span>
                        </p>
                        <p>
                            <i class="mdi mdi-square text-success"></i> Sponsored
                            <span class="float-end">$48.96</span>
                        </p>
                        <p class="mb-0">
                            <i class="mdi mdi-square text-warning"></i> E-mail
                            <span class="float-end">$154.02</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 order-lg-1">
            <div class="card">
                <div class="d-flex card-header justify-content-between align-items-center">
                    <h4 class="header-title">{{ __('Recent Activity') }}</h4>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:void(0);" class="dropdown-item">{{ __('Sales Report') }}</a>
                            <a href="javascript:void(0);" class="dropdown-item">{{ __('Export Report') }}</a>
                            <a href="javascript:void(0);" class="dropdown-item">{{ __('Profit') }}</a>
                            <a href="javascript:void(0);" class="dropdown-item">{{ __('Action') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body py-0 mb-3" data-simplebar style="max-height: 403px;">
                    <div class="timeline-alt py-0">
                        <div class="timeline-item">
                            <i class="mdi mdi-upload bg-info-lighten text-info timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="javascript:void(0);" class="text-info fw-bold mb-1 d-block">You sold an item</a>
                                <small>Paul Burgess just purchased “Hyper - Admin Dashboard”!</small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">5 minutes ago</small>
                                </p>
                            </div>
                        </div>
                        <!-- Repeat for other timeline items -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-bottom')
    @vite(['resources/js/pages/demo.dashboard.js'])
@endsection
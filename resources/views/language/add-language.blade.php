@extends('layouts.detached', ['title' => 'Dashboard'])

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
                        <a href="{{route('language.listing')}}" class="btn btn-success mb-2"><i class="mdi mdi-plus-circle me-2"></i> {{ __ ('Listing Language') }}</a>
                    </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="mt-2">{{ __ ('Add Language') }}</h4>
								@if ($errors->any())
									<div class="alert alert-danger">
										<ul class="mb-0">
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif

								@if (session('success'))
									<div class="alert alert-success">
										{{ session('success') }}
									</div>
								@endif
                                <form method="POST" action="{{ route('language.upload') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
												<label for="lang-file" class="form-label">{{ __('Upload JSON Language File') }} <span class="text-danger">*</span></label>
												<input class="form-control" type="file" name="lang_file" id="lang-file" accept=".json" required>
											</div>
                                        </div>
                                        
                                    </div> <!-- end row -->

                                    
                                  
                                 <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <a href="{{ url('/') }}" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                                <i class="mdi mdi-arrow-left"></i> {{ __ ('Back to Home') }} </a>
                                        </div> <!-- end col -->
                                        <div class="col-sm-6">
                                            <div class="text-sm-end">
                                                <button  type="submit" name="submit" class="btn btn-danger">
                                                    <!--<i class="mdi mdi-truck-fast me-1"></i>--> {{ __ ('Add Language') }} </button>
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
@endsection

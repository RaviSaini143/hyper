@extends('layouts.subuser.detached', ['title' => 'Dashboard'])

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
                    </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="mt-2">{{ __('Update Sub User') }}</h4>
								
                                <form method="post" action="{{route('subuser.profile.update',['id'=>$subuser->id])}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="email-address" class="form-label">{{ __('Email') }} <span class="text-danger">*</span></label>
												<input type="hidden" name="id" value="{{$subuser->id}}">
                                                <input class="form-control" type="email" placeholder="Enter your email" name="email" id="email-address" value="{{$subuser->email}}" required/>
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
                                                <button  type="submit" name="submit" class="btn btn-danger">
                                                    <!--<i class="mdi mdi-truck-fast me-1"></i>--> {{ __('Update Sub User') }}</button>
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
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
        });
    @endif
</script>


@endsection

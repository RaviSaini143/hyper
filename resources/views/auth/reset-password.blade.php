@extends('layouts.detached', ['title' => 'Profile'])

@section('content')
    @include('layouts.shared/page-title', ['sub_title' => 'Pages', 'page_title' => 'Profile'])
    
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">

                        <!-- Logo -->
                        <div class="card-header py-4 text-center bg-primary">
                            <a href="{{ route('any', 'index') }}">
                                <span><img src="/images/logo.png" alt="logo" height="22"></span>
                            </a>
                        </div>
                        <div class="card-body p-4">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                           <form id="reset-password-form" method="POST" action="{{ route('reset.password') }}">

                                @csrf
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input class="form-control" type="email" name="email" id="emailaddress"
                                       placeholder="Enter your email">
                                </div>
                                <div class="mb-3 mb-0 text-center">
                                    <button class="btn btn-primary" type="submit"> Reset Password</button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
   @endsection



@section('script')
@vite([
    'resources/js/pages/demo.profile.js',
    ])


    <!-- jQuery and jQuery Validation plugin (if using CDN) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

    <!-- SweetAlert2 CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('#reset-password-form').validate({
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                email: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email address"
                }
            },
            errorElement: 'span',
            errorClass: 'invalid-feedback',
            highlight: function(element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid');
            },
            errorPlacement: function (error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        });

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
                confirmButtonText: 'OK'
            });
        @endif
    </script>
@endsection

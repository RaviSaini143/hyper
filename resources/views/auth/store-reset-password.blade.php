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

                 <!-- @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>

                    <script>
                        setTimeout(function() {
                            document.getElementById('logout-form').submit();
                        }, 2000);
                    </script>

                @endif-->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <form id="update-password-form" method="POST" action="{{ route('update.password') }}">
                                @csrf
                               <div class="mb-3">
                                   
                                    <label for="password" class="form-label">Old Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Enter your old password" >
                                       
                                    </div>
                                      @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                                 <div class="mb-3">
                                   
                                    <label for="npassword" class="form-label">New Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" name="npassword" id="npassword" class="form-control"
                                            placeholder="Enter your new password" >
                                       
                                    </div>
                                      @error('npassword')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                                 <div class="mb-3">
                                   
                                    <label for="cnpassword" class="form-label">Confirm New Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" name="cnpassword" id="cnpassword" class="form-control"
                                            placeholder="Enter your confirm new password" >
                                       
                                    </div>
                                      @error('cnpassword')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                                <div class="mb-3 mb-0 text-center">
                                    <button class="btn btn-primary" type="submit"> Update Password</button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                   

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@endsection

@section('script-bottom')
    @vite(['resources/js/pages/demo.dashboard.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->

    <script>
        $('#update-password-form').validate({
            rules: {
                password: {
                    required: true
                },
                npassword: {
                    required: true,
                    minlength: 6
                },
                cnpassword: {
                    required: true,
                    minlength: 6,
                    equalTo: "#npassword"
                }
            },
            messages: {
                password: {
                    required: "Please enter your current password."
                },
                npassword: {
                    required: "Please enter your new password.",
                    minlength: "New password must be at least 6 characters long."
                },
                cnpassword: {
                    required: "Please confirm your new password.",
                    minlength: "Confirm password must be at least 6 characters long.",
                    equalTo: "Confirm password must match the new password."
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
            },
            submitHandler: function(form) {
                let formData = $(form).serialize();
                $.ajax({
                    url: $(form).attr('action'),
                    type: 'POST',
                    data: formData,
                   success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Password updated successfully!',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 2000,              // auto close after 2 seconds
                        timerProgressBar: true,
                        showConfirmButton: true,  // show OK button (user can close early if wants)
                        willClose: () => {
                            // Show loader alert while sending email
                            Swal.fire({
                                title: 'Your new password is being sent to your email., please wait...',
                                allowOutsideClick: false,
                                didOpen: () => {
                                    Swal.showLoading();

                                    $.ajax({
                                        url: '{{ route("send.reset.password.email") }}',
                                        type: 'POST',
                                        data: {
                                            new_password: $('[name="npassword"]').val(),
                                            _token: '{{ csrf_token() }}'
                                        },
                                        success: function() {
                                            Swal.close();
                                            document.getElementById('logout-form').submit();
                                        },
                                        error: function() {
                                            Swal.close();
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error',
                                                text: 'Failed to send the email. Please try again later.'
                                            });
                                        }
                                    });
                                }
                            });
                        }
                    });
                },




                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            $('#update-password-form').find('.invalid-feedback').remove();
                            $('#update-password-form').find('.is-invalid').removeClass('is-invalid');
                            if (errors && errors.password && errors.password.includes('The current password you entered does not match.')) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: errors.password[0]
                                });
                                return; 
                            }
                            $.each(errors, function(field, messages) {
                                let input = $('[name=' + field + ']');
                                input.addClass('is-invalid');
                                let errorMsg = $('<span class="invalid-feedback d-block">' + messages[0] + '</span>');
                                if (input.parent('.input-group').length) {
                                    errorMsg.insertAfter(input.parent());
                                } else {
                                    errorMsg.insertAfter(input);
                                }
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'An unexpected error occurred. Please try again.'
                            });
                        }
                    }

                });
            }
        });
    </script>
@endsection

@section('script')
@vite([
    'resources/js/pages/demo.profile.js',
    ])
@endsection

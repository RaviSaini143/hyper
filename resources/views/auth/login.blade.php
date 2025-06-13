<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.shared/title-meta', ['title' => 'Log In'])

    @include('layouts.shared/head-css')
</head>

<body class="authentication-bg position-relative">
    <div class="position-absolute start-0 end-0 start-0 bottom-0 w-100 h-100">
        <svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' viewBox='0 0 800 800'>
            <g fill-opacity='0.22'>
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.1);" cx='400' cy='400' r='600' />
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.2);" cx='400' cy='400' r='500' />
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.3);" cx='400' cy='400' r='300' />
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.4);" cx='400' cy='400' r='200' />
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.5);" cx='400' cy='400' r='100' />
            </g>
        </svg>
    </div>
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">

                        <!-- Logo -->
                        <div class="card-header py-4 text-center bg-primary">
                            <a href="#">
                                <span><img src="/images/logo.png" alt="logo" height="22"></span>
                            </a>
                        </div>

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                                <p class="text-muted mb-4">Enter your email address and password to access admin panel.
                                </p>
                            </div>

                            <!--<form method="POST" action="{{ route('login') }}">-->
                            <form method="POST" action="{{ route('login.verify.otp') }}" id="login-form">
                                @csrf

                                @if (sizeof($errors) > 0)
                                    @foreach ($errors->all() as $error)
                                        <p class="text-danger">{{ $error }}</p>
                                    @endforeach
                                @endif

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input class="form-control" type="email" name="email" id="emailaddress"
                                        required="" placeholder="Enter your email">
                                </div>

                                <div class="mb-3">
                                   <a href="{{ route('password.request') }}" class="text-muted float-end"><small>Forgot your
                                            password?</small></a>
											 <!--<a href="#" class="text-muted float-end"><small>Forgot your
                                            password?</small></a>-->
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Enter your password">
                                        <div class="input-group-text" data-password="true">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                        <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div>

                                <div class="mb-3 mb-0 text-center">
                                    <button class="btn btn-primary" type="submit"> Log In</button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->
<!-- Modal -->
<div class="modal fade" id="myForm" tabindex="-1" aria-labelledby="myFormLabel" aria-hidden="true"
     data-bs-backdrop="static" data-bs-keyboard="false">

  <div class="modal-dialog">
    <div class="modal-content">
      <form id="otp-form" method="post">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="myFormLabel">Enter OTP</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <input type="hidden" name="email" id="otp-email" value="">
          <label for="otp">OTP Code</label>
          <input type="text" class="form-control" name="otp_code" id="otp" placeholder="Enter OTP" required>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Verify OTP</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>


                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <!--<p class="text-muted">Don't have an account? <a href="{{ route('second', [ 'auth' , 'register']) }}"
                                    class="text-muted ms-1"><b>Sign Up</b></a></p>-->
                                   <!-- <p class="text-muted">Don't have an account? <a href="{{ route('register') }}"
                                    class="text-muted ms-1"><b>Sign Up</b></a></p>-->
                                    
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->


    @include('layouts.shared/footer-2')
    @include('layouts.shared/footer-scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function () {
    // Handle login form
    $('#login-form').on('submit', function (e) {
        e.preventDefault();
 Swal.fire({
		text: 'Sending OTP...',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showConfirmButton: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
        let email = $('#emailaddress').val();

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            success: function (response) {
                $('#otp-email').val(email);
                $('#login-form button[type=submit]').prop('disabled', true);
				Swal.close();
                // Show OTP modal
                let modal = new bootstrap.Modal(document.getElementById('myForm'));
                modal.show();

                // SweetAlert success
               /*  Swal.fire({
				icon: 'success',
				title: 'Login Email Verified',
				text: 'Please enter the OTP sent to your email.',
				timer: 2000,
				timerProgressBar: true, // Optional: adds a progress bar
				allowOutsideClick: false,
				allowEscapeKey: false
			}); */


            },
            error: function (xhr) {
                let message = 'Something went wrong.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Login Failed',
                    text: message
                });
            }
        });
    });

    // Handle OTP form
    $('#otp-form').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('otp.verify.code') }}", // Your route
            method: 'POST',
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            success: function (res) {
				
                Swal.fire({
					icon: 'success',
				title: 'OTP Verified',
				text: 'Redirecting to your dashboard...',
				timer: 2000,
				timerProgressBar: true, // Optional: adds a progress bar
				allowOutsideClick: false,
				allowEscapeKey: false
                }).then(() => {
                    window.location.href = '/admin/dashboard'; // Redirect to dashboard
                });
            },
            error: function (err) {
                let message = 'Invalid or expired OTP.';
                if (err.responseJSON && err.responseJSON.message) {
                    message = err.responseJSON.message;
                }

                Swal.fire({
                    icon: 'error',
                    title: 'OTP Error',
                    text: message
                });
            }
        });
    });
});
</script>



</body>

</html>

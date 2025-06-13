<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.shared.title-meta', ['title' => 'Reset Password'])
    @include('layouts.shared.head-css')
</head>

<body class="authentication-bg">

    <div class="position-absolute start-0 end-0 start-0 bottom-0 w-100 h-100">
        <svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' viewBox='0 0 800 800'>
            <g fill-opacity='0.22'>
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.1);" cx='400' cy='400' r='600'/>
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.2);" cx='400' cy='400' r='500'/>
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.3);" cx='400' cy='400' r='300'/>
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.4);" cx='400' cy='400' r='200'/>
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.5);" cx='400' cy='400' r='100'/>
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
                            <a href="{{ route('any', 'index') }}">
                                <span><img src="/images/logo.png" alt="logo" height="22"></span>
                            </a>
                        </div>

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 fw-bold">Reset Your Password</h4>
                                <p class="text-muted mb-4">Enter your new password below to reset your password.</p>
                            </div>

                            <form action="{{ route('password.update.user') }}" method="POST">
                                @csrf

                                <!-- Hidden token -->
                                <input type="hidden" name="token" value="{{ request()->route('token') }}">

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input class="form-control" type="email" id="emailaddress" name="email" required placeholder="Enter your email" value="{{ old('email', $request->email) }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">New Password</label>
                                    <input class="form-control" type="password" id="password" name="password" required placeholder="Enter new password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required placeholder="Confirm new password">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-0 text-center">
                                    <button class="btn btn-primary" type="submit">Forgot Password</button>
                                </div>
                            </form>

                        </div> <!-- end card-body-->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Back to <a href="{{ route('second', ['auth', 'login']) }}" class="text-muted ms-1"><b>Log In</b></a></p>
                        </div>
                    </div>
                    <!-- end row -->

                </div>
            </div>
        </div>
    </div>

    <footer class="footer footer-alt">
        2018 - <script>document.write(new Date().getFullYear())</script> © Hyper - Coderthemes.com
    </footer>

    @include('layouts.shared.footer-2')
    @include('layouts.shared.footer-scripts')

</body>
</html>

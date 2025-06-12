<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.shared/title-meta', ['title' => 'Confirm Email'])

    @include('layouts.shared/head-css')
</head>

<body class="authentication-bg pb-0">

    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box">
            <div class="card-body d-flex flex-column h-100 gap-3">

                <!-- Logo -->
                <div class="auth-brand text-center text-lg-start">
                    <a href="{{ route('any', 'index') }}" class="logo-dark">
                        <span><img src="/images/logo-dark.png" alt="dark logo" height="22"></span>
                    </a>
                    <a href="{{ route('any', 'index') }}" class="logo-light">
                        <span><img src="/images/logo.png" alt="logo" height="22"></span>
                    </a>
                </div>

                <div class="my-auto">
                    <!-- email send icon with text-->
                    <div class="text-center m-auto">
                        <img src="/images/svg/mail_sent.svg" alt="mail sent image" height="64" />
                        <h4 class="text-dark-50 text-center mt-4 fw-bold">Please check your email</h4>
                        <p class="text-muted mb-4">
                            A email has been send to <b>youremail@domain.com</b>.
                            Please check for an email from company and click on the included link to
                            reset your password.
                        </p>
                    </div>

                    <!-- form -->
                    <form action="{{ route('any', 'index') }}">
                        <div class="mb-0 d-grid text-center">
                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-home me-1"></i> Back to
                                Home </button>
                        </div>
                    </form>
                    <!-- end form-->



                    @include('layouts.shared/footer-2')
                </div>
            </div>
        </div>

        <div class="auth-fluid-right text-center">
            <div class="auth-user-testimonial">
                <h2 class="mb-3">I love the color!</h2>
                <p class="lead"><i class="mdi mdi-format-quote-open"></i> It's a elegent templete. I love it very much! . <i class="mdi mdi-format-quote-close"></i>
                </p>
                <p>
                    - Hyper Admin User
                </p>
            </div> <!-- end auth-user-testimonial-->
        </div>
    </div>


    @include('layouts.shared/footer-scripts')


</body>

</html>

@extends('layouts.detached', ['title' => 'Chat'])

@section('css')
@endsection

@section('content')
@include('layouts.shared/page-title',['page_title' => 'Chat','sub_title' => 'Apps'])

<div class="row">
    <!-- start chat users-->
    <div class="col-xxl-3 col-xl-6 order-xl-1">
        <div class="card">
            <div class="card-body p-0">
                <ul class="nav nav-tabs nav-bordered">
                    <li class="nav-item">
                        <a href="#allUsers" data-bs-toggle="tab" aria-expanded="false" class="nav-link active py-2">
                            All
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#favUsers" data-bs-toggle="tab" aria-expanded="true" class="nav-link py-2">
                            Favourties
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#friendUsers" data-bs-toggle="tab" aria-expanded="true" class="nav-link py-2">
                            Friends
                        </a>
                    </li>
                </ul> <!-- end nav-->
                <div class="tab-content">
                    <div class="tab-pane show active card-body pb-0" id="newpost">

                        <!-- start search box -->
                        <div class="app-search">
                            <form>
                                <div class="mb-2 w-100 position-relative">
                                    <input type="search" class="form-control"
                                        placeholder="People, groups & messages..." />
                                    <span class="mdi mdi-magnify search-icon"></span>
                                </div>
                            </form>
                        </div>
                        <!-- end search box -->
                    </div>

                    <!-- users -->
                    <div class="row">
                        <div class="col">
                            <div class="card-body py-0 mb-3" data-simplebar style="max-height: 546px">
                                <a href="javascript:void(0);" class="text-body">
                                    <div class="d-flex align-items-start mt-1 p-2">
                                        <img src="/images/users/avatar-2.jpg" class="me-2 rounded-circle" height="48" alt="Brandon Smith" />
                                        <div class="w-100 overflow-hidden">
                                            <h5 class="mt-0 mb-0 font-14">
                                                <span class="float-end text-muted font-12">4:30am</span>
                                                Brandon Smith
                                            </h5>
                                            <p class="mt-1 mb-0 text-muted font-14">
                                                <span class="w-25 float-end text-end"><span class="badge badge-danger-lighten">3</span></span>
                                                <span class="w-75">How are you today?</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>

                                <a href="javascript:void(0);" class="text-body">
                                    <div class="d-flex align-items-start bg-light-subtle p-2">
                                        <img src="/images/users/avatar-5.jpg" class="me-2 rounded-circle" height="48" alt="Shreyu N" />
                                        <div class="w-100 overflow-hidden">
                                            <h5 class="mt-0 mb-0 font-14">
                                                <span class="float-end text-muted font-12">5:30am</span>
                                                Shreyu N
                                            </h5>
                                            <p class="mt-1 mb-0 text-muted font-14">
                                                <span class="w-75">Hey! a reminder for tomorrow's meeting...</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                
                                <a href="javascript:void(0);" class="text-body">
                                    <div class="d-flex align-items-start mt-1 p-2">
                                        <img src="/images/users/avatar-7.jpg" class="me-2 rounded-circle" height="48" alt="Maria C" />
                                        <div class="w-100 overflow-hidden">
                                            <h5 class="mt-0 mb-0 font-14">
                                                <span class="float-end text-muted font-12">Thu</span>
                                                Maria C
                                            </h5>
                                            <p class="mt-1 mb-0 text-muted font-14">
                                                <span class="w-25 float-end text-end"><span class="badge badge-danger-lighten">2</span></span>
                                                <span class="w-75">Are we going to have this week's planning meeting today?</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                
                                <a href="javascript:void(0);" class="text-body">
                                    <div class="d-flex align-items-start mt-1 p-2">
                                        <img src="/images/users/avatar-10.jpg" class="me-2 rounded-circle" height="48" alt="Rhonda D" />
                                        <div class="w-100 overflow-hidden">
                                            <h5 class="mt-0 mb-0 font-14">
                                                <span class="float-end text-muted font-12">Wed</span>
                                                Rhonda D
                                            </h5>
                                            <p class="mt-1 mb-0 text-muted font-14">
                                                <span class="w-75">Please check these design assets...</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                
                                <a href="javascript:void(0);" class="text-body">
                                    <div class="d-flex align-items-start mt-1 p-2">
                                        <img src="/images/users/avatar-3.jpg" class="me-2 rounded-circle" height="48" alt="Michael H" />
                                        <div class="w-100 overflow-hidden">
                                            <h5 class="mt-0 mb-0 font-14">
                                                <span class="float-end text-muted font-12">Tue</span>
                                                Michael H
                                            </h5>
                                            <p class="mt-1 mb-0 text-muted font-14">
                                                <span class="w-25 float-end text-end"><span class="badge badge-danger-lighten">6</span></span>
                                                <span class="w-75">Are you free for 15 min? I would like to discuss something...</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                
                                <a href="javascript:void(0);" class="text-body">
                                    <div class="d-flex align-items-start mt-1 p-2">
                                        <img src="/images/users/avatar-6.jpg" class="me-2 rounded-circle" height="48" alt="Thomas R" />
                                        <div class="w-100 overflow-hidden">
                                            <h5 class="mt-0 mb-0 font-14">
                                                <span class="float-end text-muted font-12">Tue</span>
                                                Thomas R
                                            </h5>
                                            <p class="mt-1 mb-0 text-muted font-14">
                                                <span class="w-75">Let's have meeting today between me, you and Tony...</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                
                                <a href="javascript:void(0);" class="text-body">
                                    <div class="d-flex align-items-start mt-1 p-2">
                                        <img src="/images/users/avatar-8.jpg" class="me-2 rounded-circle" height="48" alt="Thomas J" />
                                        <div class="w-100 overflow-hidden">
                                            <h5 class="mt-0 mb-0 font-14">
                                                <span class="float-end text-muted font-12">Tue</span>
                                                Thomas J
                                            </h5>
                                            <p class="mt-1 mb-0 text-muted font-14">
                                                <span class="w-75">Howdy?</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                
                                <a href="javascript:void(0);" class="text-body">
                                    <div class="d-flex align-items-start mt-1 p-2">
                                        <img src="/images/users/avatar-1.jpg" class="me-2 rounded-circle" height="48" alt="Ricky J" />
                                        <div class="w-100 overflow-hidden">
                                            <h5 class="mt-0 mb-0 font-14">
                                                <span class="float-end text-muted font-12">Mon</span>
                                                Ricky J
                                            </h5>
                                            <p class="mt-1 mb-0 text-muted font-14">
                                                <span class="w-25 float-end text-end"><span class="badge badge-danger-lighten">28</span></span>
                                                <span class="w-75">Are you interested in learning?</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>                                                        

                            </div> <!-- end slimscroll-->
                        </div> <!-- End col -->
                    </div> <!-- end users -->
                </div> <!-- end tab content-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <!-- end chat users-->

    <!-- chat area -->
    <div class="col-xxl-6 col-xl-12 order-xl-2">
        <div class="card">
            <div class="card-body px-0 pb-0">
                <ul class="conversation-list px-3" data-simplebar style="max-height: 554px">
                    <li class="clearfix">
                        <div class="chat-avatar">
                            <img src="/images/users/avatar-5.jpg" class="rounded" alt="Shreyu N" />
                            <i>10:00</i>
                        </div>
                        <div class="conversation-text">
                            <div class="ctext-wrap">
                                <i>Shreyu N</i>
                                <p>
                                    Hello!
                                </p>
                            </div>
                        </div>
                        <div class="conversation-actions dropdown">
                            <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Copy Message</a>
                                <a class="dropdown-item" href="#">Edit</a>
                                <a class="dropdown-item" href="#">Delete</a>
                            </div>
                        </div>
                    </li>
                    <li class="clearfix odd">
                        <div class="chat-avatar">
                            <img src="/images/users/avatar-1.jpg" class="rounded" alt="dominic" />
                            <i>10:01</i>
                        </div>
                        <div class="conversation-text">
                            <div class="ctext-wrap">
                                <i>Dominic</i>
                                <p>
                                    Hi, How are you? What about our next meeting?
                                </p>
                            </div>
                        </div>
                        <div class="conversation-actions dropdown">
                            <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Copy Message</a>
                                <a class="dropdown-item" href="#">Edit</a>
                                <a class="dropdown-item" href="#">Delete</a>
                            </div>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="chat-avatar">
                            <img src="/images/users/avatar-5.jpg" class="rounded" alt="Shreyu N" />
                            <i>10:01</i>
                        </div>
                        <div class="conversation-text">
                            <div class="ctext-wrap">
                                <i>Shreyu N</i>
                                <p>
                                    Yeah everything is fine
                                </p>
                            </div>
                        </div>
                        <div class="conversation-actions dropdown">
                            <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Copy Message</a>
                                <a class="dropdown-item" href="#">Edit</a>
                                <a class="dropdown-item" href="#">Delete</a>
                            </div>
                        </div>
                    </li>
                    <li class="clearfix odd">
                        <div class="chat-avatar">
                            <img src="/images/users/avatar-1.jpg" class="rounded" alt="dominic" />
                            <i>10:02</i>
                        </div>
                        <div class="conversation-text">
                            <div class="ctext-wrap">
                                <i>Dominic</i>
                                <p>
                                    Wow that's great
                                </p>
                            </div>
                        </div>
                        <div class="conversation-actions dropdown">
                            <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Copy Message</a>
                                <a class="dropdown-item" href="#">Edit</a>
                                <a class="dropdown-item" href="#">Delete</a>
                            </div>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="chat-avatar">
                            <img src="/images/users/avatar-5.jpg" alt="Shreyu N" class="rounded" />
                            <i>10:02</i>
                        </div>
                        <div class="conversation-text">
                            <div class="ctext-wrap">
                                <i>Shreyu N</i>
                                <p>
                                    Let's have it today if you are free
                                </p>
                            </div>
                        </div>
                        <div class="conversation-actions dropdown">
                            <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Copy Message</a>
                                <a class="dropdown-item" href="#">Edit</a>
                                <a class="dropdown-item" href="#">Delete</a>
                            </div>
                        </div>
                    </li>
                    <li class="clearfix odd">
                        <div class="chat-avatar">
                            <img src="/images/users/avatar-1.jpg" alt="dominic" class="rounded" />
                            <i>10:03</i>
                        </div>
                        <div class="conversation-text">
                            <div class="ctext-wrap">
                                <i>Dominic</i>
                                <p>
                                    Sure thing! let me know if 2pm works for you
                                </p>
                            </div>
                        </div>
                        <div class="conversation-actions dropdown">
                            <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Copy Message</a>
                                <a class="dropdown-item" href="#">Edit</a>
                                <a class="dropdown-item" href="#">Delete</a>
                            </div>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="chat-avatar">
                            <img src="/images/users/avatar-5.jpg" alt="Shreyu N" class="rounded" />
                            <i>10:04</i>
                        </div>
                        <div class="conversation-text">
                            <div class="ctext-wrap">
                                <i>Shreyu N</i>
                                <p>
                                    Sorry, I have another meeting scheduled at 2pm. Can we have it
                                    at 3pm instead?
                                </p>
                            </div>
                        </div>
                        <div class="conversation-actions dropdown">
                            <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Copy Message</a>
                                <a class="dropdown-item" href="#">Edit</a>
                                <a class="dropdown-item" href="#">Delete</a>
                            </div>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="chat-avatar">
                            <img src="/images/users/avatar-5.jpg" alt="Shreyu N" class="rounded" />
                            <i>10:04</i>
                        </div>
                        <div class="conversation-text">
                            <div class="ctext-wrap">
                                <i>Shreyu N</i>
                                <p>
                                    We can also discuss about the presentation talk format if you have some extra mins
                                </p>
                            </div>
                        </div>
                        <div class="conversation-actions dropdown">
                            <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Copy Message</a>
                                <a class="dropdown-item" href="#">Edit</a>
                                <a class="dropdown-item" href="#">Delete</a>
                            </div>
                        </div>
                    </li>
                    <li class="clearfix odd">
                        <div class="chat-avatar">
                            <img src="/images/users/avatar-1.jpg" alt="dominic" class="rounded" />
                            <i>10:05</i>
                        </div>
                        <div class="conversation-text">
                            <div class="ctext-wrap">
                                <i>Dominic</i>
                                <p>
                                    3pm it is. Sure, let's discuss about presentation format, it would be great to finalize today. 
                                    I am attaching the last year format and assets here...
                                </p>
                            </div>
                            <div class="card mt-2 mb-1 shadow-none border text-start">
                                <div class="p-2">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="avatar-sm">
                                                <span class="avatar-title rounded">
                                                    .ZIP
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col ps-0">
                                            <a href="javascript:void(0);"
                                                class="text-muted fw-bold">Hyper-admin-design.zip</a>
                                            <p class="mb-0">2.3 MB</p>
                                        </div>
                                        <div class="col-auto">
                                            <!-- Button -->
                                            <a href="javascript:void(0);"
                                                class="btn btn-link btn-lg text-muted">
                                                <i class="ri-download-2-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="conversation-actions dropdown">
                            <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Copy Message</a>
                                <a class="dropdown-item" href="#">Edit</a>
                                <a class="dropdown-item" href="#">Delete</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div> <!-- end card-body -->
            <div class="card-body p-0">
                <div class="row">
                    <div class="col">
                        <div class="mt-2 bg-light p-3">
                            <form class="needs-validation" novalidate="" name="chat-form"
                                id="chat-form">
                                <div class="row">
                                    <div class="col mb-2 mb-sm-0">
                                        <input type="text" class="form-control border-0" placeholder="Enter your text" required="">
                                        <div class="invalid-feedback">
                                            Please enter your messsage
                                        </div>
                                    </div>
                                    <div class="col-sm-auto">
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-light"><i class="uil uil-paperclip"></i></a>
                                            <a href="#" class="btn btn-light"> <i class='uil uil-smile'></i> </a>
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-success chat-send"><i class='uil uil-message'></i></button>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row-->
                            </form>
                        </div> 
                    </div> <!-- end col-->
                </div>
                <!-- end row -->
            </div>
        </div> <!-- end card -->
    </div>
    <!-- end chat area-->

    <!-- start user detail -->
    <div class="col-xxl-3 col-xl-6 order-xl-1 order-xxl-2">
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-horizontal"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">View full</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Edit Contact Info</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Remove</a>
                    </div>
                </div>

                <div class="mt-3 text-center">
                    <img src="/images/users/avatar-5.jpg" alt="shreyu"
                        class="img-thumbnail avatar-lg rounded-circle" />
                    <h4>Shreyu N</h4>
                    <button class="btn btn-primary btn-sm mt-1"><i class='uil uil-envelope-add me-1'></i>Send Email</button>
                    <p class="text-muted mt-2 font-14">Last Interacted: <strong>Few hours back</strong></p>
                </div>

                <div class="mt-3">
                    <hr class="" />

                    <p class="mt-4 mb-1"><strong><i class='uil uil-at'></i> Email:</strong></p>
                    <p>support@coderthemes.com</p>

                    <p class="mt-3 mb-1"><strong><i class='uil uil-phone'></i> Phone Number:</strong></p>
                    <p>+1 456 9595 9594</p>

                    <p class="mt-3 mb-1"><strong><i class='uil uil-location'></i> Location:</strong></p>
                    <p>California, USA</p>

                    <p class="mt-3 mb-1"><strong><i class='uil uil-globe'></i> Languages:</strong></p>
                    <p>English, German, Spanish</p>

                    <p class="mt-3 mb-2"><strong><i class='uil uil-users-alt'></i> Groups:</strong></p>
                    <p class="mb-0">
                        <span class="badge badge-success-lighten p-1 font-14">Work</span>
                        <span class="badge badge-primary-lighten p-1 font-14">Friends</span>
                    </p>
                </div>
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
    <!-- end user detail -->
</div> <!-- end row-->
@endsection

@extends('layouts.detached', ['title' => 'File Manager'])

@section('content')
@include('layouts.shared/page-title',['page_title' => 'File Manager','sub_title' => 'Apps'])

<div class="row">

    <!-- Right Sidebar -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- Left sidebar -->
                <div class="page-aside-left">

                    <div class="btn-group d-block mb-2">
                        <button type="button" class="btn btn-success dropdown-toggle w-100" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-plus"></i> Create New </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"><i class="mdi mdi-folder-plus-outline me-1"></i> Folder</a>
                            <a class="dropdown-item" href="#"><i class="mdi mdi-file-plus-outline me-1"></i> File</a>
                            <a class="dropdown-item" href="#"><i class="mdi mdi-file-document me-1"></i> Document</a>
                            <a class="dropdown-item" href="#"><i class="mdi mdi-upload me-1"></i> Choose File</a>
                        </div>
                    </div>
                    <div class="email-menu-list mt-3">
                        <a href="#" class="list-group-item border-0"><i class="mdi mdi-folder-outline font-18 align-middle me-2"></i>My Files</a>
                        <a href="#" class="list-group-item border-0"><i class="mdi mdi-google-drive font-18 align-middle me-2"></i>Google Drive</a>
                        <a href="#" class="list-group-item border-0"><i class="mdi mdi-dropbox font-18 align-middle me-2"></i>Dropbox</a>
                        <a href="#" class="list-group-item border-0"><i class="mdi mdi-share-variant font-18 align-middle me-2"></i>Share with me</a>
                        <a href="#" class="list-group-item border-0"><i class="mdi mdi-clock-outline font-18 align-middle me-2"></i>Recent</a>
                        <a href="#" class="list-group-item border-0"><i class="mdi mdi-star-outline font-18 align-middle me-2"></i>Starred</a>
                        <a href="#" class="list-group-item border-0"><i class="mdi mdi-delete font-18 align-middle me-2"></i>Deleted Files</a>
                    </div>

                    <div class="mt-5">
                        <h4><span class="badge rounded-pill p-1 px-2 badge-secondary-lighten">FREE</span></h4>
                        <h6 class="text-uppercase mt-3">Storage</h6>
                        <div class="progress my-2 progress-sm">
                            <div class="progress-bar progress-lg bg-success" role="progressbar" style="width: 46%" aria-valuenow="46" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="text-muted font-12 mb-0">7.02 GB (46%) of 15 GB used</p>
                    </div>

                </div>
                <!-- End Left sidebar -->

                <div class="page-aside-right">

                    <div class="d-lg-flex justify-content-between align-items-center">
                        <div class="app-search">
                            <form>
                                <div class="mb-2 position-relative">
                                    <input type="text" class="form-control" placeholder="Search files...">
                                    <span class="mdi mdi-magnify search-icon"></span>
                                </div>
                            </form>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-sm btn-light"><i class="mdi mdi-format-list-bulleted"></i></button>
                            <button type="submit" class="btn btn-sm"><i class="mdi mdi-view-grid"></i></button>
                            <button type="submit" class="btn btn-sm"><i class="mdi mdi-information-outline"></i></button>
                        </div>
                    </div>

                    <div class="mt-3">
                        <h5 class="mb-2">Quick Access</h5>

                        <div class="row mx-n1 g-0">
                            <div class="col-xxl-3 col-lg-6">
                                <div class="card m-1 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-light text-reset rounded">
                                                        <i class="mdi mdi-folder-zip font-16"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col ps-0">
                                                <a href="javascript:void(0);" class="text-muted fw-bold">Hyper-sketch.zip</a>
                                                <p class="mb-0 font-13">2.3 MB</p>
                                            </div>
                                        </div> <!-- end row -->
                                    </div> <!-- end .p-2-->
                                </div> <!-- end col -->
                            </div> <!-- end col-->

                            <div class="col-xxl-3 col-lg-6">
                                <div class="card m-1 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-light text-reset rounded">
                                                        <i class="mdi mdi-folder font-16"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col ps-0">
                                                <a href="javascript:void(0);" class="text-muted fw-bold">Compile Version</a>
                                                <p class="mb-0 font-13">87.2 MB</p>
                                            </div>
                                        </div> <!-- end row -->
                                    </div> <!-- end .p-2-->
                                </div> <!-- end col -->
                            </div> <!-- end col-->

                            <div class="col-xxl-3 col-lg-6">
                                <div class="card m-1 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-primary-lighten text-primary rounded">
                                                        <i class="mdi mdi-folder-zip-outline font-16"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col ps-0">
                                                <a href="javascript:void(0);" class="text-muted fw-bold">admin.zip</a>
                                                <p class="mb-0 font-13">45.1 MB</p>
                                            </div>
                                        </div> <!-- end row -->
                                    </div> <!-- end .p-2-->
                                </div> <!-- end col -->
                            </div> <!-- end col-->

                            <div class="col-xxl-3 col-lg-6">
                                <div class="card m-1 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-light text-reset rounded">
                                                        <i class="mdi mdi-file-pdf-box font-16"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col ps-0">
                                                <a href="javascript:void(0);" class="text-muted fw-bold">Docs.pdf</a>
                                                <p class="mb-0 font-13">7.5 MB</p>
                                            </div>
                                        </div> <!-- end row -->
                                    </div> <!-- end .p-2-->
                                </div> <!-- end col -->
                            </div> <!-- end col-->

                            <div class="col-xxl-3 col-lg-6">
                                <div class="card m-1 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-light text-reset rounded">
                                                        <i class="mdi mdi-file-pdf-box font-18"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col ps-0">
                                                <a href="javascript:void(0);" class="text-muted fw-bold">License-details.pdf</a>
                                                <p class="mb-0 font-13">784 KB</p>
                                            </div>
                                        </div> <!-- end row -->
                                    </div> <!-- end .p-2-->
                                </div> <!-- end col -->
                            </div> <!-- end col-->

                            <div class="col-xxl-3 col-lg-6">
                                <div class="card m-1 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-light text-reset rounded">
                                                        <i class="mdi mdi-folder-account font-18"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col ps-0">
                                                <a href="javascript:void(0);" class="text-muted fw-bold">Purchase Verification</a>
                                                <p class="mb-0 font-13">2.2 MB</p>
                                            </div>
                                        </div> <!-- end row -->
                                    </div> <!-- end .p-2-->
                                </div> <!-- end col -->
                            </div> <!-- end col-->

                            <div class="col-xxl-3 col-lg-6">
                                <div class="card m-1 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-light text-reset rounded">
                                                        <i class="mdi mdi-folder-account font-18"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col ps-0">
                                                <a href="javascript:void(0);" class="text-muted fw-bold">Hyper Integrations</a>
                                                <p class="mb-0 font-13">874 MB</p>
                                            </div>
                                        </div> <!-- end row -->
                                    </div> <!-- end .p-2-->
                                </div> <!-- end col -->
                            </div> <!-- end col-->
                        </div> <!-- end row-->
                    </div> <!-- end .mt-3-->


                    <div class="mt-3">
                        <h5 class="mb-3">Recent</h5>

                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="border-0">Name</th>
                                        <th class="border-0">Last Modified</th>
                                        <th class="border-0">Size</th>
                                        <th class="border-0">Owner</th>
                                        <th class="border-0">Members</th>
                                        <th class="border-0" style="width: 80px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="ms-2 fw-semibold"><a href="javascript: void(0);" class="text-reset">App Design & Development</a></span>
                                        </td>
                                        <td>
                                            <p class="mb-0">Jan 03, 2020</p>
                                            <span class="font-12">by Andrew</span>
                                        </td>
                                        <td>128 MB</td>
                                        <td>
                                            Danielle Thompson
                                        </td>
                                        <td id="tooltip-container">
                                            <div class="avatar-group">
                                                <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Mat Helme">
                                                    <img src="/images/users/avatar-1.jpg" class="rounded-circle avatar-xs" alt="friend">
                                                </a>
        
                                                <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Michael Zenaty">
                                                    <img src="/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt="friend">
                                                </a>
        
                                                <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="James Anderson">
                                                    <img src="/images/users/avatar-3.jpg" class="rounded-circle avatar-xs" alt="friend">
                                                </a>
        
                                                <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Username">
                                                    <img src="/images/users/avatar-5.jpg" class="rounded-circle avatar-xs" alt="friend">
                                                </a>
                                            </div>
                                        </td>
                                        <td class="">
                                            <div class="btn-group dropdown">
                                                <a href="#" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-xs" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-share-variant me-2 text-muted vertical-middle"></i>Share</a>
                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-link me-2 text-muted vertical-middle"></i>Get Sharable Link</a>
                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-pencil me-2 text-muted vertical-middle"></i>Rename</a>
                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-download me-2 text-muted vertical-middle"></i>Download</a>
                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-delete me-2 text-muted vertical-middle"></i>Remove</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            <span class="ms-2 fw-semibold"><a href="javascript: void(0);" class="text-reset">Hyper-sketch-design.zip</a></span>
                                        </td>
                                        <td>
                                            <p class="mb-0">Feb 13, 2020</p>
                                            <span class="font-12">by Coderthemes</span>
                                        </td>
                                        <td>521 MB</td>
                                        <td>
                                            Coder Themes
                                        </td>
                                        <td id="tooltip-container1">
                                            <div class="avatar-group">
                                                <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-container="#tooltip-container1" data-bs-toggle="tooltip" data-bs-placement="top" title="Mat Helme">
                                                    <img src="/images/users/avatar-4.jpg" class="rounded-circle avatar-xs" alt="friend">
                                                </a>
        
                                                <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-container="#tooltip-container1" data-bs-toggle="tooltip" data-bs-placement="top" title="Michael Zenaty">
                                                    <img src="/images/users/avatar-1.jpg" class="rounded-circle avatar-xs" alt="friend">
                                                </a>
        
                                                <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-container="#tooltip-container1" data-bs-toggle="tooltip" data-bs-placement="top" title="James Anderson">
                                                    <img src="/images/users/avatar-6.jpg" class="rounded-circle avatar-xs" alt="friend">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group dropdown">
                                                <a href="#" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-xs" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-share-variant me-2 text-muted vertical-middle"></i>Share</a>
                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-link me-2 text-muted vertical-middle"></i>Get Sharable Link</a>
                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-pencil me-2 text-muted vertical-middle"></i>Rename</a>
                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-download me-2 text-muted vertical-middle"></i>Download</a>
                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-delete me-2 text-muted vertical-middle"></i>Remove</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="ms-2 fw-semibold"><a href="javascript: void(0);" class="text-reset">Annualreport.pdf</a></span>
                                        </td>
                                        <td>
                                            <p class="mb-0">Dec 18, 2019</p>
                                            <span class="font-12">by Alejandro</span>
                                        </td>
                                        <td>7.2 MB</td>
                                        <td>
                                            Gary Coley
                                        </td>
                                        <td id="tooltip-container2">
                                            <div class="avatar-group">
                                                <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-container="#tooltip-container2" data-bs-toggle="tooltip" data-bs-placement="top" title="Mat Helme">
                                                    <img src="/images/users/avatar-9.jpg" class="rounded-circle avatar-xs" alt="friend">
                                                </a>
        
                                                <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-container="#tooltip-container2" data-bs-toggle="tooltip" data-bs-placement="top" title="Michael Zenaty">
                                                    <img src="/images/users/avatar-7.jpg" class="rounded-circle avatar-xs" alt="friend">
                                                </a>
        
                                                <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-container="#tooltip-container2" data-bs-toggle="tooltip" data-bs-placement="top" title="James Anderson">
                                                    <img src="/images/users/avatar-3.jpg" class="rounded-circle avatar-xs" alt="friend">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group dropdown">
                                                <a href="#" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-xs" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-share-variant me-2 text-muted vertical-middle"></i>Share</a>
                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-link me-2 text-muted vertical-middle"></i>Get Sharable Link</a>
                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-pencil me-2 text-muted vertical-middle"></i>Rename</a>
                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-download me-2 text-muted vertical-middle"></i>Download</a>
                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-delete me-2 text-muted vertical-middle"></i>Remove</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="ms-2 fw-semibold"><a href="javascript: void(0);" class="text-reset">Wireframes</a></span>
                                        </td>
                                        <td>
                                            <p class="mb-0">Nov 25, 2019</p>
                                            <span class="font-12">by Dunkle</span>
                                        </td>
                                        <td>54.2 MB</td>
                                        <td>
                                            Jasper Rigg
                                        </td>
                                        <td id="tooltip-container3">
                                            <div class="avatar-group">
                                                <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-container="#tooltip-container3" data-bs-toggle="tooltip" data-bs-placement="top" title="Mat Helme">
                                                    <img src="/images/users/avatar-1.jpg" class="rounded-circle avatar-xs" alt="friend">
                                                </a>
        
                                                <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-container="#tooltip-container3" data-bs-toggle="tooltip" data-bs-placement="top" title="Michael Zenaty">
                                                    <img src="/images/users/avatar-8.jpg" class="rounded-circle avatar-xs" alt="friend">
                                                </a>
        
                                                <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-container="#tooltip-container3" data-bs-toggle="tooltip" data-bs-placement="top" title="James Anderson">
                                                    <img src="/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt="friend">
                                                </a>
        
                                                <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-container="#tooltip-container3" data-bs-toggle="tooltip" data-bs-placement="top" title="Username">
                                                    <img src="/images/users/avatar-5.jpg" class="rounded-circle avatar-xs" alt="friend">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group dropdown">
                                                <a href="#" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-xs" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-share-variant me-2 text-muted vertical-middle"></i>Share</a>
                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-link me-2 text-muted vertical-middle"></i>Get Sharable Link</a>
                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-pencil me-2 text-muted vertical-middle"></i>Rename</a>
                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-download me-2 text-muted vertical-middle"></i>Download</a>
                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-delete me-2 text-muted vertical-middle"></i>Remove</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="ms-2 fw-semibold"><a href="javascript: void(0);" class="text-reset">Documentation.docs</a></span>
                                        </td>
                                        <td>
                                            <p class="mb-0">Feb 9, 2020</p>
                                            <span class="font-12">by Justin</span>
                                        </td>
                                        <td>8.3 MB</td>
                                        <td>
                                            Cooper Sharwood
                                        </td>
                                        <td id="tooltip-container4">
                                            <div class="avatar-group">
                                                <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-container="#tooltip-container4" data-bs-toggle="tooltip" data-bs-placement="top" title="Mat Helme">
                                                    <img src="/images/users/avatar-3.jpg" class="rounded-circle avatar-xs" alt="friend">
                                                </a>
        
                                                <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-container="#tooltip-container4" data-bs-toggle="tooltip" data-bs-placement="top" title="Michael Zenaty">
                                                    <img src="/images/users/avatar-10.jpg" class="rounded-circle avatar-xs" alt="friend">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group dropdown">
                                                <a href="#" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-xs" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-share-variant me-2 text-muted vertical-middle"></i>Share</a>
                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-link me-2 text-muted vertical-middle"></i>Get Sharable Link</a>
                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-pencil me-2 text-muted vertical-middle"></i>Rename</a>
                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-download me-2 text-muted vertical-middle"></i>Download</a>
                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-delete me-2 text-muted vertical-middle"></i>Remove</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div> <!-- end .mt-3-->

                </div> 
                <!-- end inbox-rightbar-->
            </div>
            <!-- end card-body -->
            <div class="clearfix"></div>
        </div> <!-- end card-box -->

    </div> <!-- end Col -->
</div><!-- End row -->
@endsection

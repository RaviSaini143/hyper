
@extends('layouts.detached', ['title' => 'Profile'])
<style>
input.form-control.update {
    width: 85px;
    text-align: center;
}
    </style>
@section('content')
    @include('layouts.shared/page-title', ['sub_title' => 'Pages', 'page_title' => 'Profile'])
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form id="profile-update" method="post" action="{{route('user.update.profile',['id' => $authUser->id])}}">
                            @csrf
                        <div class="col-xl-6">
                            <div class="mb-3">
                                  <input type="hidden" id="id" class="form-control" value="{{$authUser->id}}">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" value="{{$authUser->name}}">
                            </div>

                          

                           <!-- <div class="mb-0">
                                <label for="project-overview" class="form-label">Team Members</label>

                                <select class="form-control select2" data-toggle="select2">
                                    <option>Select</option>
                                    <option value="AZ">Mary Scott</option>
                                    <option value="CO">Holly Campbell</option>
                                    <option value="ID">Beatrice Mills</option>
                                    <option value="MT">Melinda Gills</option>
                                    <option value="NE">Linda Garza</option>
                                    <option value="NM">Randy Ortez</option>
                                    <option value="ND">Lorene Block</option>
                                    <option value="UT">Mike Baker</option>
                                </select>

                                <div class="mt-2" id="tooltip-container">
                                    <a href="javascript:void(0);" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Mat Helme" class="d-inline-block">
                                        <img src="/images/users/avatar-6.jpg" class="rounded-circle avatar-xs" alt="friend">
                                    </a>

                                    <a href="javascript:void(0);" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Michael Zenaty" class="d-inline-block">
                                        <img src="/images/users/avatar-7.jpg" class="rounded-circle avatar-xs" alt="friend">
                                    </a>

                                    <a href="javascript:void(0);" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="James Anderson" class="d-inline-block">
                                        <img src="/images/users/avatar-8.jpg" class="rounded-circle avatar-xs" alt="friend">
                                    </a>

                                    <a href="javascript:void(0);" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Lorene Block" class="d-inline-block">
                                        <img src="/images/users/avatar-4.jpg" class="rounded-circle avatar-xs" alt="friend">
                                    </a>

                                    <a href="javascript:void(0);" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Mike Baker" class="d-inline-block">
                                        <img src="/images/users/avatar-5.jpg" class="rounded-circle avatar-xs" alt="friend">
                                    </a>
                                </div>

                            </div>-->

                        </div> <!-- end col-->

                        <div class="col-xl-6">
                            <div class="mb-3 position-relative" id="email">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" value="{{$authUser->email}}">
                            </div>

                            <div class="mb-3 position-relative">
                                <input type="submit" class="form-control update" name="submit" value="Update">
                            </div>
                            <!--<div class="mb-3 mt-3 mt-xl-0">
                                <label for="projectname" class="mb-0">Avatar</label>
                                <p class="text-muted font-14">Recommended thumbnail size 800x400 (px).</p>

                                <form action="/" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
                                    data-upload-preview-template="#uploadPreviewTemplate">
                                    <div class="fallback">
                                        <input name="file" type="file" />
                                    </div>

                                    <div class="dz-message needsclick">
                                        <i class="h3 text-muted ri-upload-cloud-2-line"></i>
                                        <h4>Drop files here or click to upload.</h4>
                                    </div>
                                </form>

                             
                                <div class="dropzone-previews mt-3" id="file-previews"></div>

                              
                                <div class="d-none" id="uploadPreviewTemplate">
                                    <div class="card mt-1 mb-0 shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                                                </div>
                                                <div class="col ps-0">
                                                    <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                                                    <p class="mb-0" data-dz-size></p>
                                                </div>
                                                <div class="col-auto">
                                                   
                                                    <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                                        <i class="ri-close-line"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>-->

                            <!-- Date View -->
                            <!-- Date View -->
                            
                        </div> <!-- end col-->
                    </form> 
                    </div>
                    <!-- end row -->

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->
@endsection

@section('script')
@vite([
    'resources/js/pages/demo.profile.js',
    ])
@endsection
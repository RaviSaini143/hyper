@extends('layouts.detached', ['title' => 'Products'])

@section('css')
@vite([
    'node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css',
    'node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css',
    ])
@endsection

@section('content')
@include('layouts.shared/page-title',['page_title' => 'Products','sub_title' => 'eCommerce'])

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-5">
                        <a href="{{route('user.add')}}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add User</a>
                    </div>
                    <div class="col-sm-7">
                        <div class="text-sm-end">
                            <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog-outline"></i></button>
                            <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                            <button type="button" class="btn btn-light mb-2">Export</button>
                        </div>
                    </div><!-- end col-->
                </div>

                <div class="table-responsive">
                    <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
                        <thead class="table-light">
                            <tr>
                                <th class="all" style="width: 20px;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Ip Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Zip Code</th>
                                <th>Status</th>
                                <th>Type</th>
                                <th style="width: 85px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                               @foreach($users as $user)
                            <tr>
                             
                                <td></td>
                                <td>{{$user->id}}</td>
                                 <td>{{$user->firstname}}</td>
                                 <td>{{$user->lastname}}</td>
                                 <td>{{$user->email}}</td>
                                 <td>{{$user->phone}}</td>
                                 <td>{{$user->address}}</td>
                                 <td>{{$user->ipaddress}}</td>
                                 <td>{{$user->city}}</td>
                                 <td>{{$user->state}}</td>
                                 <td>{{$user->zipcode}}</td>
                                  <td>
                                    <span class="badge bg-success">
                                        {{ $user->status == 0 ? 'Active' : $user->status }}
                                    </span>
                                </td>

                                 <td>{{$user->user_type}}</td>
                               
                                <td class="table-action">
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                              
                               
                               
                            </tr>
                              @endforeach
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->
@endsection

@section('script')
@vite(['resources/js/pages/demo.products.js'])
@endsection
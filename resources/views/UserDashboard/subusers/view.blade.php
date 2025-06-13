@extends('layouts.user.detached', ['title' => 'Dashboard'])

@section('css')
    @vite(['node_modules/daterangepicker/daterangepicker.css', 'node_modules/jsvectormap/dist/jsvectormap.min.css'])
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-5">
                        <a href="{{route('subuser.add')}}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> {{ __('Add Sub User') }}</a>
                    </div>
                    <div class="col-sm-7">
                        <div class="text-sm-end">
                            <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog-outline"></i></button>
                            <button type="button" class="btn btn-light mb-2 me-1">{{ __('Import') }}</button>
                            <button type="button" class="btn btn-light mb-2">{{ __('Export') }}</button>
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
                                <th>{{ __('Id') }}</th>
                                <th>{{ __('Email') }}</th>
								 <th>{{ __('Status') }}</th>
                                <th>{{ __('Type') }}</th>
                                <th style="width: 85px;">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subusers as $user)
                            <tr>
                                <td></td>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form action="{{ route('subuser.toggleStatus', $user->id) }}" method="POST">
                                        @csrf
                                        @if($user->status == 0)
                                            <button type="submit" class="btn btn-success btn-sm">
                                                {{ __('Active') }}
                                            </button>
                                        @else
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                {{ __('Suspended') }}
                                            </button>
                                        @endif
                                    </form>
                                </td>
                                <td>{{ $user->user_type }}</td>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if(session('success'))
        Swal.fire({
            title: 'Success!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    @endif
</script>

@endsection
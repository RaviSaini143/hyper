@extends('layouts.detached', ['title' => 'Products'])

@section('css')
@vite([
    'node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css',
    'node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css',
    ])
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
	<style>
	.bulk-btn {
    float: right;
    margin-top: -5em;
}
	</style>
@endsection

@section('content')
@include('layouts.shared/page-title',['page_title' => 'Products','sub_title' => 'eCommerce'])
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-5">
                        <a href="{{ route('user.add') }}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> {{ __('Add User') }}</a>
                    </div>
                    <!-- <div class="col-sm-7">
                        <div class="text-sm-end">
                            <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog-outline"></i></button>
                            <button type="button" class="btn btn-light mb-2 me-1">{{ __('Import') }}</button>
                            <button type="button" class="btn btn-light mb-2">{{ __('Export') }}</button>
                        </div>
                    </div>-->
                </div>
<form method="POST" id="bulk-action-form" action="{{ route('users.bulkAction') }}">
    @csrf

    <div class="mb-3">
	<div class="bulk-btn">
        <button type="submit" name="action" value="suspend" class="btn btn-warning btn-sm">{{ __('Suspend Selected') }}</button>
		 <button type="submit" name="action" value="active" class="btn btn-success btn-sm">{{ __('Active Selected') }}</button>
        <button type="submit" name="action" value="delete" class="btn btn-danger btn-sm">{{ __('Delete Selected') }}</button>
    </div> 
	</div>

    <div class="table-responsive" style="overflow-x:auto;">
        <table class="table table-centered w-100 nowrap" id="products-datatable1">
            <thead class="table-light">
                <tr>
                    <th style="width: 20px;">
                        <input type="checkbox" id="select-all">
                    </th>
                    <th>{{ __('Id') }}</th>
                    <th>{{ __('First Name') }}</th>
                    <th>{{ __('Last Name') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Phone') }}</th>
					<th>{{ __('Status') }}</th>
                    <th>{{ __('Services used') }}</th>
                    <th>{{ __('Address') }}</th>
                    <th>{{ __('IP Address') }}</th>
					<th>{{ __('Timezone') }}</th>
                    <th>{{ __('City') }}</th>
                    <th>{{ __('State') }}</th>
                    <th>{{ __('Zip Code') }}</th>
                    
                    <th>{{ __('Type') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
			</form>
                @foreach($users as $user)
                    <tr>
                        <td><input type="checkbox" class="user-checkbox" name="users[]" value="{{ $user->id }}" data-user-id="{{ $user->id }}"></td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
						<td>
                                    <form action="{{ route('users.toggleStatus', $user->id) }}" method="POST">
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
                        <td>{{ $user->services_used ?? 'null' }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->ipaddress }}</td>
						<td>{{ $user->timezone }}</td>
                        <td>{{ $user->city }}</td>
                        <td>{{ $user->state }}</td>
                        <td>{{ $user->zipcode }}</td>
                        
                        <td>{{ $user->user_type }}</td>
                        <td class="table-action">
                           <a href="{{route('user.auto.login',$user->id)}}" class="action-icon"><i class="mdi mdi-login"></i>
</a>
                            <a href="{{route('user.listing.edit',$user->id)}}" class="action-icon"><i class="mdi mdi-square-edit-outline"></i></a>
                           <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this user?');">
							@csrf
							<button type="submit" class="btn btn-link p-0 action-icon text-danger">
								<i class="mdi mdi-delete"></i>
							</button>
						</form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


                <!--<div class="table-responsive">
                    <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable1">
                        <thead class="table-light">
                            <tr>
                                <th class="all" style="width: 20px;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>{{ __('Id') }}</th>
                                <th>{{ __('First Name') }}</th>
                                <th>{{ __('Last Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Phone') }}</th>
								<th>{{ __('Services used') }}</th>
                                <th>{{ __('Address') }}</th>
                                <th>{{ __('Ip Address') }}</th>
                                <th>{{ __('City') }}</th>
                                <th>{{ __('State') }}</th>
                                <th>{{ __('Zip Code') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Type') }}</th>
                                <th style="width: 85px;">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td></td>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->firstname }}</td>
                                <td>{{ $user->lastname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
								<td>{{ $user->services_used ?? 'null' }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->ipaddress }}</td>				
                                <td>{{ $user->city }}</td>
                                <td>{{ $user->state }}</td>
                                <td>{{ $user->zipcode }}</td>
                                <td>
                                    <form action="{{ route('users.toggleStatus', $user->id) }}" method="POST">
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
                </div>-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->
@endsection

@section('script')
@vite(['resources/js/pages/demo.products.js'])
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    {{-- DataTables Core + Bootstrap5 + Responsive --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        /* $(document).ready(function () {
            $('#products-datatable1').DataTable({
    responsive: false, 
    scrollX: true,     
    language: {
        search: "_INPUT_",
        searchPlaceholder: "Search all fields..."
    },
    columnDefs: [
        { orderable: false, targets: 0 } // first column (checkbox) not sortable
    ],
    order: [[1, 'asc']]
}); */

/* $(document).ready(function () {
    // Init DataTable
    let table = $('#products-datatable1').DataTable({
        responsive: false,
        scrollX: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search all fields..."
        },
        order: [[1, 'asc']],
        columnDefs: [
            { orderable: false, targets: [0, 14] } // Checkbox + Action columns not sortable
        ]
    });

    // Select all checkboxes
    $('#select-all').on('click', function () {
        $('.user-checkbox').prop('checked', this.checked);
    });

    // Sync main checkbox with individual checkboxes
    $('.user-checkbox').on('change', function () {
        $('#select-all').prop('checked', $('.user-checkbox:checked').length === $('.user-checkbox').length);
    });
$('.status-toggle-form').on('submit', function () {
    const userId = $(this).data('user-id');
    $(`.user-checkbox[data-user-id="${userId}"]`).prop('checked', true);
});

    // Confirm on bulk action
    $('#bulk-action-form').on('submit', function () {
        if ($('.user-checkbox:checked').length === 0) {
            alert('Please select at least one user.');
            return false;
        }

        return confirm('Are you sure you want to perform this action on the selected users?');
    });
});
            @if(session('success'))
                Swal.fire({
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            @endif */
    $(document).ready(function () {
    const table = $('#products-datatable1').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 10,
        ajax: {
            url: "{{ route('users.ajax') }}",
            type: "GET"
        },
        columns: [
            {
                data: 'id',
                render: function (data, type, row) {
                    return `<input type="checkbox" class="user-checkbox" name="users[]" value="${row.id}" data-user-id="${row.id}">`;
                },
                orderable: false
            },
            { data: 'id' },
            { data: 'firstname' },
            { data: 'lastname' },
            { data: 'email' },
            { data: 'phone' },
            {
                data: 'status',
                render: function (data, type, row) {
                    let form = `<form method="POST" action="/users/toggle-status/${row.id}" class="status-toggle-form" data-user-id="${row.id}">`;
                    form += `<input type="hidden" name="_token" value="{{ csrf_token() }}">`;
                    form += (data == 0)
                        ? '<button type="submit" class="btn btn-success btn-sm">Active</button>'
                        : '<button type="submit" class="btn btn-danger btn-sm">Suspended</button>';
                    form += '</form>';
                    return form;
                }
            },
            {
                data: 'services_used',
                render: data => data ?? 'null'
            },
            { data: 'address' },
            { data: 'ipaddress' },
			{ data: 'timezone' },
            { data: 'city' },
            { data: 'state' },
            { data: 'zipcode' },
            { data: 'user_type' },
            {
                data: null,
                render: function (data, type, row) {
                    return `
					<a href="/admin/user/login/${row.id}" class="action-icon"><i class="mdi mdi-login"></i></a>
                        <a href="/admin/user/edit/${row.id}" class="action-icon"><i class="mdi mdi-square-edit-outline"></i></a>
						

                        <form action="/admin/delete/${row.id}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-link p-0 action-icon text-danger">
                                <i class="mdi mdi-delete"></i>
                            </button>
                        </form>
                    `;
                },
                orderable: false
            }
        ]
    });

    // Select all checkboxes
    $('#select-all').on('click', function () {
        $('.user-checkbox').prop('checked', this.checked);
    });

    // Sync master checkbox
    $(document).on('change', '.user-checkbox', function () {
        $('#select-all').prop('checked', $('.user-checkbox:checked').length === $('.user-checkbox').length);
    });

    // On status toggle submit
    $(document).on('submit', '.status-toggle-form', function () {
        const userId = $(this).data('user-id');
        $(`.user-checkbox[data-user-id="${userId}"]`).prop('checked', true);
    });

    // Bulk action check
    $('#bulk-action-form').on('submit', function () {
        if ($('.user-checkbox:checked').length === 0) {
            alert('Please select at least one user.');
            return false;
        }
        return confirm('Are you sure you want to perform this action on the selected users?');
    });

   
});
   
    </script>
<script>
 // Optional: SweetAlert on session success
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
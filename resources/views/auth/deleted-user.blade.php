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
    margin-top: -3em;
}
	</style>
@endsection

@section('content')
@include('layouts.shared/page-title',['page_title' => __('Deleted User'),'sub_title' => __('Delete')])
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-5">
                       <!-- <a href="{{ route('user.add') }}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> {{ __('Add User') }}</a>-->
                    </div>
                    <!-- <div class="col-sm-7">
                        <div class="text-sm-end">
                            <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog-outline"></i></button>
                            <button type="button" class="btn btn-light mb-2 me-1">{{ __('Import') }}</button>
                            <button type="button" class="btn btn-light mb-2">{{ __('Export') }}</button>
                        </div>
                    </div>-->
                </div>
<form method="POST" id="bulk-action-form" action="{{ route('deleteduser.bulkAction') }}">
    @csrf

    <div class="mb-3">
	<div class="bulk-btn">
		 <button type="submit" name="action" value="restore" class="btn btn-success btn-sm">{{ __('Restore Selected') }}</button>
        <button type="submit" name="action" value="delete" class="btn btn-danger btn-sm">{{ __('Permanent Delete Selected') }}</button>
    </div> 
	</div>

    <div class="table-responsive" style="overflow-x:auto;">
        <table class="table table-centered w-100 nowrap" id="products-datatable123">
            <thead class="table-light">
                <tr>
                    <th style="width: 20px;">
                        <input type="checkbox" id="select-all">
                    </th>
                    <th>{{ __('Id') }}</th>
                    <th>{{ __('First Name') }}</th>
                    <th>{{ __('Last Name') }}</th>
                    <th>{{ __('Email') }}</th>
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
                        <td class="table-action">
                            <form action="{{ route('deleteduser.destroy', $user->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this user?');">
							@csrf
							<button type="submit" class="btn btn-link p-0 action-icon text-danger">
								<i class="mdi mdi-delete"></i>
							</button>
						</form>
						   
                           <form action="{{route('user.restore',$user->id)}}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this user?');">
							@csrf
							<button type="submit" class="btn btn-link p-0 action-icon text-danger">
								<i class="mdi mdi-restore"></i>

							</button>
						</form>

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
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    {{-- DataTables Core + Bootstrap5 + Responsive --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    $(document).ready(function () {
    const table = $('#products-datatable123').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 10,
        ajax: {
            url: "{{ route('deleteduser.ajax') }}",
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
            {
                data: null,
                render: function (data, type, row) {
                    return `
					
						

                        <form action="/admin/deleted/permanent/${row.id}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-link p-0 action-icon text-danger">
                                <i class="mdi mdi-delete"></i>
                            </button>
                        </form>
						  <form action="/admin/restore/${row.id}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-link p-0 action-icon text-danger">
                                <i class="mdi mdi-restore"></i>
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
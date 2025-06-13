@extends('layouts.detached', ['title' => 'Dashboard'])

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
                        <a href="{{route('language.add')}}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> {{ __('Add Language') }}</a>
                    </div>
                    <div class="col-sm-7">
                        <div class="text-sm-end">
                            <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog-outline"></i></button>
                            <button onclick="window.location.href='{{ route('lang.download') }}'" type="button" class="btn btn-light mb-2">{{ __('Export Sample File') }}</button>
                        </div>
                    </div><!-- end col-->
                </div>
				@if(session('success'))
					<div class="alert alert-success">{{ session('success') }}</div>
				@endif

				@if(session('error'))
					<div class="alert alert-danger">{{ session('error') }}</div>
				@endif
                <div class="table-responsive">
                    <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('S.no.') }}</th>
                                <th>{{ __('Language') }}</th>
                                <th style="width: 85px;">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
							@foreach($locales as $lang)
                            <tr>
                                <td>1</td>
                                <td>{{$lang}}</td>
								<td class="table-action">
									<form action="{{ route('lang.delete', ['locale' => $lang]) }}" method="POST" onsubmit="return confirm('Are you sure to delete {{ $lang }}?');">
										@csrf
										<button type="submit" class="action-icon btn btn-link p-0 border-0 bg-transparent">
											<i class="mdi mdi-delete text-danger"></i>
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
@endsection
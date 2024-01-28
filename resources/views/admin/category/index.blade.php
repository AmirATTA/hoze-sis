@extends('layouts.admin.master')
@section('title', 'دسته بندی ها')
@section('links')
	<link href="{{ asset('assets/plugins/sweet-alert/jquery.sweet-modal.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/sweet-alert/sweetalert.css') }}" rel="stylesheet" />
@endsection
@section('content')
<a href="{{ route('categories.create') }}"><button class="btn btn-primary news-btn">دسته بندی جدید +</button></a>
<!-- Row -->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="job-list">
						<thead>
							<tr>
								<th class="border-bottom-0">ردیف</th>
								<th class="border-bottom-0">عنوان</th>
								<th class="border-bottom-0">کلمه کلیدی</th>
								<th class="border-bottom-0">نوع</th>
								<th class="border-bottom-0">وضعیت</th>
								<th class="border-bottom-0">اقدامات</th>
							</tr>
						</thead>
						<tbody>
							@foreach($category as $data)

							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $data->name }}</td>
								<td>{{ $data->slug }}</td>
								<td>@if($data->type == 'news') اخبار ها @else آموزش ها @endif</td>
								@if ($data->status == '1')
									<td>
										<span class="badge badge-success">فعال</span>
									</td>
								@else
									<td>
										<span class="badge badge-danger">غیر فعال</span>
									</td>
								@endif
								<td>
									<div class="d-flex">
										<a href="{{ route('categories.edit', $data->id) }}" class="action-btns1">
											<i class="feather feather-edit-2  text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="ویرایش"></i>
										</a>
										<a href="#" data-id="{{ $data->id }}" class="action-btns1 role" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف"><i class="feather feather-trash-2 text-danger"></i></a>
									</div>
								</td>
							</tr>

							@endforeach
						</tbody>
					</table>
					@if(count($category) === 0)
						<div class="text-center text-danger" style="font-family: unset;">هیچ داده ای وجود ندارد</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Row -->
@endsection
@section('scripts')
		<script src="{{ asset('assets/plugins/sweet-alert/jquery.sweet-modal.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
		<script src="{{ asset('assets/js/sweet-alert.js') }}"></script>
@endsection

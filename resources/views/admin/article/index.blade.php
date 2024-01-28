@extends('layouts.admin.master')
@section('title', 'آموزش ها')
@section('links')
	<link href="{{ asset('assets/plugins/sweet-alert/jquery.sweet-modal.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/sweet-alert/sweetalert.css') }}" rel="stylesheet" />
@endsection
@section('content')
<a href="{{ route('articles.create') }}"><button class="btn btn-primary news-btn">آموزش جدید +</button></a>
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
								<th class="border-bottom-0">تصویر</th>
								<th class="border-bottom-0">تعداد بازدید</th>
								<th class="border-bottom-0">دسته بندی</th>
								<th class="border-bottom-0">وضعیت</th>
								<th class="border-bottom-0">اقدامات</th>
							</tr>
						</thead>
						<tbody>
							@foreach($article as $data)

							<tr>
								<td>{{ $loop->iteration }} @if($data->featured) <i class="fa-solid fa-star" style="color:orange;"></i> @endif</td>
								<td>{{ $data->title }}</td>
								<td>
									<img src="{{ asset('storage/article/'.$data->image) }}" class="img-thumbnail rounded" style="max-width: 60px;">
								</td>
								<td>{{ $data->views_count }}</td>
								<td>{{ \App\Models\Category::find($data->category_id)->name }}</td>
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
										<a href="{{ route('articles.show', $data->id) }}" class="action-btns1" data-toggle="tooltip" data-placement="top" title="" data-original-title="نمایش">
											<i class="feather feather-eye text-primary"></i>
										</a>
										<a href="{{ route('articles.edit', $data->id) }}" class="action-btns1">
											<i class="feather feather-edit-2  text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="ویرایش"></i>
										</a>
										<a href="#" data-id="{{ $data->id }}" class="action-btns1 role-article" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف">
											<i class="feather feather-trash-2 text-danger"></i>
										</a>
									</div>
								</td>
							</tr>

							@endforeach
						</tbody>
					</table>
					@if(count($article) === 0)
						<div class="text-center text-danger" style="font-family: unset;">هیچ داده ای وجود ندارد</div>
					@endif
				</div>
				{!! $article->links('vendor.pagination.bootstrap-4') !!}
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

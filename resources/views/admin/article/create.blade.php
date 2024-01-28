@extends('layouts.admin.master')
@section('title', 'آموزش جدید')
@section('links')
	<link href="{{ asset('assets/plugins/wysiwyag/rte_theme_default.css') }}" rel="stylesheet" />
	
	<!-- INTERNAL File Uploads css-->
	<link href="{{ asset('assets/plugins/fileupload/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!-- Row -->
<div class="row">
	<div class="col-md-12">

		<x-errors></x-errors>
		
		<div class="card">
			<form action="{{ route('articles.store') }}" id="article" name="article" method="post" enctype="multipart/form-data">
				@csrf
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">عنوان</label>
								<input class="form-control" value="{{ old('title') }}" placeholder="عنوان" name="title">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">توضيح كوتاه</label>
								<input class="form-control" value="{{ old('summary') }}" placeholder="خلاصه" name="summary">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">دسته بندی</label>
								<select class="form-control custom-select select2" name="category_id" data-placeholder="انتخاب دسته بندی">
									<option label="انتخاب نوع دسته بندی"></option>
									@foreach($categories as $item)										
										<option value="{{ $item->id }}">{{ $item->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">کلمه کلیدی</label>
								<input class="form-control" value="{{ old('slug') }}" placeholder="کلمه کلیدی" name="slug">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">تصویر</label>
								<input type="file" class="dropify" id="image" data-height="180" name="image" accept=".jpg, .jpeg, .png" />
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label class="form-label">بدنه</label>
								<textarea class="content" name="body" id="example">{{ old('body') }}</textarea>
							</div>
						</div>
					</div>
					<div class="custom-controls-stacked d-md-flex my-4">
						<label class="form-label mt-1 ml-5">وضعیت :</label>
						<label class="custom-control custom-radio success ml-4">
							<input type="radio" class="custom-control-input" name="status" value="1" checked>
							<span class="custom-control-label">فعال</span>
						</label>
						<label class="custom-control custom-radio success ml-4">
							<input type="radio" class="custom-control-input" name="status" value="0">
							<span class="custom-control-label">غیر فعال</span>
						</label>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">عنوان منبع</label>
								<input class="form-control" value="{{ old('resource_label') }}" placeholder="عنوان منبع" name="resource_label">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">لینک منبع</label>
								<input class="form-control" value="{{ old('resource_url') }}" placeholder="لینک منبع" name="resource_url">
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer text-left">
					<a onclick="window.history.back();" class="btn btn-danger btn-lg">برگشت</a>
					<button type="submit" class="btn btn-success btn-lg">ثبت</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Row -->
@endsection
@section('scripts')
	<script src="{{ asset('assets/plugins/wysiwyag/rte.js') }}"></script>
	<script src="{{ asset('assets/plugins/wysiwyag/all_plugins.js') }}"></script>
	<script src="{{ asset('assets/js/form-editor2.js') }}"></script>
	
	<!-- INTERNAL File uploads js -->
	<script src="{{ asset('assets/plugins/fileupload/js/dropify.js') }}"></script>
	<script src="{{ asset('assets/js/filupload.js') }}"></script>
@endsection

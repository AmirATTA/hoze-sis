@extends('layouts.admin.master')
@section('title', 'لينک جدید')
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
			<form action="{{ route('links.store') }}" id="link" name="link" method="post" enctype="multipart/form-data">
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
								<label class="form-label">عنوان فرعی</label>
								<input class="form-control" value="{{ old('subtitle') }}" placeholder="عنوان فرعی" name="subtitle">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">لینک</label>
								<input class="form-control" value="{{ old('link') }}" placeholder="لینک" name="link">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">تصویر</label>
								<input type="file" class="dropify" id="image" data-height="180" name="image" accept=".jpg, .jpeg, .png" />
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

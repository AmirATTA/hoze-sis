@extends('layouts.admin.master')
@section('title', 'دسته بندی جدید')
@section('content')
<!-- Row -->
<div class="row">
	<div class="col-md-12">

		<x-errors></x-errors>
		
		<div class="card">
			<form action="{{ route('categories.store') }}" id="category" name="category" method="post">
				@csrf
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">عنوان</label>
								<input class="form-control" value="{{ old('name') }}" placeholder="عنوان" name="name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label d-inline-block">کلمه کلیدی</label><span style="opacity:.7;"> (اختیاری)</span>
								<input class="form-control" value="{{ old('name') }}" placeholder="کلمه کلیدی" name="slug">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">نوع</label>
								<select class="form-control custom-select select2" name="type" data-placeholder="انتخاب نوع دسته بندی">
									<option label="انتخاب نوع دسته بندی"></option>
										<option value="news">اخبار ها</option>
										<option value="articles">آموزش ها</option>
								</select>
							</div>
						</div>
					</div>
					<div class="custom-controls-stacked d-md-flex">
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
	<script src="{{ asset('assets/plugins/wysiwyag/jquery.richtext.js') }}"></script>
	<script src="{{ asset('assets/js/form-editor.js') }}"></script>
@endsection

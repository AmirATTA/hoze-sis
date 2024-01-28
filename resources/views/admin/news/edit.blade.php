@extends('layouts.admin.master')
@section('title', 'ویرایش خبر')
@section('links')
	<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet"/>

	<link href="{{ asset('assets/css/jquery.md.bootstrap.datetimepicker.style.css') }}" rel="stylesheet"/>

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
			<form action="{{ route('news.update', $news->id) }}" id="news" name="news" method="post" enctype="multipart/form-data">
				@csrf
				@method('PATCH')
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">عنوان</label>
								<input class="form-control" value="{{ $news->title }}" placeholder="عنوان" name="title">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">عنوان فرعی</label>
								<input class="form-control" value="{{ $news->subtitle }}" placeholder="عنوان فرعی" name="subtitle">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">توضيح كوتاه</label>
								<input class="form-control" value="{{ $news->summary }}" placeholder="خلاصه" name="summary">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">دسته بندی</label>
								<select class="form-control custom-select select2" name="category_id" data-placeholder="انتخاب دسته بندی">
									@foreach($categories as $item)
										<option value="{{ $item->id }}" @if($news->category_id == $item->id) selected @endif>{{ $item->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">کلمه کلیدی</label>
								<input class="form-control" value="{{ $news->slug }}" placeholder="کلمه کلیدی" name="slug">
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
								<textarea class="content" name="body" id="example">{{ $news->body }}</textarea>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="form-label">زمان انتشار</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text" id="dp-example">
										<span class="feather feather-calendar"></span>
									</div>
								</div><input class="form-control fc-datepicker hasDatepicker" value="{{ $published_at }}" id="dp-example-text" placeholder="YYYY/MM/DD" type="text" aria-label="date1" aria-describedby="date1">
								<input type="hidden" value="{{ $news->published_at }}" id="dp-example-date" name="published_at" aria-label="date11" aria-describedby="date11">
							</div>
						</div>
					</div>
					<div class="col-md-4 tags-input">
						<label class="form-label">برچسب ها</label>
						<select class="form-control tags" multiple="multiple" name="tags[]">
							@foreach($tags as $item)
								<option @if(in_array($item->id, $tag_ids)) selected="selected" @endif>{{ $item->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="custom-controls-stacked d-md-flex">
						<label class="form-label mt-1 ml-5">اخبار ویژه :</label>
						<label class="custom-control custom-radio success ml-4">
							<input type="radio" class="custom-control-input" name="featured" value="1" @if($news->featured == '1') checked @endif>
							<span class="custom-control-label">فعال</span>
						</label>
						<label class="custom-control custom-radio success ml-4">
							<input type="radio" class="custom-control-input" name="featured" value="0" @if($news->featured == '0') checked @endif>
							<span class="custom-control-label">غیر فعال</span>
						</label>
					</div>
					<div class="custom-controls-stacked d-md-flex">
						<label class="form-label mt-1 ml-5">وضعیت :</label>
						<label class="custom-control custom-radio success ml-4">
							<input type="radio" class="custom-control-input" name="status" value="1" @if($news->status == '1') checked @endif>
							<span class="custom-control-label">فعال</span>
						</label>
						<label class="custom-control custom-radio success ml-4">
							<input type="radio" class="custom-control-input" name="status" value="0" @if($news->status == '0') checked @endif>
							<span class="custom-control-label">غیر فعال</span>
						</label>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">عنوان منبع</label>
								<input class="form-control" value="{{ $news->resource_label }}" placeholder="عنوان منبع" name="resource_label">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">لینک منبع</label>
								<input class="form-control" value="{{ $news->resource_url }}" placeholder="لینک منبع" name="resource_url">
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer text-left">
					<a onclick="window.history.back();" class="btn btn-danger btn-lg">برگشت</a>
					<button type="submit" class="btn btn-success btn-lg">ذخيره</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Row -->
@endsection
@section('scripts')
	<script src="{{ asset('assets/plugins/jquery.md.bootstrap.datetimepicker.js') }}"></script>
	<script src="{{ asset('assets/js/calendar.js') }}"></script>

	<script src="{{ asset('assets/plugins/wysiwyag/rte.js') }}"></script>
	<script src="{{ asset('assets/plugins/wysiwyag/all_plugins.js') }}"></script>
	<script src="{{ asset('assets/js/form-editor2.js') }}"></script>

	<script src="{{ asset('assets/plugins/select2.min.js') }}"></script>
	<script src="{{ asset('assets/js/select2.js') }}"></script>
	
	<!-- INTERNAL File uploads js -->
	<script src="{{ asset('assets/plugins/fileupload/js/dropify.js') }}"></script>
	<script src="{{ asset('assets/js/filupload.js') }}"></script>
@endsection

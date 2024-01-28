@extends('layouts.admin.master')
@section('title', 'ویرایش خبر')
@section('links')
	<link href="{{ asset('assets/plugins/wysiwyag/rte_theme_default.css') }}" rel="stylesheet" />
@endsection
@section('content')
<!-- Row -->
<div class="row">
	<div class="col-md-12">

		<x-errors></x-errors>
		
		<div class="card">
			<form action="{{ route('articles.update', $article->id) }}" id="article" name="article" method="post" enctype="multipart/form-data">
				@csrf
				@method('PATCH')
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">عنوان</label>
								<input class="form-control" value="{{ $article->title }}" placeholder="عنوان" name="title">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">توضيح كوتاه</label>
								<input class="form-control" value="{{ $article->summary }}" placeholder="خلاصه" name="summary">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">دسته بندی</label>
								<select class="form-control custom-select select2" name="category_id" data-placeholder="انتخاب دسته بندی">
									@foreach($categories as $item)
										<option value="{{ $item->id }}" @if($article->category_id == $item->id) selected @endif>{{ $item->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">کلمه کلیدی</label>
								<input class="form-control" value="{{ $article->slug }}" placeholder="کلمه کلیدی" name="slug">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">تصویر</label>
								<input class="form-control-file" type="file" placeholder="تصویر" name="image" accept=".jpg, .jpeg, .png">
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label class="form-label">بدنه</label>
								<textarea class="content" name="body" id="example">{{ $article->body }}</textarea>
							</div>
						</div>
					</div>
					<div class="custom-controls-stacked d-md-flex my-4">
						<label class="form-label mt-1 ml-5">وضعیت :</label>
						<label class="custom-control custom-radio success ml-4">
							<input type="radio" class="custom-control-input" name="status" value="1" @if($article->status == '1') checked @endif>
							<span class="custom-control-label">فعال</span>
						</label>
						<label class="custom-control custom-radio success ml-4">
							<input type="radio" class="custom-control-input" name="status" value="0" @if($article->status == '0') checked @endif>
							<span class="custom-control-label">غیر فعال</span>
						</label>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">عنوان منبع</label>
								<input class="form-control" value="{{ $article->resource_label }}" placeholder="عنوان منبع" name="resource_label">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">لینک منبع</label>
								<input class="form-control" value="{{ $article->resource_url }}" placeholder="لینک منبع" name="resource_url">
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
	<script src="{{ asset('assets/plugins/wysiwyag/rte.js') }}"></script>
	<script src="{{ asset('assets/plugins/wysiwyag/all_plugins.js') }}"></script>
	<script src="{{ asset('assets/js/form-editor2.js') }}"></script>
@endsection

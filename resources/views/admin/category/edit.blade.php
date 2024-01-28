@extends('layouts.admin.master')
@section('title', 'ویرایش دسته بندی')
@section('content')
<!-- Row -->
<div class="row">
	<div class="col-md-12">

		<x-errors></x-errors>
		
		<div class="card">
			<form action="{{ route('categories.update', $category->id) }}" id="category" name="category" method="post">
				@csrf
				@method('PUT')
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">عنوان</label>
								<input class="form-control" value="{{ $category->name }}" placeholder="عنوان" name="name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label d-inline-block">کلمه کلیدی</label><span style="opacity:.7;"> (اختیاری)</span>
								<input class="form-control" value="{{ $category->slug }}" placeholder="کلمه کلیدی" name="slug">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">نوع</label>
								<select class="form-control custom-select select2" name="type" data-placeholder="انتخاب نوع دسته بندی">
									<option label="انتخاب نوع دسته بندی"></option>
										<option value="news" @if($category->type == 'news') selected @endif>اخبار ها</option>
										<option value="articles" @if($category->type == 'articles') selected @endif>آموزش ها</option>
								</select>
							</div>
						</div>
					</div>
					<div class="custom-controls-stacked d-md-flex">
						<label class="form-label mt-1 ml-5">وضعیت :</label>
						<label class="custom-control custom-radio success ml-4">
							<input type="radio" class="custom-control-input" name="status" value="1" @if($category->status == '1') checked @endif>
							<span class="custom-control-label">فعال</span>
						</label>
						<label class="custom-control custom-radio success ml-4">
							<input type="radio" class="custom-control-input" name="status" value="0" @if($category->status == '0') checked @endif>
							<span class="custom-control-label">غیر فعال</span>
						</label>
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
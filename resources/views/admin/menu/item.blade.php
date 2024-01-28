@extends('layouts.admin.master')
@section('title', 'زير مجموعه هاي منو')
@section('links')
	<link href="{{ asset('assets/plugins/sweet-alert/sweetalert.css') }}" rel="stylesheet" />
@endsection
@section('content')
<a href="#" data-toggle="modal" data-target="#newmenuitemmodal" id="menu_item">
    <button class="btn btn-primary news-btn">زير مجموعه جدید +</button>
</a>
<!-- Row -->
<div class="row">
	<div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom-0">
                <h3 class="card-title">{{ $menuGroup->label }}</h3>
            </div>
            <div class="card-body">
                <ul class="list-group" id="items">
                    @foreach($menuItem as $item)
                        <li class="listorder sortable">
                            <input type="hidden" value="{{ $item->order }}" class="order-input">
                            <i class="fa-solid fa-grip-vertical sortable-grib"></i>
                            <span class="item_title" data-id="{{ $menuGroup->id }}">{{ $item->title }}</span>
                            <span class="badge badge-success sortable-status">فعال</span>
                            <div class="sortable-actions d-flex">
                                <a href="#" class="action-btns1" data-toggle="modal" data-target="#changemenuitemmodal" onclick="menuItemEditModal(this)">
                                    <i class="feather feather-edit-2 text-success sortable-icons" data-toggle="tooltip" data-placement="top" title="" data-original-title="ویرایش"></i>
									<input type="hidden" value="{{ $item->id }}" class="item-id">
									<input type="hidden" value="{{ $item->title }}" class="item-title">
									<input type="hidden" value="{{ $item->linkable_type }}" class="item-linkable-type">
									<input type="hidden" value="{{ $item->linkable_id }}" class="item-linkable-id">
									<input type="hidden" value="{{ $item->link }}" class="item-link">
									<input type="hidden" value="{{ $item->new_tab }}" class="item-new-tab">
									<input type="hidden" value="{{ $item->status }}" class="item-status">
                                </a>
                                <a href="#" data-id="{{ $item->id }}" class="action-btns1 sortable-icons role-menu-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف">
                                    <i class="feather feather-trash-2 text-danger"></i>
                                </a>
                            </div>

                        </li>
                    @endforeach
					@if(count($menuItem) === 0)
						<div class="text-center text-danger" style="font-family: unset;">هیچ داده ای وجود ندارد</div>
					@endif
                </ul>
            </div>
        </div>
	</div>
</div>
<!-- End Row -->

<!--Change Menu Item Modal -->
<div class="modal fade"  id="changemenuitemmodal">
	<div class="modal-dialog" role="document">
		<div class="modal-content card-body pt-3">
			<div class="modal-header">
				<h5 class="modal-title">ویرایش مجموعه</h5>
				<button  class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="form-label">عنوان</label>
					<input type="text" class="form-control" name="title" id="change_item_title" placeholder="عنوان">
				</div>
				<div class="form-group">
					<select class="form-control" name="linkable_type" id="change_item_linkable_type" data-placeholder="انتخاب نوع لینک" onchange="linkInput(this, 'edit');">
						<option label="انتخاب نوع لینک" value="none"></option>
						<option value="Category">دسته بندی</option>
						<option value="custom">دلخواه</option>
					</select>
				</div>
				<div class="form-group" id="edit_type_category" style="display:none;">
					<select class="form-control" name="linkable_id" id="change_item_linkable_id" data-placeholder="انتخاب دسته بندی">
						<option label="انتخاب دسته بندی"></option>
						@foreach($categories as $item)										
							<option value="{{ $item->id }}">{{ $item->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group" id="edit_type_custom" style="display:none;">
					<label class="form-label">لینک دلخواه</label>
					<input type="text" class="form-control" name="link" id="change_item_link" placeholder="لینک دلخواه">
				</div>

				<div class="custom-controls-stacked d-md-flex my-4">
					<label class="form-label mt-1 ml-5">بازشدن در تب جديد :</label>
					<label class="custom-control custom-radio success ml-4">
						<input type="radio" class="custom-control-input" name="new_tab" id="change_item_new_tab_1" value="1">
						<span class="custom-control-label">فعال</span>
					</label>
					<label class="custom-control custom-radio success ml-4">
						<input type="radio" class="custom-control-input" name="new_tab" id="change_item_new_tab_2" value="0" checked>
						<span class="custom-control-label">غیر فعال</span>
					</label>
				</div>
				<div class="custom-controls-stacked d-md-flex my-4">
					<label class="form-label mt-1 ml-5">وضعیت :</label>
					<label class="custom-control custom-radio success ml-4">
						<input type="radio" class="custom-control-input" name="status" id="change_item_status_1" value="1" checked>
						<span class="custom-control-label">فعال</span>
					</label>
					<label class="custom-control custom-radio success ml-4">
						<input type="radio" class="custom-control-input" name="status" id="change_item_status_2" value="0">
						<span class="custom-control-label">غیر فعال</span>
					</label>
				</div>
			</div>

			<input type="hidden" id="change_item_id" value="test">

			<div class="modal-footer">
				<a href="#" class="btn btn-outline-primary" data-dismiss="modal">بستن</a>
				<button class="btn btn-success" onclick="updateItem();">بروزرسانی</button>
			</div>
		</div>
	</div>
</div>
<!-- End Change Menu Group Modal  -->

<!--New Menu Group Modal -->
<div class="modal fade"  id="newmenuitemmodal">
	<div class="modal-dialog" role="document">
		<x-errors></x-errors>
		<div class="modal-content">
            <form action="{{ route('items.store', $menuGroup->id) }}" class="card-body pt-3" id="item" name="item" method="post">
			    @csrf
				<div class="modal-header">
					<h5 class="modal-title">زير مجموعه جديد</h5>
					<button  class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="form-label">عنوان</label>
						<input type="text" class="form-control" name="title" placeholder="عنوان">
					</div>
					<div class="form-group">
						<select class="form-control" name="linkable_type" data-placeholder="انتخاب نوع لینک" onchange="linkInput(this, 'new');">
							<option label="انتخاب نوع لینک" value="none"></option>
							<option value="Category">دسته بندی</option>
							<option value="custom">دلخواه</option>
						</select>
					</div>
					<div class="form-group" id="new_type_category" style="display:none;">
						<select class="form-control" name="linkable_id" data-placeholder="انتخاب دسته بندی">
							<option label="انتخاب دسته بندی"></option>
							@foreach($categories as $item)										
								<option value="{{ $item->id }}">{{ $item->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group" id="new_type_custom" style="display:none;">
						<label class="form-label">لینک دلخواه</label>
						<input type="text" class="form-control" name="link" placeholder="لینک دلخواه">
					</div>

                    <div class="custom-controls-stacked d-md-flex my-4">
						<label class="form-label mt-1 ml-5">بازشدن در تب جديد :</label>
						<label class="custom-control custom-radio success ml-4">
							<input type="radio" class="custom-control-input" name="new_tab" value="1">
							<span class="custom-control-label">فعال</span>
						</label>
						<label class="custom-control custom-radio success ml-4">
							<input type="radio" class="custom-control-input" name="new_tab" value="0" checked>
							<span class="custom-control-label">غیر فعال</span>
						</label>
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
				<div class="modal-footer">
					<a href="#" class="btn btn-outline-primary" data-dismiss="modal">بستن</a>
					<button class="btn btn-success" type="submit">ثبت</button>
				</div>
			</form>
		</div>
	</div>
</div>
@if (session('menu-item-error') == 'wrong')
	<script>
		window.addEventListener('load', function() {
			document.getElementById('menu_item').click();
		});
	</script>
@endif
<!-- End New Menu Item Modal  -->
@endsection
@section('scripts')
	<script src="{{ asset('assets/plugins/sortableJS/Sortable.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/sortableJS/sort.js') }}"></script>

    <script src="{{ asset('assets/plugins/sweet-alert/jquery.sweet-modal.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
	<script src="{{ asset('assets/js/sweet-alert.js') }}"></script>

	<script src="{{ asset('assets/js/menu-item.js') }}"></script>
@endsection
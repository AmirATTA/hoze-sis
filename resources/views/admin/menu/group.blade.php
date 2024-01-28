@extends('layouts.admin.master')
@section('title', 'گروه های منو')
@section('links')
	<link href="{{ asset('assets/plugins/sweet-alert/sweetalert.css') }}" rel="stylesheet" />
@endsection
@section('content')
<a href="#" data-toggle="modal" data-target="#newmenugroupmodal" id="menu_group">
    <button class="btn btn-primary news-btn">گروه منو جدید +</button>
</a>
<!-- Row -->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
                    <div class="menu-group">
                        @foreach($menuGroup as $data)
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data->label }}</h5>
                                    @foreach($data->menuItems->sortBy('order') as $item)
                                        <p class="card-text">- {{ $item->title }}</p>
                                    @endforeach
									@if(count($data->menuItems) === 0)
										<div class="text-center text-danger mb-5" style="font-family: unset;">هیچ داده ای وجود ندارد</div>
									@endif
									<div class="menu-group-actions">
										<a class="btn btn-primary" href="{{ route('items.index', $data->id) }}" style="margin-left:10px;">زير مجموعه ها</a>
										<a href="#" class="action-btns1" data-toggle="modal" data-target="#changemenugroupmodal" onclick="menuGroupEditModal(this)">
											<i class="feather feather-edit-2 text-success sortable-icons" data-toggle="tooltip" data-placement="top" title="" data-original-title="ویرایش"></i>
											<input type="hidden" value="{{ $data->id }}" class="group-id">
											<input type="hidden" value="{{ $data->name }}" class="group-name">
											<input type="hidden" value="{{ $data->label }}" class="group-label">
										</a>
										<a href="#" data-id="{{ $data->id }}" class="action-btns1 sortable-icons role-menu-group" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف">
											<i class="feather feather-trash-2 text-danger"></i>
										</a>
									</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Row -->

<!--Change Menu Group Modal -->
<div class="modal fade"  id="changemenugroupmodal">
	<div class="modal-dialog" role="document">
		<div class="modal-content card-body pt-3">
			<div class="modal-header">
				<h5 class="modal-title">ويرايش گروه منو</h5>
				<button  class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
			<div class="form-group">
					<label class="form-label">نام</label>
					<input type="text" class="form-control" id="change_group_name" name="name" placeholder="نام">
				</div>
				<div class="form-group">
					<label class="form-label">برچسب</label>
					<input type="text" class="form-control" id="change_group_label" name="label" placeholder="برچسب">
				</div>
			</div>

			<input type="hidden" id="change_group_id" value="test">

			<div class="modal-footer">
				<a href="#" class="btn btn-outline-primary" data-dismiss="modal">بستن</a>
				<button class="btn btn-success" onclick="updateGroup();">بروزرسانی</button>
			</div>
		</div>
	</div>
</div>
<!-- End Change Menu Group Modal  -->

<!--New Menu Group Modal -->
<div class="modal fade"  id="newmenugroupmodal">
	<div class="modal-dialog" role="document">
		<x-errors></x-errors>
		<div class="modal-content">
            <form action="{{ route('groups.store') }}" class="card-body pt-3" id="menu" name="menu" method="post">
			@csrf
				<div class="modal-header">
					<h5 class="modal-title">گروه منو جديد</h5>
					<button  class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="form-label">نام</label>
						<input type="text" class="form-control" name="name" placeholder="نام">
					</div>
					<div class="form-group">
						<label class="form-label">برچسب</label>
						<input type="text" class="form-control" name="label" placeholder="برچسب">
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
@if (session('menu-group-error') == 'wrong')
	<script>
		window.addEventListener('load', function() {
			document.getElementById('menu_group').click();
		});
	</script>
@endif
<!-- End New Menu Group Modal  -->
@endsection
@section('scripts')
    <script src="{{ asset('assets/plugins/sweet-alert/jquery.sweet-modal.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
	<script src="{{ asset('assets/js/sweet-alert.js') }}"></script>

	<script src="{{ asset('assets/js/menu-group.js') }}"></script>
@endsection
var csrfToken = $('meta[name="csrf-token"]').attr('content');

$(function(){
   'use strict'

	//______________
	$(".role").on("click", function(e){
		var button = $(this);
		var buttonDataset = button.data();
		swal({
			title: "ایا مطمئن هستید؟",
			text: "پس از حذف، نمی توانید این را بازیابی کنید!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$.ajax({
					url: '/admin/categories/' + buttonDataset.id,
					type: "DELETE",
					data: {
						_token: csrfToken,
					},
					success : function(result){
						if(result == true) {
							const div = button.parent();;
							const parentOfDiv = div.parent();;
							const parentOfParentOfDiv = parentOfDiv.parent();;
							parentOfParentOfDiv.remove();
							
							swal({
								title: "انجام شد",
								text: "با موفقیت انجام شد!",
								icon: "success",
							});
						} else {
							swal({
								title: "خطا",
								text: "لطفا تمام اخبار و آموزش های این دسته بندی را حذف کنید برای انجام این عملیات",
								icon: "error",
							});
						}
					}
				});
			}
		});
	});

	//______________
	$(".role-news").on("click", function(e){
		var button = $(this);
		var buttonDataset = button.data();
		swal({
			title: "ایا مطمئن هستید؟",
			text: "پس از حذف، نمی توانید این را بازیابی کنید!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$.ajax({
					url: '/admin/news/' + buttonDataset.id,
					type: "DELETE",
					data: {
						_token: csrfToken,
					},
					success : function(result){
						const div = button.parent();;
						const parentOfDiv = div.parent();;
						const parentOfParentOfDiv = parentOfDiv.parent();;
						parentOfParentOfDiv.remove();
						
						swal({
							title: "انجام شد",
							text: "با موفقیت انجام شد!",
							icon: "success",
						});
					}
				});
			}
		});
	});


	//______________
	$(".role-announcement").on("click", function(e){
		var button = $(this);
		var buttonDataset = button.data();
		swal({
			title: "ایا مطمئن هستید؟",
			text: "پس از حذف، نمی توانید این را بازیابی کنید!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$.ajax({
					url: '/admin/announcements/' + buttonDataset.id,
					type: "DELETE",
					data: {
						_token: csrfToken,
					},
					success : function(result){
						const div = button.parent();;
						const parentOfDiv = div.parent();;
						const parentOfParentOfDiv = parentOfDiv.parent();;
						parentOfParentOfDiv.remove();
						
						swal({
							title: "انجام شد",
							text: "با موفقیت انجام شد!",
							icon: "success",
						});
					}
				});
			}
		});
	});


	//______________
	$(".role-article").on("click", function(e){
		var button = $(this);
		var buttonDataset = button.data();
		swal({
			title: "ایا مطمئن هستید؟",
			text: "پس از حذف، نمی توانید این را بازیابی کنید!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$.ajax({
					url: '/admin/articles/' + buttonDataset.id,
					type: "DELETE",
					data: {
						_token: csrfToken,
					},
					success : function(result){
						const div = button.parent();;
						const parentOfDiv = div.parent();;
						const parentOfParentOfDiv = parentOfDiv.parent();;
						parentOfParentOfDiv.remove();
						
						swal({
							title: "انجام شد",
							text: "با موفقیت انجام شد!",
							icon: "success",
						});
					}
				});
			}
		});
	});


	//______________
	$(".role-slider").on("click", function(e){
		var button = $(this);
		var buttonDataset = button.data();
		swal({
			title: "ایا مطمئن هستید؟",
			text: "پس از حذف، نمی توانید این را بازیابی کنید!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$.ajax({
					url: '/admin/sliders/' + buttonDataset.id,
					type: "DELETE",
					data: {
						_token: csrfToken,
					},
					success : function(result){
						const div = button.parent();;
						const parentOfDiv = div.parent();;
						const parentOfParentOfDiv = parentOfDiv.parent();;
						parentOfParentOfDiv.remove();
						
						swal({
							title: "انجام شد",
							text: "با موفقیت انجام شد!",
							icon: "success",
						});
					}
				});
			}
		});
	});



	//______________
	$(".role-link").on("click", function(e){
		var button = $(this);
		var buttonDataset = button.data();
		swal({
			title: "ایا مطمئن هستید؟",
			text: "پس از حذف، نمی توانید این را بازیابی کنید!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$.ajax({
					url: '/admin/links/' + buttonDataset.id,
					type: "DELETE",
					data: {
						_token: csrfToken,
					},
					success : function(result){
						const div = button.parent();;
						const parentOfDiv = div.parent();;
						const parentOfParentOfDiv = parentOfDiv.parent();;
						parentOfParentOfDiv.remove();
						
						swal({
							title: "انجام شد",
							text: "با موفقیت انجام شد!",
							icon: "success",
						});
					}
				});
			}
		});
	});

	//______________
	$(".role-menu-group").on("click", function(e){
		var button = $(this);
		var buttonDataset = button.data();
		swal({
			title: "ایا مطمئن هستید؟",
			text: "پس از حذف، نمی توانید این را بازیابی کنید!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$.ajax({
					url: '/admin/menus/groups/' + buttonDataset.id,
					type: "DELETE",
					data: {
						_token: csrfToken,
					},
					success : function(result){
						const div = button.parent();;
						const parentOfDiv = div.parent();;
						const parentOfParentOfDiv = parentOfDiv.parent();;
						parentOfParentOfDiv.remove();
						
						swal({
							title: "انجام شد",
							text: "با موفقیت انجام شد!",
							icon: "success",
						});
					}
				});
			}
		});
	});
});


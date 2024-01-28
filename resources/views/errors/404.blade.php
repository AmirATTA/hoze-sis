<!DOCTYPE html>
<html lang="en" dir="rtl">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="DayOne - It is one of the Major Dashboard Template which includes - HR, Employee and Job Dashboard. This template has multipurpose HTML template and also deals with Task, Project, Client and Support System Dashboard." name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="admin dashboard, admin panel template, html admin template, dashboard html template, bootstrap 4 dashboard, template admin bootstrap 4, simple admin panel template, simple dashboard html template,  bootstrap admin panel, task dashboard, job dashboard, bootstrap admin panel, dashboards html, panel in html, bootstrap 4 dashboard"/>

		<!-- Title -->
		<title>{{ config('app.name')}} - داشبورد</title>

		<!--Favicon -->
		<link rel="icon" href="{{ asset('assets/images/brand/favicon.ico') }}" type="image/x-icon"/>

		<!-- Bootstrap css -->
		<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" />

		<!-- Style css -->
		<link href="{{ asset('assets/css-rtl/style.css') }}" rel="stylesheet" />
		<link href="{{ asset('assets/css-rtl/style-rtl.css') }}" rel="stylesheet" />
		<link href="{{ asset('assets/css-rtl/dark.css') }}" rel="stylesheet" />
		<link href="{{ asset('assets/css-rtl/skin-modes.css') }}" rel="stylesheet" />

		<!---Icons css-->
		<link href="{{ asset('assets/css-rtl/icons.css') }}" rel="stylesheet" />

		<!-- P-scroll bar css-->
		<link href="{{ asset('assets/plugins/p-scrollbar/p-scrollbar.css') }}" rel="stylesheet" />

	</head>

	<body>

		<div class="page error-bg">
			<div class="page-content m-0">
				<div class="container text-center">
					<div class="display-1 mb-5 font-weight-bold" style="color:#f04f3c;">4<i class="fa fa-smile-o" style="color:#f04f3c;"></i>4</div>
					<h1 class="h3  mb-3 font-weight-semibold" style="font-family:unset;">با عرض پوزش، خطایی رخ داده است، صفحه درخواستی یافت نشد!</h1>
					<p class="h5 font-weight-normal mb-7 leading-normal" style="font-family:unset;">ممکن است آدرس را اشتباه تایپ کرده باشید یا صفحه جابجا شده باشد.</p>
					<a class="btn btn-primary" href="{{ route('dashboard.index') }}"><i class="fe fe-arrow-right-circle ml-1"></i>برگرد به داشبورد</a>
				</div>
			</div>
		</div>

	</body>
</html>
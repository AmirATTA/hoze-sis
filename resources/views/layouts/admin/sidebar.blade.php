				<!--aside open-->
				<aside class="app-sidebar">
					<div class="app-sidebar__logo p-4 mt-2" style="border:none;">
						<a class="header-brand" href="{{ route('dashboard.index') }}">
							<img src="{{ asset('assets/images/sister_logo.png') }}" class="header-brand-img dark-logo" alt="Dayonelogo">
						</a>
					</div>
					<div class="app-sidebar3">
						<ul class="side-menu">
							<li class="slide">
								<a class="side-menu__item" data-toggle="slide" href="{{ route('dashboard.index') }}">
									<i class="feather feather-home sidemenu_icon"></i>
									<span class="side-menu__label">داشبورد</span></i>
								</a>
							</li>

							<li class="slide">
								<a class="side-menu__item" data-toggle="slide" href="{{ route('groups.index') }}">
									<i class="fa-solid fa-square-caret-down sidemenu_icon"></i>
									<span class="side-menu__label">منو ساز</span></i>
								</a>
							</li>

							<li class="slide">
								<a class="side-menu__item" data-toggle="slide" href="#">
									<i class="fa-solid fa-list sidemenu_icon"></i>
									<span class="side-menu__label">دسته بندی</span><i class="angle fa fa-angle-left"></i>
								</a>
								<ul class="slide-menu">
									<li><a href="{{ route('categories.create') }}" class="slide-item">دسته بندی جدید</a></li>
									<li><a href="{{ route('categories.index') }}" class="slide-item">دسته بندی ها</a></li>
								</ul>
							</li>

							<li class="slide">
								<a class="side-menu__item" data-toggle="slide" href="#">
									<i class="fa-regular fa-newspaper sidemenu_icon"></i>
									<span class="side-menu__label">اخبار</span><i class="angle fa fa-angle-left"></i>
								</a>
								<ul class="slide-menu">
									<li><a href="{{ route('news.create') }}" class="slide-item">اخبار جدید</a></li>
									<li><a href="{{ route('news.index') }}" class="slide-item">اخبار ها</a></li>
								</ul>
							</li>

							<li class="slide">
								<a class="side-menu__item" data-toggle="slide" href="#">
									<i class="fa fa-bullhorn sidemenu_icon"></i>
									<span class="side-menu__label">اطلاعیه</span><i class="angle fa fa-angle-left"></i>
								</a>
								<ul class="slide-menu">
									<li><a href="{{ route('announcements.create') }}" class="slide-item">اطلاعیه جدید</a></li>
									<li><a href="{{ route('announcements.index') }}" class="slide-item">اطلاعیه ها</a></li>
								</ul>
							</li>

							<li class="slide">
								<a class="side-menu__item" data-toggle="slide" href="#">
									<i class="fa-solid fa-chalkboard sidemenu_icon"></i>
									<span class="side-menu__label">آموزش</span><i class="angle fa fa-angle-left"></i>
								</a>
								<ul class="slide-menu">
									<li><a href="{{ route('articles.create') }}" class="slide-item">آموزش جدید</a></li>
									<li><a href="{{ route('articles.index') }}" class="slide-item">آموزش ها</a></li>
								</ul>
							</li>

							<li class="slide">
								<a class="side-menu__item" data-toggle="slide" href="#">
									<i class="fa-solid fa-tv sidemenu_icon"></i>
									<span class="side-menu__label">اسلایدر</span><i class="angle fa fa-angle-left"></i>
								</a>
								<ul class="slide-menu">
									<li><a href="{{ route('sliders.create') }}" class="slide-item">اسلایدر جدید</a></li>
									<li><a href="{{ route('sliders.index') }}" class="slide-item">اسلایدر ها</a></li>
								</ul>
							</li>

							<li class="slide">
								<a class="side-menu__item" data-toggle="slide" href="#">
									<i class="fa-solid fa-link sidemenu_icon"></i>
									<span class="side-menu__label">لينک</span><i class="angle fa fa-angle-left"></i>
								</a>
								<ul class="slide-menu">
									<li><a href="{{ route('links.create') }}" class="slide-item">لينک جدید</a></li>
									<li><a href="{{ route('links.index') }}" class="slide-item">لينک ها</a></li>
								</ul>
							</li>

							<li class="slide">
								<a class="side-menu__item" data-toggle="slide" href="{{ route('settings.index') }}">
									<i class="fa-solid fa-gear sidemenu_icon"></i>
									<span class="side-menu__label">تنظیمات</span></i>
								</a>
							</li>
						</ul>
					</div>
				</aside>
				<!--aside closed-->
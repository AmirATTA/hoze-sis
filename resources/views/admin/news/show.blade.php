@extends('layouts.admin.master')
@section('title', 'خبر')
@section('content')
<a href="{{ route('news.create') }}"><button class="btn btn-primary news-btn">خبر جدید +</button></a>
<!-- Row -->
<div class="row">
    <div class="col-xl-9 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-4">
                    <div class="mb-1">
                        <h3 style="font-size:2rem;">عنوان ها</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table row table-borderless w-100 m-0 text-nowrap">
                            <tbody class="col-lg-12 col-xl-6 p-0">
                                <tr>
                                    <td><span class="font-weight-semibold">عنوان :</span> {{ $news->title }}</td>
                                </tr>
                                <tr>
                                    <td><span class="font-weight-semibold">عنوان فرعی :</span> {{ $news->subtitle }}</td>
                                </tr>
                                <tr>
                                    <td><span class="font-weight-semibold">توضيح کوتاه :</span> {{ $news->summary }}</td>
                                </tr>
                                <tr>
                                    <td><span class="font-weight-semibold">کلمه کلیدی :</span> {{ $news->slug }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="mb-4">
                    <h5 class="mb-4 font-weight-semibold" style="font-size:2rem;">بدنه</h5>
                    <ul class="mr-4">
                        {!! $news->body !!}
                    </ul>
                </div>
                <hr>
                <div class="mb-4">
                    <h5 class="mb-4 font-weight-semibold" style="font-size:2rem;">منبع</h5>
                    <ul class="mr-4">
                        <p><span class="font-weight-semibold">عنوان :</span> {{ $news->resource_label }}</p>
                        <p><span class="font-weight-semibold">لینک :</span> <a href="//{{ $news->resource_url }}" target="_blank">{{ $news->resource_url }}</a></p>
                        
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="list-id mb-2">
                    <div class="row">
                        <div class="col">
                            <a class="mb-0">{{ $news->views_count }} <i class="fa-solid fa-eye"></i></a>
                        </div>
                        <div class="col">
                            <a class="mb-0">دسته بندی: {{ $category }}</a>
                        </div>
                        <div class="col">
                            <a class="mb-0">وضعیت: 
                                @if ($news->status == '1')
                                    <span class="badge badge-success">فعال</span>
								@else
                                    <span class="badge badge-danger">غیر فعال</span>
								@endif
                            </a>
                        </div>
                        <div class="col">
                            <a class="mb-0">نویسنده: {{ $user->name }}</a>
                        </div>
                        <div class="col col-auto">
                            <a class="mb-0">شناسه : #{{ $news->id }}</a>
                        </div>
                    </div>
                </div>
                <div class="list-id">
                    <div class="row" style="justify-content: space-evenly;">
                        <div>
                            <a class="mb-0">زمان ساخت: {{ $created_at }}</a>
                        </div>
                        @if($news->featured)
                            <div>
                                <i class="fa-solid fa-star" style="color:orange;" data-toggle="tooltip" data-placement="top" title="" data-original-title="خبر ويژه"></i>
                            </div>
                        @endif
                        <div>
                            <a class="mb-0">زمان انتشار: {{ $published_at }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-1">
                    <h3 style="font-size:2rem;">برچسب ها</h3>
                </div>
                <div class="tags">
                    @foreach($tags as $item)
                        <span class="tag tab-label">#{{ $item }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-12">
        <div class="card">
            <div class="card-body">
                <h1>تصویر</h1>
                <img src="{{ asset('storage/news/'.$news->image) }}" class="img-fluid d-block rounded" alt="Banner Image">
            </div>
        </div>
    </div>
</div>
<!-- End Row -->
@endsection
@section('scripts')
		<script src="{{ asset('assets/js/view-page.js') }}"></script>
@endsection

@extends('layouts.admin.master')
@section('title', 'داشبورد')
@section('content')
<!-- Row -->
<div class="row">
    <div class="col-xl-4 col-md-12 col-lg-12">
        <div class="card bg-primary text-white" style="height: 250px;">
            <div class="card-body text-center" style="padding: 15px;">
                <img class="avatar avatar-xxl brround mb-5" src="{{ asset('assets/images/admin_logo.png') }}" alt="img">
                <h4 class="font-weight-semibold mb-1">{{ Auth::user()->name }}</h4>
                <p class="fs-12 mb-0">{{ Auth::user()->phone }}</p>
            </div>
            <div class="card-body border-transparent" style="display: flex;justify-content: center;padding: 13px;">
            <a href="{{ route('profile') }}"><button class="btn btn-warning btn-lg">ویرایش</button></a>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header border-bottom-0">
                <h3 class="card-title">شمارنده بازدید های کل</h3>
            </div>
            <div class="card-body text-center">
                <div class="avatar avatar-xl brround bg-success text-center">
                    <i class="fa-regular fa-eye"></i>
                </div>
                <h5 class="mt-4">بازدید</h5>
                <h2 class="counter fs-40">{{ $total_views }}</h2>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header border-bottom-0">
                <h3 class="card-title">شمارنده تعداد اخبار ها</h3>
            </div>
            <div class="card-body text-center">
                <div class="avatar avatar-xl brround bg-orange text-center">
                    <i class="fa-regular fa-newspaper"></i>
                </div>
                <h5 class="mt-4">اخبار ها</h5>
                <h2 class="counter fs-40">{{ $news_count }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="row">
    
</div>

<div class="row">
    <div class="card">
        <div class="card-header border-bottom-0">
            <h3 class="card-title" style="font-family:unset;">آخرین پست های ثبت شده</h3>
        </div>
        <div class="card-group p-5">
            @foreach($lastest_content as $item)
                <div class="card overflow-hidden shadow-none border border-right-0">
                    @if($item->getTable() == 'news')
                        <img class="rounded img-fluid img-cover" src="{{ asset('storage/news/'.$item->image) }}" alt="image">
                    @elseif($item->getTable() == 'articles')
                        <img class="rounded img-fluid img-cover" src="{{ asset('storage/article/'.$item->image) }}" alt="image">
                    @else
                        <img class="rounded img-fluid img-cover" src="{{ asset('storage/announcement/'.$item->image) }}" alt="image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">{{ $item->summary }}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">{{ $item->created_at->diffForHumans(); }}</small>
                        <small class="badge">
                            @if($item->getTable() == 'articles')
                            آموزش
                            @elseif($item->getTable() == 'news')
                            اخبار
                            @elseif($item->getTable() == 'announcements')
                            اطلاعیه
                            @endif
                        </small>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End Row -->
@endsection
@section('scripts')
    <!-- INTERNAL Time Counter -->
    <script src="{{ asset('assets/plugins/counters/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counters/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counters/counter.js') }}"></script>

    <!-- INTERNAL Counters -->
    <script src="{{ asset('assets/plugins/countdown/countdowntime.js') }}"></script>
    <script src="{{ asset('assets/js/countdown.js') }}"></script>
@endsection
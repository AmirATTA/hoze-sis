@extends('layouts.admin.master')
@section('title', 'لينک')
@section('content')
<a href="{{ route('links.create') }}"><button class="btn btn-primary news-btn">لينک جدید +</button></a>
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
                                    <td><span class="font-weight-semibold">عنوان :</span> {{ $link->title }}</td>
                                </tr>
                                <tr>
                                    <td><span class="font-weight-semibold">عنوان فرعی :</span> {{ $link->summary }}</td>
                                </tr>
                                <tr>
                                    <td><span class="font-weight-semibold">لینک :</span> {{ $link->slug }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
            </div>
            <div class="card-body">
                <div class="list-id mb-2">
                    <div class="row">
                        <div class="col">
                            <a class="mb-0">وضعیت: 
                                @if ($link->status == '1')
                                    <span class="badge badge-success">فعال</span>
								@else
                                    <span class="badge badge-danger">غیر فعال</span>
								@endif
                            </a>
                        </div>
                        <div class="col">
                            <a class="mb-0">زمان ساخت: {{ $created_at }}</a>
                        </div>
                        <div class="col col-auto">
                            <a class="mb-0">شناسه : #{{ $link->id }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-12">
        <div class="card">
            <div class="card-body">
                <h1>تصویر</h1>
                <img src="{{ asset('storage/link/'.$link->image) }}" class="img-fluid d-block rounded" alt="Banner Image">
            </div>
        </div>
    </div>
</div>
<!-- End Row -->
@endsection
@section('scripts')
		<script src="{{ asset('assets/js/view-page.js') }}"></script>
@endsection

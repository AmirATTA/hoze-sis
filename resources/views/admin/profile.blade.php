@extends('layouts.admin.master')
@section('title', 'پروفايل')
@section('content')
<!-- Row -->
<div class="row">
    <div style="width: 100%;">
        <x-errors></x-errors>
        <div class="card">
            <form action="{{ route('profile.update') }}" id="profile" name="profile" method="post">
            @csrf
            @method('PATCH')
                <div class="card-body"> 
                    <div class="card-title">ويرايش پروفايل:</div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">نام</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="نام">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">ایمیل</label>
                                <input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="ایمیل">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">شماره موبايل</label>
                                <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" placeholder="شماره موبايل">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-left">
                    <a onclick="window.history.back();" class="btn btn-danger btn-lg">برگشت</a>
                    <button type="submit" class="btn btn-success btn-lg">بروزرساني</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Row -->
@endsection
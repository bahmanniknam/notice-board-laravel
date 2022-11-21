@extends('layouts.master')

@section('content')
    <div class="container-fluid text-right bg-light rounded-top  border-bottom" dir="rtl">
        <div class="col-lg-12 margin-tb">
            <div  class="p-3">
                <a href="{{ route('notice.index') }}">
                    <i class="fas fa-arrow-right fa-lg"></i>
                </a>
                <h4 class="text-center">نمایش اعلان</h4>
            </div>
        </div>
    </div>
    <div class="text-right bg-light rounded" dir="rtl">
        <div class="row mx-auto p-4">
            <div class="col-xs-12 col-sm-12 col-md-12 ">
                <div class="form-group">
                    <strong>عنوان :</strong>
                    {{ $notice->title }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>توضیحات :</strong>
                    {{ $notice->content }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>گیرنده :</strong>
                    {{ $notice->user->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>تاریخ ارسال :</strong>
                    {{ $notice->created_at }}
                </div>
            </div>
        </div>
@endsection

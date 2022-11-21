@extends('layouts.master')

@section('content')
    <div class="container-fluid text-right bg-light rounded-top  border-bottom" dir="rtl">
        <div class="col-lg-12 ">
            <div class="p-3">
                <a href="{{ route('notice.index') }}" >
                    <i class="fas fa-arrow-right   fa-lg"></i>
                </a>
                <h4 class="text-center">ویرایش اعلان</h4>
            </div>
        </div>
    </div>
    <form class="text-right bg-light rounded" dir="rtl" action="{{ route('notice.update',$notice->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row p-5">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong class="p-3">عنوان :</strong>
                    <input type="text" name="title" value="{{ $notice->title }}" class="form-control mt-2"
                           placeholder="عنوان" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 ">
                <div class="form-group">
                    <strong class="mt-3">توضیحات :</strong>
                    <textarea type="text" style="height:100px" class="form-control mt-2" name="content" id="content" rows="3"
                              placeholder="توضیحات" required>{{ $notice->content }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <select class="custom-select" name="user_id" id="inlineFormCustomSelect" autocomplete="off"
                        style="height:30px" required>
                    <option value="{{ $notice->user_id }}" required>{{ $notice->user->name }}</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" required>{{ $user->name }}</option>
                    @endforeach

                </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-5">
                <button type="submit" class="btn btn-success">ویرایش</button>
            </div>
        </div>

    </form>
@endsection

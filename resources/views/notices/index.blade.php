@extends('layouts.master')
@section('title')
    Notice Board
@endsection
@section('content')

    <div class="row">
        <!-- Button trigger modal -->
        <div class="pb-5">
            <button type="button" class="btn btn-light btn-lg float-right font-weight-light" data-toggle="modal"
                    data-target="#newModal"><i class="fas fa-plus-circle"></i></button>
        </div>

        <table class="table  table-responsive-md-lg table-light " dir="rtl">
            <thead class="thead-light  text-center">
            <tr>
                <th scope="col">شناسه</th>
                <th scope="col">عنوان</th>
                <th scope="col">متن اعلان</th>
                <th scope="col">تاریخ</th>
                <th scope="col">گیرنده</th>
                <th scope="col">ویرایش</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($notices as $notice)
                <tr>
                    <td scope="row">{{ $notice->id }}</td>
                    <td>{{ $notice->title }}</td>
                    <td>{{ $notice->content }}</td>
                    <td>{{ $notice->created_at}}</td>
                    <td>{{ $notice->user->name }}</td>
                    <td>
                        <form action="{{ route('notice.destroy',$notice->id) }}" method="POST">
                            <a href="{{ route('notice.show',$notice->id) }}">
                                <i class="fas fa-eye text-success  fa-lg"></i>
                            </a>
                            <a href="{{ route('notice.edit',$notice->id) }}">
                                <i class="fas fa-edit text-secondary"></i>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                <i class="fas fa-trash fa-lg text-danger"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div dir="rtl">   {{ $notices->links() }}</div>


        @if (count($notices) == 0)
            <div class="card ">
                <div class="card-body text-center">
                    . هیچ اعلانی پیدا نکرد
                </div>
            </div>
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="newModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">

            <!--Create Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title float-right">اعلان جدید</h4>
                </div>
                <div class="modal-body">
                    <form dir="rtl" action="{{route('notice.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp"
                                   placeholder="عنوان " required>
                        </div>
                        <div class="form-group">
                            <textarea type="text" class="form-control" name="content" id="content" rows="3"
                                      placeholder="توضیحات" required></textarea>
                        </div>
                        <div class="form-group">
                            <select class="custom-select" name="user_id" id="inlineFormCustomSelect" autocomplete="off"
                                    style="height:30px" required>
                                <option value="" required>گیرنده</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" required>{{ $user->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="col col btn btn-danger p-1" data-dismiss="modal">بستن</button>
                            <button type="reset" class="col btn btn-Warning p-1">ریست</button>
                            <button type="submit" class="col btn btn-success p-1">ثبت</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>


@endsection

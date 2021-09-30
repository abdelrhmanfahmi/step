@extends('admin.index')
@section('main')

    <div class="main-content" id="result">
        <div class="page-content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">{{__('messages.Common Questions')}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('messages.Common Questions')}}</a></li>
                                    <li class="breadcrumb-item active">{{__('messages.Edit Common Questions')}}</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('common.update' , ['language' => app()->getLocale() , 'id' => $common->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Question(Arabic)</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="question_ar" placeholder="Enter Question" value="{{$common->question_ar}}" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Question(English)</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="question_en" placeholder="Enter Question" value="{{$common->question_en}}" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Answer(Arabic)</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="answer_ar" placeholder="Enter Answer" value="{{$common->answer_ar}}" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Answer(English)</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="answer_en" placeholder="Enter Answer" value="{{$common->answer_en}}" type="text">
                                        </div>
                                    </div>
                                    

                                    <div class="mb-3 row">
                                        <div class="col-md-10">
                                            <button class="btn btn-success" type="submit">Update</button>
                                        </div>
                                    </div>
                                   
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>

@endsection
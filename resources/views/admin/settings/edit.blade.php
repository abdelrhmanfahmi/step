@extends('admin.index')
@section('main')

    <div class="main-content" id="result">
        <div class="page-content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">{{__('messages.Settings')}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('messages.Settings')}}</a></li>
                                    <li class="breadcrumb-item active">{{__('messages.Edit Settings')}}</li>
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
                                <form action="{{ route('settings.update' , ['language' => app()->getLocale() , 'id' => $settings->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Title_ar')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="title_ar" placeholder="Enter Title" value="{{$settings->title_ar}}" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Title_en')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="title_en" placeholder="Enter Title" value="{{$settings->title_en}}" type="text">
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Breif_ar')}}</label>
                                        <div class="col-md-10">
                                            <textarea name="breif_ar" id="breif_ar" dir="rtl" class="form-control" cols="30" rows="10" style="resize: none;">{{$settings->breif_ar}}</textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Breif_en')}}</label>
                                        <div class="col-md-10">
                                            <textarea name="breif_en" id="breif_en" dir="ltr" class="form-control" cols="30" rows="10" style="resize: none;">{{$settings->breif_en}}</textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.About-Us-ar')}}</label>
                                        <div class="col-md-10">
                                            <textarea name="about_us_ar" id="about_us_ar" dir="rtl" class="form-control" cols="30" rows="10" style="resize: none;">{{$settings->about_us_ar}}</textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.About-Us-en')}}</label>
                                        <div class="col-md-10">
                                            <textarea name="about_us_en" id="about_us_en" dir="ltr" class="form-control" cols="30" rows="10" style="resize: none;">{{$settings->about_us_en}}</textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-email-input" class="col-md-2 col-form-label">{{__('messages.E-mail')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="email" name="email" value="{{$settings->email}}" placeholder="Enter Email">
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 row">
                                        <label for="example-tel-input" class="col-md-2 col-form-label">{{__('messages.Phone')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="tel" name="phone" value="{{$settings->phone}}" placeholder="Enter Phone">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Address')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="address" placeholder="Enter Address" value="{{$settings->address}}" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Twitter')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="twitter" placeholder="Enter Twitter" value="{{$settings->twitter}}" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Facebook')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="facebook" placeholder="Enter Facebook" value="{{$settings->facebook}}" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Instagram')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="instagram" placeholder="Enter Instagram" value="{{$settings->instagram}}" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-md-10">
                                            <button class="btn btn-success" type="submit">{{__('messages.Update')}}</button>
                                        </div>
                                    </div>
                                </form>

                                <!-- <div class="mb-3 row">
                                    <div class="mt-3">
                                        <label for="formFile" class="form-label">Default file input example</label>
                                        <input class="form-control" type="file" id="formFile">
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>

@endsection
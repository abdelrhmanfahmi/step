@extends('admin.index')
@section('main')

    <div class="main-content" id="result">
        <div class="page-content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">{{__('messages.Subscriptions')}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('messages.Subscriptions')}}</a></li>
                                    <li class="breadcrumb-item active">{{__('messages.Edit Subscriptions')}}</li>
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
                                <form action="{{ route('subscripes.update' , ['language' => app()->getLocale() , 'id' => $subscripes->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Name')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="name" placeholder="Enter Name" value="{{$subscripes->name}}" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.E-mail')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="email" placeholder="Enter E-mail" value="{{$subscripes->email}}" type="email">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">{{__('messages.Company_Size')}}</label>
                                        <div class="col-md-10">
                                        <select class="form-control" name="company_size">
                                            <option disabled>Select_Option</option>
                                            <option value="1-50" @if($subscripes->company_size == '1-50') selected @endif>1-50</option>
                                            <option value="50-500" @if($subscripes->company_size == '50-500') selected @endif>50-500</option>
                                            <option value="500+" @if($subscripes->company_size == '500+') selected @endif>500+</option>
                                        </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">{{__('messages.Packages')}}</label>
                                        <div class="col-md-10">
                                            <select name="package_id" class="form-control">
                                                <option disabled>-- Choose --</option>
                                                @foreach($packages as $package)
                                                    <option @if($subscripes->package_id == $package->id) selected  @endif value="{{$package->id}}">{{$package->name_ar}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">{{__('messages.Extra Packages')}}</label>
                                        <div class="col-md-10">
                                            @foreach($extraPackages as $e)
                                                <input type="checkbox" name="extra_package_id[]" value="{{ $e->id }}" 
                                                @foreach($extra as $ext)
                                                    @if($ext->extra_package_id == $e->id)
                                                        checked
                                                    @endif
                                                @endforeach
                                                /> {{$e->name_ar}}
                                                <br>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-md-10">
                                            <button class="btn btn-success" type="submit">{{__('messages.Update')}}</button>
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
@extends('admin.index')
@section('main')

    <div class="main-content" id="result">
        <div class="page-content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">{{__('messages.Extra Packages')}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('messages.Home')}}</a></li>
                                    <li class="breadcrumb-item active">{{__('messages.Extra Packages')}}</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-striped">
                                            <thead>
                                                @if( Config::get('app.locale') == 'en' )
                                                    <tr>                                                
                                                        <th data-priority="2">{{__('messages.Name_en')}}</th>
                                                        <th data-priority="2">{{__('messages.Price')}}</th>
                                                        <th data-priority="2">{{__('messages.Actions')}}</th>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <th data-priority="2">{{__('messages.Name_ar')}}</th>                                                
                                                        <th data-priority="2">{{__('messages.Price')}}</th>
                                                        <th data-priority="2">{{__('messages.Actions')}}</th>
                                                    </tr>
                                                @endif
                                            </thead>
                                            <tbody>
                                            @if(count($extra_packages) > 0)
                                                @foreach($extra_packages as $extra_package)
                                                    @if( Config::get('app.locale') == 'en' )
                                                        <tr>                                                
                                                            <td>{{$extra_package->name_en}}</td>
                                                            <td>{{$extra_package->price}}</td>
                                                            <td>
                                                                <a href="edit/extra_packages/{{$extra_package->id}}" class="btn btn-success">{{__('messages.Edit')}}</a>
                                                                <a href="{{route('extra_packages.delete' , ['language' => app()->getLocale() , 'id' => $extra_package->id])}}" onclick="return confirm('Are You Sure You Want To Delete !');" class="btn btn-danger">{{__('messages.Delete')}}</a>
                                                            </td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td>{{$extra_package->name_ar}}</td>                                                           
                                                            <td>{{$extra_package->price}}</td>
                                                            <td>
                                                                <a href="edit/extra_packages/{{$extra_package->id}}" class="btn btn-success">{{__('messages.Edit')}}</a>
                                                                <a href="{{route('extra_packages.delete' , ['language' => app()->getLocale() , 'id' => $extra_package->id])}}" onclick="return confirm('Are You Sure You Want To Delete !');" class="btn btn-danger">{{__('messages.Delete')}}</a>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @else
                                                    <tr><td colspan="5" class="text-center">{{__('messages.No Data Yet')}}</td></tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
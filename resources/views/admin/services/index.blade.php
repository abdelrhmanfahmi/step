@extends('admin.index')
@section('main')

    <div class="main-content" id="result">
        <div class="page-content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">{{__('messages.Packages')}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('messages.Home')}}</a></li>
                                    <li class="breadcrumb-item active">{{__('messages.Packages')}}</li>
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
                                                        <th data-priority="2">{{__('messages.Service_en')}}</th>
                                                        <th data-priority="2">{{__('messages.Package')}}</th>
                                                        <th data-priority="2">{{__('messages.Actions')}}</th>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <th data-priority="2">{{__('messages.Service_ar')}}</th>                                                      
                                                        <th data-priority="2">{{__('messages.Package')}}</th>
                                                        <th data-priority="2">{{__('messages.Actions')}}</th>
                                                    </tr>
                                                @endif
                                            </thead>
                                            <tbody>
                                            @if(count($services) > 0)
                                                @foreach($services as $service)
                                                    @if( Config::get('app.locale') == 'en' )
                                                        <tr>                                                           
                                                            <td>{{$service->service_en}}</td>
                                                            <td>{{@App\Package::find($service->package_id)->name_ar}}</td>
                                                            <td>
                                                                <a href="edit/services/{{$service->id}}" class="btn btn-success">{{__('messages.Edit')}}</a>
                                                                <a href="{{route('services.delete' , ['language' => app()->getLocale() , 'id' => $service->id])}}" onclick="return confirm('Are You Sure You Want To Delete !');" class="btn btn-danger">{{__('messages.Delete')}}</a>
                                                            </td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td>{{$service->service_ar}}</td>                                                         
                                                            <td>{{@App\Package::find($service->package_id)->name_ar}}</td>
                                                            <td>
                                                                <a href="edit/services/{{$service->id}}" class="btn btn-success">{{__('messages.Edit')}}</a>
                                                                <a href="{{route('services.delete' , ['language' => app()->getLocale() , 'id' => $service->id])}}" onclick="return confirm('Are You Sure You Want To Delete !');" class="btn btn-danger">{{__('messages.Delete')}}</a>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @else
                                                    <tr><td colspan="5" class="text-center">{{__('messages.No Data Yet')}}</td></tr>
                                            @endif
                                            </tbody>
                                            <tfoot>
                                                <td colspan="5">
                                                    <div class="text-right">
                                                        {{$services->links()}}
                                                    </div>
                                                </td>
                                            </tfoot>
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
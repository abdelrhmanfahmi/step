@extends('admin.index')
@section('main')

    <div class="main-content" id="result">
        <div class="page-content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">{{__('messages.Why Steps')}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('messages.Home')}}</a></li>
                                    <li class="breadcrumb-item active">{{__('messages.Why Steps')}}</li>
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
                                                        <th data-priority="2">{{__('messages.Title_en')}}</th>
                                                        <th data-priority="3">{{__('messages.Desc_en')}}</th>
                                                        <th data-priority="2">{{__('messages.Actions')}}</th>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <th data-priority="2">{{__('messages.Title_ar')}}</th> 
                                                        <th data-priority="3">{{__('messages.Desc_ar')}}</th>
                                                        <th data-priority="2">{{__('messages.Actions')}}</th>
                                                    </tr>
                                                @endif
                                            </thead>
                                            <tbody>
                                            @if(count($why) > 0)
                                                @foreach($why as $w)
                                                    @if( Config::get('app.locale') == 'en' )
                                                        <tr>                                                        
                                                            <td>{{$w->title_en}}</td>                                                          
                                                            <td>{{ Str::limit($w->desc_en , 50) }}</td>
                                                            <td>
                                                                <a href="edit/why/{{$w->id}}" class="btn btn-success">{{__('messages.Edit')}}</a>
                                                                <a href="{{route('why.delete' , ['language' => app()->getLocale() , 'id' => $w->id])}}" onclick="return confirm('Are You Sure You Want To Delete !');" class="btn btn-danger">{{__('messages.Delete')}}</a>
                                                            </td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td>{{$w->title_ar}}</td>                                                           
                                                            <td>{{ Str::limit($w->desc_ar , 50) }}</td>                                         
                                                            <td>
                                                                <a href="edit/why/{{$w->id}}" class="btn btn-success">{{__('messages.Edit')}}</a>
                                                                <a href="{{route('why.delete' , ['language' => app()->getLocale() , 'id' => $w->id])}}" onclick="return confirm('Are You Sure You Want To Delete !');" class="btn btn-danger">{{__('messages.Delete')}}</a>
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
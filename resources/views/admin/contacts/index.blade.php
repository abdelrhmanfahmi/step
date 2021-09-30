@extends('admin.index')
@section('main')

    <div class="main-content" id="result">
        <div class="page-content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">{{__('messages.Contacts')}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('messages.Home')}}</a></li>
                                    <li class="breadcrumb-item active">{{__('messages.Contacts')}}</li>
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
                                                <tr>
                                                    <th data-priority="2">{{__('messages.Name')}}</th>
                                                    <th data-priority="2">{{__('messages.E-mail')}}</th>
                                                    <th data-priority="2">{{__('messages.Address')}}</th>
                                                    <th data-priority="2">{{__('messages.Help')}}</th>
                                                    <th data-priority="2">{{__('messages.Actions')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($contacts) > 0)
                                                @foreach($contacts as $contact)
                                                    <tr>
                                                        <td>{{$contact->name}}</td>
                                                        <td>{{$contact->email}}</td>
                                                        <td>{{$contact->address}}</td>
                                                        <td>{{ Str::limit($contact->help , 50) }}</td>
                                                        <td>
                                                            <a href="edit/contacts/{{$contact->id}}" class="btn btn-success">{{__('messages.Edit')}}</a>
                                                            <a href="{{route('contacts.delete' , ['language' => app()->getLocale() ,'id' => $contact->id])}}" onclick="return confirm('Are You Sure You Want To Delete !');" class="btn btn-danger">{{__('messages.Delete')}}</a>
                                                        </td>
                                                    </tr>
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
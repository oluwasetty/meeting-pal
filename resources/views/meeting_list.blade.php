<x-app-layout>
    <x-slot name="header">
    </x-slot>


    <div class="content-page">
        <div class="content-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="navbar-breadcrumb">
                                <h1 class="mb-1">My Calender</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-8">
                        <ul class="d-flex nav nav-pills mb-4 text-center event-tab" id="event-pills-tab" role="tablist">
                            <!-- <li class="nav-item">
                                <a id="view-btn" class="nav-link" data-toggle="pill" href="#event1" data-extra="#search-with-button" role="tab" aria-selected="true">Event Type</a>
                            </li> -->
                            <li class="nav-item">
                                <a id="view-schedule" class="nav-link active show" data-toggle="pill" href="#event2" data-extra="#view-event" role="tab" aria-selected="false">Meetings</a>
                            </li>
                        </ul>
                    </div>
                    <!-- <div class="col-lg-2 col-md-4 tab-extra" id="view-event">
                        <div class="float-md-right mb-4"><a href="#event1" class="btn view-btn">View Event</a></div>
                    </div> -->
                </div>
                <!-- <div class="tab-extra active" id="search-with-button">
                    <div class="d-flex flex-wrap align-items-center mb-4">
                        <div class="iq-search-bar search-device mb-0 pr-3">
                            <form action="#" class="searchbox">
                                <input type="text" class="text search-input" placeholder="Search...">
                            </form>
                        </div>
                        <div class="float-sm-right"><a href="{{route('add-event')}}" class="btn btn-primary pr-5 position-relative" style="height: 40px;">Add Event<span class="event-add-btn" style="height: 40px;"><i class="ri-add-line"></i></span></a></div>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="event-content">
                        <div id="event2" class="tab-pane fade active show">
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                                <ul class="d-flex nav nav-pills text-center schedule-tab" id="schedule-pills-tab" role="tablist">
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#schedule01" data-extras="#filter-none" role="tab" aria-selected="false">All</a>
                                    </li> -->
                                </ul>
                                <!-- <div class="d-flex flex-wrap align-items-center">
                                    <div id="filter-none" class="filter-extra">
                                    </div>
                                    <div id="filter-button" class="select-dropdown input-prepend input-append filter-dropdown filter-extra active">
                                        <div class="btn-group">
                                            <label data-toggle="dropdown" class="mb-0">
                                                <span class="dropdown-toggle search-query selet-caption btn bg-white">Filter By</span><span class="search-replace"></span>
                                                <span class="caret">
                                                    <!--icon--
                                                </span>
                                            </label>
                                            <ul class="dropdown-menu p-3 border-none">
                                                <li>
                                                    <div class="item mb-2">
                                                        <div class="checkbox">
                                                            <input type="checkbox" class="checkbox-input mr-3" id="checkbox1">
                                                            <label for="checkbox1" class="mb-0">All Teams</label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="item mb-2">
                                                        <div class="checkbox">
                                                            <input type="checkbox" class="checkbox-input mr-3" id="checkbox2">
                                                            <label for="checkbox2" class="mb-0">All Event Types</label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="item mb-2">
                                                        <div class="checkbox">
                                                            <input type="checkbox" class="checkbox-input mr-3" id="checkbox3">
                                                            <label for="checkbox3" class="mb-0">Active Events</label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="item mb-2">
                                                        <div class="checkbox">
                                                            <input type="checkbox" class="checkbox-input mr-3" id="checkbox4">
                                                            <label for="checkbox4" class="mb-0">All IDs</label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="item">
                                                        <div class="checkbox">
                                                            <input type="checkbox" class="checkbox-input mr-3" id="checkbox5">
                                                            <label for="checkbox5" class="mb-0">All Invitee Email</label>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <div class="schedule-content">
                                <div id="schedule01" class="tab-pane fade active show">
                                    <div class="row">
                                        @foreach($meetings as $meeting)
                                        <div class="col-lg-12">
                                            <div class="card card-block card-stretch">
                                                <div class="card-body">
                                                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                                                        <div class="d-flex flex-wrap align-items-center">
                                                            <div class="date mr-3">
                                                                <h4 class="text-info">{{$meeting->date}}</h4>
                                                            </div>
                                                            <div class="border-left pl-3">
                                                                <div class="media align-items-top">
                                                                    <h5 class="mb-3">{{$meeting->event_subscriber->first_name}} {{$meeting->event_subscriber->last_name}}</h5>
                                                                    <div class="badge badge-color ml-3">{{$meeting->status}}</div>
                                                                </div>
                                                                    <p>{{$meeting->event->title}} - {{$meeting->event->duration}} Mins</p>
                                                                <div class="media align-items-center">
                                                                    <p class="mb-0 pr-3"><i class="las la-clock mr-2 text-info"></i>{{$meeting->time}}</p>
                                                                    <p class="mb-0"><i class="las la-map-marker mr-2 text-info"></i>{{$meeting->event->platform}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="d-flex align-items-center list-action">
                                                            <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-edit-box-line"></i></a>
                                                            <a class="badge" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade create-workform" id="create-event" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup text-left">
                            <h4 class="mb-3">Create a Workflow</h4>
                            <div class="mb-3">
                                <h5>When this happens</h5>
                                <div class="content">
                                    <div class="form-group mb-0">
                                        <select name="type" class="selectpicker form-control" data-style="py-0">
                                            <option>Select..</option>
                                            <option>New event is scheduled</option>
                                            <option>Before event starts</option>
                                            <option>Event starts</option>
                                            <option>Event ends</option>
                                            <option>Event is canceled</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <h5 class="mb-3">Do this</h5>
                                <div class="form-group  mb-0">
                                    <select name="type" class="selectpicker form-control" data-style="py-0">
                                        <option>Select..</option>
                                        <option>Send email to invitee</option>
                                        <option>Send email to host</option>
                                        <option>Send text to invitee</option>
                                        <option>Send text to host</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                    <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                    <div class="btn btn-outline-primary" data-dismiss="modal">Save</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
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
                            <li class="nav-item">
                                <a id="view-btn" class="nav-link active show" data-toggle="pill" href="#event1" data-extra="#search-with-button" role="tab" aria-selected="true">Events</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a id="view-schedule" class="nav-link" data-toggle="pill" href="#event2" data-extra="#view-event" role="tab" aria-selected="false">Schedule Event</a>
                            </li> -->
                        </ul>
                    </div>
                    <!-- <div class="col-lg-2 col-md-4 tab-extra" id="view-event">
                        <div class="float-md-right mb-4"><a href="#event1" class="btn view-btn">View Event</a></div>
                    </div> -->
                </div>
                <div class="tab-extra active" id="search-with-button">
                    <div class="d-flex flex-wrap align-items-center mb-4">
                        <div class="iq-search-bar search-device mb-0 pr-3">
                            <form action="#" class="searchbox">
                                <input type="text" class="text search-input" placeholder="Search...">
                            </form>
                        </div>
                        <div class="float-sm-right"><a href="{{route('add-event')}}" class="btn btn-primary pr-5 position-relative" style="height: 40px;">Add Event<span class="event-add-btn" style="height: 40px;"><i class="ri-add-line"></i></span></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="event-content">
                        <div id="event1" class="tab-pane fade active show">
                            <div class="row">
                                @foreach($events as $event)
                            <div class="col-lg-4 col-md-6">
                                <div class="card card-block card-stretch card-height">
                                    <div class="card-body rounded event-detail event-detail-warning">
                                        <div class="d-flex align-items-top justify-content-between">
                                            <div>
                                                <h4 class="mb-2 mr-4">{{$event->title}}</h4>                                        
                                                <p class="mb-2 text-warning font-weight-500 text-uppercase"><i class="las la-user-friends pr-2"></i>{{$event->type}}</p>
                                                <p class="mb-4 card-description">{!!$event->description!!}</p>
                                                <div class="d-flex align-items-center pt-4">
                                                    <a href="#" class="btn btn-warning mr-3 px-xl-4">{{$event->duration}} Min</a>
                                                    <a href="{{env('APP_URL')}}/{{Auth::user()->username}}/{{$event->link}}" onclick="navigator.clipboard.writeText(this.href)" class="btn btn-outline-warning copy px-xl-4" data-extra-toggle="copy" title="Copy to clipboard" data-toggle="tooltip"><i class="las la-link pr-2"></i>Copy Link</a>
                                                    <a href="#" class="btn btn-outline-warning d-none turn-on px-xl-4">Turn On</a>
                                                </div>
                                            </div>
                                            <div class="card-header-toolbar mt-1">
                                                <div class="dropdown">
                                                    <span class="dropdown-toggle" id="dropdownMenuButton5" data-toggle="dropdown">
                                                        <i class="ri-more-2-fill"></i>
                                                    </span>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton5">
                                                        <a class="dropdown-item" href="/meeting-list/{{$event->id}}"><i class="ri-code-s-slash-line mr-3"></i>View meetings</a>
                                                        <a class="dropdown-item" href="#"><i class="ri-pencil-line mr-3"></i>Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="ri-sticky-note-line mr-3"></i>Add Internal Note</a>
                                                        <a class="dropdown-item" href="#"><i class="ri-save-line mr-3"></i>Save to Template</a>
                                                        <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-line mr-3"></i>Delete</a>  
                                                        <div class="dropdown-item border-top mt-2">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div>On/Off</div>
                                                                <div class="custom-control custom-switch p-0">
                                                                    <input type="checkbox" class="custom-control-input card-change" id="customSwitch3">
                                                                    <label class="custom-control-label" for="customSwitch3"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="event2" class="tab-pane fade">
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                                <ul class="d-flex nav nav-pills text-center schedule-tab" id="schedule-pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#schedule01" data-extras="#filter-none" role="tab" aria-selected="false">All</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active show" data-toggle="pill" href="#schedule1" data-extras="#filter-button" role="tab" aria-selected="true">Upcoming</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#schedule2" data-extras="#filter-none" role="tab" aria-selected="false">Pending</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#schedule3" data-extras="#filter-button" role="tab" aria-selected="false">Past</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#schedule4" data-placement="daterange" data-extras="#filter-button" role="tab" aria-selected="false">
                                            Date range
                                        </a>
                                    </li>
                                </ul>
                                <div class="d-flex flex-wrap align-items-center">
                                    <div id="filter-none" class="filter-extra">
                                    </div>
                                    <div id="filter-button" class="select-dropdown input-prepend input-append filter-dropdown filter-extra active">
                                        <div class="btn-group">
                                            <label data-toggle="dropdown" class="mb-0">
                                                <span class="dropdown-toggle search-query selet-caption btn bg-white">Filter By</span><span class="search-replace"></span>
                                                <span class="caret">
                                                    <!--icon-->
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
                                </div>
                            </div>
                            <div class="schedule-content">
                                <div id="schedule01" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card card-block card-stretch">
                                                <div class="card-body">
                                                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                                                        <div class="d-flex flex-wrap align-items-center">
                                                            <div class="date mr-3">
                                                                <h4 class="text-info">15 Dec</h4>
                                                            </div>
                                                            <div class="border-left pl-3">
                                                                <div class="media align-items-top">
                                                                    <h5 class="mb-3">Calendify Inner Pages</h5>
                                                                    <div class="badge badge-color ml-3">Upcoming</div>
                                                                </div>
                                                                <div class="media align-items-center">
                                                                    <p class="mb-0 pr-3"><i class="las la-clock mr-2 text-info"></i>08 Pm - 09 Pm</p>
                                                                    <p class="mb-0"><i class="las la-map-marker mr-2 text-info"></i>1 Circle Street Leominster, Ma 01453</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center list-action">
                                                            <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-edit-box-line"></i></a>
                                                            <a class="badge" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="card card-block card-stretch">
                                                <div class="card-body">
                                                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                                                        <div class="d-flex flex-wrap align-items-center">
                                                            <div class="date mr-3">
                                                                <h4 class="text-danger">25 Dec</h4>
                                                            </div>
                                                            <div class="border-left pl-3">
                                                                <div class="media align-items-top">
                                                                    <h5 class="mb-3">Admin Dashboard Team Meet</h5>
                                                                    <div class="badge badge-color ml-3">Upcoming</div>
                                                                </div>
                                                                <div class="media align-items-center">
                                                                    <p class="mb-0 pr-3"><i class="las la-clock mr-2 text-danger"></i>09:45 Pm - 10 Pm</p>
                                                                    <p class="mb-0"><i class="las la-map-marker mr-2 text-danger"></i>1 Circle Street Leominster, Ma 01453</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center list-action">
                                                            <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-edit-box-line"></i></a>
                                                            <a class="badge" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="card card-block card-stretch">
                                                <div class="card-body">
                                                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                                                        <div class="d-flex flex-wrap align-items-center">
                                                            <div class="date mr-3">
                                                                <h4 class="text-success">29 Dec</h4>
                                                            </div>
                                                            <div class="border-left pl-3">
                                                                <div class="media align-items-top">
                                                                    <h5 class="mb-3">Calendify Pre-Launch Campaign</h5>
                                                                    <div class="badge badge-color ml-3">Pending</div>
                                                                </div>
                                                                <div class="media align-items-center">
                                                                    <p class="mb-0 pr-3"><i class="las la-clock mr-2 text-success"></i>10 Pm - 10:30 Pm</p>
                                                                    <p class="mb-0"><i class="las la-map-marker mr-2 text-success"></i>1 Circle Street Leominster, Ma 01453</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center list-action">
                                                            <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-edit-box-line"></i></a>
                                                            <a class="badge" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="schedule1" class="tab-pane fade active show">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="card card-block card-stretch card-height">
                                                <div class="card-body rounded event-detail event-detail-info">
                                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                                        <div>
                                                            <h1 class="text-info">18</h1>
                                                            <h5 class="text-info">Dec</h5>
                                                        </div>
                                                        <div class="d-flex align-items-center list-action">
                                                            <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-edit-box-line"></i></a>
                                                            <a class="badge" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                                        </div>
                                                    </div>
                                                    <h4 class="my-2">Xamin WordPress Theme Update</h4>
                                                    <p class="mb-4 card-description">Major update v2.5 version of Xamin theme. Make Xamin in Elementor version and document the steps.</p>
                                                    <p class="mb-2 text-info"><i class="las la-clock mr-3"></i>08 Pm - 09 Pm</p>
                                                    <p class="mb-2 text-info"><i class="las la-map-marker mr-3"></i>1 Circle Street Leominster, Ma 01453</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="card card-block card-stretch card-height">
                                                <div class="card-body rounded event-detail event-detail-danger">
                                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                                        <div>
                                                            <h1 class="text-danger">25</h1>
                                                            <h5 class="text-danger">Dec</h5>
                                                        </div>
                                                        <div class="d-flex align-items-center list-action">
                                                            <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-edit-box-line"></i></a>
                                                            <a class="badge" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                                        </div>
                                                    </div>
                                                    <h4 class="my-2">Iqonic Design Christmas Campaign</h4>
                                                    <p class="mb-4 card-description">Draft an conversional and Sales-driven Christmas campaign by offering Christmas deals to customers. </p>
                                                    <p class="mb-2 text-danger"><i class="las la-clock mr-3"></i>09:45 Pm - 10 Pm</p>
                                                    <p class="mb-2 text-danger"><i class="las la-map-marker mr-3"></i>1 Circle Street Leominster, Ma 01453</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="card card-block card-stretch card-height">
                                                <div class="card-body rounded event-detail event-detail-success">
                                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                                        <div>
                                                            <h1 class="text-success">29</h1>
                                                            <h5 class="text-success">Dec</h5>
                                                        </div>
                                                        <div class="d-flex align-items-center list-action">
                                                            <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-edit-box-line"></i></a>
                                                            <a class="badge" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                                        </div>
                                                    </div>
                                                    <h4 class="my-2">Best Iqonic Design Item Collections</h4>
                                                    <p class="mb-4 card-description">Build the best Iqonic collectable list of WordPress themes, HTML, Vuejs Admin Dashboards and Mobile Applications. </p>
                                                    <p class="mb-2 text-success"><i class="las la-clock mr-3"></i>10 Pm - 10:30 Pm</p>
                                                    <p class="mb-2 text-success"><i class="las la-map-marker mr-3"></i>1 Circle Street Leominster, Ma 01453</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="schedule2" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="card card-block card-stretch card-height">
                                                <div class="card-body rounded event-detail event-detail1">
                                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                                        <div>
                                                            <h1 class="text-info">25</h1>
                                                            <h5 class="text-info">Dec</h5>
                                                        </div>
                                                        <div class="d-flex align-items-center list-action">
                                                            <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-edit-box-line"></i></a>
                                                            <a class="badge" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                                        </div>
                                                    </div>
                                                    <h4 class="my-2">Calendify Homepage Final Edits</h4>
                                                    <p class="mb-4 card-description">Enhance Calendify with beautiful user interface and UI changes to ensure high conversion rate.</p>
                                                    <p class="mb-2 text-info"><i class="las la-clock mr-3"></i>08 Pm - 09 Pm</p>
                                                    <p class="mb-2 text-info"><i class="las la-map-marker mr-3"></i>1 Circle Street Leominster, Ma 01453</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="card card-block card-stretch card-height">
                                                <div class="card-body rounded event-detail event-detail2 active">
                                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                                        <div>
                                                            <h1 class="text-danger">07</h1>
                                                            <h5 class="text-danger">Jan</h5>
                                                        </div>
                                                        <div class="d-flex align-items-center list-action">
                                                            <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-edit-box-line"></i></a>
                                                            <a class="badge" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                                        </div>
                                                    </div>
                                                    <h4 class="my-2">Calendify Promotional Campaign</h4>
                                                    <p class="mb-4 card-description">Schedule meetings and promotional campaigns for your internal team by assigning task and roles.</p>
                                                    <p class="mb-2 text-danger"><i class="las la-clock mr-3"></i>09:45 Pm - 10 Pm</p>
                                                    <p class="mb-2 text-danger"><i class="las la-map-marker mr-3"></i>1 Circle Street Leominster, Ma 01453</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="card card-block card-stretch card-height">
                                                <div class="card-body rounded event-detail event-detail3">
                                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                                        <div>
                                                            <h1 class="text-success">15</h1>
                                                            <h5 class="text-success">Jan</h5>
                                                        </div>
                                                        <div class="d-flex align-items-center list-action">
                                                            <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-edit-box-line"></i></a>
                                                            <a class="badge" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                                        </div>
                                                    </div>
                                                    <h4 class="my-2">Exploring Automatic Timezone Detection</h4>
                                                    <p class="mb-4 card-description">An internal team meeting to brief on a feature where the meeting will be seen in viewer???s time zone with automatic timezone detection in Calendify. </p>
                                                    <p class="mb-2 text-success"><i class="las la-clock mr-3"></i>10 Pm - 10:30 Pm</p>
                                                    <p class="mb-2 text-success"><i class="las la-map-marker mr-3"></i>1 Circle Street Leominster, Ma 01453</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="schedule3" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="card card-block card-stretch card-height">
                                                <div class="card-body rounded event-detail event-detail1">
                                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                                        <div>
                                                            <h1 class="text-info">03</h1>
                                                            <h5 class="text-info">Dec</h5>
                                                        </div>
                                                        <div class="d-flex align-items-center list-action">
                                                            <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-edit-box-line"></i></a>
                                                            <a class="badge" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                                        </div>
                                                    </div>
                                                    <h4 class="my-2">Webtech-Developer Horror Stories</h4>
                                                    <p class="mb-4 card-description">Lorem Ipsum Dolor Sit Amet, Consecetetur Adip Iscing Elit. Pharetra Luctus Ultricies Velit Ut. Id Tincidunt Mattis Sed Duis.</p>
                                                    <p class="mb-2 text-info"><i class="las la-clock mr-3"></i>08 Pm - 09 Pm</p>
                                                    <p class="mb-2 text-info"><i class="las la-map-marker mr-3"></i>1 Circle Street Leominster, Ma 01453</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="card card-block card-stretch card-height">
                                                <div class="card-body rounded event-detail event-detail2 active">
                                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                                        <div>
                                                            <h1 class="text-danger">16</h1>
                                                            <h5 class="text-danger">Dec</h5>
                                                        </div>
                                                        <div class="d-flex align-items-center list-action">
                                                            <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-edit-box-line"></i></a>
                                                            <a class="badge" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                                        </div>
                                                    </div>
                                                    <h4 class="my-2">Meetup-Meeing With Team of Designer</h4>
                                                    <p class="mb-4 card-description">Lorem Ipsum Dolor Sit Amet, Consecetetur Adip Iscing Elit. Pharetra Luctus Ultricies Velit Ut. Id Tincidunt Mattis Sed Duis.</p>
                                                    <p class="mb-2 text-danger"><i class="las la-clock mr-3"></i>09:45 Pm - 10 Pm</p>
                                                    <p class="mb-2 text-danger"><i class="las la-map-marker mr-3"></i>1 Circle Street Leominster, Ma 01453</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="card card-block card-stretch card-height">
                                                <div class="card-body rounded event-detail event-detail3">
                                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                                        <div>
                                                            <h1 class="text-success">27</h1>
                                                            <h5 class="text-success">Dec</h5>
                                                        </div>
                                                        <div class="d-flex align-items-center list-action">
                                                            <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-edit-box-line"></i></a>
                                                            <a class="badge" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                                        </div>
                                                    </div>
                                                    <h4 class="my-2">Project Plan-Do Anaylsis Of Project</h4>
                                                    <p class="mb-4 card-description">Lorem Ipsum Dolor Sit Amet, Consecetetur Adip Iscing Elit. Pharetra Luctus Ultricies Velit Ut. Id Tincidunt Mattis Sed Duis.</p>
                                                    <p class="mb-2 text-success"><i class="las la-clock mr-3"></i>10 Pm - 10:30 Pm</p>
                                                    <p class="mb-2 text-success"><i class="las la-map-marker mr-3"></i>1 Circle Street Leominster, Ma 01453</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="schedule4" data-toggle="daterange" class="tab-pane fade">
                                    <div class="card card-block card-stretch mb-4">
                                        <div class="card-body mb-5 border-bottom">
                                            <p class="mb-0">18 Dec ??? 24 Dec 2020</p>
                                        </div>
                                        <div class="card-body text-center">
                                            <div class="d-inline-block m-auto date-event">
                                                <div class="icon iq-icon-box-2 m-auto rounded border">
                                                    <i class="las la-calendar"></i>
                                                </div>
                                                <p class="mt-4">No Event In This Range</p>
                                            </div>
                                        </div>
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
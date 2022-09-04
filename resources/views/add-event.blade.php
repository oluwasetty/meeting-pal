<x-app-layout>
    <x-slot name="header">
    </x-slot>


    <div class="content-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="py-4 border-bottom">
                        <div class="float-left"><a href="page-new-event.html" class="badge bg-white back-arrow"><i class="las la-angle-left"></i></a></div>
                        <div class="form-title text-center">
                            <h3>Create Event</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card card-block card-stretch create-workform event-content">
                        <div class="card-body p-5">

                            <form method="POST" action="{{route('add-event')}}">
                                @csrf
                                <div id="event1" class="tab-pane fade active show">
                                    <div class="row">
                                        <div class="col-lg-6 mb-4">
                                            <label class="title">Title *</label>
                                            <input type="text" class="form-control" placeholder="Title" name="title" required>
                                        </div>
                                        <div class="col-lg-6 mb-4">
                                            <label class="title">Platform *</label>
                                            <div class="search-dropdown-select">
                                                <div class="input-prepend input-append">
                                                    <div class="btn-group w-100">
                                                        <label class="mb-0 w-100 form-control dropdown-toggle" data-toggle="dropdown">
                                                            <input class="dropdown-toggle search-query text search-input" name="platform" type="text" placeholder="Add a Platform" autocomplete="off"><span class="search-replace"></span>
                                                            <span class="caret">
                                                                <!--icon-->
                                                            </span>
                                                        </label>
                                                        <ul class="dropdown-menu w-100 border-none">
                                                            <li>
                                                                <a href="#">
                                                                    <div class="item">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="i-icon text-primary">
                                                                                <i class="fas fa-phone-alt"></i>
                                                                            </div>
                                                                            <div class="ml-2">
                                                                                <h6>Zoom Us</h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="item">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="i-icon text-success">
                                                                                <i class="fas fa-video"></i>
                                                                            </div>
                                                                            <div class="ml-2">
                                                                                <h6>Google Meet</h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-4">
                                            <label class="title">Who are you meeting with? *</label>
                                            <div class="search-dropdown-select">
                                                <div class="input-prepend input-append">
                                                    <div class="btn-group w-100">
                                                        <label class="mb-0 w-100 form-control dropdown-toggle" data-toggle="dropdown">
                                                            <input class="dropdown-toggle search-query text search-input" name="type" type="text" placeholder="Your audience" autocomplete="off"><span class="search-replace"></span>
                                                            <span class="caret">
                                                                <!--icon-->
                                                            </span>
                                                        </label>
                                                        <ul class="dropdown-menu w-100 border-none">
                                                            <li>
                                                                <a href="#">
                                                                    <div class="item">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="i-icon text-primary">
                                                                                <i class="fas fa-phone-alt"></i>
                                                                            </div>
                                                                            <div class="ml-2">
                                                                                <h6>Individual</h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="item">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="i-icon text-success">
                                                                                <i class="fas fa-video"></i>
                                                                            </div>
                                                                            <div class="ml-2">
                                                                                <h6>Group</h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-4">
                                            <label class="title mb-3">Description/Instructions</label>
                                            <div id="editor" style="height: 150px !important;" onkeyup="document.querySelector('#desc').value = document.querySelector('.ql-editor').innerHTML">
                                                <p></p>
                                            </div>
                                            <input type="hidden" id="desc" name="description" />
                                        </div>
                                        <div class="col-lg-12 mb-4">
                                            <label class="title">Event link ({{env("APP_URL")}}/{{Auth::user()->username}}/) *</label>
                                            <input type="text" class="form-control" name="link" required>
                                        </div>
                                        <div class="col-lg-12 mt-4">
                                            <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                                <div class="btn btn-primary mr-4"><a href="{{route('dashboard')}}" class="cancel-btn">Cancel</a></div>
                                                <div class="btn btn-outline-primary"><a class="nav-link" data-toggle="pill" role="tab" href="#event2" class="save-btn" aria-selected="true">Next</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="event2" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-lg-12 mb-4">
                                            <label class="title">Duration *</label>
                                            <input type="text" class="form-control" placeholder="...in minutes" value="30" name="duration" required>
                                        </div>
                                        <div class="col-lg-6 mb-4">
                                            <label class="title">Add time before meetings</label>
                                            <input type="text" class="form-control" placeholder="...in minutes" name="time_before">
                                        </div>
                                        <div class="col-lg-6 mb-4">
                                            <label class="title">Add time after meetings </label>
                                            <input type="text" class="form-control" placeholder="...in minutes" name="time_after" >
                                        </div>
                                        <div class="col-lg-12 mb-4" id="weekly">
                                            <label class="title">Set your weekly hours</label>
                                            <div class="row">
                                                <div class=" col-lg-3 pl-3">
                                                    <select class="form-control" id="day">
                                                        <option value="" hidden selected>Day of the week</option>
                                                        <option value="Sun">Sunday</option>
                                                        <option value="Mon">Monday</option>
                                                        <option value="Tue">Tuesday</option>
                                                        <option value="Wed">Wednesday</option>
                                                        <option value="Thu">Thursday</option>
                                                        <option value="Fri">Friday</option>
                                                        <option value="Sat">Saturday</option>
                                                    </select>
                                                </div>
                                                <div class=" col-lg-3 pl-3">
                                                    <select id="start_time" class="form-control">
                                                        <option value="" hidden selected>Start Time</option>
                                                        <option value="00:00">00:00</option>
                                                        <option value="00:15">00:15</option>
                                                        <option value="00:30">00:30</option>
                                                        <option value="00:45">00:45</option>
                                                        <option value="01:00">01:00</option>
                                                        <option value="01:15">01:15</option>
                                                        <option value="01:30">01:30</option>
                                                        <option value="01:45">01:45</option>
                                                        <option value="02:00">02:00</option>
                                                        <option value="02:15">02:15</option>
                                                        <option value="02:30">02:30</option>
                                                        <option value="02:45">02:45</option>
                                                        <option value="03:00">03:00</option>
                                                        <option value="03:15">03:15</option>
                                                        <option value="03:30">03:30</option>
                                                        <option value="03:45">03:45</option>
                                                        <option value="04:00">04:00</option>
                                                        <option value="04:15">04:15</option>
                                                        <option value="04:30">04:30</option>
                                                        <option value="04:45">04:45</option>
                                                        <option value="05:00">05:00</option>
                                                        <option value="05:15">05:15</option>
                                                        <option value="05:30">05:30</option>
                                                        <option value="05:45">05:45</option>
                                                        <option value="06:00">06:00</option>
                                                        <option value="06:15">06:15</option>
                                                        <option value="06:30">06:30</option>
                                                        <option value="06:45">06:45</option>
                                                        <option value="07:00">07:00</option>
                                                        <option value="07:15">07:15</option>
                                                        <option value="07:30">07:30</option>
                                                        <option value="07:45">07:45</option>
                                                        <option value="08:00">08:00</option>
                                                        <option value="08:15">08:15</option>
                                                        <option value="08:30">08:30</option>
                                                        <option value="08:45">08:45</option>
                                                        <option value="09:00">09:00</option>
                                                        <option value="09:15">09:15</option>
                                                        <option value="09:30">09:30</option>
                                                        <option value="09:45">09:45</option>
                                                        <option value="10:00">10:00</option>
                                                        <option value="10:15">10:15</option>
                                                        <option value="10:30">10:30</option>
                                                        <option value="10:45">10:45</option>
                                                        <option value="11:00">11:00</option>
                                                        <option value="11:15">11:15</option>
                                                        <option value="11:30">11:30</option>
                                                        <option value="11:45">11:45</option>
                                                        <option value="12:00">12:00</option>
                                                        <option value="12:15">12:15</option>
                                                        <option value="12:30">12:30</option>
                                                        <option value="12:45">12:45</option>
                                                        <option value="13:00">13:00</option>
                                                        <option value="13:15">13:15</option>
                                                        <option value="13:30">13:30</option>
                                                        <option value="13:45">13:45</option>
                                                        <option value="14:00">14:00</option>
                                                        <option value="14:15">14:15</option>
                                                        <option value="14:30">14:30</option>
                                                        <option value="14:45">14:45</option>
                                                        <option value="15:00">15:00</option>
                                                        <option value="15:15">15:15</option>
                                                        <option value="15:30">15:30</option>
                                                        <option value="15:45">15:45</option>
                                                        <option value="16:00">10:00</option>
                                                        <option value="16:15">10:15</option>
                                                        <option value="16:30">10:30</option>
                                                        <option value="16:45">10:45</option>
                                                        <option value="17:00">17:00</option>
                                                        <option value="17:15">17:15</option>
                                                        <option value="17:30">17:30</option>
                                                        <option value="17:45">17:45</option>
                                                        <option value="18:00">18:00</option>
                                                        <option value="18:15">18:15</option>
                                                        <option value="18:30">18:30</option>
                                                        <option value="18:45">18:45</option>
                                                        <option value="19:00">19:00</option>
                                                        <option value="19:15">19:15</option>
                                                        <option value="19:30">19:30</option>
                                                        <option value="19:45">19:45</option>
                                                        <option value="20:00">20:00</option>
                                                        <option value="20:00">20:00</option>
                                                        <option value="20:15">20:15</option>
                                                        <option value="20:30">20:30</option>
                                                        <option value="20:45">20:45</option>
                                                        <option value="21:15">21:15</option>
                                                        <option value="21:30">21:30</option>
                                                        <option value="21:45">21:45</option>
                                                        <option value="22:00">22:00</option>
                                                        <option value="22:15">22:15</option>
                                                        <option value="22:30">22:30</option>
                                                        <option value="22:45">22:45</option>
                                                        <option value="23:00">23:00</option>
                                                        <option value="23:15">23:15</option>
                                                        <option value="23:30">23:30</option>
                                                        <option value="23:45">23:45</option>
                                                        <option value="24:00">24:00</option>
                                                        <option value="24:15">24:15</option>
                                                        <option value="24:30">24:30</option>
                                                        <option value="24:45">24:45</option>
                                                    </select>
                                                </div>
                                                <div class=" col-lg-3 pl-3">
                                                    <select id="end_time" class="form-control">
                                                        <option value="" hidden selected>End Time</option>
                                                        <option value="00:00">00:00</option>
                                                        <option value="00:15">00:15</option>
                                                        <option value="00:30">00:30</option>
                                                        <option value="00:45">00:45</option>
                                                        <option value="01:00">01:00</option>
                                                        <option value="01:15">01:15</option>
                                                        <option value="01:30">01:30</option>
                                                        <option value="01:45">01:45</option>
                                                        <option value="02:00">02:00</option>
                                                        <option value="02:15">02:15</option>
                                                        <option value="02:30">02:30</option>
                                                        <option value="02:45">02:45</option>
                                                        <option value="03:00">03:00</option>
                                                        <option value="03:15">03:15</option>
                                                        <option value="03:30">03:30</option>
                                                        <option value="03:45">03:45</option>
                                                        <option value="04:00">04:00</option>
                                                        <option value="04:15">04:15</option>
                                                        <option value="04:30">04:30</option>
                                                        <option value="04:45">04:45</option>
                                                        <option value="05:00">05:00</option>
                                                        <option value="05:15">05:15</option>
                                                        <option value="05:30">05:30</option>
                                                        <option value="05:45">05:45</option>
                                                        <option value="06:00">06:00</option>
                                                        <option value="06:15">06:15</option>
                                                        <option value="06:30">06:30</option>
                                                        <option value="06:45">06:45</option>
                                                        <option value="07:00">07:00</option>
                                                        <option value="07:15">07:15</option>
                                                        <option value="07:30">07:30</option>
                                                        <option value="07:45">07:45</option>
                                                        <option value="08:00">08:00</option>
                                                        <option value="08:15">08:15</option>
                                                        <option value="08:30">08:30</option>
                                                        <option value="08:45">08:45</option>
                                                        <option value="09:00">09:00</option>
                                                        <option value="09:15">09:15</option>
                                                        <option value="09:30">09:30</option>
                                                        <option value="09:45">09:45</option>
                                                        <option value="10:00">10:00</option>
                                                        <option value="10:15">10:15</option>
                                                        <option value="10:30">10:30</option>
                                                        <option value="10:45">10:45</option>
                                                        <option value="11:00">11:00</option>
                                                        <option value="11:15">11:15</option>
                                                        <option value="11:30">11:30</option>
                                                        <option value="11:45">11:45</option>
                                                        <option value="12:00">12:00</option>
                                                        <option value="12:15">12:15</option>
                                                        <option value="12:30">12:30</option>
                                                        <option value="12:45">12:45</option>
                                                        <option value="13:00">13:00</option>
                                                        <option value="13:15">13:15</option>
                                                        <option value="13:30">13:30</option>
                                                        <option value="13:45">13:45</option>
                                                        <option value="14:00">14:00</option>
                                                        <option value="14:15">14:15</option>
                                                        <option value="14:30">14:30</option>
                                                        <option value="14:45">14:45</option>
                                                        <option value="15:00">15:00</option>
                                                        <option value="15:15">15:15</option>
                                                        <option value="15:30">15:30</option>
                                                        <option value="15:45">15:45</option>
                                                        <option value="16:00">10:00</option>
                                                        <option value="16:15">10:15</option>
                                                        <option value="16:30">10:30</option>
                                                        <option value="16:45">10:45</option>
                                                        <option value="17:00">17:00</option>
                                                        <option value="17:15">17:15</option>
                                                        <option value="17:30">17:30</option>
                                                        <option value="17:45">17:45</option>
                                                        <option value="18:00">18:00</option>
                                                        <option value="18:15">18:15</option>
                                                        <option value="18:30">18:30</option>
                                                        <option value="18:45">18:45</option>
                                                        <option value="19:00">19:00</option>
                                                        <option value="19:15">19:15</option>
                                                        <option value="19:30">19:30</option>
                                                        <option value="19:45">19:45</option>
                                                        <option value="20:00">20:00</option>
                                                        <option value="20:00">20:00</option>
                                                        <option value="20:15">20:15</option>
                                                        <option value="20:30">20:30</option>
                                                        <option value="20:45">20:45</option>
                                                        <option value="21:15">21:15</option>
                                                        <option value="21:30">21:30</option>
                                                        <option value="21:45">21:45</option>
                                                        <option value="22:00">22:00</option>
                                                        <option value="22:15">22:15</option>
                                                        <option value="22:30">22:30</option>
                                                        <option value="22:45">22:45</option>
                                                        <option value="23:00">23:00</option>
                                                        <option value="23:15">23:15</option>
                                                        <option value="23:30">23:30</option>
                                                        <option value="23:45">23:45</option>
                                                        <option value="24:00">24:00</option>
                                                        <option value="24:15">24:15</option>
                                                        <option value="24:30">24:30</option>
                                                        <option value="24:45">24:45</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-3 pr-2"><a href="#" onclick="checkweekly()" class="btn btn-primary pr-5 position-relative" style="height: 40px;">Add<span class="event-add-btn" style="height: 40px;"><i class="ri-add-line"></i></span></a></div>
                                                <input type="hidden" id="weekly_schedule" name="weekly_schedule">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-4">
                                        <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                            <button type="submit" class="btn btn-primary">Create</button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        let arr = [];
        function checkweekly() {
            let day = document.querySelector("#weekly #day").value;
            let start_time = document.querySelector("#weekly #start_time").value;
            let end_time = document.querySelector("#weekly #end_time").value;
            let obj={"day": day, "start_time": start_time, "end_time": end_time}
            document.querySelector("#weekly #day").value = ""
            document.querySelector("#weekly #start_time").value = ""
            document.querySelector("#weekly #end_time").value = ""
            arr.push(obj)
            alert("Your selection " + JSON.stringify(arr))
            document.querySelector("#weekly_schedule").value = JSON.stringify(arr)
        }
    </script>
</x-app-layout>
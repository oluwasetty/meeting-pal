<x-app-layout>
    <x-slot name="header">
        <!-- Calendar -->
        <link href="{{ asset('fullcalendar/main.css') }}" rel='stylesheet' />
        <script src="{{ asset('fullcalendar/main.js') }}"></script>

        <!-- Styles -->
        <!-- <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> -->
        <link rel="stylesheet" href="{{ asset('css/schedule.css') }}">
    </x-slot>


    <div class="content-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="py-4 border-bottom">
                        <div class="float-left"><a href="page-new-event.html" class="badge bg-white back-arrow"><i class="las la-angle-left"></i></a></div>
                        <div class="form-title text-center">
                            <h3>Schedule Meeting</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card card-block card-stretch create-workform event-content">
                        <div class="card-body p-5">

                            <form method="POST" action="{{route('join-event')}}">
                                @csrf
                                <div id="event1" class="tab-pane fade active show">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <section class="description-section">
                                                <hgroup>
                                                    <h4 id="scheduler">{{$user->first_name}} {{$user->last_name}}</h4>
                                                    <h2 id="event">{{$event->title}}</h2>
                                                    <div class="icon-text-div">
                                                        <img src="{{ asset('icons/clock.svg')}}" height="20" alt="clock-icon">
                                                        <h4 id="duration">{{$event->duration}} min</h4>
                                                    </div>
                                                </hgroup>
                                                <p id=description>{!!$event->description!!}</p>
                                            </section>
                                            <div class="divider"></div>
                                            <section id="calendar-section" class="body-section">
                                                <h3>Select a Date & Time</h3>
                                                <div id="schedule-div">
                                                    <div id="available-times-div">
                                                        <!-- Available times -->
                                                    </div>
                                                    <div id="calendar"></div>
                                                    <input type="hidden" id="time_select" name="time_select"/>
                                                    <input type="hidden" id="date_select" name="date_select"/>
                                                    <input type="hidden" value="{{$user->email}}" name="user_email"/>
                                                    <input type="hidden" value="{{$event->id}}" name="event_id"/>
                                                </div>
                                            </section>
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
                                        <div class="col-lg-6 mb-4">
                                            <label class="title">First Name *</label>
                                            <input type="text" class="form-control" placeholder="First Name" name="first_name" required>
                                        </div>
                                        <div class="col-lg-6 mb-4">
                                            <label class="title">Last Name *</label>
                                            <input type="text" class="form-control" placeholder="Last Name" name="last_name" required>
                                        </div>
                                        <div class="col-lg-12 mb-4">
                                            <label class="title">Email *</label>
                                            <input type="text" class="form-control" placeholder="Email" name="email" required>
                                        </div>
                                        <div class="col-lg-12 mb-4">
                                            <label class="title mb-3">Notes</label>
                                            <div id="editor" style="height: 150px !important;" onkeyup="document.querySelector('#desc').value = document.querySelector('.ql-editor').innerHTML">
                                                <p></p>
                                            </div>
                                            <input type="hidden" id="desc" name="notes" />
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
        var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
var timesAvailable = ["9:00am", "10:00am", "11:00am", "2:00pm", "3:00pm"];
let event = {!! json_encode($event, JSON_HEX_TAG) !!}
var timee = JSON.parse(event.weekly_schedule);
let new_time = [];
// timee.foreach(time => {

//     let start_time = time.start_time;
//     let duration = event.duration
// })


// Calendar
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: 'auto',
        showNonCurrentDates: false,
        selectable: true,
        select: function(info) {
            var currentDay = new Date();
            var daySelected = info.start;
            if (daySelected >= currentDay) {

                var timeDiv = document.getElementById("available-times-div");

                while (timeDiv.firstChild) {
                    timeDiv.removeChild(timeDiv.lastChild);
                }

                //Heading - Date Selected
                var h4 = document.createElement("h4");
                var h4node = document.createTextNode(
                    days[daySelected.getDay()] + ", " +
                    months[daySelected.getMonth()] + " " + 
                    daySelected.getDate());
                h4.appendChild(h4node);

                timeDiv.appendChild(h4);

                //Time Buttons
                for (var i = 0; i < timesAvailable.length; i++) {
                    var timeSlot = document.createElement("div");
                    timeSlot.classList.add("time-slot");

                    var timeBtn = document.createElement("button");

                    var btnNode = document.createTextNode(timesAvailable[i]); 
                    timeBtn.classList.add("time-btn");

                    timeBtn.appendChild(btnNode);
                    timeSlot.appendChild(timeBtn);

                    timeDiv.appendChild(timeSlot);

                    // When time is selected
                    var last = null;
                    timeBtn.addEventListener("click", function() {
                        if (last != null) {
                            console.log(last);
                            last.parentNode.removeChild(last.parentNode.lastChild);
                        }
                        var confirmBtn = document.createElement("button");
                        var confirmTxt = document.createTextNode("Confirm");
                        confirmBtn.classList.add("confirm-btn");
                        confirmBtn.appendChild(confirmTxt);
                        this.parentNode.appendChild(confirmBtn);
                        document.querySelector("#time_select").value = this.textContent;
                        confirmBtn.addEventListener("click", function() { 
                            document.querySelector("#date_select").value = 
                                days[daySelected.getDay()] + ", " +
                                months[daySelected.getMonth()] + " " + 
                                daySelected.getDate() + ", " + daySelected.getFullYear();
                            alert("Time Selected")
                        });
                        last = this;
                    });
                }

                var containerDiv = document.getElementsByClassName("container")[0];
                containerDiv.classList.add("time-div-active");
                
                document.getElementById("calendar-section").style.flex = "2";

                timeDiv.style.display = "initial";

            } else {alert("Sorry that date has already past. Please select another date.");}
        },
    });
    calendar.render();
});
    </script>
</x-app-layout>
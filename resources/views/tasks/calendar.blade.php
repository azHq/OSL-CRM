<div>
    <div id='calendar'></div>
    <div id='full_calendar_events'></div>
    <input id="authId" value="{{Auth::id()}}" hidden />
    <input id="isSuperAdmin" value="{{Auth::user()->hasRole('super-admin')}}" hidden />
</div>

@component('tasks.add')
@endcomponent

@component('tasks.editevent')
@endcomponent

@component('tasks.closeevent')
@endcomponent

<!-- Script -->

<!-- <script>
    $(document).ready(function() {
        var SITEURL = "{{ url('/') }}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var calendar = $('#full_calendar_events').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            editable: true,
            events: SITEURL + "/calendar-event",
            displayEventTime: true,
            eventRender: function(event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
            select: async function(event_start, event_end, allDay) {
                var event_start = $.fullCalendar.formatDate(event_start, "Y-MM-DD HH:mm:ss");
                var event_end = $.fullCalendar.formatDate(event_end, "Y-MM-DD HH:mm:ss");
                localStorage.setItem('event_start', event_start);
                localStorage.setItem('event_end', event_end);
                localStorage.setItem('allDay', JSON.stringify(allDay));

                await $.confirm({
                    title: 'New Task!',
                    content: '' +
                        '<form action="" class="formName">' +
                        '<div class="form-group">' +
                        '<label>Task Name</label>' +
                        '<input type="text" placeholder="Enter task name" class="name form-control" required />' +
                        '<label class="col-form-label">Counsellor</label>' +
                        '<select class="form-control form-select" name="assignee_id" id="counsellors-calenrar" readonly>' +
                        '<option value="">Unassigned</option>' +
                        '</select>' +
                        '</div>' +
                        '</form>',
                    buttons: {
                        formSubmit: {
                            text: 'Submit',
                            btnClass: 'btn-blue',
                            action: function() {
                                var event_name = this.$content.find('.name').val();
                                if (!event_name) {
                                    $.alert('provide a valid task name');
                                    return false;
                                }
                                if (event_name) {
                                    $.ajax({
                                        url: SITEURL + "/calendar-crud-ajax",
                                        _token: "{{csrf_token()}}",
                                        data: {
                                            event_name: event_name,
                                            event_start: localStorage.getItem('event_start'),
                                            event_end: localStorage.getItem('event_end'),
                                            type: 'create'
                                        },
                                        type: "POST",
                                        success: function(data) {
                                            displayMessage("Task assigned successfully.");
                                            calendar.fullCalendar('renderEvent', {
                                                id: data.id,
                                                title: event_name,
                                                start: localStorage.getItem('event_start'),
                                                end: localStorage.getItem('event_end'),
                                                allDay: JSON.parse(localStorage.getItem('allDay')),
                                            }, true);
                                            calendar.fullCalendar('unselect');
                                        }
                                    });
                                }
                            }
                        },
                        cancel: function() {
                            //close
                        },
                    },
                    onContentReady: function() {
                        // bind to events
                        var jc = this;
                        this.$content.find('form').on('submit', function(e) {
                            // if the user submits the form by pressing enter in the field.
                            e.preventDefault();
                            jc.$$formSubmit.trigger('click'); // reference the button and click it
                        });
                    }
                });


            },
        });
    });

    function displayMessage(message) {
        toastr.success(message, 'Event');
    }
</script> -->

<script>
    $(document).ready(function() {
        var SITEURL = "{{ url('/') }}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            selectMirror: true,
            editable: true,
            dayMaxEvents: true, // allow "more" link when too many events
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            eventSources: [{
                    url: SITEURL + "/calendar-events-pending", // use the `url` property
                    color: 'primary', // an option!
                    textColor: 'white', // an option!,
                },
                {
                    url: SITEURL + "/calendar-events-resolved", // use the `url` property
                    color: 'green', // an option!
                    textColor: 'white', // an option!,
                },
                {
                    url: SITEURL + "/calendar-events-canceled", // use the `url` property
                    color: 'red', // an option!
                    textColor: 'white', // an option!,
                }
            ],
            eventContent: function(info) {

                let element = document.createElement('div')
                var data = '<div> <span class="person-circle-a person-circle">' + info.event.extendedProps.counsellor_name.substring(0, 1) + '</span>'
                data += info.event.extendedProps.counsellor_name + '</div>'
                data += '<div><b>' + info.event.title + '</b>'
                data += '<span> ( ' + info.event.extendedProps.start_time + ' )</span></div>'
                element.innerHTML = data
                let arrayOfDomNodes = [element]
                return {
                    domNodes: arrayOfDomNodes
                }
            },
            select: function(selectionInfo) {
                $("#task-add-start-date").val(selectionInfo.start.toLocaleDateString());
                $("#add_task").attr('data-end', selectionInfo.end.toLocaleString());
                $("#add_task").attr('data-all-day', selectionInfo.allDay);
                $("#add_task").modal('show');
            },
            eventClick: function(info) {
                let buttons = {
                    Edit: {
                        text: 'Edit Task',
                        btnClass: 'btn-blue',
                        keys: ['enter', 'shift'],
                        action: function() {
                            var id = info.event.id;
                            $("#edit_event").attr('data-counsellor-id', id);
                            $("#edit_event").modal('show');
                            getOwnersEventEdit();
                            getEventEdit(id);
                            var url = "{{ route('tasks.update', 'id') }}";
                            url = url.replace('id', id);
                            $('#event-update').attr('action', url);
                        }
                    },
                    Delete: {
                        text: 'Delete Task',
                        btnClass: 'btn-red',
                        keys: ['enter', 'shift'],
                        action: function() {
                            $.ajax({
                                type: "POST",
                                _token: "{{csrf_token()}}",
                                url: SITEURL + '/calendar-crud-ajax',
                                data: {
                                    id: info.event.id,
                                    type: 'delete'
                                },
                                success: function(response) {
                                    displayMessage("Task deleted successfully");
                                }
                            });
                            info.event.remove()
                        }
                    },
                    cancel: function() {
                        //
                    },

                }
                if ($('#authId').val() != info.event.extendedProps.created_by && $('#authId').val() != '1') {
                    delete buttons.Delete;
                    if (info.event.extendedProps.status != 'Canceled') {
                        buttons.Close = {
                            text: 'Close Task',
                            btnClass: 'btn-red',
                            keys: ['enter', 'shift'],
                            action: function() {
                                var id = info.event.id;
                                $("#close_event").attr('data-counsellor-id', id);
                                $("#close_event").modal('show');
                                var url = "{{ route('tasks.cancel', 'id') }}";
                                url = url.replace('id', id);
                                $('#event-close').attr('action', url);
                            }
                        }
                    }

                }
                $.confirm({
                    title: 'Choose Action!',
                    content: 'What you want to do?',
                    buttons: buttons
                });
            },
            eventDrop: function(info) {
                var id = info.event.id;
                var title = info.event.title;
                var start = info.event.start.toLocaleString('en-GB');
                var end = info.event.end.toLocaleString('en-GB');
                $.ajax({
                    url: SITEURL + '/calendar-crud-ajax',
                    _token: "{{csrf_token()}}",
                    data: {
                        id: id,
                        title: title,
                        start: start,
                        end: end,
                        type: 'edit'
                    },
                    type: "POST",
                    success: function(response) {
                        displayMessage("Task updated successfull");
                    }
                });
            },
        });
        calendar.render();
    });

    function displayMessage(message) {
        toastr.success(message, 'Event');
    }
</script>
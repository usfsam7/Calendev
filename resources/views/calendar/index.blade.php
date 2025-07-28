<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('images/icon.jpg') }}" type="image/jpg">
    <title>Calendev</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- FullCalendar & Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <!-- jQuery (Summernote dependency) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Open+Sans&family=Montserrat&display=swap"
        rel="stylesheet">

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            background-color: #f5f7fa;
            color: #333;
            font-size: 16px;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background-color: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            font-size: 18px;
        }

        .calendar-header h2 {
            font-size: 40px;
            font-weight: 650;
        }


        .calendar-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .icon-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 22px;
            transition: transform 0.2s ease;
        }

        .icon-btn:hover {
            transform: scale(1.1);
        }

        #calendar {
            width: 87%;
            height: 73vh;
            margin: 30px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            padding: 20px;
            font-size: 20px;
            margin-bottom: 10px !important;
            border-bottom: none !important;
        }

        /* ------------------------ */
        /* DARK MODE GLOBAL STYLES */
        /* ------------------------ */
        .dark-mode,
        .dark-mode body,
        .dark-mode html {
            background-color: #121212 !important;
            color: #ffffff !important;
        }

        .dark-mode .calendar-header {
            background-color: #1e1e1e !important;
            color: #ffffff !important;
            box-shadow: none;
        }

        .dark-mode #calendar {
            background-color: #1a1a1aff !important;
            color: #ffffff !important;
        }

        .dark-mode .fc,
        .dark-mode .fc * {
            background-color: #1a1a1a !important;
            color: #ffffff !important;
            border-color: #444 !important;
        }

        .dark-mode .modal-content {
            background-color: #2c2c2c !important;
            color: #ffffff !important;
        }

        .dark-mode .modal-header,
        .dark-mode .modal-footer {
            border-color: #444 !important;
        }

        .dark-mode .icon-btn svg {
            color: #ffffff !important;
        }

        .dark-mode a {
            color: #90caf9 !important;
            text-decoration: none;
        }

        .flash-message {
            position: fixed;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: linear-gradient(135deg, #28a745, #218838);
            color: #fff;
            padding: 18px 30px;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.3);
            z-index: 9999;
            font-size: 18px;
            font-weight: 500;
            text-align: center;
            animation: fadeInOut 4s ease-in-out;
        }

        /* some animation */
        @keyframes fadeInOut {
            0% {
                opacity: 0;
                transform: translate(-50%, -60%);
            }

            10% {
                opacity: 1;
                transform: translate(-50%, -50%);
            }

            90% {
                opacity: 1;
                transform: translate(-50%, -50%);
            }

            100% {
                opacity: 0;
                transform: translate(-50%, -40%);
            }
        }

        body.dark-mode .fc .fc-day-today,
        body.dark-mode .fc .fc-daygrid-day.fc-day-today,
        body.dark-mode .fc .fc-timegrid-col.fc-day-today {
            background-color: #facc15 !important;
            border: 2px solid #facc15 !important;
            border-radius: 5px;
            position: relative;
        }

        body.dark-mode .fc .fc-day-today::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: rgba(250, 204, 21, 0.2);
            pointer-events: none;
            z-index: 0;
            border-radius: 5px;
        }

        .fc-button {
            border-radius: 6px;
            padding: 6px 14px;
            font-weight: 500;
        }

        .fc-button-active {
            background-color: #3b82f6;
            color: white;
        }

        /* Footer Styling */
        .footer {
            background-color: #1e1e1e;
            border-top: none !important;
            margin-top: 0 !important;
        }

        .dark-mode .footer {
            background-color: #121212 !important;
            color: #fff !important;
        }

        .dark-mode .social-links a {
            color: #fff !important;
        }

        .social-links a {
            transition: transform 0.2s ease, color 0.2s ease;
        }

        .social-links a:hover {
            transform: scale(1.2);
            color: #3b82f6 !important;
        }

        .dark-mode .social-links a:hover {
            color: #90caf9 !important;
        }

        /* Force white background */
        .note-editable {
            background-color: white !important;
        }

        .note-editor {
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        body,
        .calendar-header,
        #calendar,
        .modal-content {
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .note-btn.dropdown-toggle::after {
            display: none !important;
        }
    </style>

</head>

<body id="body">
    <div id="flashContainer">
        @if(session('success'))
            <div id="flashMessage" class="flash-message">
                {{ session('success') }}
            </div>
        @endif


        @if (session('error'))
            <div id="flashMessage" class="flash-message">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <!-- Header -->
    <div class="calendar-header">
        <h2><svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" fill="currentColor"
                class="bi bi-calendar-week" viewBox="0 0 16 16">
                <path
                    d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                <path
                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
            </svg><span></span> Calendev</h2>
        <div class="calendar-actions">
            <button class="icon-btn" onclick="toggleDarkMode()">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                    class="bi bi-brightness-high-fill" viewBox="0 0 16 16">
                    <path
                        d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Calendar -->
    <div id='calendar'></div>




    <!-- Add/Edit/delete Event Modal -->

    <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="eventForm" method="POST" action="https://calendev.onrender.com/calendar/store">
                    @csrf
                    <input type="hidden" name="id" id="eventId">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventModalLabel">Add A New Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">


                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" placeholder="Title" class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea type="text" name="description" id="description" placeholder="Description"
                                class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="reminder_time">Remind Me Before:</label>

                            <!-- Dropdown with suggested times -->
                            <select id="reminder_time" name="reminder_time" class="form-control">
                                <option value="5">5 Minutes</option>
                                <option value="10">10 Minutes</option>
                                <option value="20">20 Minutes</option>
                                <option value="30">30 Minutes</option>
                                <option value="60">1 Hour</option>
                                <option value="120">2 Hours</option>
                                <option value="1440">1 Day</option>
                                <option value="0">No Reminder</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="datetime-local" name="start_date" id="start_date" class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="datetime-local" name="end_date" id="end_date" class="form-control" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>

                        <button type="button" class="btn btn-danger" onclick="submitDelete()">Delete</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Hidden Delete Form -->
    <form method="POST" id="deleteForm" style="display: none;">
        @csrf
        <input type="hidden" name="id" id="deleteEventId">
    </form>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

    @php
        $formattedEvents = $events->map(function ($event) {
            return [
                'id' => (string) $event->id,
                'title' => $event->title,
                'description' => $event->description,
                'start' => $event->start_date,
                'end' => $event->end_date,
                'reminder_time' => $event->reminder_time,
            ];
        });
    @endphp

    <script>

        events = @json($formattedEvents);
        document.addEventListener('DOMContentLoaded', function () {
            const calendarEl = document.getElementById('calendar');

            const formatForDatetimeLocal = (dateObj) => {
                if (!(dateObj instanceof Date) || isNaN(dateObj.getTime())) return '';
                const pad = (n) => n.toString().padStart(2, '0');
                return `${dateObj.getFullYear()}-${pad(dateObj.getMonth() + 1)}-${pad(dateObj.getDate())}T${pad(dateObj.getHours())}:${pad(dateObj.getMinutes())}`;
            };

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridWeek',
                timeZone: 'local',
                editable: true, // --> enable drag-and-drop
                selectable: true,
                eventStartEditable: true,
                eventDurationEditable: true,
                headerToolbar: {
                    left: 'title',
                    center: 'exportEvents',
                    right: 'prev,next dayGridDay,dayGridWeek,dayGridMonth,listWeek' // view buttons
                },
                views: {
                    dayGridDay: { buttonText: 'Day' },
                    dayGridWeek: { buttonText: 'Week' },
                    dayGridMonth: { buttonText: 'Month' },
                    listWeek: { buttonText: 'List' }
                },
                events: events.map(e => ({
                    id: e.id,
                    title: e.title,
                    description: e.description,
                    start: e.start,
                    end: e.end,
                    reminder_time: e.reminder_time,
                })),   // ============= NOTIFICATION SYSTEM =============
                eventDidMount: function (info) {
                    const event = info.event;
                    const eventStart = info.event.start;
                    const reminderMinutes = event.extendedProps.reminder_time;

                    if (reminderMinutes <= 0) return; // Skip if no reminder

                    const reminderMs = reminderMinutes * 60 * 1000;
                    const timeUntilEvent = event.start.getTime() - Date.now();

                    if (timeUntilEvent > 0) {
                        setTimeout(() => {
                            if (Notification.permission === 'granted') {
                                new Notification(`Event Reminder: ${event.title}`, {
                                    body: `Upcoming event at ${eventStart.toLocaleTimeString()}`,
                                    icon: 'https://icon-library.com/images/calendar-icon-png/calendar-icon-png-2.jpg'
                                });
                            }
                        }, Math.max(0, timeUntilEvent - reminderMs));
                    }
                },
                eventDrop: function (info) {
                    const event = info.event;

                    // Prepare data for backend
                    const data = {
                        id: event.id,
                        title:event.title,
                        description: event.description,
                        reminder_time: event.extendedProps.reminder_time,
                        start_date: formatForDatetimeLocal(event.start),
                        end_date: formatForDatetimeLocal(new Date(event.end)),
                        _token: "{{ csrf_token() }}" // Laravel CSRF token
                    };

                    // Send AJAX request to update
                    fetch("https://calendev.onrender.com/calendar/drag-update", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: JSON.stringify(data)
                    })
                        .then(res => res.json())
                        .then(response => {
                            if (response.success) {
                                showFlashMessage("Event Updated Successfully");
                            } else {
                                showFlashMessage('Event Update Failed, Something went wrong');
                                info.revert(); // undo move
                            }
                        })
                        .catch(error => {
                            showFlashMessage("Something went wrong while updating the event. Please try again.", "error");
                            info.revert(); // undo move
                        });
                },
                dateClick: function (info) {
                    clearForm();
                    const clickedDate = new Date(info.date);
                    const pad = (n) => n.toString().padStart(2, '0');
                    const formatted = `${clickedDate.getFullYear()}-${pad(clickedDate.getMonth() + 1)}-${pad(clickedDate.getDate())}T${pad(clickedDate.getHours())}:${pad(clickedDate.getMinutes())}`;



                    document.getElementById('start_date').value = formatted;
                    document.getElementById('end_date').value = formatted;

                    document.getElementById('eventForm').action = "https://calendev.onrender.com/calendar/store";

                    new bootstrap.Modal(document.getElementById('eventModal')).show();
                },
                eventClick: function (info) {
                    const event = info.event;

                    const formatForDatetimeLocal = (dateObj) => {
                        if (!(dateObj instanceof Date) || isNaN(dateObj.getTime())) return '';
                        const pad = (n) => n.toString().padStart(2, '0');
                        return `${dateObj.getFullYear()}-${pad(dateObj.getMonth() + 1)}-${pad(dateObj.getDate())}T${pad(dateObj.getHours())}:${pad(dateObj.getMinutes())}`;
                    };

                    document.getElementById('eventId').value = event.id;
                    document.getElementById('title').value = event.title;
                    $('#description').summernote('code', event.extendedProps.description);

                    document.getElementById('start_date').value = formatForDatetimeLocal(event.start);
                    document.getElementById('end_date').value = formatForDatetimeLocal(new Date(event.end));
                    document.getElementById('reminder_time').value = event.extendedProps.reminder_time || '0';


                    document.getElementById('deleteEventId').value = event.id;

                    document.getElementById('eventForm').action = "https://calendev.onrender.com/calendar/update";

                    new bootstrap.Modal(document.getElementById('eventModal')).show();
                }, customButtons: {
                    exportEvents: {
                        text: '',
                        click: () => {
                            const calendarWrapper = document.querySelector('.fc');
                            const header = document.querySelector('.fc-header-toolbar');
                            const exportBtn = document.querySelector('.fc-exportEvents-button');

                            // Hide camera button before exporting
                            if (exportBtn) exportBtn.style.display = 'none';

                            html2canvas(calendarWrapper).then(canvas => {
                                const link = document.createElement('a');
                                link.download = 'events.png';
                                link.href = canvas.toDataURL();
                                link.click();

                                // Restore camera button after exporting
                                if (exportBtn) exportBtn.style.display = '';
                            });
                        }
                    }
                }, viewDidMount: (info) => {
                    const btn = document.querySelector('.fc-exportEvents-button');
                    if (btn && !btn.dataset.iconSet) {
                        btn.innerHTML = '<i class="bi bi-camera"></i>';
                        btn.dataset.iconSet = 'true';
                    }
                    btn.style.display = info.view.type.startsWith('list') ? 'inline-flex' : 'none';
                }
            });
            calendar.render();

            if (typeof Notification !== 'undefined' && Notification.permission !== 'granted') {
                Notification.requestPermission();
            }
        });


        function clearForm() {
            document.getElementById('eventForm').action = "https://calendev.onrender.com/calendar/store";
            document.getElementById('eventForm').reset();
            $('#description').summernote('code', '');
            document.getElementById('eventId').value = '';
            document.getElementById('deleteEventId').value = '';
        }

        function submitDelete() {
            const id = document.getElementById('eventId').value;

            if (!id) return;

            if (confirm('Are you sure you want to delete this event?')) {
                const deleteForm = document.getElementById('deleteForm');
                deleteForm.action = `https://calendev.onrender.com/calendar/delete/${id}`;
                deleteForm.submit();
            }
        }

        function toggleDarkMode() {
            const body = document.getElementById('body');
            body.classList.toggle('dark-mode');

            if (body.classList.contains('dark-mode')) {
                localStorage.setItem('dark-mode', 'enabled');
            } else {
                localStorage.removeItem('dark-mode');
            }
        }

        // save the black mode after refreshing the page
        document.addEventListener('DOMContentLoaded', function () {
            const darkMode = localStorage.getItem('dark-mode');
            if (darkMode === 'enabled') {
                document.getElementById('body').classList.add('dark-mode');
            }
        });

        setTimeout(() => {
            const flash = document.getElementById('flashMessage');
            if (flash) flash.remove();
        }, 3000);

        const descTextarea = document.getElementById('description');
        descTextarea.addEventListener('input', function () {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });

        function showFlashMessage(message, type = "success") {
            const flashContainer = document.getElementById("flashContainer");

            const div = document.createElement("div");
            div.className = `flash-message ${type}`;
            div.textContent = message;

            // Clear existing messages
            flashContainer.innerHTML = "";
            flashContainer.appendChild(div);

            // Auto-hide after 4 seconds
            setTimeout(() => {
                div.remove();
            }, 3000);
        }

        $(document).ready(function () {
            $('#description').summernote({
                height: 200,
                fontNames: [
                    'Arial', 'Arial Black',
                    'Comic Sans MS', 'Courier New',
                    'Georgia', 'Impact',
                    'Tahoma', 'Times New Roman',
                    'Verdana', 'Roboto',
                    'Open Sans', 'Montserrat'
                ],
                fontNamesIgnoreCheck: ['Roboto', 'Open Sans'],
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'fontname', 'fontsize']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'table']],
                    ['view', ['codeview', 'fullscreen']],
                    ['color', ['color']],
                ],
                disableDragAndDrop: true
            });
        });




    </script>

    <!-- Footer with Social Links -->
    <footer class="footer mt-5 py-4 bg-light">
        <div class="container text-center">
            <div class="social-links mb-3">
                <!-- LinkedIn -->
                <a href="https://www.linkedin.com/in/sw-usf/" target="_blank" class="mx-2 text-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-linkedin" viewBox="0 0 16 16">
                        <path
                            d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
                    </svg>
                </a>

                <!-- Twitter/X -->
                <a href="https://twitter.com/uccfvx" target="_blank" class="mx-2 text-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-twitter-x" viewBox="0 0 16 16">
                        <path
                            d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z" />
                    </svg>
                </a>
            </div>
            <p class="mb-0">© {{ date('Y') }} Calendev. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>

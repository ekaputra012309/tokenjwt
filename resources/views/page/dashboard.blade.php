@extends('layouts.app')

@section('content')
    {{-- <div class="page-heading">
        <h3>Profile Statistics</h3>
    </div> --}}
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-12">
                {{-- <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">
                                            Profile Views
                                        </h6>
                                        <h6 class="font-extrabold mb-0">112.000</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon blue mb-2">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Followers</h6>
                                        <h6 class="font-extrabold mb-0">183.000</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon green mb-2">
                                            <i class="iconly-boldAdd-User"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Following</h6>
                                        <h6 class="font-extrabold mb-0">80.000</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon red mb-2">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Saved Post</h6>
                                        <h6 class="font-extrabold mb-0">112</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div id="calendar"></div>
                </div>
                {{-- <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Profile Visit</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-profile-visit"></div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </section>
        {{-- <script>
            // Pass all booking data to JavaScript
            var bookings = @json($data['booking']);

            $(document).ready(function() {
                var calendarEl = $('#calendar')[0]; // Get calendar element using jQuery
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: [
                        // Define your events here, dynamically generated from the bookings array
                        @foreach ($data['booking'] as $booking)
                            {
                                title: '{{ $booking->agent->nama_agent }}', // Display agent's name as event title
                                start: '{{ \Carbon\Carbon::parse($booking->check_in)->toDateString() }}', // Use check_in date as event start date, formatted as 'Y-m-d'
                                backgroundColor: '{{ $booking->status === 'Lunas' ? 'green' : 'red' }}', // Set event color based on booking status
                                borderColor: '{{ $booking->status === 'Lunas' ? 'green' : 'red' }}', // Set event border color based on booking status
                            },
                        @endforeach
                    ]
                });

                calendar.render();

                var today = new Date();
                today.setHours(0, 0, 0,
                0); // Set hours, minutes, seconds, and milliseconds to 0 for accurate comparison
                var fiveDaysFromNow = new Date(today);
                fiveDaysFromNow.setDate(fiveDaysFromNow.getDate() + 5);
                var oneDayFromNow = new Date(today);
                oneDayFromNow.setDate(oneDayFromNow.getDate() + 1);

                // Check if there are bookings within 1 or 5 days from today
                var bookingsWithinOneDay = false;
                var bookingsWithinFiveDays = false;

                // Iterate over bookings array
                bookings.forEach(function(booking) {
                    var checkInDate = new Date(booking.check_in);
                    if (checkInDate.getTime() === oneDayFromNow.getTime()) {
                        bookingsWithinOneDay = true;
                    } else if (checkInDate.getTime() === fiveDaysFromNow.getTime()) {
                        bookingsWithinFiveDays = true;
                    }
                });

                // Show modal if there are bookings within 1 or 5 days from today
                if (bookingsWithinOneDay || bookingsWithinFiveDays) {
                    showModal();
                    // Show modal every minute if there are bookings within five days
                    if (bookingsWithinFiveDays) {
                        setInterval(function() {
                            showModal();
                        }, 60000);
                    }
                }

                function showModal() {
                    $('#myModalNotif').modal('show');
                    // Clear existing modal content
                    $('#myModalNotif .modal-body').empty();
                    // Iterate over bookings array
                    bookings.forEach(function(booking) {
                        var checkInDate = new Date(booking.check_in);
                        if (checkInDate.getTime() === oneDayFromNow.getTime() || checkInDate.getTime() ===
                            fiveDaysFromNow.getTime()) {
                            // Display modal content for each relevant booking
                            displayModalContent(booking.booking_id, booking.agent.nama_agent, booking.status);
                        }
                    });
                }

                function displayModalContent(bookingId, agentName, status) {
                    // Construct HTML content for the modal body
                    var modalContent = "<p>Invoice No: " + bookingId + "</p>";
                    modalContent += "<p>Agent Name: " + agentName + "</p>";
                    modalContent += "<p>Status: " + (status === 'Lunas' ? 'Lunas' : 'Piutang') + "</p>";

                    // Append modal content to the modal body
                    $('#myModalNotif .modal-body').append(modalContent);
                }
            });
        </script> --}}

        <script>
            // Pass all booking data to JavaScript
            var bookings = @json($data['booking']);

            $(document).ready(function() {
                var index = 0; // Initialize an index to keep track of the current booking to display

                var calendarEl = $('#calendar')[0]; // Get calendar element using jQuery
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: [
                        // Define your events here, dynamically generated from the bookings array
                        @foreach ($data['booking'] as $booking)
                            {
                                title: '{{ $booking->agent->nama_agent }}', // Display agent's name as event title
                                start: '{{ \Carbon\Carbon::parse($booking->check_in)->toDateString() }}', // Use check_in date as event start date, formatted as 'Y-m-d'
                                backgroundColor: '{{ $booking->status === 'Lunas' ? 'green' : 'red' }}', // Set event color based on booking status
                                borderColor: '{{ $booking->status === 'Lunas' ? 'green' : 'red' }}', // Set event border color based on booking status
                            },
                        @endforeach
                    ]
                });

                calendar.render();

                var today = new Date();
                today.setHours(0, 0, 0,
                    0); // Set hours, minutes, seconds, and milliseconds to 0 for accurate comparison
                var fiveDaysFromNow = new Date(today);
                fiveDaysFromNow.setDate(fiveDaysFromNow.getDate() + 5);
                var oneDayFromNow = new Date(today);
                oneDayFromNow.setDate(oneDayFromNow.getDate() + 1);

                // Function to format date in Indonesian format
                function formatDateIndonesian(date) {
                    var monthNames = [
                        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                    ];

                    return date.getDate() + " " + monthNames[date.getMonth()] + " " + date.getFullYear();
                }

                // Function to show modal
                function showModal() {
                    var booking = bookings[index];
                    var modalContent = "<p>Invoice No: " + booking.booking_id + "</p>";
                    modalContent += "<p>Agent Name: " + booking.agent.nama_agent + "</p>";
                    modalContent += "<p>Status: " + (booking.status === 'Lunas' ? 'Lunas' : 'Piutang') + "</p>";
                    modalContent += "<p>Check In: " + formatDateIndonesian(new Date(booking.check_in)) + "</p>";
                    modalContent += "<p>Check Out: " + formatDateIndonesian(new Date(booking.check_out)) + "</p>";
                    $('#myModalNotif .modal-body').html(modalContent);
                    $('#myModalNotif').modal('show');
                }

                // Event listener for when the modal is closed
                $('#myModalNotif').on('hidden.bs.modal', function() {
                    index++; // Move to the next booking
                    // Find the next booking that meets the condition
                    while (index < bookings.length) {
                        var checkInDate = new Date(bookings[index].check_in);
                        if ((checkInDate.getTime() === fiveDaysFromNow.getTime() || checkInDate.getTime() ===
                                oneDayFromNow.getTime()) && bookings[index].status === 'Piutang') {
                            showModal(); // Show the modal for the next booking meeting the condition
                            return; // Exit the loop
                        }
                        index++; // Move to the next booking
                    }
                });

                // Check if there are bookings within one day or five days from today
                bookings.forEach(function(booking) {
                    var checkInDate = new Date(booking.check_in);
                    if ((checkInDate.getTime() === fiveDaysFromNow.getTime() || checkInDate.getTime() ===
                            oneDayFromNow.getTime()) && booking.status === 'Piutang') {
                        showModal(); // Show the modal for the first booking meeting the condition
                        return; // Exit the loop
                    }
                });
            });
        </script>
    </div>
@endsection

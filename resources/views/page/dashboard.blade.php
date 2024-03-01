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
        <script>
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

                function displayBrowserNotification(message) {
                    if (Notification.permission !== 'granted') {
                        Notification.requestPermission().then(function(permission) {
                            if (permission === 'granted') {
                                new Notification('Notification', {
                                    body: message
                                });
                            }
                        });
                    } else {
                        new Notification('Notification', {
                            body: message
                        });
                    }
                }

                var today = new Date();
                today.setHours(0, 0, 0,
                0); // Set hours, minutes, seconds, and milliseconds to 0 for accurate comparison
                var fiveDaysFromNow = new Date(today);
                fiveDaysFromNow.setDate(fiveDaysFromNow.getDate() + 5);

                // Iterate over bookings array
                bookings.forEach(function(booking) {
                    var checkInDate = new Date(booking.check_in);
                    if (checkInDate <= fiveDaysFromNow && checkInDate >= today) {
                        // Construct your message using booking data
                        var browserMessage = "Invoice No: " + booking.booking_id + "\nAgent Name: " + booking
                            .agent.nama_agent + "\nStatus: " + (booking.status === 'Lunas' ? 'Lunas' :
                                'Piutang');
                        displayBrowserNotification(browserMessage);
                    }
                });
            });
        </script>


    </div>
@endsection

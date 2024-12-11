@extends('admin.layouts.app')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h2 class="my-3">Dashboard</h2>
        <!--<ol class="breadcrumb mb-4">-->
        <!--    <li class="breadcrumb-item active">Dashboard</li>-->
        <!--</ol>-->
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Total Order ( {{$total_orders}} )</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#" style="text-decoration: none;">View
                            Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Total Employee ( {{ $total_employee ? $total_employee->count() : 0 }} )</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#" style="text-decoration: none;">View
                            Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Total Job Role ( {{$total_job_role}} )</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#" style="text-decoration: none;">View
                            Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Total Status ( {{$total_status}} )</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#" style="text-decoration: none;">View
                            Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-7">
                <section class="ftco-section mb-4">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center mb-3">
                            <h6>Calendar</h6>
                        </div>
                    </div>
                    <div class="calendar-container">
                        <!-- Calendar Header -->
                        <div class="calendar-header d-flex justify-content-between align-items-center">
                            <button id="prevMonth" class="btn btn-outline-primary btn-sm"><i class="fa fa-chevron-left"></i></button>
                            <h4 id="monthYear" class="mb-0"></h4>
                            <button id="nextMonth" class="btn btn-outline-primary btn-sm"><i class="fa fa-chevron-right"></i></button>
                        </div>
            
                        <!-- Weekday Headers -->
                        <div class="calendar-weekdays d-flex justify-content-between">
                            @foreach(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $day)
                                <span class="weekday">{{ $day }}</span>
                            @endforeach
                        </div>
            
                        <!-- Calendar Dates -->
                        <div class="calendar-days" id="calendarDays"></div>
                    </div>
                </section>
            </div>
            <div class="col-md-5">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-3">
                        <h6>Employees</h6>
                    </div>
                </div>
                <div class="card mb-4 p-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($total_employee) && count($total_employee) > 0)
                                @foreach($total_employee as $index => $user)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$user->name ?? ''}}</td>
                                    <td>{{$user->role ? $user->role->name : ''}}</td>
                                </tr>
                                @endforeach
                            @endif    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Calendar Section -->
        
        
        
        <!-- Modal for Date Details -->
        <div class="modal fade" id="dateModal" tabindex="-1" aria-labelledby="dateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dateModalLabel">Date Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Selected Date:</strong> <span id="selectedDate"></span></p>
                        <p><strong>Details:</strong> <span id="dateDetails"></span></p>
                    </div>
                </div>
            </div>
        </div>


        
    </div>
</main>
@endsection

@push('styles')
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    /* Calendar Styles */
    .calendar-container {
        margin: auto;
        max-width: 1200px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .calendar-header {
        margin-bottom: 10px;
    }

    .calendar-weekdays {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        font-weight: bold;
        text-align: center;
        padding: 10px 60px;
    }

    .calendar-days {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        grid-gap: 5px;
        text-align: center;
    }

    .calendar-days .date {
        border-radius: 50%;
        padding: 10px;
        transition: 0.3s;
        cursor: pointer;
    }


    .date.green { background-color: green !important; color: #fff; }
    .date.red { background-color: red !important; color: #fff; }
    .date.gray { background-color: gray !important; color: #fff; }
    .date.event-day { background-color: yellow !important; }
    .date.event-day:hover { background-color: orange !important; }

    .btn { font-size: 0.9rem; }
    
    .date.red {
        width: 40px;
        margin-left: 30px;
    }
    .date.green {
        width: 40px;
        margin-left: 30px;
    }
</style>
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


<!-- Add your script to render the calendar -->
<script>
        $(document).ready(function () {
            // Format Date function
            function formatDate(inputDate) {
                const parts = inputDate.split('-'); // Split the date into [DD, MM, YYYY]
                return `${parts[2]}-${parts[1]}-${parts[0]}`; // Reconstruct as YYYY-MM-DD (same format)
            }

            const calendarDays = $('#calendarDays');
            const monthYear = $('#monthYear');
            const today = new Date();
        
            let currentMonth = today.getMonth();
            let currentYear = today.getFullYear();
        
            function renderCalendar(year, month) {
                calendarDays.empty(); // Clear the current calendar
                const firstDay = new Date(year, month, 1).getDay();
                const daysInMonth = new Date(year, month + 1, 0).getDate();
            
                // Set month and year
                monthYear.text(new Date(year, month).toLocaleString('default', { month: 'long', year: 'numeric' }));
            
                // Add empty slots for the previous month's dates
                for (let i = 0; i < firstDay; i++) {
                    calendarDays.append('<div></div>');
                }
            
                // Add the current month's dates
                for (let day = 1; day <= daysInMonth; day++) {
                    const date = new Date(year, month, day).toISOString().split('T')[0]; // Format YYYY-MM-DD
                    const dayCell = $(`<div class="date" data-date="${date}">${day}</div>`);
                    calendarDays.append(dayCell);
                }
            
                // Apply dynamic colors after rendering
                applyColors(year, month);  // Pass the current year and month
            }

            // Function to apply event colors
            function applyColors(year, month) {
                $.ajax({
                    url: '{{ route("calendar.data") }}',  // Use the appropriate URL for your AJAX call
                    method: 'GET',
                    success: function (response) {
                        console.log("Calendar Data:", response); // Debugging
                        if (response.status_code === 200) {
                            response.data.forEach((item) => {
                                const formattedDate = formatDate(item.date); // Convert to YYYY-MM-DD
                                const dateElement = $(`.calendar-days .date[data-date="${formattedDate}"]`);
                                if (dateElement.length > 0) {
                                    dateElement.css('background-color', item.color);
                                    dateElement.addClass(item.color);
                                    dateElement.data('details', item.details || 'No details available.');
                                    console.log(`Color applied: ${item.color} to ${formattedDate}`);
                                } else {
                                    console.warn(`Date not found in calendar: ${formattedDate}`);
                                }
                            });
                
                            // Attach click event for showing modal
                            $('.calendar-days .date').on('click', function () {
                                const selectedDate = $(this).data('date');
                                const formattedDate = new Date(selectedDate).toLocaleDateString();
                            
                                $('#selectedDate').text(formattedDate); 
                                const details = $(this).data('details') || 'No details available.';
                                $('#dateDetails').text(details);
                            
                                const modal = new bootstrap.Modal(document.getElementById('dateModal'));
                                const modalElement = document.getElementById('dateModal');
                            
                                // Show modal and remove inert attribute
                                modal.show();
                                modalElement.removeAttribute('inert');
                            
                                // When modal is hidden, add inert attribute to block interaction
                                modalElement.addEventListener('hidden.bs.modal', () => {
                                    modalElement.setAttribute('inert', 'true');
                                });
                            });


                        } else {
                            console.error("Invalid response:", response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Error fetching calendar data:", error);
                    },
                });
            }
        
            // Navigation controls
            $('#prevMonth').click(() => {
                currentMonth--;
                if (currentMonth < 0) {
                    currentMonth = 11;
                    currentYear--;
                }
                renderCalendar(currentYear, currentMonth);
            });
        
            $('#nextMonth').click(() => {
                currentMonth++;
                if (currentMonth > 11) {
                    currentMonth = 0;
                    currentYear++;
                }
                renderCalendar(currentYear, currentMonth);
            });
        
            // Initial render
            renderCalendar(currentYear, currentMonth);
        });
    </script>

@endpush



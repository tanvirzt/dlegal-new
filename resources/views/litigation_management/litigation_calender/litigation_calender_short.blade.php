@extends('layouts.admin_layouts.admin_layout')
@section('content')
@section('styles')
    <link href="{{ asset('custom/celendar/main.css') }}" rel="stylesheet" />
    <style>
        .fc {
            font-size: 13px;
            background: #fff;
        }

        .fc th {

            color: #fff;
        }
        button.fc-caseBtn-button.fc-button.fc-button-primary {
            margin-left: 5px !important;
        }
    </style>
@endsection


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-3">
                    <h1 class="m-0 text-dark">Litigation Calendar</h1>
                </div>
                <div class="col-sm-6">
                </div>
                <div class="col-sm-3">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Litigation Calendar</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div id="calendar"></div>
        </div>
    </section>




    <!-- Main content -->

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@section('scripts')
    <script src="{{ asset('custom/celendar/main.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var calendarEl = document.getElementById("calendar");
            var eve = @json($events);

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: "prev,next,caseBtn,courtBtn",
                    center: "title",
                    right: "today,dayGridMonth,timeGridWeek,timeGridDay,listWeek",
                },
                customButtons: {
                    caseBtn: {
                    text: 'Case',
                    click: function() {
                        window.location.href = "{{URL::to('litigation-calender-short')}}"
                    }
                    },
                    courtBtn: {
                    text: 'Court',
                    click: function() {
                        window.location.href = "{{URL::to('litigation-calender-short-court-wise')}}"
                    }
                    }
                },
                height: "auto",
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                selectable: true,
                selectMirror: true,
                nowIndicator: true,
                events: eve
            });

            calendar.render();
        });
    </script>
@endsection
@endsection

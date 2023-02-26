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
        .fc-daygrid-event-dot {
              width: 84%;
              height: 0px;
              border: 7px solid #3788d8;
              border: calc(var(--fc-daygrid-event-dot-width, 30px) / 1) solid var(--fc-event-border-color, #3788d8);
              border-radius: 1px !important;
              border-radius: calc(var(--fc-daygrid-event-dot-width, 30px) / 1);
              display: block;
              position: absolute;
              z-index: 7;
        }

        .fc-daygrid-dot-event .fc-event-title {
              padding-left: 8px;
              z-index: 9;
              color: #fff;
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
        <div class="row">
            <div class="container-fluid col-sm-10">
                <div id="calendar"></div>
            </div>    
            <div class="col-sm-2 contentInfo"></div>
        </div>        
    </section>




    <!-- Main content -->

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<style type="text/css">
    .fc-caseBtn-button.fc-button-primary, .fc-courtBtn-button.fc-button-primary {
        background: #fff !important;
        border: 1px solid #0CA2A3 !important;
        color: #0CA2A3 !important;
    }
    
    .contentInfo{
        padding-top: 75px;
    }

    .infoCase{
          height: 30px;
          color: #fff;
          font-size: 16px;
          padding: 3px;
    }
</style>


@section('scripts')
    <script src="{{ asset('custom/celendar/main.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var calendarEl = document.getElementById("calendar");
            var eve = @json($events);

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: "title",
                    center: "caseBtn,courtBtn",
                    right: "prev,next,today,dayGridMonth,timeGridWeek,timeGridDay,listWeek",
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


        jQuery( document ).ready(function() {  

            var contentHtml = '';

            jQuery('.fc-daygrid-event').each(function(i, obj) {
                var color = jQuery('.fc-daygrid-event .fc-daygrid-event-dot').css('border-color');
                contentHtml += '<div class="infoCase" style="background-color:'+color+'">'+jQuery('.fc-daygrid-event .fc-event-title').text()+'</div>';
            });
            jQuery('.contentInfo').html(contentHtml);
            //alert(jQuery('.fc-daygrid-event .fc-daygrid-event-dot').css('border-color'));
            //alert(jQuery('.fc-daygrid-event .fc-event-title').text());
        });
    </script>
@endsection
@endsection

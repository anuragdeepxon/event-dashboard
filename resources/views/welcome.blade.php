@extends('layouts.main')
@include('layouts.header')
@section('content')

<div class="pt-[10rem]"></div>
<div class="min-h-[80vh]">
    <div class="flex flex-wrap ">
        <div class="w-full sm:w-1/1 md:w-1/1 flex flex-col p-5">
            <div class="bg-white rounded-lg drop-shadow-2xl overflow-hidden flex-1 flex flex-col">
                <div class="p-4 flex-1 flex flex-col">
                    <div class="flex items-end">
                        <p class="text-2xl ">Event List</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap ">
        <div class="w-full sm:w-1/1 md:w-1/1 flex flex-col p-5">
            <div class="bg-white rounded-lg drop-shadow-2xl overflow-hidden flex-1 flex flex-col">
                <div class="p-4 flex-1 flex flex-col">

                    <div class="overflow-x-auto">
                        <table class="table w-full">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th class="text-slate-200 bg-sky-900">Name</th>
                                    <th class="text-slate-200 bg-sky-900">Description</th>
                                    <th class="text-slate-200 bg-sky-900">Start Date</th>
                                    <th class="text-slate-200 bg-sky-900">End Date</th>
                                    <th class="text-slate-200 bg-sky-900">Organizer</th>
                                    <th class="text-slate-200 bg-sky-900">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="eventResult">
                                <!-- rows -->
                            </tbody>
                        </table>
                    </div>

                    <button id="eventListForm"></button>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- Start Event list -->
<script>
    $(document).ready(function() {
        $('#eventListForm').on('click', function(e) {
            e.preventDefault()
            if (true) {
                let token = $('meta[name=asd]').attr('content');
                $.ajax({
                    type: "GET",
                    url: "{{ url('/event/list') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    dataType: "json",
                    encode: true,
                    beforeSend: function() {},
                    success: function(result) {
                        console.log(result);
                        $.each(result.data, function(i, item) {
                            $('#eventResult').append(
                                '<tr class="">' +
                                '<th class="text-slate-800 bg-slate-200"">' + (item.name) +
                                '</th><td class="text-slate-800 bg-slate-200"">' + (item.description).substring(0, 15) +
                                '</td><td class="text-slate-800 bg-slate-200"">' + (item.start_date).substring(0, 10) +
                                '</td><td class="text-slate-800 bg-slate-200"">' + (item.end_date).substring(0, 10) +
                                '</td><td class="text-slate-800 bg-slate-200"">' + (item.organizer) +
                                '</td><td class="text-slate-800 bg-slate-200""><a class="btn btn-primary" href="event/editEvent/' + (item.id) +
                                '">Edit Event</a>' +
                                '</td></tr>',
                            );
                        });
                    },
                    error: function(data) {},
                    complete: function(result) {},

                }).done(function(result) {
                    if (result.success == true) {} else {}
                });
            }
        });
    });
</script>
<!-- End Event List -->


<style>
    .space-mt {
        margin-top: 100px !important;
    }

    .space-pt {
        padding-top: 100px !important;
    }
</style>

<style>
    /* Start Loader Style  */
    .show {
        display: block !important;
    }

    .hide {
        display: none !important;
    }


    .atom-spinner,
    .atom-spinner * {
        box-sizing: border-box;
    }

    .atom-spinner {
        height: 100px;
        width: 100px;
        overflow: hidden;
    }

    .atom-spinner .spinner-inner {
        position: relative;
        display: block;
        height: 100%;
        width: 100%;
    }

    .atom-spinner .spinner-circle {
        display: block;
        position: absolute;
        color: #9c2424;
        font-size: calc(60px * 0.24);
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .atom-spinner .spinner-line {
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        animation-duration: 1s;
        border-left-width: calc(100px / 20);
        border-top-width: calc(100px / 20);
        border-left-color: #9c2424;
        border-left-style: solid;
        border-top-style: solid;
        border-top-color: transparent;
    }

    .atom-spinner .spinner-line:nth-child(1) {
        animation: atom-spinner-animation-1 1s linear infinite;
        transform: rotateZ(120deg) rotateX(66deg) rotateZ(0deg);
    }

    .atom-spinner .spinner-line:nth-child(2) {
        animation: atom-spinner-animation-2 1s linear infinite;
        transform: rotateZ(240deg) rotateX(66deg) rotateZ(0deg);
    }

    .atom-spinner .spinner-line:nth-child(3) {
        animation: atom-spinner-animation-3 1s linear infinite;
        transform: rotateZ(360deg) rotateX(66deg) rotateZ(0deg);
    }

    @keyframes atom-spinner-animation-1 {
        100% {
            transform: rotateZ(120deg) rotateX(66deg) rotateZ(360deg);
        }
    }

    @keyframes atom-spinner-animation-2 {
        100% {
            transform: rotateZ(240deg) rotateX(66deg) rotateZ(360deg);
        }
    }

    @keyframes atom-spinner-animation-3 {
        100% {
            transform: rotateZ(360deg) rotateX(66deg) rotateZ(360deg);
        }
    }

    /* End Loader Style  */
</style>

@include('layouts.footer')
@endsection
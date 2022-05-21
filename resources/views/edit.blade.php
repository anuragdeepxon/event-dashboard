@extends('layouts.main')
@include('layouts.header')
@section('content')

<div class="pt-[5rem]"></div>
<div class="min-h-screen mx-20">
    <div class="flex flex-wrap ">
        <div class="w-full sm:w-1/1 md:w-1/1 flex flex-col p-5">
            <div class="bg-white rounded-lg drop-shadow-2xl overflow-hidden flex-1 flex flex-col">
                <div class="p-4 flex-1 flex flex-col">
                    <div class="flex items-end">
                        <p class="text-2xl ">Event Edit</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap ">
        <div class="w-full sm:w-1/1 md:w-1/1 flex flex-col p-5">
            <div class="bg-white rounded-lg drop-shadow-2xl overflow-hidden flex-1 flex flex-col">
                <div class="p-4 flex-1 flex flex-col">
                    <input id="eventIdInput" name="eventIdInput" value="{{ $event->id }}" hidden>
                    <p class="py-4"></p>

                    <form id="eventUpdateForm">
                        {{csrf_field()}}
                        <div class="form-control w-full ">
                            <label class="label">
                                <span class="text-black">Name</span>
                            </label>
                            <input name="name" id="name" type="text" placeholder="{{ $event->name }}" value="{{ $event->name }}" class="bg-slate-300 placeholder:text-slate-800 text-black input input-bordered w-full mb-5" />

                            <label class="label">
                                <span class="text-black">Description</span>
                            </label>
                            <textarea name="description" id="description" placeholder="{{ $event->description }}" value="{{ $event->description }}" class="bg-slate-300 placeholder:text-slate-800 text-black textarea textarea-bordered  mb-5"></textarea>

                            <label class="label">
                                <span class="text-black">Start Date</span>
                            </label>
                            <input name="start_date" id="start_date" placeholder="{{ $event->start_date }}" value="{{ $event->start_date }}" type="text" class="bg-slate-300 placeholder:text-slate-800 text-black input input-bordered w-full mb-5">

                            <label class="label">
                                <span class="text-black">End Date</span>
                            </label>
                            <input name="end_date" id="end_date" placeholder="{{ $event->end_date  }}" value="{{ $event->end_date  }}" type="text" class="bg-slate-300 placeholder:text-slate-800 text-black input input-bordered w-full mb-5">

                            <label class="label">
                                <span class="text-black">Organizer</span>
                            </label>
                            <input name="organizer" id="organizer" placeholder="{{ $event->organizer }}" value="{{ $event->organizer }}" class="bg-slate-300 placeholder:text-slate-800 text-black input input-bordered w-full mb-5" />

                            <hr>
                            <center>
                                <div class="text-center">
                                    <div class="ml-1">
                                        <div class="overlay">
                                            <div class="atom-spinner hide">
                                                <div class="spinner-inner">
                                                    <div class="spinner-line"></div>
                                                    <div class="spinner-line"></div>
                                                    <div class="spinner-line"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </center>

                            <div id="messageBox" class="alert shadow-lg mb-5 hide bg-black">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info flex-shrink-0 w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <div>
                                        <h3 class="font-bold text-white" id="message"></h3>
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
                                                            <th class="text-slate-200 bg-sky-900">ID</th>
                                                            <th class="text-slate-200 bg-sky-900">Ticket No.</th>
                                                            <th class="text-slate-200 bg-sky-900">Price</th>
                                                            <th class="text-slate-200 bg-sky-900">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="ticketResult">
                                                        <!-- rows -->
                                                        <tr class="">
                                                            <th class="text-slate-800 bg-slate-200">
                                                                ID unique
                                                            </th>
                                                            <td class="text-slate-800 bg-slate-200">
                                                                <input name="ticket_num" id="ticket_num" type="text" placeholder="Enter Ticket Number" class="bg-slate-300 placeholder:text-slate-800 text-black input input-bordered w-full" />
                                                            </td>
                                                            <td class="text-slate-800 bg-slate-200">
                                                                <input name="price" id="price" type="text" placeholder="Enter Price" class="bg-slate-300 placeholder:text-slate-800 text-black input input-bordered w-full" />
                                                            </td>
                                                            <td class="text-slate-800 bg-slate-200">
                                                                <button type="button" id="ticketCreateForm" class="btn">Save</button>
                                                            </td>

                                                            <!-- <button type="button" id="deleteThisTicket12" class=" btn ml-2 btn-primary">Delete Ticket</button> -->
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <button id="ticketListForm"></button>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" value="Update" class="btn btn-primary mb-5 mt-10" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="flex flex-wrap">
    <div class="w-full sm:w-1/1 md:w-1/1 flex flex-col p-5">
        <div class="bg-gradient-to-r from-[#ffffff] via-[#d3d6dd] to-[#000000] rounded-lg drop-shadow-xl overflow-hidden flex-1 flex flex-col">
            <div class="p-4 flex-1 flex flex-col">

            </div>
        </div>
    </div>
</div>



<!-- Start Event list -->
<script>
    $(document).ready(function() {
        $('#ticketListForm').on('click', function(e) {
            e.preventDefault()
            if (true) {
                let token = $('meta[name=asd]').attr('content');
                let event_id = $("input[name=eventIdInput]").val();

                $.ajax({
                    type: "GET",
                    url: "{{ url('/event/ticketList' ) }}" + '/' + event_id,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        event_id: event_id
                    },
                    dataType: "json",
                    encode: true,
                    beforeSend: function() {},
                    success: function(result) {
                        $.each(result.data, function(i, item) {
                            $('#ticketResult').append(
                                '<tr id="tr' + (item.id) + '">' +
                                '<th class="text-slate-800 bg-slate-200""> <input disabled name="id' + (item.id) + '" id="id' + (item.id) + '" type="text" value="' + (item.id) + '" class="bg-slate-300 disabled:bg-red-200 disabled:text-black disabled:text-black placeholder:text-slate-800 text-black input input-bordered w-full mb-5" />' +
                                '</th><td class="text-slate-800 bg-slate-200""> <input disabled name="ticket_numbera' + (item.ticket_number) + '" id="ticket_number' + (item.id) + '" type="text" value="' + (item.ticket_number) + '" class="disabled:bg-red-200 disabled:text-black bg-slate-300 placeholder:text-slate-800 text-black input input-bordered w-full mb-5" />' +
                                '</td><td class="text-slate-800 bg-slate-200""><input disabled name="price' + (item.price) + '" id="pricea' + (item.id) + '" type="text" value="' + (item.price) + '" class="bg-slate-300 disabled:bg-red-200 disabled:text-black placeholder:text-slate-800 text-black input input-bordered w-full mb-5" />' +
                                '</td><td class="text-slate-800 bg-slate-200""><button type="button" class="btn btn-primary" id="editThisTicket' + (item.id) +
                                '">Edit Ticket</button>' +
                                '</td><td class="text-slate-800 bg-slate-200""><button type="button" class="btn hide btn-primary" id="saveThisTicket' + (item.id) +
                                '">Save Ticket</button>' +
                                '<button type="button" id="deleteThisTicket' + (item.id) + '" class=" btn ml-2 btn-primary"' +
                                '">Delete Ticket</button>' +
                                '</td></tr>',
                            );

                            $('#saveThisTicket' + (item.id)).on('click', function(e) {
                                let price = $("input[name=price" + (item.price) + "]").val();
                                let ticket_number = $("input[name=ticket_numbera" + (item.ticket_number) + "]").val();

                                // Validation Front 
                                if (ticket_number < 0) {
                                    $('#messageBox').addClass('show')
                                    $('#messageBox').removeClass('hide')
                                    $('#message').html("Please Enter Ticket No. more than 0");
                                    throw new Error("Size Less")
                                } else if (ticket_number > 30000) {
                                    $('#messageBox').addClass('show')
                                    $('#messageBox').removeClass('hide')
                                    $('#message').html("Please Enter Ticket No. less than 30000");
                                    throw new Error("Size Less")
                                }

                                if (price < 0) {
                                    $('#messageBox').addClass('show')
                                    $('#messageBox').removeClass('hide')
                                    $('#message').html("Please Enter Price more than 0");
                                    throw new Error("Size Less")
                                } else if (ticket_number > 30000) {
                                    $('#messageBox').addClass('show')
                                    $('#messageBox').removeClass('hide')
                                    $('#message').html("Please Enter Price less than 30000");
                                    throw new Error("Size Less")
                                }

                                $.ajax({
                                    type: "POST",
                                    url: "{{ url('event/ticket/update') }}" + '/' + item.id,
                                    data: {
                                        ticket_number: ticket_number,
                                        price: price
                                    },
                                    dataType: "json",
                                    encode: true,
                                    beforeSend: function() {
                                        $('.atom-spinner').addClass('show')
                                        $('.atom-spinner').removeClass('hide')
                                    },
                                    success: function(final) {
                                        console.log(final)
                                        $('#messageBox').addClass('show')
                                        $('#messageBox').removeClass('hide')
                                        $('#message').html(final.message);

                                        $('#ticket_number' + (item.id)).prop('disabled', true);
                                        $('#pricea' + (item.id)).prop('disabled', true);

                                        $('#deleteThisTicket' + (item.id)).addClass('show')
                                        $('#deleteThisTicket' + (item.id)).removeClass('hide')

                                        $('#editThisTicket' + (item.id)).addClass('show')
                                        $('#editThisTicket' + (item.id)).removeClass('hide')

                                        $('#saveThisTicket' + (item.id)).removeClass('show')
                                        $('#saveThisTicket' + (item.id)).addClass('hide')
                                    },
                                    error: function(data) {
                                        $('#messageBox').addClass('show')
                                        $('#messageBox').removeClass('hide')
                                        $('#message').html(data.message);
                                    },
                                    complete: function(result) {
                                        $('.atom-spinner').addClass('hide')
                                        $('.atom-spinner').removeClass('show')
                                    },

                                }).done(function(result) {
                                    if (result.success == true) {} else {}
                                });
                            });


                            $('#editThisTicket' + (item.id)).on('click', function(e) {
                                $('#ticket_number' + (item.id)).prop('disabled', false);
                                $('#pricea' + (item.id)).prop('disabled', false);

                                $('#deleteThisTicket' + (item.id)).addClass('hide')
                                $('#editThisTicket' + (item.id)).addClass('hide')

                                $('#saveThisTicket' + (item.id)).removeClass('hide')
                                $('#saveThisTicket' + (item.id)).addClass('show')

                            });

                            $('#deleteThisTicket' + (item.id)).on('click', function(e) {
                                $.ajax({
                                    type: "GET",
                                    url: "{{ url('event/ticket/delete') }}" + '/' + item.id,
                                    data: {},
                                    dataType: "json",
                                    encode: true,
                                    beforeSend: function() {
                                        $('.atom-spinner').addClass('show')
                                        $('.atom-spinner').removeClass('hide')
                                    },
                                    success: function(result) {
                                        console.log(result)
                                        $('#messageBox').addClass('show')
                                        $('#messageBox').removeClass('hide')
                                        $('#message').html(result.message);
                                        $('#tr' + (item.id)).remove();
                                        console.log('#tr' + (item.id));
                                    },
                                    error: function(data) {
                                        $('#messageBox').addClass('show')
                                        $('#messageBox').removeClass('hide')
                                        $('#message').html(data.message);
                                    },
                                    complete: function(result) {
                                        $('.atom-spinner').addClass('hide')
                                        $('.atom-spinner').removeClass('show')
                                    },

                                }).done(function(result) {
                                    if (result.success == true) {} else {}
                                });
                            });

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


<!-- Start Create  -->
<script>
    $(document).ready(function() {

        $('#ticketCreateForm').on('click', function(e) {
            e.preventDefault(); {
                let token = $('meta[name=asd]').attr('content');

                let ticket_num = $("input[name=ticket_num]").val();
                let price = $("input[name=price]").val();

                let event_id = $("input[name=eventIdInput]").val();

                $.ajax({
                    type: "POST",
                    url: "{{ url('/event/ticket/store') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        ticket_number: ticket_num,
                        price: price,
                        event_id: event_id
                    },
                    dataType: "json",
                    encode: true,
                    beforeSend: function() {
                        $('.atom-spinner').addClass('show')
                        $('.atom-spinner').removeClass('hide')
                    },
                    success: function(result) {
                        $('#ticketResult').append(
                            '<tr id="tr' + (result.data.id) + '" class="">' +
                            '<th class="text-slate-800 bg-slate-200""> <input disabled name="id' + (result.data.id) + '" id="id' + (result.data.id) + '" type="text" value="' + (result.data.id) + '" class="bg-slate-300 disabled:bg-red-200 disabled:text-black placeholder:text-slate-800 text-black input input-bordered w-full mb-5" />' +
                            '</th><td class="text-slate-800 bg-slate-200""> <input disabled name="ticket_number' + (result.data.ticket_number) + '" id="ticket_numbera' + (result.data.id) + '" type="text" value="' + (result.data.ticket_number) + '" class="bg-slate-300 disabled:bg-red-200 disabled:text-black placeholder:text-slate-800 text-black input input-bordered w-full mb-5" />' +
                            '</td><td class="text-slate-800 bg-slate-200""><input disabled name="price' + (result.data.price) + '" id="pricea' + (result.data.id) + '" type="text" value="' + (result.data.price) + '" class="bg-slate-300 disabled:bg-red-200 disabled:text-black placeholder:text-slate-800 text-black input input-bordered w-full mb-5" />' +
                            '</td><td class="text-slate-800 bg-slate-200""><button type="button" class="btn btn-primary" id="editThisTicket' + (result.data.id) +
                            '">Edit Ticket</button>' +
                            '</td><td class="text-slate-800 bg-slate-200""><button type="button" class="btn hide btn-primary" id="saveThisTicket' + (result.data.id) +
                            '">Save Ticket</button>' +
                            '<span></span> <button  type="button" class="btn ml-2 btn-primary" id="deleteThisTicket' + (result.data.id) +
                            '">Delete Ticket</button>' +
                            '</td></tr>',
                        );

                        $('#saveThisTicket' + (result.data.id)).on('click', function(e) {

                            let price = $("input[name=price" + (result.data.price) + "]").val();
                            let ticket_number = $("input[name=ticket_number" + (result.data.ticket_number) + "]").val();

                            if (ticket_number < 0) {
                                $('#messageBox').addClass('show')
                                $('#messageBox').removeClass('hide')
                                $('#message').html("Please Enter Ticket No. more than 0");
                                throw new Error("Size Less")
                            } else if (ticket_number > 30000) {
                                $('#messageBox').addClass('show')
                                $('#messageBox').removeClass('hide')
                                $('#message').html("Please Enter Ticket No. less than 30000");
                                throw new Error("Size Less")
                            }

                            if (price < 0) {
                                $('#messageBox').addClass('show')
                                $('#messageBox').removeClass('hide')
                                $('#message').html("Please Enter Price more than 0");
                                throw new Error("Size Less")
                            } else if (ticket_number > 30000) {
                                $('#messageBox').addClass('show')
                                $('#messageBox').removeClass('hide')
                                $('#message').html("Please Enter Price less than 30000");
                                throw new Error("Size Less")
                            }


                            $.ajax({
                                type: "POST",
                                url: "{{ url('event/ticket/update') }}" + '/' + result.data.id,
                                data: {
                                    ticket_number: ticket_number,
                                    price: price
                                },
                                dataType: "json",
                                encode: true,
                                beforeSend: function() {
                                    $('.atom-spinner').addClass('show')
                                    $('.atom-spinner').removeClass('hide')
                                },
                                success: function(final) {
                                    console.log(final)
                                    $('#messageBox').addClass('show')
                                    $('#messageBox').removeClass('hide')
                                    $('#message').html(final.message);

                                    $('#ticket_numbera' + (result.data.id)).prop('disabled', true);
                                    $('#pricea' + (result.data.id)).prop('disabled', true);

                                    $('#deleteThisTicket' + (result.data.id)).addClass('show')
                                    $('#deleteThisTicket' + (result.data.id)).removeClass('hide')

                                    $('#editThisTicket' + (result.data.id)).addClass('show')
                                    $('#editThisTicket' + (result.data.id)).removeClass('hide')

                                    $('#saveThisTicket' + (result.data.id)).removeClass('show')
                                    $('#saveThisTicket' + (result.data.id)).addClass('hide')
                                },
                                error: function(data) {
                                    $('#messageBox').addClass('show')
                                    $('#messageBox').removeClass('hide')
                                    $('#message').html(data.message);
                                },
                                complete: function(result) {
                                    $('.atom-spinner').addClass('hide')
                                    $('.atom-spinner').removeClass('show')
                                },

                            }).done(function(result) {
                                if (result.success == true) {} else {}
                            });
                        });


                        $('#editThisTicket' + (result.data.id)).on('click', function(e) {
                            $('#ticket_numbera' + (result.data.id)).prop('disabled', false);
                            $('#pricea' + (result.data.id)).prop('disabled', false);

                            $('#deleteThisTicket' + (result.data.id)).addClass('hide')
                            $('#editThisTicket' + (result.data.id)).addClass('hide')

                            $('#saveThisTicket' + (result.data.id)).removeClass('hide')
                            $('#saveThisTicket' + (result.data.id)).addClass('show')
                        });


                        $('#deleteThisTicket' + (result.data.id)).on('click', function(e) {
                            $.ajax({
                                type: "GET",
                                url: "{{ url('event/ticket/delete') }}" + '/' + result.data.id,
                                data: {},
                                dataType: "json",
                                encode: true,
                                beforeSend: function() {
                                    $('.atom-spinner').addClass('show')
                                    $('.atom-spinner').removeClass('hide')
                                },
                                success: function(final) {
                                    console.log(final)
                                    $('#messageBox').addClass('show')
                                    $('#messageBox').removeClass('hide')
                                    $('#message').html(final.message);

                                    $('#tr' + (result.data.id)).remove();
                                    console.log('#tr' + (result.data.id));

                                },
                                error: function(data) {
                                    $('#messageBox').addClass('show')
                                    $('#messageBox').removeClass('hide')
                                    $('#message').html(data.message);
                                },
                                complete: function(result) {
                                    $('.atom-spinner').addClass('hide')
                                    $('.atom-spinner').removeClass('show')
                                },

                            }).done(function(result) {
                                if (result.success == true) {} else {}
                            });
                        });
                    },
                    error: function(result) {
                        console.log(result.responseJSON);
                        $('#messageBox').addClass('show')
                        $('#messageBox').removeClass('hide')
                        $('#message').html(result.responseJSON.message);

                        $("input[name=ticket_num]").val(null);
                        $("input[name=price]").val(null);
                    },
                    complete: function(result) {
                        $('.atom-spinner').addClass('hide')
                        $('.atom-spinner').removeClass('show')

                        $('#messageBox').addClass('show')
                        $('#messageBox').removeClass('hide')
                        $('#message').html(result.responseJSON.message);

                        $("input[name=ticket_num]").val(null);
                        $("input[name=price]").val(null);
                    },

                }).done(function(result) {
                    if (result.success == true) {
                        $('#messageBox').addClass('show')
                        $('#messageBox').removeClass('hide')
                        $('#message').html(result.data.message);
                    } else {
                        console.log(result.responseJSON);
                    }
                });
            }
        });
    });
</script>
<!-- End  Create-->




<!-- Start Event Update -->
<script>
    $(document).ready(function() {
        $('#eventUpdateForm').on('submit', function(e) {
            e.preventDefault()
            if (true) {
                let token = $('meta[name=asd]').attr('content');
                let event_id = $("input[name=eventIdInput]").val();
                let name = $("input[name=name]").val();
                let description = $("input[name=description]").val();
                let start_date = $("input[name=start_date]").val();
                let end_date = $("input[name=end_date]").val();
                let organizer = $("input[name=organizer]").val();

                $.ajax({
                    type: "POST",
                    url: "{{ url('/event/update' ) }}" + '/' + event_id,
                    data: {
                        name: name,
                        description: description,
                        start_date: start_date,
                        end_date: end_date,
                        organizer: organizer
                    },
                    dataType: "json",
                    encode: true,
                    beforeSend: function() {
                        $('.atom-spinner').addClass('show')
                        $('.atom-spinner').removeClass('hide')
                    },
                    success: function(result) {
                        console.log(result.message);
                        $('#messageBox').addClass('show')
                        $('#messageBox').removeClass('hide')
                        $('#message').html(result.message);
                    },
                    error: function(result) {
                        console.log(result.message);
                        $('#messageBox').addClass('show')
                        $('#messageBox').removeClass('hide')
                        $('#message').html(result.message);
                    },
                    complete: function(result) {
                        $('.atom-spinner').addClass('hide')
                        $('.atom-spinner').removeClass('show')
                    },

                }).done(function(result) {
                    if (result.success == true) {} else {}
                });
            }
        });
    });
</script>
<!-- End Event Update -->



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
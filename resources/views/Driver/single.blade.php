@extends('admin')

@section('content')

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-helm icon-gradient bg-love-kiss">
                        </i>
                    </div>
                    <div>
                        single
                        <div class="page-title-subheading">
                            All drivers associated with 4th Dimension
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <button type="button" class="btn btn-shadow btn-danger" data-toggle="modal"
                        data-target="#editDrivers">Edit Driver Detail</button>
                </div>
            </div>
        </div>

        <div class="">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Driver Name - comment</h5>
                    <div class="card-content">




                        <table id="singledriverTable" class="table" data-id-field="code" data-sort-name="value1"
                            data-sort-order="desc" data-show-chart="false" data-pagination="false"
                            data-show-pagination-switch="false">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Id</th>
                                    <th>Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Break</th>
                                    <th>Total Hours</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="app-wrapper-footer">
        <div class="app-footer">
            <div class="app-footer__inner bg-white">
                <div class="app-footer-left">
                    <ul class="nav">
                        <li class="nav-item">
                            &copy; 2022 4th Dimension.
                        </li>
                    </ul>
                </div>
                <div class="app-footer-right">
                    <ul class="nav">
                        <li class="nav-item">
                            Build Version: 0.1
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="editDrivers" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-modal="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form class="form w-100">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">Edit Drivers</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Full Name</label>
                            <input type="text" class="form-control" placeholder="Driver's full name" required="">
                        </div>

                        <div class="col-md-6 relative-class">
                            <label>Pin Number</label>
                            <button id="pinGenerate"
                                class="btn btn-hover btn-default btn-rounded btn-small btn-custom btn-warning">
                                Generate Pin
                            </button>
                            <input id="formGridPin" type="number" name="pin" disabled class="form-control" value=""
                                placeholder="PIN" maxLength="4" minLength="4" />

                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Email Address</label>
                            <input type="text" class="form-control" placeholder="Driver's email address" required="">
                        </div>

                        <div class="col-md-4">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" placeholder="Driver's contact number" required="">
                        </div>

                        <div class="col-md-4">
                            <label>DOB</label>
                            <input type="dates" name="dates" class="form-control" placeholder="Driver's date of birth"
                                required="">
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-4">
                            <label>Comments</label>
                            <textarea class="form-control" rows="3" placeholder="Comments"></textarea>
                        </div>

                        <div class="col-md-4">
                            <label>Depo</label>
                            <select class="mb-2 form-control">
                                <option>Select Depo</option>
                                <option>Default Select</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label>Select Image</label>
                            <input type="file" id="file-input" class="form-control">
                            <div id="img_contain">
                                <img id="image-preview"
                                    src="http://www.clker.com/cliparts/c/W/h/n/P/W/generic-image-file-icon-hi.png"
                                    alt="your image" title='' />
                            </div>
                            <!-- <input type="number" class="form-control" placeholder="select imagfe" required=""> -->
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger btn-lg">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$(document).ready(function() {
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-preview').attr('src', e.target.result);
                $('#image-preview').hide();
                $('#image-preview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#file-input").change(function() {
        readURL(this);
    });

    $("#pinGenerate").click(function() {
        const newNumber = "" + Math.floor(1000 + Math.random() * 9000);
        $("#formGridPin").val(newNumber.toString());
    });


    $('#singledriverTable tbody').on('click', 'td:first-child', function() {
        var tr = $(this).closest('tr');
        var row = table.row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it.
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open row.
            row.child('foo').show();
            tr.addClass('shown');
        }
    });

    var data = [{
            id: "1",
            date: "27 Feb 2022",
            startTime: "8:00am",
            endTime: "5:00pm",
            break: "1hr",
            totalHour: "9hr",
            ext: [{
                location: " New Aim",
                arrived: "8:00am",
                Depart: "10:00am",
                loadunloadTime: "2hr",
                cageload: "0",
                cageUnload: "50",
                palateLoad: "0",
                palateUnload: "0"
            }]
        },
        {
            id: "2",
            date: "27 Feb 2022",
            startTime: "8:00am",
            endTime: "5:00pm",
            break: "1hr",
            totalHour: "9hr",
            ext: [{
                location: " New Aim",
                arrived: "8:00am",
                Depart: "10:00am",
                loadunloadTime: "2hr",
                cageload: "0",
                cageUnload: "50",
                palateLoad: "0",
                palateUnload: "0"
            }]
        },
        {
            id: "3",
            date: "27 Feb 2022",
            startTime: "8:00am",
            endTime: "5:00pm",
            break: "1hr",
            totalHour: "9hr",
            ext: [{
                location: " New Aim",
                arrived: "8:00am",
                Depart: "10:00am",
                loadunloadTime: "2hr",
                cageload: "0",
                cageUnload: "50",
                palateLoad: "0",
                palateUnload: "0"
            }]
        },

    ]

    function format(d) {
        return (
            '<table class="table mb-0 w-100">' +
            '<tr class="table-primary">' +
            "<td>Location:</td>" +
            "<td>" +

            d.ext.map(val => ({
                Location: val.location
            })) +
            "</td>" + "<td>Arrived:</td>" + console.log(d.ext) +
            "<td>Depart:</td>" +
            "<td>Load/Unload Time:</td>" +
            "<td>Cage Load / unload:</td>" +
            "<td>Pallet Load / Unload:</td>" +
            "</tr>" +
            "</table>"
        );
    }

    var table = $("#singledriverTable").DataTable({
        data: data,
        columns: [{
                className: "details-control",
                orderable: false,
                data: null,
                defaultContent: '<i class="material-icons"></i>'
            },
            {
                data: "id"
            },
            {
                data: "date"
            },
            {
                data: "startTime"
            },
            {
                data: "endTime"
            },
            {
                data: "break"
            },
            {
                data: "totalHour"
            }, {
                data: "ext",
                visible: false
            }
        ],
        order: [
            [1, "asc"]
        ]
    });

    $("#singledriverTable tbody").on("click", "td.details-control", function() {
        var tr = $(this).closest("tr");
        var row = table.row(tr);

        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass("shown");
        } else {
            row.child(format(row.data()), "p-0").show();
            tr.addClass("shown");
        }
    });



    $('#singledriverTable').Tabledit({
        url: 'http://localhost:8080/driver/single',
        eventType: 'dblclick',
        columns: {
            identifier: [0, 'id'],
            editable: [
                [1, 'Date'],
                [2, 'Start Time}'],
                [3, 'End Time'],
                [4, 'Break'],
                [5, 'Total Hours']
            ],
        }
    });


    $('input[name="dates"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'), 10)
    }, function(start, end, label) {
        var years = moment().diff(start, 'years');
        alert("You are " + years + " years old!");
    });

})
</script>

@endsection
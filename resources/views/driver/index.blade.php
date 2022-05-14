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
                        Drivers
                        <div class="page-title-subheading">
                            All drivers associated with 4th Dimension
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <button type="button" class="btn btn-shadow btn-danger" data-toggle="modal" data-target="#addDrivers">Add Drivers</button>
                </div>
            </div>
        </div>

        <div class="">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Drivers</h5>
                    <div class="card-content">




                        <table id="driverTable" class="table" data-id-field="code" data-sort-name="value1" data-sort-order="desc" data-show-chart="false" data-pagination="false" data-show-pagination-switch="false">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Pin</th>
                                    <th>Depot</th>
                                    <th>Comments</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(\App\Models\User::all() as $driver)
                                <tr>
                                    <td>1</td>
                                    <td><a href="{{route('admin.driver.single')}}">Sushil Dhakal</a></td>
                                    <td>1234</td>
                                    <td>Port Melbourne</td>
                                    <td>port</td>
                                    <td>04339260789</td>
                                    <td>sus.hill.dhakal@gmail.com</td>
                                </tr>
                                @endforeach
                            </tbody>
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

<div class="modal fade" id="addDrivers" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-modal="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form class="form w-100" method="POST" action="{{route('resource.store')}}">
                @csrf
                <input type="hidden" name="resource_type" value="driver">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">Add Drivers</h5>
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
                            <!-- <input type="number" class="form-control" placeholder="Generate Pin" required=""> -->

                            <button id="pinGenerate" class="btn btn-hover btn-default btn-rounded btn-small btn-custom btn-warning">
                                Generate Pin
                            </button>
                            <input id="formGridPin" type="number" name="pin" disabled class="form-control" value="" placeholder="PIN" maxLength="4" minLength="4" />

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
                            <input type="dates" name="dates" class="form-control" placeholder="Driver's date of birth" required="">
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
                                <img id="image-preview" src="http://www.clker.com/cliparts/c/W/h/n/P/W/generic-image-file-icon-hi.png" alt="your image" title='' />
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

        var table = $('#driverTable').DataTable({
            select: false,
            "columnDefs": [{
                className: "Name",
                "targets": [0],
                "visible": true,
                "searchable": true
            }]
        });
        $('#driverTable').Tabledit({
            url: 'http://localhost:8080/driver',
            eventType: 'dblclick',
            editButton: false,
            columns: {
                identifier: [0, 'id'],
                editable: [
                    // [1, 'name'],
                    // [3, 'depot', '{"1": "Port Melb", "2": "Dandenong", "3": "TUL"}'],
                    // [4, 'comment'],
                    // [5, 'Phone number'],
                    // [6, 'Email']
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
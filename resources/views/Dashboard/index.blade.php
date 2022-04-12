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
                        Recent activities
                        <div class="page-title-subheading">
                            All drivers associated with 4th Dimension
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Recent activities</h5>
                    <div class="card-content">




                        <table id="driverTable" class="table" data-id-field="code" data-sort-name="value1"
                            data-sort-order="desc" data-show-chart="false" data-pagination="false"
                            data-show-pagination-switch="false">
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
                                <tr>
                                    <td>1</td>
                                    <td>Sushil Dhakal</td>
                                    <td>1234</td>
                                    <td>Port Melbourne</td>
                                    <td>port</td>
                                    <td>04339260789</td>
                                    <td>sus.hill.dhakal@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Sushil Dhakal</td>
                                    <td>1234</td>
                                    <td>Port Melbourne</td>
                                    <td>port</td>
                                    <td>04339260789</td>
                                    <td>sus.hill.dhakal@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Sushil Dhakal</td>
                                    <td>1234</td>
                                    <td>Port Melbourne</td>
                                    <td>port</td>
                                    <td>04339260789</td>
                                    <td>sus.hill.dhakal@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Sushil Dhakal</td>
                                    <td>1234</td>
                                    <td>Port Melbourne</td>
                                    <td>port</td>
                                    <td>04339260789</td>
                                    <td>sus.hill.dhakal@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Sushil Dhakal</td>
                                    <td>1234</td>
                                    <td>Port Melbourne</td>
                                    <td>port</td>
                                    <td>04339260789</td>
                                    <td>sus.hill.dhakal@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Sushil Dhakal</td>
                                    <td>1234</td>
                                    <td>Port Melbourne</td>
                                    <td>port</td>
                                    <td>04339260789</td>
                                    <td>sus.hill.dhakal@gmail.com</td>
                                </tr>

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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$(document).ready(function() {


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
        columns: {
            identifier: [0, 'id'],
            editable: [
                [1, 'name'],
                [3, 'depot', '{"1": "Port Melb", "2": "Dandenong", "3": "TUL"}'],
                [4, 'comment'],
                [5, 'Phone number'],
                [6, 'Email']
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
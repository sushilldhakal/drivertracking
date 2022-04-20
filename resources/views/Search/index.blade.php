@extends('admin')

@section('content')

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-map-marker icon-gradient bg-love-kiss">
                        </i>
                    </div>
                    <div>
                        Search
                        <div class="page-title-subheading">
                            Search your queries
                        </div>
                    </div>
                </div>
                <!-- <div class="page-title-actions">
                                    <button type="button" class="btn btn-shadow btn-danger" data-toggle="modal" data-target="#addDepot">Add Depot</button>
                                </div>  -->
            </div>
        </div>

        <div class="">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Search</h5>
                    <div class="card-content">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="dates" name="dates" class="form-control"
                                        placeholder="Driver's date of birth" required="">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Driver</label>
                                    <select class="mb-2 form-control">
                                        <option>Select Driver</option>
                                        <option>Multiple Driver Select</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Location</label>
                                    <select class="mb-2 form-control">
                                        <option>Select Location</option>
                                        <option>Multiple Location Select</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Date Range Search</h5>
                    <div class="card-content">
                        <table id="searchDateRange" class="table" data-id-field="code" data-sort-name="value1"
                            data-sort-order="desc" data-show-chart="false" data-pagination="false"
                            data-show-pagination-switch="false">
                            <thead>
                                <tr>
                                    <th size="5">Date</th>
                                    <th> Driver Name</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Break</th>
                                    <th>Total Hours</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>14 Jan 2022</td>
                                    <td> <a href="http://localhost:8080/driver/single">Sushil Dhakal</a></td>
                                    <td>8:00am</td>
                                    <td>5:00pm</td>
                                    <td>30min</td>
                                    <td>8.5hrs</td>
                                </tr>
                                <tr>
                                    <td>15 Jan 2022</td>
                                    <td> <a href="http://localhost:8080/driver/single">Suman Shrestha</a></td>
                                    <td>8:00am</td>
                                    <td>5:00pm</td>
                                    <td>30min</td>
                                    <td>8.5hrs</td>
                                </tr>
                                <tr>
                                    <td>16 Jan 2022</td>
                                    <td> <a href="http://localhost:8080/driver/single">Sushil Dhakal</a></td>
                                    <td>8:00am</td>
                                    <td>5:00pm</td>
                                    <td>30min</td>
                                    <td>8.5hrs</td>
                                </tr>
                                <tr>
                                    <td>17 Jan 2022</td>
                                    <td> <a href="http://localhost:8080/driver/single">Sushil Dhakal</a></td>
                                    <td>8:00am</td>
                                    <td>5:00pm</td>
                                    <td>30min</td>
                                    <td>8.5hrs</td>
                                </tr>
                                <tr>
                                    <td>18 Jan 2022</td>
                                    <td> <a href="http://localhost:8080/driver/single">Sushil Dhakal</a></td>
                                    <td>8:00am</td>
                                    <td>5:00pm</td>
                                    <td>30min</td>
                                    <td>8.5hrs</td>
                                </tr>
                                <tr>
                                    <td>19 Jan 2022</td>
                                    <td> <a href="http://localhost:8080/driver/single">Sushil Dhakal</a></td>
                                    <td>8:00am</td>
                                    <td>5:00pm</td>
                                    <td>30min</td>
                                    <td>8.5hrs</td>
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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('input[name="dates"]').daterangepicker();


    var table = $('#searchDateRange').DataTable({
        select: false,
        "columnDefs": [{
            className: "Name",
            "targets": [0],
            "visible": true,
            "searchable": true
        }]
    });
});
</script>

@endsection
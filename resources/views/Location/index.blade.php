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
                        Location
                        <div class="page-title-subheading">
                            Add and view existing location of 4th Dimension
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <button type="button" class="btn btn-shadow btn-danger" data-toggle="modal"
                        data-target="#addLocation">Add Location</button>
                </div>
            </div>
        </div>

        <div class="">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Locations</h5>
                    <div class="card-content">
                        <table id="locationTable" class="table" data-id-field="code" data-sort-name="value2"
                            data-sort-order="desc" data-show-chart="false" data-pagination="false"
                            data-show-pagination-switch="false">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Truck Type</th>
                                    <th>Supplier</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>New Aim</td>
                                    <td>Double B</td>
                                    <td>Agencye</td>

                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>New Aim</td>
                                    <td>Double B</td>
                                    <td>Agencye</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>New Aim</td>
                                    <td>Double B</td>
                                    <td>Agencye</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>New Aim</td>
                                    <td>Double B</td>
                                    <td>Agencye</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>New Aim</td>
                                    <td>Double B</td>
                                    <td>Agencye</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>New Aim</td>
                                    <td>Double B</td>
                                    <td>Agencye</td>
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

<div class="modal fade" id="addLocation" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-modal="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form class="form w-100">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">Add Location</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Location Name</label>
                        <input type="text" class="form-control" placeholder="Location" required="">
                    </div>

                    <div class="form-group">
                        <label>Truck Type</label>
                        <select class="mb-2 form-control">
                            <option>Select Truck Type</option>
                            <option>Default Select</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Supplier</label>
                        <select class="mb-2 form-control">
                            <option>Select Supplier</option>
                            <option>Default Select</option>
                        </select>
                    </div>

                    <!-- <div class="form-group">
                                    <label>Contact Details</label>
                                    <input type="text" class="form-control" placeholder="Driver's contact details" required="">
                                </div> -->
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
    var table = $('#locationTable').DataTable({
        select: false,
        "columnDefs": [{
            className: "Name",
            "targets": [0],
            "visible": true,
            "searchable": true
        }]
    });

    $('#locationTable').Tabledit({
        url: 'http://localhost:8080/location',
        eventType: 'dblclick',
        editButton: true,
        columns: {
            identifier: [0, 'id'],
            editable: [
                [1, 'name'],
                [2, 'Truck Type', '{"1": "Red", "2": "Green", "3": "Blue"}'],
                [3, 'Supplier', '{"1": "Red", "2": "Green", "3": "Blue"}']
            ]
        }
    });
})
</script>
@endsection
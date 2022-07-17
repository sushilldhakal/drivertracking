<!doctype html>
<html lang="en">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Drivers form fill</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="antialiased">
    <div id="onload" class="loader-active">
        <div id="stage" class="loader-spinner"></div>
    </div>

    <div class="app-container app-theme-grey">
        <div class="login-container p-4">


            <div class="mb-5 text-center">
                <img src="<?php echo '../../img/full_logo_inverse.svg' ?>" class="img-fluid mb-3">
                <h3>Please fill out this form</h3>
            </div>
            <h5>Your current location is: <span class="location"></span></h5>

            <div class="form-group row">
                <label class="col-md-5 col-form-label font-weight-bold">Want a break?</label>

                <div class="col-md-7">
                    <a class="btn btn-danger btn-lg btn-toggle" href="{{url('/break')}}">
                        <span class="d-show">Take a break</span>
                    </a>
                </div>
            </div>
            <div class="video-section">
                <video id="player" autoplay="true" class="video-wrapper"></video>
                <button id="capture" class="btn btn-danger">Capture</button>
                <br>
                <canvas id="snapshot" width=320 height=240></canvas>

            </div>

            <form x-data="{load_type: ''}" class="needs-validation mb-3" action="{{url('resource')}}" method="post">
                @csrf
                <input type="hidden" name="image" value="{{old('image')}}">
                <input type="hidden" name="resource_type" value="log">
                <div class="form-group row">
                    <label class="col-md-5 col-form-label font-weight-bold">Arrived or Depart?</label>

                    <div class="col-md-7">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" @checked(old('type')=='arrived' )
                                id="inlineRadio3" required value="arrived">
                            <label class="form-check-label" for="inlineRadio3">Arived</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" @checked(old('type')=='depart' )
                                id="inlineRadio4" required value="depart">
                            <label class="form-check-label" for="inlineRadio4">Depart</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-5 col-form-label font-weight-bold">Select Location</label>

                    <div class="col-md-7">
                        <select class="form-control" required name="location_id" id="selectLocation">
                            <option value="">Select an option</option>
                            @foreach(\App\Models\Location::all() as $location)
                                <option value="{{$location->id}}">{{$location->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-5 col-form-label font-weight-bold">Load/Unload</label>

                    <div class="col-md-7">
                        <div class="form-check form-check-inline">
                            <input x-model="load_type" class="form-check-input" type="radio" name="load_type"
                                id="inlineRadio1" required value="Load">
                            <label class="form-check-label" for="inlineRadio1">Load</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input x-model="load_type" class="form-check-input" type="radio" name="load_type"
                                id="inlineRadio2" required value="Unload">
                            <label class="form-check-label" for="inlineRadio2">Unload</label>
                        </div>
                    </div>
                </div>
                <template x-if="load_type">
                    <div class="load-action">
                        <div class="form-group row">
                            <label class="col-md-5 col-form-label font-weight-bold">Load Cage</label>

                            <div class="col-md-7">
                                <input type="number" class="form-control" id="validationCustom01" min='1' value="0"
                                    name="cage" placeholder="Number of load cage" required="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-5 col-form-label font-weight-bold">Load Pallet</label>

                            <div class="col-md-7">
                                <input type="number" class="form-control" id="validationCustom01" min='1' value="0"
                                    name="pallet" placeholder="Number of load palette" required="">
                            </div>
                        </div>
                    </div>
                </template>
                <input type="submit" onclick="return checkIfAllOk()" class="btn btn-danger" value="Submit">
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.min.js"
        integrity="sha512-Atu8sttM7mNNMon28+GHxLdz4Xo2APm1WVHwiLW9gW4bmHpHc/E2IbXrj98SmefTmbqbUTOztKl5PDPiu0LD/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
    function toggle() {
        var x = document.getElementsByClassName("load-action");
        if (x[0].style.display === "none") {
            x[0].style.display = "block";
        } else {
            x[0].style.display = "none";
        }
    }

    function checkIfAllOk() {
        with(document.forms[0]) {
            if (image.value === '') {
                alert("Please capture the image");
                return false;
            }
        }
    }
    var player = document.getElementById("player");
    var snapshotCanvas = document.getElementById("snapshot");
    var captureButton = document.getElementById("capture");
    var handleSuccess = function(stream) {
        // Attach the video stream to the video element and autoplay.
        player.srcObject = stream;
    };
    captureButton.addEventListener("click", function() {
        var context = snapshot.getContext("2d");
        // Draw the video frame to the canvas.
        context.drawImage(
            player,
            0,
            0,
            snapshotCanvas.width,
            snapshotCanvas.height
        );
        document.forms[0].image.value = context.canvas.toDataURL()
    });
    navigator.mediaDevices.getUserMedia({
        video: true
    }).then(handleSuccess);
    $(document).ready(function() {

        $("#onload").hide();


        var $locationText = $(".location");
        // Check for geolocation browser support and execute success method
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                geoLocationSuccess,
                geoLocationError, {
                    timeout: 10000
                }
            );
        } else {
            alert("your browser doesn't support geolocation");
        }

        function geoLocationSuccess(pos) {
            // get user lat,long
            var myLat = pos.coords.latitude,
                myLng = pos.coords.longitude,
                loadingTimeout;
            var loading = function() {
                $locationText.text("fetching...");
            };
            loadingTimeout = setTimeout(loading, 600);
            var request = $.get(
                    "https://nominatim.openstreetmap.org/reverse?format=json&lat=" +
                    myLat +
                    "&lon=" +
                    myLng
                )
                .done(function(data) {
                    if (loadingTimeout) {
                        clearTimeout(loadingTimeout);
                        loadingTimeout = null;
                        $locationText.text(data.display_name);
                    }
                })
                .fail(function() {
                    // handle error
                });
        }

        function geoLocationError(error) {
            var errors = {
                1: "Permission denied",
                2: "Position unavailable",
                3: "Request timeout"
            };
            alert("Error: " + errors[error.code]);
        }
    });
    </script>
</body>

</html>

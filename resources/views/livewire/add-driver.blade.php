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
                                        <input type="text" class="form-control" name="email" placeholder="Driver's email address" required="">
                                    </div>

                                    <div class="col-md-4">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control"  name="phone_number" placeholder="Driver's contact number" required="">
                                    </div>

                                    <div class="col-md-4">
                                        <label>DOB</label>
                                        <input type="date" name="date_of_birth" class="form-control" placeholder="Driver's date of birth" required="">
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-md-4">
                                        <label>Comments</label>
                                        <textarea class="form-control" name="comments rows="3" placeholder="Comments"></textarea>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Depo</label>
                                        <select name="depot_id" class="mb-2 form-control">
                                            <option value="">Select Depo</option>
                                            @foreach(\App\Models\Depot::all() as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Select Image</label>
                                        <input type="file" id="file-input" class="form-control">
                                        <div id="img_contain">
                                            <img id="image-preview" src="http://www.clker.com/cliparts/c/W/h/n/P/W/generic-image-file-icon-hi.png" alt="your image" title='' />
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger btn-lg">Save changes</button>
                            </div>
                        </form>

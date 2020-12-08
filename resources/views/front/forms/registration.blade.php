<form id="businessForm" action="{{ route('register.business') }}" method="POST">
    @csrf
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="b-tab-0" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="p-2">
                <h5>Basic Information</h5>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" required>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="b-tab-1" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="p-2">
                <h5>Business Information</h5>
                <div id="businessMap"></div>
                <hr>
                <div class="form-group">
                    <label for="name">Business / Company Name</label>
                    <input type="text" class="form-control @error('business_name') is-invalid @enderror" name="business_name" required>
                    @error('business_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Address</label>
                    <input type="text" class="form-control" id="businessAddress" name="address">
                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" name="lat" id="lat">
                <input type="hidden" name="lon" id="lon">
            </div>
        </div>
        <div class="tab-pane fade" id="b-tab-2" role="tabpanel" aria-labelledby="pills-contact-tab">
            <div class="p-2">
                <h5>Payment Information</h5>
                <div class="form-group">
                    <label for="name">Name on the Card</label>
                    <input type="text" class="form-control @error('card_name') is-invalid @enderror" name="card_name" required>
                    @error('card_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Card No</label>
                    <input type="number" class="form-control @error('card_no') is-invalid @enderror" name="card_no" required>
                    @error('card_no')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <div class="row">
                        <div class="col form-group">
                            <label for="name">Expiry Date</label>
                            <input type="text" class="form-control @error('expiry_date') is-invalid @enderror" id="datepicker" name="expiry_date" required>
                            @error('expiry_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col form-group">
                            <label for="email">CVC</label>
                            <input type="number" class="form-control @error('cvc') is-invalid @enderror" name="cvc" required>
                            @error('cvc')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="row justify-content-around">
        <div class="col">
            <button class="btn btn-block btn-primary" type="button" id="prev-btn" onclick="prev()">Previous</button>
        </div>
        <div class="col">
            <button class="btn btn-block btn-primary" type="button" id="next-btn" onclick="next()">Next</button>
        </div>
    </div>
</form>
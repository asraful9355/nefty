<div class="col-lg-8">
    <div class="card shadow-none mb-0">
        <div class="card-body">
            <form action="{{  route('user.password.update') }}" method="post">
               @csrf

                <div class="col-12">
                    <label class="form-label">Current Password</label>
                    <input type="text" class="form-control"  id="oldpassword" name="oldpassword" value="">
                </div>
                @error('oldpassword')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="col-12">
                    <label class="form-label">New Password</label>
                    <input type="text" class="form-control"  name="newpassword" id="password">
                </div>
                @error('newpassword')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="col-12">
                    <label class="form-label">Confirm New Password</label>
                    <input type="text" class="form-control" name="confirm_password " id="confirm_password">
                </div>
                @error('confirm_password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="col-12">
                    <button type="submit" class="btn btn-light btn-ecomm">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

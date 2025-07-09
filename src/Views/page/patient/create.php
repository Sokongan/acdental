<div class="card profile-card p-4">
    <!-- Action Buttons -->
    <form class="card" action="/patient/create" method="POST">
        <div class="position-absolute top-0 p-3">
            <a href="/patient" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>
        <div class="d-flex justify-content-end gap-2 mb-4 mt-2 px-2" id="actionButtons">
                <button type="submit" class="btn btn-success" id="saveBtn">
                    <i class="bi bi-check"></i> Save
                </button>
        </div>
        <!-- Personal Details Form (disabled) -->

        <div class="card-body border">
            <div class="row">
                <h5 class="card-title mb-2 ">Personal Information</h5>
                <div class="col-md-4">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name">
                </div>
                <div class="col-md-4">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Middle Initial</label>
                    <input type="text" class="form-control" name="middle_initial">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Age</label>
                    <input type="text" name="age" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Birthday</label>
                    <input type="date" name="birthday" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Gender</label>
                    <input type="text" name="gender" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Mobile</label>
                    <input type="text" name="age" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Civil Status</label>
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>

        <div class=" card-body border">
            <div class="row">
                <h5 class="card-title mb-2">Address</h5>
                <div class="col-12">
                    <input type="text" name="address" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Occupation</label>
                    <input type="text" name="occupation" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Religion</label>
                    <input type="text" religion class="form-control">
                </div>
            </div>
        </div>

        <div class="card-body border ">
            <div class="row">
                <h5 class="card-title mb-2 ">Other Information</h5>
                <div class="col-12">
                    <label class="form-label">Guardian</label>
                    <input type="text" name="guardian" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Source/Referral</label>
                    <input type="text" name="referral" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Record Created</label>
                    <input type="date" class="form-control" disabled>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Last Visit</label>
                    <input type="date" name="last_visit" class="form-control" name="last_visit" disabled>
                </div>
                <div class="mt-2 col-md-12">
                    <label class="form-label">Remarks</label>
                    <textarea name="remarks" class="form-control" rows="2" cols="100"></textarea></br>
                </div>

            </div>
        </div>

    </form>
</div>
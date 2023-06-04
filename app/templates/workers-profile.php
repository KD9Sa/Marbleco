<div class="w-50 d-flex flex-column overflow-auto">
    <div class="w-100 p-3">
        <h4 class="font-roboto">Profile</h4>
        <form method="POST">
        <div class="card mb-4">
            <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                <input type='text' class="mb-0" value='<?php echo $_SESSION['full_name']; ?>' name='full_name'>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                <input type='text' class="mb-0" value='<?php echo $_SESSION['email']; ?>' name='email'>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                <p class="mb-0">Password</p>
                </div>
                <div class="col-sm-9">
                <input type='text' class="text-muted mb-0" placeholder='New Password' name='password'>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-9">
                <button type="submit" class="btn btn-primary" name="profile_update">Update</button>
                </div>
            </div>
            </div>
        </div>
        </form>
    </div>
</div>
<?php
$title = "Home";
include_once "templates/header.php";
?>

<div class="container mt-4">



    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">All users</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Add user</button>
        </li>

    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">Form</div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">

            <div class="myForm">

                <form id="tableData">

                    <div class="row">

                    


                        <div class="mb-3 col-md-3">
                            <label for="nameId" class="form-label">Name</label>
                            <input type="text" id="nameId" class="form-control" name="name">
                            <small class="text-danger error"></small>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label for="emailId" class="form-label">Email</label>
                            <input type="text" id="emailId" class="form-control" name="email">
                            <small class="text-danger error"></small>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label for="passwordId" class="form-label">Password</label>
                            <input type="text" id="passwordId" class="form-control" name="password" maxlength="15">
                            <small class="text-danger error"></small>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label for="phoneId" class="form-label">Phone</label>
                            <input type="tel" id="phoneId" class="form-control" name="phone" maxlength="10">
                            <small class="text-danger error"></small>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label for="imageId" class="form-label">Profile image</label>
                            <input type="file" id="imageId" class="form-control" name="image"  accept=".jpg, .jpeg, .png, .gif">
                            <small class="text-danger error image-error"></small>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label">Gender</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender[]" value="male" >Male
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender[]" value="female" >Female
                            </div>
                            <small class="text-danger error"></small>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label">Languages</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="php" name="languages[]">PHP
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="java" name="languages[]">Java
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="python" name="languages[]">Python
                            </div>
                            <small class="text-danger error"></small>
                        </div>

                        <input type="hidden" id="userId" >
                    <input type="hidden" name="table" value="student" >

                </div>
                <button type="button" class="add-user btn btn-success" onclick="sendData()" >Add user</button>
                <button type="button" class="update-user d-none btn btn-success">Update user</button>


                </form>


            </div>


        </div>

    </div>

</div>

<?php
include_once "templates/footer.php";
?>
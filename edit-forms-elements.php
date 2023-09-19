<?php
require "../HRIS/Model/employee-db-manager.php";
require "../HRIS/Controller/employee-controller.php";

$database = new DB_Manager();

$id = $_GET['employee_id'];

$selected_employee = $database->select_employee($id);

include "include/header.html";

?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Employee Form</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="table-data.php">Tables</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active"><?= $selected_employee['firstname'] . ", " . $selected_employee['lastname'] ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- Section with all the inputs -->
    <section class="section">
        <form action="#" method="post">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Personal Informations</h5>

                            <!-- General Form Elements -->
                            <div class="row mb-3">
                                <label for="inputFirstName" class="col-sm-3 col-form-label">First Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" style="text-transform: capitalize;" id="inputFirstName" required name="firstname" <?= 'value="' . $selected_employee['firstname'] . '"'; ?>>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputMiddleName" class="col-sm-3 col-form-label">Middle Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" style="text-transform: capitalize;" id="inputMiddleName" name="middlename" <?= 'value="' . $selected_employee['middlename'] . '"'; ?>>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputLastName" class="col-sm-3 col-form-label">Last Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" style="text-transform: capitalize;" id="inputLastName" required name="lastname" <?= 'value="' . $selected_employee['lastname'] . '"'; ?>>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPreferredName" class="col-sm-3 col-form-label">Preferred Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" style="text-transform: capitalize;" id="inputPreferredName" required name="preferredname" <?= 'value="' . $selected_employee['preferredname'] . '"'; ?>>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputDob" class="col-sm-3 col-form-label">Date of birth</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="inputDob" required name="dob" <?= 'value="' . $selected_employee['birthdate'] . '"'; ?>>
                                    <div class="invalid-feedback">
                                        Invalid age, must be 16 and above
                                    </div>
                                </div>
                            </div>
                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-3 pt-0">Gender</legend>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="Male" <?php if ($selected_employee['gender'] === 'Male') {
                                                                                                                                        echo 'checked';
                                                                                                                                    } ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="Female" <?php if ($selected_employee['gender'] === 'Female') {
                                                                                                                                        echo 'checked';
                                                                                                                                    } ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            Female
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gridRadios3" value="Other" <?php if ($selected_employee['gender'] === 'Other') {
                                                                                                                                        echo 'checked';
                                                                                                                                    } ?>>
                                        <label class="form-check-label" for="gridRadios3">
                                            Other
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="row mb-3">
                                <label for="inputCountry" class="col-sm-3 col-form-label">Country</label>
                                <div class="col-sm-9">
                                    <select id="inputCountry" class="form-select" name="country" onclick="loadProvinces()" required>
                                        <option selected value="">Select a country</option>
                                        <option value="Canada" <?php if ($selected_employee['country'] === 'Canada') {
                                                                    echo "selected";
                                                                } ?>>Canada</option>
                                        <option value="United-States" <?php if ($selected_employee['country'] === 'United-States') {
                                                                            echo "selected";
                                                                        } ?>>United-States</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Javascript to load province or state list from selected country -->
                            <script src="js/getProvince.js"></script>

                            <div class="row mb-3">
                                <label for="inputProvince" class="col-sm-3 col-form-label">Province</label>
                                <div class="col-sm-9">
                                    <select id="inputProvince" class="form-select" name="province" onfocus="loadProvinces();" required>
                                        <option value="">Select a province</option>
                                        <option selected value="<?= $selected_employee['province']; ?>"><?= $selected_employee['province']; ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputCity" class="col-sm-3 col-form-label">City</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" style="text-transform: capitalize;" id="inputCity" required name="city" <?= 'value="' . $selected_employee['city'] . '"'; ?>>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputAddress" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" style="text-transform: capitalize;" id="inputAddress" placeholder="1234 Main St (App. Unit)" required name="address" <?= 'value="' . $selected_employee['address'] . '"'; ?>>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputUnit" class="col-sm-3 col-form-label">Apt/Unit</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputUnit" name="unit" <?= 'value="' . $selected_employee['unit'] . '"'; ?>>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPostalCode" class="col-sm-3 col-form-label">Postal Code</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputPostalCode" maxlength="6" name="postalcode" required <?= 'value="' . $selected_employee['postalcode'] . '"'; ?>>
                                    <div class="invalid-feedback">
                                        Please provide a valid zip. (Canada: A1Z1B2, USA: 12345)
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="example@realfruitbubbletea.com" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" <?= 'value="' . $selected_employee['email'] . '"'; ?>>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputMobile" class="col-sm-3 col-form-label">Mobile Phone</label>
                                <div class="col-sm-9">
                                    <input type="tel" class="form-control" id="inputMobile" placeholder="e.g. 888-888-8888" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="mobile" oninvalid="this.setCustomValidity('e.g. 888-888-888')" oninput="this.setCustomValidity('')" <?= 'value="' . $selected_employee['mobile'] . '"'; ?>>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputHome" class="col-sm-3 col-form-label">Homephone</label>
                                <div class="col-sm-9">
                                    <input type="tel" class="form-control" id="inputHome" placeholder="e.g. 888-888-8888" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="home" oninvalid="this.setCustomValidity('e.g. 888-888-8888')" oninput="this.setCustomValidity('')" <?= 'value="' . $selected_employee['homephone'] . '"'; ?>>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputSin" class="col-sm-3 col-form-label">SIN</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputSin" required maxlength="9" pattern="[0-9]{9}" name="sin" oninvalid="this.setCustomValidity('Must be a 9 digits numeric number')" oninput="this.setCustomValidity('')" <?= 'value="' . $selected_employee['SIN'] . '"'; ?> disabled>
                                    <input class="form-check-input" type="checkbox" id="gridCheck1" name="sin_expiration_checkbox" onclick="allowExpiration()">
                                    <label class="form-check-label" for="gridCheck1">
                                        Expiration Date
                                    </label>
                                    <input type="date" class="form-control" id="inputSinExpiration" name="sin_expiration" disabled>
                                    <div class="invalid-feedback">
                                        Invalid expiration date
                                    </div>
                                </div>
                            </div>

                            <!-- Javascript to load SIN expiration check -->
                            <script src="js/getSIN-Expiration.js"></script>

                            <!-- End General Form Elements -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Other Informations</h5>

                            <!-- Advanced Form Elements -->
                            <div class="row mb-3">
                                <label for="inputPosition" class="col-sm-3 col-form-label">Hired position</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" style="text-transform: capitalize;" id="inputPosition" name="position" <?= 'value="' . $selected_employee['position'] . '"'; ?>>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPayclass" class="col-sm-3 col-form-label">Pay Class</label>
                                <div class="col-sm-9">
                                    <select id="inputPayclass" class="form-select" name="payclass">
                                        <option value="Hourly" <?php if ($selected_employee['payclass'] === 'Hourly') {
                                                                    echo "selected";
                                                                } ?>>Hourly</option>
                                        <option value="Salary" <?php if ($selected_employee['payclass'] === 'Salary') {
                                                                    echo "selected";
                                                                } ?>>Salary</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputRegion" class="col-sm-3 col-form-label">Region</label>
                                <div class="col-sm-9">
                                    <select id="inputRegion" class="form-select" name="region" onchange="loadStores();" required>
                                        <option value="">Select a region</option>
                                        <option value="CENTRAL" <?php if ($selected_employee['region'] === 'CENTRAL') echo 'selected'; ?>>CENTRAL</option>
                                        <option value="EAST" <?php if ($selected_employee['region'] === 'EAST') echo 'selected'; ?>>EAST</option>
                                        <option value="NW" <?php if ($selected_employee['region'] === 'NW') echo 'selected'; ?>>NW</option>
                                        <option value="OTTAWA" <?php if ($selected_employee['region'] === 'OTTAWA') echo 'selected'; ?>>OTTAWA</option>
                                        <option value="QUEBEC" <?php if ($selected_employee['region'] === 'QUEBEC') echo 'selected'; ?>>QUEBEC</option>
                                        <option value="SOUTH" <?php if ($selected_employee['region'] === 'SOUTH') echo 'selected'; ?>>SOUTH</option>
                                        <option value="SW1" <?php if ($selected_employee['region'] === 'SW1') echo 'selected'; ?>>SW1</option>
                                        <option value="SW2" <?php if ($selected_employee['region'] === 'SW2') echo 'selected'; ?>>SW2</option>
                                        <option value="USA" <?php if ($selected_employee['region'] === 'USA') echo 'selected'; ?>>USA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputHomeStore" class="col-sm-3 col-form-label">Home Store</label>
                                <div class="col-sm-9">
                                    <select id="inputHomeStore" class="form-select" name="home_store" onfocus="loadStores();" required>
                                        <option value="">Select a home store</option>
                                        <option value="<?php echo $selected_employee['home_store'] ?>" selected><?php echo $selected_employee['home_store'] ?></option>
                                    </select>
                                </div>
                            </div>

                            <!-- Javascript to load stores from selected region  -->
                            <script src="js/getStore.js"></script>

                            <div class="row mb-3">
                                <span class="col-sm-3 col-form-label">Language</span>
                                <div class="col-sm-9" style="max-width: 150px;">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <input class="form-input-checkbox" type="checkbox" id="language1" name="language[]" value="English" <?php if (in_array("English", explode(", ", $selected_employee['language']))) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                            <label class="form-check-label" for="language1">
                                                English
                                            </label>
                                        </li>
                                        <li class="list-group-item">
                                            <input class="form-input-checkbox" type="checkbox" id="language2" name="language[]" value="French" <?php if (in_array("French", explode(", ", $selected_employee['language']))) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                            <label class="form-check-label" for="language2">
                                                French
                                            </label>
                                        </li>
                                        <li class="list-group-item">
                                            <input class="form-input-checkbox" type="checkbox" id="language3" name="language[]" value="Other" <?php if (in_array("Other", explode(", ", $selected_employee['language']))) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                            <label class="form-check-label" for="language3">
                                                Other
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Javascript to change the employee status  -->
                            <script src="js/status-control.js"></script>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Status</label>
                                </div>
                                <div class="col-sm-3 form-check form-switch">
                                    <input onclick="getStatus()" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="status" <?php if ($selected_employee['status'] === 'Active') {
                                                                                                                                                        echo 'checked';
                                                                                                                                                    } ?>>
                                    <label class="form-check-label" for="flexSwitchCheckDefault" id="preview"><?= $selected_employee['status'] ?></label>
                                </div>
                                <div>
                                    <?php
                                    $diff = date_diff(date_create($selected_employee["start_date"]), date_create());
                                    $days = $diff->format('%d');
                                    $tdays = $diff->format('%y');

                                    // calculate length of service in months
                                    $months = $diff->format('%m');
                                    $tmonths = $diff->format('%y') * 12 + $diff->format('%m');

                                    // calculate length of service in years
                                    $years = $diff->format('%y');
                                    echo "Length of service: $years years, $months months, $days days";
                                    ?>
                                </div>
                            </div>

                            <!-- Javascript to verify the age input  -->
                            <script src="js/getAge.js"></script>
                            <!-- Javascript to verify the postal code input -->
                            <script src="js/getPostalCode.js"></script>

                            <div class="row mb-3">
                                <div class="col-xs">
                                </div>
                                <div class="col-sm d-flex justify-content-center">
                                    <div class="btn-group">
                                        <button onclick="checkAge(event); checkPostalCode(event); checkExpiration(event); checkedData();" type="submit" class="btn btn-primary" name="update">Update</button>
                                        <a href="table-data.php" type="button" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>
                                <div class="col-xs"></div>

                            </div>
                            <div class="text-end">
                                <span>Last Updated:</span><?= ' ' . $selected_employee['last_update'] ?>
                            </div>
                            <!-- End Advanced Form Elements -->
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </form>
    </section>

</main><!-- End #main -->

<?php include "include/footer.html"; ?>
<?php require_once '../partial/_header.php';?>

<section id="edit">
  <?php
if (isset($_GET['id']) && ($_SESSION['acct_type']=='pos1' || $_SESSION['acct_type']=='pos2' || $_SESSION['acct_type']=='pos3')) {
    require_once '../../controller/CRUDController.php';
    $object = new CRUDController;
    $data = $object->edit($_GET['id']);

} else {
    header('location:el/view/status/404.php');
    exit;
}
?>

  <div class="col-md-8 mx-auto">
    <div class="card">
      <div class="card-header">Edit</div>
      <div class="card-body">
        <form id="edit-form" action="/el/route.php" method="post" onsubmit="return edit()">
          <input type="hidden" name="id" value="<?php echo $data['applicant'][0] ?>">
          <input type="hidden" name="submitType" value="update">

          <!-- FIRST/LAST NAME -->
          <div class="form-row form-group">
            <div class="col-md-6">
              <label>First Name: <span class="text-danger">*</span></label>
              <input type="text" name="firstName" value="<?php echo $data['applicant'][1] ?>" class="form-control">
              <span class="invalid-feedback"></span>
            </div>
            <div class="col-md-6">
              <label>Last Name: <span class="text-danger">*</span></label>
              <input type="text" name="lastName" value="<?php echo $data['applicant'][2] ?>" class="form-control">
              <span class="invalid-feedback"></span>
            </div>
          </div>

          <!-- ADDRESS -->
          <div class="form-row form-group">
            <label>Address: <span class="text-danger">*</span></label>
            <input type="text" name="address" value="<?php echo $data['applicant'][6] ?>" class="form-control">
            <span class="invalid-feedback"></span>
          </div>

          <!-- AGE/DOB -->
          <div class="row form-group">
            <div class="col-md-4">
              <label>Age: <span class="text-danger">*</span></label>
              <input type="text" name="age" value="<?php echo $data['applicant'][4] ?>" class="form-control">
              <span class="invalid-feedback"></span>
            </div>

            <div class="col-md-8">
              <label>Date of Birth: <span class="text-danger">*</span></label><small class="text-muted">
                mm/yy/dd</small>
              <div class="form-row">
                <div class="col-md-4">
                  <label>Month: </label>
                  <select class="custom-select" name="month">
                    <option value="1" <?php echo ($data['dob'][0] == "1") ? 'selected="selected"' : ''; ?>>Jan</option>
                    <option value="2" <?php echo ($data['dob'][0] == "2") ? 'selected="selected"' : ''; ?>>Feb</option>
                    <option value="3" <?php echo ($data['dob'][0] == "3") ? 'selected="selected"' : ''; ?>>Mar</option>
                    <option value="4" <?php echo ($data['dob'][0] == "4") ? 'selected="selected"' : ''; ?>>Apr</option>
                    <option value="5" <?php echo ($data['dob'][0] == "5") ? 'selected="selected"' : ''; ?>>May</option>
                    <option value="6" <?php echo ($data['dob'][0] == "6") ? 'selected="selected"' : ''; ?>>Jun</option>
                    <option value="7" <?php echo ($data['dob'][0] == "7") ? 'selected="selected"' : ''; ?>>Jul</option>
                    <option value="8" <?php echo ($data['dob'][0] == "8") ? 'selected="selected"' : ''; ?>>Aug</option>
                    <option value="9" <?php echo ($data['dob'][0] == "9") ? 'selected="selected"' : ''; ?>>Sep</option>
                    <option value="10" <?php echo ($data['dob'][0] == "10") ? 'selected="selected"' : ''; ?>>Oct
                    </option>
                    <option value="11" <?php echo ($data['dob'][0] == "11") ? 'selected="selected"' : ''; ?>>Nov
                    </option>
                    <option value="12" <?php echo ($data['dob'][0] == "12") ? 'selected="selected"' : ''; ?>>Dec
                    </option>
                  </select>
                </div>
                <div class="col-md-3">
                  <label>Day: </label>
                  <select class="custom-select" name="day">
                    <?php
                      for ($i = 1; $i < 32; $i++) {
                          $x = ($data['dob'][1] == $i) ? 'selected="selected"' : '';
                          echo "<option value=\"$i\" $x>$i</option>
                                                                    ";
                      }
                    ?>
                  </select>
                </div>

                <div class="col">
                  <label>Year: </label>
                  <select class="custom-select" name="year">
                    <?php
                      $max_year = 1960;
                      for ($i = date('Y') + 10; $i >= $max_year; $i--) {
                          $x = ($data['dob'][2] == $i) ? 'selected="selected"' : '';
                          echo "<option value=\"$i\" $x>$i</option>
                                                                      ";
                      }
                    ?>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <!-- EMAIL/CONTACT NUMBER -->
          <div class="form-row form-group">
            <div class="col-md-6">
              <label>Email: <span class="text-danger">*</span> </label>
              <input type="email" name="email" value="<?php echo $data['applicant'][3] ?>" class="form-control">
              <span class="invalid-feedback"></span>
            </div>
            <div class="col-md-6">
              <label>Contact No.: <span class="text-danger">*</span></label>
              <input type="text" name="contact" value="<?php echo $data['applicant'][7] ?>" class="form-control">
              <span class="invalid-feedback"></span>
            </div>
          </div>

          <!-- COURSE/EMPLOYMENT/STATUS -->
          <div class="form-row form-group">
            <div class="col-md-4">
              <label>Course <span class="text-danger">*</span></label>
              <select class="custom-select" name="course">
                <?php
                  $totalCourse = count($data['courses']);
                  for ($i = 0; $i < $totalCourse; $i++) {
                      $x = ($data['courses'][$i][0] == $data['applicant'][8]) ? 'selected="selected"' : '';
                      echo '<option value="' . $data['courses'][$i][0] . '" ' . $x . '>' . $data['courses'][$i][0] . '</option>
                                                    ';
                  }
                ?>
              </select>
            </div>
            <div class="col-md-4">
              <label>Employment</label>
              <select class="custom-select" name="employment">
                <option value="Student"
                  <?php echo ($data['applicant'][9] == "Student") ? 'selected="selected"' : ''; ?>>Student</option>
                <option value="Employed"
                  <?php echo ($data['applicant'][9] == "Employed") ? 'selected="selected"' : ''; ?>>Employed</option>
                <option value="Unemployed"
                  <?php echo ($data['applicant'][9] == "Unemployed") ? 'selected="selected"' : ''; ?>>Unemployed
                </option>
              </select>
            </div>

            <div class="col-md-4">
              <label>Status</label>
              <select name="status" class="custom-select">
                <option value="Active" <?php echo ($data['applicant'][10] == "Active") ? 'selected="selected"' : ''; ?>>
                  Active</option>
                <option value="Suspended"
                  <?php echo ($data['applicant'][10] == "Suspended") ? 'selected="selected"' : ''; ?>>Suspended</option>
                <option value="Pending"
                  <?php echo ($data['applicant'][10] == "Pending") ? 'selected="selected"' : ''; ?>>Pending</option>
              </select>
            </div>
          </div>

          <!-- LEGAL -->
          <p class="text-center py-2">By clicking Register, you agree to our <a href="#">Terms & Data
              Policy</a>. You will recieve an Email Notifications from us.</p>

          <!-- BUTTONS -->
          <div class="form-row form-group float-right">
            <button class="btn btn-primary mr-2" type="submit">Update</button>
            <a href="/el/view/applicant" class="btn btn-danger">Cancel</a>

          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<?php require_once '../partial/_footer.php';?>
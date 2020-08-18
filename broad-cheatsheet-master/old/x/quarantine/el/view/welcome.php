<?php include_once('partial/_header.php');?>

<section id="create">
  <div class="col-md-8 mx-auto">
    <div class="card">
      <div class="card-header">Register</div>
      <div class="card-body">
        <form id="create-form" action="/el/route.php" method="post">

          <!-- NAME -->
          <div class="form-row form-group">
            <div class="col-md-6">
              <label>First Name: <span class="text-danger">*</span></label>
              <input type="text" name="firstName" class="form-control">
              <span class="invalid-feedback"></span>
            </div>
            <div class="col-md-6">
              <label>Last Name: <span class="text-danger">*</span></label>
              <input type="text" name="lastName" class="form-control">
              <span class="invalid-feedback"></span>
            </div>
          </div>

          <!-- ADDRESS -->
          <div class="form-row form-group">
            <label>Address: <span class="text-danger">*</span></label>
            <input type="text" name="address" class="form-control">
            <span class="invalid-feedback"></span>
          </div>

          <!-- AGE/DOB -->
          <div class="row form-group">
            <div class="col-md-4">
              <label>Age: <span class="text-danger">*</span></label>
              <input type="text" name="age" class="form-control">
              <span class="invalid-feedback"></span>
            </div>

            <div class="col-md-8">
              <label>Date of Birth: <span class="text-danger">*</span></label><small class="text-muted">
                mm/yy/dd</small>
              <div class="form-row">
                <div class="col-md-4">
                  <label>Month: </label>
                  <select class="custom-select" name="month">
                    <option value="1">Jan</option>
                    <option value="2">Feb</option>
                    <option value="3">Mar</option>
                    <option value="4">Apr</option>
                    <option value="5">May</option>
                    <option value="6">Jun</option>
                    <option value="7">Jul</option>
                    <option value="8">Aug</option>
                    <option value="9">Sep</option>
                    <option value="10">Oct</option>
                    <option value="11">Nov</option>
                    <option value="12">Dec</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <label>Day: </label>
                  <select class="custom-select" name="day">
                    <?php
                      for ($i = 1; $i < 32; $i++) {
                          echo "<option value=" . $i . ">" . $i . "</option>
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
                          echo '<option value=', $i, '>', $i, '</option>
                                                ';
                      }
                    ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <!-- EMAIL/CONTACT -->
          <div class="form-row form-group">
            <div class="col-md-6">
              <label>Email: <span class="text-danger">*</span> </label>
              <input type="email" name="email" class="form-control">
              <span class="invalid-feedback"></span>
            </div>
            <div class="col-md-6">
              <label>Contact No.: <span class="text-danger">*</span></label>
              <input type="text" name="contact" class="form-control">
              <span class="invalid-feedback"></span>
            </div>
          </div>

          <!-- COURSE/EMPLOYMENT -->
          <div class="form-row form-group">
            <div class="col-md-6">
              <label>Course <span class="text-danger">*</span></label>
              <select class="custom-select" name="course">
                <?php
                  require_once '../controller/CourseController.php';
                  $object = new CourseController;
                  $object->index();
                ?>
              </select>
            </div>
            <div class="col-md-6">
              <label>Employment</label>
              <select class="custom-select" name="employment">
                <option value="Student">Student</option>
                <option value="Employed">Employed</option>
                <option value="Unemployed">Unemployed</option>
              </select>
            </div>
          </div>

          <p class="text-center py-2">By clicking Register, you agree to our <a href="#">Terms & Data
              Policy</a>. You will recieve an Email Notifications from us.</p>

          <button class="btn btn-primary btn-block" type="submit" name="submitType" value="store">Register</button>
        </form>
      </div>
    </div>
  </div>
</section>

<?php include_once('partial/_footer.php');?>

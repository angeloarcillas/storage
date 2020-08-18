  <main>
      <!-- error message -->
    <div class="error-msg">
      <?php
    if (isset($_SESSION['message'])) {
    echo '<p>',$_SESSION['message'],'</p>';
      unset($_SESSION['message']);
    }
     ?>

    </div>

    <div class="title">
      <h2>Registration Form</h2>
    </div>
    <div class="container">

      <!-- free space -->
      <div class="left">
        <div class="wrapper-content">
          <h2>Evangel Laclairs</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
            aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>

      </div>
      <div class="right">
        <div class="form-box">

          <!-- REGISTRATION FORM -->
          <form class="" action="../router/register-router.php" method="post" required>
            <label>First Name:</label>
            <input class="reg-input" type="text" name="register_firstName" placeholder="First name.." required>
            <label>Last Name:</label>
            <input class="reg-input" type="text" name="register_lastName" placeholder="Last name" required>
            <label>Email:</label>
            <input class="reg-input" type="email" name="register_email" placeholder="Email..." required>
            <label>Age:</label>
            <input class="reg-input" type="text" name="register_age" placeholder="Age..." required>
            <label>Date of Birth:</label>
            <span>Month:</span>
            <select class="reg-date" name="reg_month" required>
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
            <span>Day:</span>
            <select class="reg-date" name="reg_day" required>
              <option value="01">1</option>
              <option value="02">2</option>
              <option value="03">3</option>
              <option value="04">4</option>
              <option value="05">5</option>
              <option value="06">6</option>
              <option value="07">7</option>
              <option value="08">8</option>
              <option value="09">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
            </select>
            <span>Year:</span>
            <select class="reg-date" name="reg_year" required>

              <!-- get date of birth years -->
              <?php
              require_once '../router/reg-year-router.php';
              ?>
            </select>
            <label>Address:</label>
            <input class="reg-input" type="text" name="register_address" placeholder="Address..." required>
            <label>Contact:</label>
            <input class="reg-input" type="text" name="register_contact" placeholder="Contact..." required>
            <label>Course:</label>
            <select class="reg-sel" name="register_course" required>

              <!-- get available course -->
              <?php
              require_once '../router/course-router.php';
               ?>
            </select>
            <label>Employment:</label>
            <select class="reg-sel" name="register_employment" required>
              <option value="Employed">Employed</option>
              <option value="Self-Employed">Self-Employed</option>
              <option value="Unemployed">Unemployed</option>
            </select>
            <div class="terms">

              <!-- DATA PRIVACY -->
              <p>By clicking Register, you agree to our <a href="#">Terms</a>, <a href="#">Data </a><span>and</span><a href="#"> Cookies Policy</a>. You will recieve an Email Notifications from us about the info you entered.
              </p>
            </div>

            <button type="submit" name="register">Register</button>
          </form>
        </div>
      </div>
    </div>
</main>

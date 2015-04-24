
<div id="result" class="row">
  <div class="col-md-4">

  </div>
  <div class="col-md-4">
    <form method="post" action="register.php" name="registerform">

      <div class="form-group">
        <label for="login_input_username">Username (please use your AD username)</label>
        <input id="login_input_username" class="form-control login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />

      </div>

        <div class="form-group">
          <label for="login_input_email">Email (your ANS email)</label>
          <input id="login_input_email" class="form-control login_input" type="email" name="user_email" required />
        </div>
        <div class="form-group">
          <label for="login_input_password_new">Password (min. 6 characters)</label>
          <input id="login_input_password_new" class="form-control login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
        </div>
        <div class="form-group">
          <label for="login_input_password_repeat">Repeat password</label>
          <input id="login_input_password_repeat" class="form-control login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
        </div>
        <div class="form-group">
          <input  type="submit"  name="register" style="width:100%;" class="btn btn-lg btn-info" value="Sign Up" />
        </div>


    </form>
  </div>
  <div class="col-md-4">

  </div>
</div>

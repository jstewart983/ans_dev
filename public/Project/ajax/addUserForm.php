<?php

echo '<form method="post" action="index.php">
            <div class="login-form">
                <div class="form-group">
                    <input name="reg_name" type="text" class="form-control login-field"
                           placeholder="Username" id="reg-name" required/>
                    <label class="login-field-icon fui-user" for="reg-name"></label>
                </div>

                <div class="form-group">
                    <input name="reg_email" type="email" class="form-control login-field"
                           placeholder="Email" id="reg-email" required/>
                    <label class="login-field-icon fui-mail" for="reg-email"></label>
                </div>

                <div class="form-group">
                    <input name="reg_password" type="password" class="form-control login-field"
                           placeholder="Password" id="reg-pass" required/>
                    <label class="login-field-icon fui-lock" for="reg-pass"></label>
                </div>

                <div class="form-group">
                    <input name="reg_website" type="text" class="form-control login-field"
                           placeholder="Website" id="reg-website"/>
                    <label class="login-field-icon fui-chat" for="reg-website"></label>
                </div>

                <div class="form-group">
                    <input name="reg_fname" type="text" class="form-control login-field"
                           placeholder="First Name" id="reg-fname"/>
                    <label class="login-field-icon fui-user" for="reg-fname"></label>
                </div>

                <div class="form-group">
                    <input name="reg_lname" type="text" class="form-control login-field"
                           placeholder="Last Name" id="reg-lname"/>
                    <label class="login-field-icon fui-user" for="reg-lname"></label>
                </div>

                <div class="form-group">
                    <input name="reg_nickname" type="text" class="form-control login-field"
                           placeholder="Nickname" id="reg-nickname"/>
                    <label class="login-field-icon fui-user" for="reg-nickname"></label>
                </div>

                <div class="form-group">
                    <input name="reg_bio" type="text" class="form-control login-field"

                           placeholder="About / Bio" id="reg-bio"/>
                    <label class="login-field-icon fui-new" for="reg-bio"></label>
                </div>

                <input class="btn btn-primary btn-lg btn-block" type="submit" name="reg_submit" value="Register"/>
        </form>
        </div>'

?>

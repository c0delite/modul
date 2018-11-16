<!-- login area start -->
<div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
            <?= form_open('login/aksi_login') ?>
                    <div class="login-form-head">
                        <h4>SPRING HILL</h4>
                        <p>Hello there, Sign in and start your job today</p>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Your username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Your password">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-default" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
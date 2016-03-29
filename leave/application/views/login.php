<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Management System</title>
    <!-- Core CSS - Include with every page -->
    <link href="<?= base_url('assets/plugins/bootstrap/bootstrap.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/plugins/pace/pace-theme-big-counter.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/main-style.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/datepicker.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/select2.css'); ?>" rel="stylesheet" />
    <link rel='shortcut icon' type='image/x-icon' style='height:40px' href='<?= base_url("assets/img/lms.png"); ?>'>

</head>

<body class="body-Login-back">

    <div class="container">
       
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
              <h1 style="color:white">Leave Management System</h1>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#login" data-toggle="tab">Log In</a>
                                </li>
                                <li><a href="#signup" data-toggle="tab">Create an account</a>
                                </li>
                                <!-- <li><a href="#messages" data-toggle="tab">Messages</a>
                                </li>
                                <li><a href="#settings" data-toggle="tab">Settings</a>
                                </li> -->
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="login">
                                    <?= form_open(base_url('home'), array('role'=>'form')); ?>
                                        <br>
                                        <fieldset>
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Username" name="username" autofocus>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="password" placeholder="Password" name="password" value="">
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="role">
                                                    <option value="" selected> -- Select Role -- </option>
                                                    <option value="student"> Student </option>
                                                    <option value="faculty"> Faculty </option>
                                                    <option value="hod"> HOD </option>
                                                    <option value="ugpgcoordinator"> UG/PG Coordinator </option>
                                                    <option value="facultycoordinator"> Faculty Coordinator </option>
                                                    <option value="admin"> Admin </option>
                                                </select>
                                            </div>
                                            <!-- <div class="checkbox">
                                                <label>
                                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                                </label>
                                            </div> -->
                                            <!-- Change this to a button or input when using this as a form -->
                                            <button type="submit" name="login-submit" value="submit" class="btn btn-lg btn-success btn-block">Login</button>
                                        </fieldset>
                                    <?= form_close(); ?>
                                </div>
                                <div class="tab-pane fade" id="signup">
                                    <?= form_open(base_url('signup'), array('role'=>'form')); ?>
                                        <br>
                                        <fieldset>
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input class="form-control" name="name" id="name" type="text" />
                                            </div>
                                            <div class="form-group">
                                                <label for="rollnumber">Username</label>
                                                <input class="form-control" name="username" id="rollnumber" type="text" />
                                            </div>
                                            <div class="form-group">
                                                <label>Department</label>
                                                <select class="form-control" name="department">
                                                    <option selected>--Select--</option>
                                                    <option value="cse">Computer Science & Engineering</option>
                                                    <option value="ee">Electrical Engineering</option>
                                                    <option value="me">Mechanical Engineering</option>
                                                    <option value="ph">Physics</option>
                                                    <option value="ch">Chemistry</option>
                                                    <option value="ma">Mathematics</option>
                                                    <option value="bi">Biology</option>
                                                    <option value="hss">HSS</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Role</label>
                                                <select class="form-control" name="role">
                                                    <option selected>--Select--</option>
                                                    <option value="student">Student</option>
                                                    <option value="faculty">Faculty</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input class="form-control" name="password" id="password" type="password" />
                                            </div>
                                            <button type="submit" name="signup-submit" value="submit" class="btn btn-lg btn-success btn-block">Create Account</button>
                                        </fieldset>
                                    <?= form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>                
                    <!-- <div class="panel-heading">
                        <h3 class="panel-title">Please Log In or <a href="<?= base_url('signup'); ?>"><button type="button" class="btn btn-primary">Create an Account</button></a></h3>
                    </div>
                    <div class="panel-body">
                        <?= form_open(base_url('home'), array('role'=>'form')); ?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder="Password" name="password" value="">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="role">
                                        <option value="" selected> -- Select Role -- </option>
                                        <option value="student"> Student </option>
                                        <option value="faculty"> Faculty </option>
                                        <option value="hod"> HOD </option>
                                        <option value="ugpgcoordinator"> UG/PG Coordinator </option>
                                        <option value="facultycoordinator"> Faculty Coordinator </option>
                                        <option value="admin"> Admin </option>
                                    </select>
                                </div>
                                <!-- <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div> -->
                                <!-- Change this to a button or input when using this as a form --
                                <button type="submit" name="login-submit" value="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        <?= form_close(); ?>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    <script src="<?= base_url('assets/plugins/jquery-1.10.2.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/metisMenu/jquery.metisMenu.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/pace/pace.js'); ?>"></script>
    <script src="<?= base_url('assets/scripts/siminta.js'); ?>"></script>
    <script src="<?= base_url('assets/scripts/datepicker.js'); ?>"></script>
    <script src="<?= base_url('assets/scripts/select2.min.js'); ?>"></script>

    <?php if(@$error_alert): ?>
        <script>window.alert('<?= $error_alert; ?>')</script>
    <?php endif; ?>
</body>

</html>

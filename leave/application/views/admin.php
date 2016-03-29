<!--  page-wrapper -->
<div id="page-wrapper">

    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12" id="dashboard">
            <h1 class="page-header">Dashboard 
                <button type="submit" class="btn btn-danger" onclick="resetdata();" > Reset All Users data <br> (use at starting of new semester) </button>
                <button type="btn" class="btn btn-primary" onclick="sendmail();" > Send Mail to account section <br> (use at start of each month) </button>
            </h1>
        </div>
        <!--End Page Header -->
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Check Profile of any User</b> <br>
                    <?= form_open(base_url('home/checkprofile')); ?>                          
                    <select id="select2example" name="rollnumber" style="width:300px">
                        <option selected value="" > -- Select User -- </option>
                        <option value="" disabled> -- Students -- </option>
                        <?php foreach($users as $user): ?>
                            <?php if($user['role']=='student'): ?>
                                <option value="<?= $user['rollnumber']; ?>"><?= $user['name'].', '.$user['rollnumber']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <option value="" disabled> -- Faculties -- </option>
                        <?php foreach($users as $user): ?>
                            <?php if($user['role']=='faculty'): ?>
                                <option value="<?= $user['rollnumber']; ?>"><?= $user['name'].', '.$user['rollnumber']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn btn-primary"> Submit </button>
                    <?= form_close(); ?>
                </div>
                <?php if($this->input->get('user')):?>
                <?php foreach($users as $user): if($user['rollnumber']==$this->input->get('user') && ($user['role']=='student' || $user['role']=='faculty')): ?>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                                <?= form_open(base_url('home/update')); ?>
                                <tr>
                                    <td>Name</td>
                                    <td><input class="form-control" name="name" type="text" value="<?= $user['name']; ?>" /></td>
                                </tr>
                                <tr>
                                    <td>Roll Number</td>
                                    <td><input class="form-control" name="rollnumber" id="name" type="text" value="<?= $user['rollnumber']; ?>" /></td>  
                                </tr>
                                <tr>
                                    <td>Department</td>
                                    <td>
                                        <select class="form-control" name="department">
                                            <option value="cse" <?= ($user['department'] == 'cse')?'selected':''; ?> >Computer Science & Engineering</option>
                                            <option value="ee" <?= ($user['department'] == 'ee')?'selected':''; ?> >Electrical Engineering</option>
                                            <option value="me" <?= ($user['department'] == 'me')?'selected':''; ?> >Mechanical Engineering</option>
                                            <option value="ph" <?= ($user['department'] == 'ph')?'selected':''; ?> >Physics</option>
                                            <option value="ch" <?= ($user['department'] == 'ch')?'selected':''; ?> >Chemistry</option>
                                            <option value="ma" <?= ($user['department'] == 'ma')?'selected':''; ?> >Mathematics</option>
                                            <option value="bi" <?= ($user['department'] == 'bi')?'selected':''; ?> >Biology</option>
                                            <option value="hss" <?= ($user['department'] == 'hss')?'selected':''; ?> >HSS</option>
                                        </select>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>Medical Leaves</td>
                                    <td><?= $user['ml']; ?> <?= ($user['ml']>1?'days':'day'); ?> taken </td>  
                                </tr>
                                <tr>
                                    <td>Casual Leaves</td>
                                    <td><?= $user['cl']; ?> <?= ($user['cl']>1?'days':'day'); ?> taken </td>  
                                </tr>
                                <tr>
                                    <td>Vacation Leaves</td>
                                    <td><?= $user['vl']; ?> <?= ($user['vl']>1?'days':'day'); ?> taken </td>  
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><input class="form-control" name="password" id="password" type="text" value="<?= $user['password']; ?>" /></td>  
                                </tr>
                                <!-- <tr>
                                    <td>Retype Password</td>
                                    <td><input class="form-control" name="retypepassword" id="retypepassword" type="password" value="<?= $details['password']; ?>" /></td>  
                                </tr> -->
                                <tr>
                                    <td colspan='2'>
                                        <button type="submit" name="update" value="submit" class="btn btn-lg btn-success btn-block">Update Values</button>
                                    </td>
                                </tr>
                                <?= form_close(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endif; endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Check Approving/Disapproving authority Profile</b> <br>
                    <?= form_open(base_url('home/checkauth')); ?>                          
                    <select id="select2example2" name="rollnumber" style="width:300px">
                        <option selected value="" > -- Select User -- </option>
                        <option value="" disabled> -- HODs -- </option>
                        <?php foreach($users as $user): ?>
                            <?php if($user['role']=='hod'): ?>
                                <option value="<?= $user['rollnumber']; ?>"><?= $user['name'].', '.returndept($user['department']); ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <option value="" disabled> -- UG/PG Coordinator -- </option>
                        <?php foreach($users as $user): ?>
                            <?php if($user['role']=='ugpgcoordinator'): ?>
                                <option value="<?= $user['rollnumber']; ?>"><?= $user['name']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <option value="" disabled> -- Faculty Coordinator -- </option>
                        <?php foreach($users as $user): ?>
                            <?php if($user['role']=='facultycoordinator'): ?>
                                <option value="<?= $user['rollnumber']; ?>"><?= $user['name']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <option value="" disabled> -- Admin -- </option>
                        <?php foreach($users as $user): ?>
                            <?php if($user['role']=='admin'): ?>
                                <option value="<?= $user['rollnumber']; ?>"><?= $user['name']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn btn-primary"> Submit </button>
                    <?= form_close(); ?>
                </div>
                <?php if($this->input->get('auth')):?>
                <?php foreach($users as $user): if($user['rollnumber']==$this->input->get('auth') && ($user['role']=='hod' || $user['role']=='ugpgcoordinator' || $user['role']=='facultycoordinator' || $user['role']=='admin')): ?>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                                <?= form_open(base_url('home/updateauth')); ?>
                                <tr>
                                    <td>Name</td>
                                    <td><input class="form-control" name="name" type="text" value="<?= $user['name']; ?>" /></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td><input class="form-control" name="rollnumber" id="name" type="text" value="<?= $user['rollnumber']; ?>" readonly /></td>  
                                </tr>
                                <?php if($user['department']): ?>
                                <tr>
                                    <td>Department</td>
                                    <td><input class="form-control" name="department" id="name" type="text" value="<?= returndept($user['department']); ?>" readonly /></td> 
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <td>Password</td>
                                    <td><input class="form-control" name="password" id="password" type="text" value="<?= $user['password']; ?>" /></td>  
                                </tr>
                                <tr>
                                    <td colspan='2'>
                                        <button type="submit" name="update" value="submit" class="btn btn-lg btn-success btn-block">Update Values</button>
                                    </td>
                                </tr>
                                <?= form_close(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endif; endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-6" id="changeadmin">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Change Details
                </div>
                <div class="panel-body">
                    <div class="table table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                                <?= form_open(base_url('home/updateadmin')); ?>
                                <tr><td colspan="2"> <b><u>For Students</u></b> </td></tr>
                                <tr>
                                    <td>Maximum Medical Leave allowed</td>
                                    <td><input class="form-control" type="text" name="studentml" value="<?= $admin['studentml']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Maximum Vacation Leave allowed</td>
                                    <td><input class="form-control" type="text" name="studentvl" value="<?= $admin['studentvl']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Maximum Casual Leave allowed</td>
                                    <td><input class="form-control" type="text" name="studentcl" value="<?= $admin['studentcl']; ?>"></td>
                                </tr>
                                <tr><td colspan="2"> <b><u>For Faculties</u></b> </td></tr>
                                <tr>
                                    <td>Maximum Medical Leave allowed</td>
                                    <td><input class="form-control" type="text" name="facultyml" value="<?= $admin['facultyml']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Maximum Vacation Leave allowed</td>
                                    <td><input class="form-control" type="text" name="facultyvl" value="<?= $admin['facultyvl']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Maximum Casual Leave allowed</td>
                                    <td><input class="form-control" type="text" name="facultycl" value="<?= $admin['facultycl']; ?>"></td>
                                </tr>
                                <tr>
                                    <td colspan='2'>
                                        <button type="submit" name="update" value="submit" class="btn btn-lg btn-success btn-block">Update Values</button>
                                    </td>
                                </tr>
                                <?= form_close(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6" id="createadmin">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Create New Admin Profile
                </div>
                <div class="panel-body">
                    <div class="table table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                                <?= form_open(base_url('home/createadmin')); ?>
                                <tr>
                                    <td>Name</td>
                                    <td><input class="form-control" type="text" name="name"></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td><input class="form-control" type="text" name="username"></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><input class="form-control" id="password" type="password" name="password"></td>
                                </tr>
                                <tr>
                                    <td>Retype Password</td>
                                    <td><input class="form-control" id="retypepassword" type="password"></td>
                                </tr>
                                <tr>
                                    <td colspan='2'>
                                        <button type="submit" onclick="checkpwd();" name="update" value="submit" class="btn btn-lg btn-success btn-block">Update Values</button>
                                    </td>
                                </tr>
                                <?= form_close(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>             
    </div>
</div>
<!-- end page-wrapper -->
<!--  page-wrapper -->
<div id="page-wrapper">

    <div class="row" id="dashboard">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!--End Page Header -->
    </div>

    <div class="row">
        <div class="col-lg-6">
            <!-- Form Elements -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Send a leave request
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?= form_open(base_url('request'), array('role'=>'form')); ?>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" name="name" id="name" type="text" value="<?= $details['name']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="rollnumber">Roll Number</label>
                                <input class="form-control" name="rollnumber" id="rollnumber" type="text" value="<?= $details['rollnumber']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="department">Department</label>
                                <input class="form-control" name="department" id="department" type="text" value="<?= $details['department']; ?>" readonly >
                            </div>
                            <div class="form-group">
                                <label>Type of leave</label>
                                <select class="form-control" name="typeofleave">
                                    <option selected value="">--Select--</option>
                                    <option value="ml" >Medical Leave</option>
                                    <option value="cl" >Casual Leave</option>
                                    <option value="vl" >Vacation Leave</option>
                                </select>
                            </div>
                            <input type="hidden" name="role" value="<?= $details['role']; ?>" />
                            <div class="form-group">
                                <label>Number of days of leave</label>
                                <input class="form-control" name="daysofleave">
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>
                            <div class="form-group input-group input-append date" id="dp1" data-date="<?= date('d-m-o'); ?>" data-date-format="dd-mm-yyyy">
                                <span class="input-group-addon"><b>Leave From</b></span>
                                <input class="form-control" name="leavefrom" type="text" value="<?= date('d-m-o'); ?>">
                                <span class="input-group-addon add-on" style="cursor:pointer"><i class="fa fa-calendar"></i></span>
                            </div>
                            <div class="form-group input-group input-append date" id="dp2" data-date="<?= date('d-m-o'); ?>" data-date-format="dd-mm-yyyy">
                                <span class="input-group-addon"><b>Leave To</b></span>
                                <input class="form-control" name="leaveto" type="text" value="<?= date('d-m-o'); ?>">
                                <span class="input-group-addon add-on" style="cursor:pointer"><i class="fa fa-calendar"></i></span>
                            </div>
                            <button type="submit" name="request-submit" value="submit" class="btn btn-lg btn-success btn-block">Submit Request</button>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
             <!-- End Form Elements -->
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-12">
                     <!--    Hover Rows  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Status
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <tbody>
                                        <?= form_open(base_url('home/update')); ?>
                                        <tr>
                                            <td>Name</td>
                                            <td><input class="form-control" name="name" type="text" value="<?= $details['name']; ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td>Roll Number</td>
                                            <td><input class="form-control" name="rollnumber" id="name" type="text" value="<?= $details['rollnumber']; ?>" readonly /></td>  
                                        </tr>
                                        <tr>
                                            <td>Department</td>
                                            <td>
                                                <select class="form-control" name="department">
                                                    <option value="cse" <?= ($details['department'] == 'cse')?'selected':''; ?> >Computer Science & Engineering</option>
                                                    <option value="ee" <?= ($details['department'] == 'ee')?'selected':''; ?> >Electrical Engineering</option>
                                                    <option value="me" <?= ($details['department'] == 'me')?'selected':''; ?> >Mechanical Engineering</option>
                                                    <option value="ph" <?= ($details['department'] == 'ph')?'selected':''; ?> >Physics</option>
                                                    <option value="ch" <?= ($details['department'] == 'ch')?'selected':''; ?> >Chemistry</option>
                                                    <option value="ma" <?= ($details['department'] == 'ma')?'selected':''; ?> >Mathematics</option>
                                                    <option value="bi" <?= ($details['department'] == 'bi')?'selected':''; ?> >Biology</option>
                                                    <option value="hss" <?= ($details['department'] == 'hss')?'selected':''; ?> >HSS</option>
                                                </select>
                                            </td> 
                                        </tr>
                                        <tr>
                                            <td>Medical Leaves</td>
                                            <td><?= $details['ml']; ?> <?= ($details['ml']>1?'days':'day'); ?> taken, <b><?= $leavedetails['studentml']-$details['ml']; ?> <?= ($leavedetails['studentml']-$details['ml']>1?'days':'day'); ?> left</b></td>  
                                        </tr>
                                        <tr>
                                            <td>Casual Leaves</td>
                                            <td><?= $details['cl']; ?> <?= ($details['cl']>1?'days':'day'); ?> taken, <b><?= $leavedetails['studentcl']-$details['cl']; ?> <?= ($leavedetails['studentcl']-$details['cl']>1?'days':'day'); ?> left</b></td>  
                                        </tr>
                                        <tr>
                                            <td>Vacation Leaves</td>
                                            <td><?= $details['vl']; ?> <?= ($details['vl']>1?'days':'day'); ?> taken, <b><?= $leavedetails['studentvl']-$details['vl']; ?> <?= ($leavedetails['studentvl']-$details['vl']>1?'days':'day'); ?> left</b></td>  
                                        </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td><input class="form-control" name="password" id="password" type="password" value="<?= $details['password']; ?>" /></td>  
                                        </tr>
                                        <tr>
                                            <td>Retype Password</td>
                                            <td><input class="form-control" name="retypepassword" id="retypepassword" type="password" value="<?= $details['password']; ?>" /></td>  
                                        </tr>
                                        <tr>
                                            <td colspan='2'>
                                                <button type="submit" onclick="checkmatch();" name="update" value="submit" class="btn btn-lg btn-success btn-block">Update Values</button>
                                            </td>
                                        </tr>
                                        <?= form_close(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End  Hover Rows  -->
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12" id="pending">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pending Requests
                        </div>
                        <?php if(@$pending): ?>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Type</th>
                                            <th>Days</th>
                                            <th>Dates</th>
                                            <th>HOD approved</th>
                                            <th>Coordinator approved</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pending as $value): ?>
                                            <tr>
                                                <td><?= $value['id']; ?></td>
                                                <td><?= changetype($value['typeofleave']); ?></td>
                                                <td><?= $value['daysofleave']; ?></td>
                                                <td><?php if($value['leavefrom']==$value['leaveto']): echo changedate($value['leavefrom']); ?>
                                                    <?php else: ?>
                                                    <?= changedate($value['leavefrom']); ?> - <?= changedate($value['leaveto']); ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= $value['hodapproved']; ?></td>
                                                <td><?= $value['coordinatorapproved']; ?></td>
                                                <td><button type="button" onclick="cancel('<?= $value['id']; ?>');" class="btn btn-danger">Cancel Request</button></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12" id="approved">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Approved Requests
                </div>
                <?php if(@$approved): ?>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Type</th>
                                    <th>Days</th>
                                    <th>Dates</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php foreach ($approved as $value): ?>
                                    <tr>
                                        <td><?= $value['id']; ?></td>
                                        <td><?= changetype($value['typeofleave']); ?></td>
                                        <td><?= $value['daysofleave']; ?></td>
                                        <td>
                                            <?php if($value['leavefrom']==$value['leaveto']): echo changedate($value['leavefrom']); ?>
                                            <?php else: ?>
                                            <?= changedate($value['leavefrom']); ?> - <?= changedate($value['leaveto']); ?>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- end page-wrapper -->
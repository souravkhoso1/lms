<!--  page-wrapper -->
<div id="page-wrapper">

    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12" id="dashboard">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!--End Page Header -->
    </div>

    <div class="row">
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
                                            <th>Approve</th>
                                            <th>Disapprove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pending as $value): ?>
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
                                                <td><button id="approve<?= $value['id']; ?>" onclick="approve('<?= $value['id']; ?>', '<?= $details['role']; ?>');" type="button" class="btn btn-success btn-circle"><i class="fa fa-check"></i></button></td>
                                                <td><button id="disapprove<?= $value['id']; ?>" onclick="disapprove('<?= $value['id']; ?>', '<?= $details['role']; ?>');" type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button></td>
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
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12" id="Approved">
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
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Profile details
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                                <?= form_open(base_url('home/updateauth')); ?>
                                <tr>
                                    <td>Name</td>
                                    <td><input class="form-control" name="name" type="text" value="<?= $details['name']; ?>" /></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td><input class="form-control" name="rollnumber" id="name" type="text" value="<?= $details['rollnumber']; ?>" readonly /></td>  
                                </tr>
                                <tr>
                                    <td>Department</td>
                                    <td><input class="form-control" name="department" id="name" type="text" value="<?= returndept($details['department']); ?>" readonly /></td> 
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><input class="form-control" name="password" id="password" type="password" value="<?= $details['password']; ?>" /></td>  
                                </tr>
                                <tr>
                                    <td>Retype Password</td>
                                    <td><input class="form-control" name="retypepassword" id="password" type="password" value="<?= $details['password']; ?>" /></td>  
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
    </div>
</div>
<!-- end page-wrapper -->
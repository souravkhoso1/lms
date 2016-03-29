<?php 
    function changetype($input){
        if($input=='ml') return 'Medical Leave';
        if($input=='vl') return 'Vacation Leave';
        if($input=='cl') return 'Casual Leave';
    }

    function changedate($date){
        $newdate = explode('-', $date);
        $str = $newdate[0];
        switch($newdate[1]){
            case '01': $str = $str.' Jan'; break;
            case '02': $str = $str.' Feb'; break;
            case '03': $str = $str.' Mar'; break;
            case '04': $str = $str.' Apr'; break;
            case '05': $str = $str.' May'; break;
            case '06': $str = $str.' Jun'; break;
            case '07': $str = $str.' Jul'; break;
            case '08': $str = $str.' Aug'; break;
            case '09': $str = $str.' Sep'; break;
            case '10': $str = $str.' Oct'; break;
            case '11': $str = $str.' Nov'; break;
            case '12': $str = $str.' Dec'; break;
            default: break;
        }
        $str = $str.', '.$newdate[2];
        return $str;
    }

    function returndept($code){
        if($code=='cse') return 'Computer Science & Engineering';
        if($code=='ee') return 'Electrical Engineering';
        if($code=='me') return 'Mechanical Engineering';
        if($code=='ph') return 'Physics';
        if($code=='ch') return 'Chemistry';
        if($code=='ma') return 'Mathematics';
        if($code=='bi') return 'Biology';
        if($code=='hss') return 'Humanities & Social Sciences';
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $details['name'].', '.$role; ?> || LMS</title>
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

<body style="background-color: rgb(83, 163, 163)">
    <!--  wrapper -->
    <div class="navbar-fixed-top">
        <!-- navbar top -->
        <nav class="navbar navbar-default" role="navigation" id="navbar" style="margin-bottom:0px;border-radius:0px">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url('home'); ?>">
                    <img src="<?= base_url('assets/img/lms.png'); ?>" alt="LMS" />
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
                <li class="tooltip-demo">
                    <a href="<?= base_url('logout'); ?>"><i class="fa fa-sign-out fa-3x" data-toggle="tooltip" data-placement="bottom" title="Logout"></i></a>
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation" >
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section" style="margin-top:0px;border-top:1px solid #84B899">
                            <!-- <div class="user-section-inner">
                                <img src="assets/img/user.jpg" alt="">
                            </div> -->
                            <div class="user-info">
                                <div><?= $details['name']; ?></div>
                                <!-- <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div> -->
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="" id="dashboardvisible">
                        <a href="" onclick="goto('dashboard');return false;" ><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>
                    <li class="" id="pendingvisible">
                        <a href="" onclick="goto('pending');return false;"><i class="fa fa-dashboard fa-fw"></i>Pending Requests</a>
                    </li>
                    <li class="" id="approvedvisible">
                        <a href="" onclick="goto('approved');return false;"><i class="fa fa-dashboard fa-fw"></i>Approved Requests</a>
                    </li>
                    <li class="" id="changeadminvisible">
                        <a href="" onclick="goto('changeadmin');return false;"><i class="fa fa-dashboard fa-fw"></i>Change Details</a>
                    </li>
                    <li class="" id="createadminvisible">
                        <a href="" onclick="goto('createadmin');return false;"><i class="fa fa-dashboard fa-fw"></i>Create Admin</a>
                    </li>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        

    </div>
    <!-- end wrapper -->
    <br><br><br>
    <?php if($details['role']=='student') require_once 'student.php'; ?>
    <?php if($details['role']=='faculty') require_once 'faculty.php'; ?>
    <?php if($details['role']=='hod') require_once 'hod.php'; ?>
    <?php if($details['role']=='ugpgcoordinator') require_once 'ugpgcoordinator.php'; ?>
    <?php if($details['role']=='facultycoordinator') require_once 'facultycoordinator.php'; ?>
    <?php if($details['role']=='admin') require_once 'admin.php'; ?>

    <!-- Core Scripts - Include with every page -->
    <script src="<?= base_url('assets/plugins/jquery-1.10.2.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/metisMenu/jquery.metisMenu.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/pace/pace.js'); ?>"></script>
    <script src="<?= base_url('assets/scripts/siminta.js'); ?>"></script>
    <script src="<?= base_url('assets/scripts/datepicker.js'); ?>"></script>
    <script src="<?= base_url('assets/scripts/select2.min.js'); ?>"></script>

    <script type="text/javascript">
        function cancel(applid){
            $.ajax({
                url: "<?= base_url('home/cancelrequest'); ?>",
                type: "POST",
                data:  {id: applid},
                success: function(data){
                    if(data=='success'){
                        alert('Request Cancelled.');
                        location.reload(true);
                    } else {
                        alert(data);
                    }
                },
                error: function(){
                   alert("Error!");
                }             
            });
        }

        function approve(applid, rolename){
            $.ajax({
                url: "<?= base_url('home/approve'); ?>",
                type: "POST",
                data:  {id: applid, role: rolename},
                success: function(data){
                    if(data=='success'){
                        alert('Request Approved.');
                        location.reload(true);
                    } else {
                        alert(data);
                    }
                },
                error: function(){
                   alert("Error!");
                }             
            });
        }

        function disapprove(applid, rolename){
            $.ajax({
                url: "<?= base_url('home/disapprove'); ?>",
                type: "POST",
                data:  {id: applid, role: rolename},
                success: function(data){
                    if(data=='success'){
                        alert('Request Disapproved.');
                        location.reload(true);
                    } else {
                        alert(data);
                    }
                },
                error: function(){
                   alert("Error!");
                }             
            });
        }

        function goto(id){
            $('html,body').animate({scrollTop:
                $("#"+id).offset().top},'slow');
        }

        $('#dp1').datepicker();
        $('#dp2').datepicker();

        $('#select2example').select2();
        $('#select2example2').select2();

        $(document).ready(function(e){
            if(document.getElementById('dashboard') == undefined){
                document.getElementById('dashboardvisible').style.display="none";
            }
            if(document.getElementById('pending') == undefined){
                document.getElementById('pendingvisible').style.display="none";
            }
            if(document.getElementById('approved') == undefined){
                document.getElementById('approvedvisible').style.display="none";
            }
            if(document.getElementById('createadmin') == undefined){
                document.getElementById('createadminvisible').style.display="none";
            }
            if(document.getElementById('changeadmin') == undefined){
                document.getElementById('changeadminvisible').style.display="none";
            }
            if(document.getElementById('checkuser') == undefined){
                document.getElementById('checkuservisible').style.display="none";
            }
        });

        function hideshow(elem){
            if(elem.value == 'hod'){
                document.getElementById('tohideshow').style.display="";
            } else {
                document.getElementById('tohideshow').style.display="none";
            }
        }

        function resetdata(){
            var r = confirm('You are going to reset all data. Are you sure?');
            if(r == true){
                $.ajax({
                    url: "<?= base_url('home/resetdata'); ?>",
                    type: "POST",
                    data:  {role: "<?= $details['role']; ?>"},
                    success: function(data){
                        if(data=='success'){
                            alert('Data was reset!!');
                        } else {
                            alert(data);
                        }
                    },
                    error: function(){
                       alert("Error!");
                    }             
                });
            } else {
                // do nothing                
            }
        }

        function sendmail(){
            var r = confirm('You are going to send mail. Are you sure?');
            if(r == true){
                $.ajax({
                    url: "<?= base_url('home/sendmail'); ?>",
                    type: "POST",
                    data:  {role: "<?= $details['role']; ?>"},
                    success: function(data){
                        if(data=='success'){
                            alert('Mail sent!!');
                        } else {
                            alert(data);
                        }
                    },
                    error: function(){
                       alert("Error!");
                    }             
                });
            } else {
                // do nothing                
            }
        }

        function checkpwd(event){
            if(document.getElementById('password').value != document.getElementById('repassword').value){
                event.preventDefault();
                alert('Passwords don\'t match');
            } else {
                
            }
        }


    </script>

    <script type="text/javascript">
        <?php if($this->session->userdata('error_home')): ?>
            alert("<?= $this->session->userdata('error_home'); ?>");
            <?php $this->session->unset_userdata('error_home'); ?>
        <?php endif; ?>
    </script>

</body>

</html>

<html>
<head><title>Login Page</title></head>
<body>
	<?= form_open(base_url('login'), array('role'=>'form')); ?>
		Username: <input type="text" name="username"> 
		Password: <input type="password" name="password"> 
		Role: <select name="role">
		<option value="" selected> -- Select Role -- </option>
		<option value="student"> Student </option>
		<option value="faculty"> Faculty </option>
		<option value="hod"> HOD </option>
		<option value="ugpgcoordinator"> UG/PG Coordinator </option>
		<option value="admin"> Admin </option>
		</select>
		<input type="submit" name="submit" value="Login" />
	<?= form_close(); ?>
</body>
</html>
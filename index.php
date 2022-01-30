<?php

	include_once './db.php'; //подключение файла connect BD

?>




<!DOCTYPE html>
<html lang="en">
<head>
	<title>Test</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #999999;">
	
	<div class="limiter">
		<div class="container-login100">

			<div class="login100-more" style="">


					<!--создание и вывод из БД данных -->

				<?php

					$users = getUsersList();

					if(!empty($users))
					{

						echo '
							<table>
								<tr>
									<td class="tdId" style="width:100px"><strong>ID</strong></td>
									<td class="tdFirstName" style="width:100px"><strong>firstName</strong></td>
									<td class="tdLastName" style="width:100px"><strong>lastName</strong></td>
									<td class="tdBirthday" style="width:150px"><strong>birthday</strong></td>
									<td class="sex" style="width:100px"><strong>sex</strong></td>
									<td class="tdTown" style="width:100px"><strong>age</strong></td>
									<td class="tdTown" style="width:100px"><strong>town</strong></td>
								</tr>
							</table>
						';

					foreach($users as $user)
					{
	
						echo '
							<table>					
								<tr>
									<td class="tdId" style="width:100px">'.$user['id'].'</td>
									<td class="tdFirstName" style="width:100px">'.$user['firstName'].'</td>
									<td class="tdLastName" style="width:100px">'.$user['lastName'].'</td>
									<td class="tdBirthday" style="width:150px">'.$user['birthday'].'</td>
									<td class="sex" style="width:100px">'; echo ($user['sex'] == bindec(0) ?  'women' :  'man'); echo '</td>
									<td class="tdTown" style="width:100px">'.$user['age'].'</td>
									<td class="tdTown" style="width:100px">'.$user['town'].'</td>
								</tr>			
							</table>
						'; 
				
					}
					}	
				?>

					<!-- Форма изменения данных -->
						<div>
							<br>
							<hr>
							<label>Изменить данные: </label>
							<br>
							<form action="updateUsers.php" method="POST">

									<label>Укажите ID </label>

									<input type="text" class="inputId" name="inputId">

									<label>Новое значение sex</label>

									<input type="text" class="inputSex" name="inputSex" placeholder="Женский или мужской">

									<label>Новое значение birthday</label>

									<input class="" type="date" name="inputBirthday">

									<br>

									<button type="submit" class="btn btn-outline-primary" name="submit">Обновить</button>
							</form>
							<hr>


							<!-- Форма удаления данных -->
							<label>Удалить данные: </label>
							<form action="deleteUsers.php" method="POST">

									<label>Укажите ID </label>

									<input type="text" class="deleteId" name="deleteId">

									<br>

									<button type="submit" class="btn btn-outline-primary" name="submit">Удалить</button>
							</form>

						</div>






			</div>

		

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				
				<form class="login100-form validate-form" action="addUsers.php" method="POST">
					<span class="login100-form-title p-b-59">
						Добавить в SQL
					</span>

					<div class="wrap-input100 validate-input" data-validate="firstName is required">
						<span class="label-input100">first Name</span>
						<input class="input100" type="text" name="firstName" placeholder="firstName...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "lastName is required">
						<span class="label-input100">lastName</span>
						<input class="input100" type="text" name="lastName" placeholder="lastName...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="birthday is required">
						<span class="label-input100">birthday</span>
						<input class="input100" type="date" name="birthday" placeholder="birthday...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "sex is required">
						<span class="label-input100">Sex</span>
						<p>
							<select size="2" multiple name="sex[]">
    							<option >Мужской</option>
    							<option >Женский</option>  
   							</select>
						</p>

						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "town is required">
						<span class="label-input100">Город проживания</span>
						<input class="input100" type="text" name="town" placeholder="Город">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="submit">
								Добавить
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<!-- <script src="js/main.js"></script> -->

</body>
</html> 
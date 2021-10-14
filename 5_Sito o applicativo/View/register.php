<!DOCTYE html>
<html>

<head>
	<title>InventarioHW-register</title> <!--come titolo usare il nome del file-->
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dennis Donofrio I3BC">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="i1cdonden_fav.ico" type"image/x-icon">
	<link rel="icon" href="i1cdonden_fav.ico" type="image/x-icon">
	<!-- chrome e windows 10-->
	<!-- data creazione: 14.10.2021 data ultima modifica: 14.10.2021-->



</head>
<body>

	<form method="POST">
		<h1>Register</h1>
	<table>
		<tr>
			<td>
				<label>Admin: </label>
			</td>
			<td>
				<input type="checkbox" name="is_admin">
			</td>
		</tr>
		<tr>
			<td>
				<label>Name: </label>
			</td>
			<td>
				<input type="text" name="name">
			</td>
		</tr>
		<tr>
			<td>
				<label>Surname: </label>
			</td>
			<td>
				<input type="text" name="surname">
			</td>
		</tr>
		<tr>
			<td>
				<label>Email: </label>
			</td>
			<td>
				<input type="email" name="email">
			</td>
		</tr>
		<tr>
			<td>
				<label>Password: </label>
			</td>
			<td>
				<input type="password" name="pass1">
			</td>
		</tr>
		<tr>
			<td>
				<label>Repeat password: </label>
			</td>
			<td>
				<input type="password" name="pass2">
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" value="Register" name="register">
			</td>
		</tr>
	</table>
	</form>

</body>
</html>
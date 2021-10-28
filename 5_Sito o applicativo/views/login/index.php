<form method="POST" action="<?php echo URL; ?>login/login">
<h1>Login</h1>
<table>
	<tr>
		<td>
			<label>Username:</label>
		</td>
		<td>
			<input type="text" name="username">
		</td>
	</tr>
	<tr>
		<td>
			<label>Password:</label>
		</td>
		<td>
			<input type="password" name="password">
		</td>
	</tr>
</table>
<input type="submit" value="Login" name="submit">
</form>
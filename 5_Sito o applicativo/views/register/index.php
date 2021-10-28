<form method="POST" action="<?php echo URL; ?>register/register">
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
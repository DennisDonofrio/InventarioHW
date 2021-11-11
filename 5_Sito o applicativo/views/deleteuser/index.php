<form method='POST' action='<?php echo URL; ?>deleteuser/deleteuser'>
    <table>
        <tr>
            <td>
                <label>Username:</label>
            </td>
            <td>
                <select name='username'>
                    <?php for($i = 0; $i < count($this->users) - 1; $i++) : ?>
                        <option value='<?php echo $this->users[$i]['username']; ?>'><?php echo $this->users[$i]['username']; ?></option>
                        <?php endfor; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label>Check username:</label>
            </td>
            <td>
                <input type='text' name='checkUsername'>
            </td>
        </tr>
        <tr>
            <td>
                <input type='submit' value='Elimina'>
            </td>
        </tr>
    </table>
</form>
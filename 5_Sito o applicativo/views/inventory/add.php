<form method='POST' action='<?php echo URL; ?>inventory/add'>
<h1>Add</h1>
<table>
    <tr>
        <td>
            <label>Description: </label>
        </td>
        <td>
            <input type="text" name="description">
        </td>
    </tr>
    <tr>
        <td>
            <label>Serial number: </label>
        </td>
        <td>
            <input type="text" name="serial_number">
        </td>
    </tr>
    <tr>
        <td>
            <label>Classroom: </label>
        </td>
        <td>
            <select name='class'>
                <?php for($i = 0; $i < count($this->classroom) - 1; $i++) : ?>
                    <option value='<?php echo $this->classroom[$i]['number']; ?>'><?php echo $this->classroom[$i]['number']; ?> - <?php echo $this->classroom[$i]['description']; ?></option>
                <?php endfor; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>
            <label>Type: </label>
        </td>
        <td>
            <select name='type'>
                <?php for($i = 0; $i < count($this->types) - 1; $i++) : ?>
                    <option value='<?php echo $this->types[$i]['id']; ?>'><?php echo $this->types[$i]['id']; ?> - <?php echo $this->types[$i]['name']; ?></option>
                <?php endfor; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>
            <input type="submit" value="Add" name="add">
        </td>
    </tr>
</table>
<?php echo (isset($this->error) ? $this->error : ""); ?>
</form>
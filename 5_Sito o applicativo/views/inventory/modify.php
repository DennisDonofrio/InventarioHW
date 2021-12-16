<h2>Modify object</h2>
<form method='POST' action='<?php echo URL; ?>inventory/modify/<?php echo $this->object[0]['id']; ?>'>
    <label>Class: </label>
    <select name='class'>
        <?php for($i = 0; $i < count($this->classroom) - 1; $i++) : ?>
            <option value='<?php echo $this->classroom[$i]['number']; ?>' <?php echo ($this->classroom[$i]['number'] == $this->object[0]['classroom_number'] ? 'selected' : ""); ?>><?php echo $this->classroom[$i]['number']; ?> - <?php echo $this->classroom[$i]['description']; ?></option>
        <?php endfor; ?>
    </select>
    <br>
    <label>Reserved:</label>
    <input type="checkbox" name="reserved" <?php echo (isset($this->object[0]['user_id']) ? 'checked' : ""); ?>>
    <br>
    <input type="submit" name="Modify" value="Modify"><br>
    <?php echo (isset($this->error) ? $this->error : ""); ?>
</form>
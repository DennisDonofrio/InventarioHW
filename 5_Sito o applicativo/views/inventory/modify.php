<h2>Modify object</h2>
<form method='POST' action='<?php echo URL; ?>inventory/modify/<?php echo $this->id; ?>'>
    <label>Class: </label>
    <input type="number" name="class"><br>
    <input type="submit" name="Modify" value="Modify"><br>
    <?php echo (isset($this->error) ? $this->error : ""); ?>
</form>
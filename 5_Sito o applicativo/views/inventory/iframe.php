<link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css"/>
<div id="content">
<?php //var_dump($this->objects); ?>
<?php if(isset($this->objects) && count($this->objects) > 0 && isset($this->objects[0])) : ?>
<?php $keys = array('id', 'description', 'serial_number', 'riservation_data', 'classroom_number'); ?>
    <table class="inventario">
    <tr>
        <th style="width: 30px;" class="inventario">Id</th>
        <th style="width: 150px;" class="inventario">Description</th>
        <th style="width: 150px;" class="inventario">Serial number</th>
        <th class="inventario">Riservation data</th>
        <th class="inventario">Class</th>
        <?php if(!$this->archive) : ?>
            <th class="inventario">Actions</th>
        <?php endif; ?>
    <?php for($i = 0; $i < count($this->objects) - 1; $i++) : ?>
    <tr>
        <?php for ($j=0; $j < count($keys); $j++) : ?>
            <td class="inventario">
                <?php echo $this->objects[$i][$keys[$j]]; ?>
            </td>
        <?php endfor; ?>
        <?php if(!$this->archive) : ?>
        <td class="inventario">
            <form method='POST' action='<?php echo URL; ?>inventory/action/<?php echo $this->objects[$i]['id']; ?>'>
                <input type="submit" name="button" value="Modify">
                <input type="submit" name="button" value="Delete">
            </form>
        </td>
        <?php endif; ?>
    </tr>
    <?php endfor; ?>
</table>
<?php else : ?>
    <b>tipo non ancora popolato</b>
<?php endif; ?>
</div>
<?php if(!empty($this->object)) : ?>
<table>
    <?php for($i = 0; $i < count($this->objects) - 1; $i++) : ?>
    <tr>
        <td>
            <?php echo $this->objects[$i]['description']; ?>
        </td>
    </tr>
    <?php endfor; ?>
</table>
<?php else : ?>
    tipo non ancora popolato
<?php endif; ?>
<div width="10%" style="float:left;">
    <table style="text-align:left;">
        <?php for($i = 0; $i < count($this->types) - 1; $i++) : ?>
        <tr>
            <td>
                <a href="<?php echo URL; ?>inventory/getPage/<?php echo $this->types[$i]['id']; ?>"><?php echo $this->types[$i]['name']; ?></a>
            </td>
        </tr>
        <?php endfor; ?>
        <tr>
            <td>
                <a href="<?php echo URL; ?>inventory/getPage/-1">Archvio</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="<?php echo URL; ?>inventory/action/0">Add</a>
            </td>
        </tr>
    </table>
</div>

<div style="text-align:right;" width="80%">
    <iframe src="<?php echo URL; ?>iframe/getObject/<?php echo $this->link; ?>" width="80%" height="300" style="border:1px solid black;">
    </iframe>
</div>

<form method="post" action="<?php echo URL; ?>home/action">
    <button type="submit" name='inventariohw'>Inventario HW</button>
    <?php if($_SESSION['isAdmin']) : ?>
        <button type="submit" name='gestioneutenti'>Gestione Utenti</button>
    <?php endif; ?>
</form>
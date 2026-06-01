<?php

session_start();

?>

<div>
    <?php foreach($_SESSION["carrinho"] as $item): ?>
    
        <h3>
            <?php echo $item['nome'] ?>
        </h3>
    
    <?php endforeach; ?>
</div>
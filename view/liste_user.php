
<h1>Liste des users</h1>

<?php
    foreach($users as $user)
    {
?>

<div class="news">
    <p>
        <?php echo '#'.$user['id']; ?>
        <?php echo $user['nom']; ?>
        <?php echo $user['pass']; ?>
        <?php if($user['level']==1) echo '(admin)' ?>
    </p>    
</div>

<?php
    }
?>


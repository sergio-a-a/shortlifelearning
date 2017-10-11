<?php

$this->assign('title', 'Nous Contacter');
?>

<h1>Nous Contacter</h1>

<?php foreach ($users as $user): ?>
<br>
<?= h($user->Nom) ?>
<br>
<?= h($user->email) ?>
<br>

 <?php endforeach; ?>
<?php
echo $this->Html->charset();
echo $this->Html->css([
    'Bootstrap/Cyborg/bootstrap.min.css',
    'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'
]);

echo $this->Html->script([
    'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js',
    'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
    'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js']
    ,['block' =>'scriptLibraries']
);

?>
<title><?= __('Car rental') ?></title>

<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    
    <?php
    echo $this->Html->charset();
    echo $this->Html->css(['base.css',
        'cake.css',
        'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css']
    );

    echo $this->Html->script([
        'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js',
        'https://code.jquery.com/ui/1.12.1/jquery-ui.js']
        ,['block' =>'scriptLibraries']
    );
    ?>
    
    
    <?= $this->Html->meta('icon') ?>
        <?= $this->fetch('meta') ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                
                <?php
                    
                    echo "<li>".$this->Html->link('Nous contacter', ['controller' => 'contact', 'action' => 'index'])."</li>";
                
                    $loguser = $this->request->session()->read('Auth.User');
                    if ($loguser) {
                        $user = $loguser['email'];
                                                echo '<li>'.$this->Html->link('Employes', ['controller' => 'Employes', 'action' => 'index']).'</li>';
						echo '<li>'.$this->Html->link('Users', ['controller' => 'Users', 'action' => 'index']).'</li>';
                                                echo '<li>'.$this->Html->link('Formations', ['controller' => 'Formations', 'action' => 'index']).'</li>';
                                                
                                                echo '<li>'.$this->Html->link('Employe-Formations', ['controller' => 'employes-formations', 'action' => 'index']).'</li>';
                                                echo '<li>'.$this->Html->link('Formations', ['controller' => 'Formations', 'action' => 'index']).'</li>';
                        echo '<li>'.$this->Html->link($user . ' logout', ['controller' => 'Users', 'action' => 'logout']).'</li>';
			if ($loguser['role_id'] == 1){
                            echo '<li>'.$this->Html->link('Administration', ['controller' => 'Administration', 'action' => 'index']).'</li>';
                        }	
                    } else {
                        echo "<li>".$this->Html->link('login', ['controller' => 'Users', 'action' => 'login'])."</li>";
                    } 
                    
                ?>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
        
        <?= $this->fetch('css') ?>
        <?= $this->fetch('scriptLibraries') ?>
        <?= $this->fetch('script'); ?>
        <?= $this->fetch('scriptBottom') ?> 

    </footer>
</body>
</html>

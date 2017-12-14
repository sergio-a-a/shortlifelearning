<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Car rental</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown"> 
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?= __('Language') ?>
                        <span class="caret"></span>
                    </button>
                        <ul class="dropdown-menu">
                            <li><?= $this->Html->link('Francais', ['action' => 'changeLang', 'fr_CA'], ['escape' => false]) ?></li>
                            <li><?= $this->Html->link('English', ['action' => 'changeLang', 'en_US'], ['escape' => false]) ?></li>
                            <li><?= $this->Html->link('Español', ['action' => 'changeLang', 'es_US'], ['escape' => false]) ?></li>
                        </ul>
                </li>
                <li><?= $this->Html->link(__('Booking'), ['controller' => 'booking', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Vehicules'), ['controller' => 'vehicules', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Users'), ['controller' => 'users', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Files'), ['controller' => 'files', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Model'), ['controller' => 'models', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Features'), ['controller' => 'features', 'action' => 'index']) ?></li>
                <li> 
                    <?php
                        $loguser = $this->request->session()->read('Auth.User');
                        if ($loguser) {
                            $user = $loguser['email'];
                            echo '<li>'.$this->Html->link($user, ['controller' => 'Users', 'action' => 'view', $loguser['id']]).'</li>';
                            echo '<li>'.$this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout']).'</li>';
                        } else {
                            echo "<li>".$this->Html->link('login', ['controller' => 'Users', 'action' => 'login'])."</li>";
                            echo '<li>'.$this->Html->link('New', ['controller' => 'Users', 'action' => 'add']).'</li>';
                        } 
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>

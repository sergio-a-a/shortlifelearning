<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employe $employe
 */
use Cake\I18n\Time;
?>
<div class="employes view content">
    <h3>Plan de Formation</h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __("Numéro de l'employé : ") ?></th>
            <td><?= h($employe->numero) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __("Nom de l'employé : ") ?></th>
            <td><?= h($employe->nom) . ' ' . h($employe->prenom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nom du superviseur : ') ?></th>
            <td><?= h($employe->superviseur->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Immeuble') ?></th>
            <td><?= $employe->has('immeuble') ? h($employe->immeuble->address) : '' ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Formations') ?></h4>
        <?php if (!empty($employe->formations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Titre') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Fréquence') ?></th>
                <th scope="col"><?= __('Faite le') ?></th>
                <th scope="col"><?= __('Prévue le') ?></th>
                <th scope="col"><?= __('Expirée') ?></th>
                <th scope="col"><?= __('À venir') ?></th>
                <th scope="col"><?= __('À faire') ?></th>
                <th scope="col"><?= __('Jamais faite') ?></th>
                
            </tr>
            <?php foreach ($employe->formations as $formations): ?>
            
            <?php
                
                $currentDate = new DateTime("now");
                $done = new DateTime($formations->_joinData->done);
                
            ?>
            
            
            <tr>
                <td><?= h($formations->Titre) ?></td>
                <td><?= h($formations->status->status) ?></td>
                <td><?= h($formations->frequence->nom) ?></td>
                <td><?= h($formations->_joinData->done) ?></td>
                <td><?php
                //Prévue le
                $prevue = $done;
                    if($formations->frequence->nom == 'une seule fois' && $formations->_joinData->done != null){
                        echo '';
                    }else if($formations->frequence->nom == '1 semaine' && $formations->_joinData->done != null){
                        date_add($prevue, date_interval_create_from_date_string('7 days'));
                        echo date_format($prevue, 'Y-m-d');
                    }else if($formations->frequence->nom == '1 mois' && $formations->_joinData->done != null){
                        date_add($prevue, date_interval_create_from_date_string('1 months'));
                        echo date_format($prevue, 'Y-m-d');
                    }else if($formations->frequence->nom == '3 mois' && $formations->_joinData->done != null){
                        date_add($prevue, date_interval_create_from_date_string('3 months'));
                        echo date_format($prevue, 'Y-m-d');
                    }else if($formations->frequence->nom == '6 mois' && $formations->_joinData->done != null){
                        date_add($prevue, date_interval_create_from_date_string('6 months'));
                        echo date_format($prevue, 'Y-m-d');
                    }else if($formations->frequence->nom == '18 mois' && $formations->_joinData->done != null){
                        date_add($prevue, date_interval_create_from_date_string('18 months'));
                        echo date_format($prevue, 'Y-m-d');
                    }else if($formations->frequence->nom == '1 an' && $formations->_joinData->done != null){
                        date_add($prevue, date_interval_create_from_date_string('1 years'));
                        echo date_format($prevue, 'Y-m-d');
                    }else if($formations->frequence->nom == '2 ans' && $formations->_joinData->done != null){
                        date_add($prevue, date_interval_create_from_date_string('2 years'));
                        echo date_format($prevue, 'Y-m-d');
                    }else if($formations->frequence->nom == '3 ans' && $formations->_joinData->done != null){
                        date_add($prevue, date_interval_create_from_date_string('3 years'));
                        echo date_format($prevue, 'Y-m-d');
                    }else if($formations->frequence->nom == '4 ans' && $formations->_joinData->done != null){
                        date_add($prevue, date_interval_create_from_date_string('4 years'));
                        echo date_format($prevue, 'Y-m-d');
                    }else if($formations->frequence->nom == '5 an' && $formations->_joinData->done != null){
                        date_add($prevue, date_interval_create_from_date_string('5 years'));
                        echo date_format($prevue, 'Y-m-d');
                    }
                    
                ?></td>
                <td><?php // Expirée

                    $diff = date_diff($currentDate, $prevue);
                    if( $currentDate > $prevue ){
                        if($formations->frequence->nom == 'une seule fois'){
                            echo ' ';
                        }else{
                            echo $diff->format('%R%a jours');
                        }
                    }
                    
                ?></td>
                <td><?php // À venir
                    $diff = date_diff($currentDate, $prevue);
                    if( $currentDate < $prevue ){
                        if($formations->frequence->nom == 'une seule fois'){
                            echo ' ';
                        }else{
                            echo $diff->format('%R%a jours');
                        }
                    }
                
                ?></td>
                <td><?php // À faire 
                
                    if($prevue == null){
                        echo "";
                    }else {
                        echo "À faire";
                    }
                
                ?></td>
                <td><?php // Jamais faite
                
                    if($formations->_joinData->done == null){
                        echo "Jamais faite";
                    }else {
                        echo " ";
                    }
                
                ?></td>
 
                
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

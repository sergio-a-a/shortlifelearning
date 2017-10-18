<h4>Obtenir son plan de formation</h4>

<?php   echo $this->Form->create('Email');?>

<tr id="trcontact">
        <td><?php echo $this->Form->control('courriel', ['required' => true]);?></td>
   </tr>
   
    <td><?php echo $this->Form->button('Recevoir mon plan', ['type' => 'submit']); ?></td>
     <?php echo $this->Form->end(); ?>
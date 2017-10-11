<h2>Contacter l'administrateur du site</h2>

 <table id="tablecontact" cellpadding="10" position="absolute">
<?php   echo $this->Form->create('raton');?>
   <tr id="trcontact">
        <td>Votre nom : </td>
        <td><?php echo $this->Form->input('name');?></td>
   </tr>

   <tr id="trcontact">
        <td>Votre email : </td>
        <td><?php echo $this->Form->input('email');?></td>
   </tr>

   <tr id="trcontact">
        <td>Votre message : </td>
        <td><?php echo $this->Form->input('content', array('label' => "", "type"=>"textarea"));?></td>
   </tr>

   <tr id="trcontact">
     <td></td>
     
     <td><?php echo $this->Form->button('Envoyer', ['type' => 'submit']); ?></td>
     <?php echo $this->Form->end(); ?>
     
   </tr>
</table>
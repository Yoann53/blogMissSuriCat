<a href="./index.php?action=formAddCommande">Ajouter</a>
<table>
  <thead>
    <th>Civilité</th>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Id commande</th>
    <th>Référence</th>
    <th>Date de la commande</th>
    <th>Date d'expédition</th>
    <th>Statut</th>
    <th>Modifier</th>
    <th>Supprimer</th>
  </thead>
  <tbody>
    <?php
    foreach ($listeCommandes as $commande) {
      echo '<tr>';
      echo '<td>' . $commande->getClient()->getCivilite() . '</td>';
      echo '<td>' . $commande->getClient()->getNom() . '</td>';
      echo '<td>' . $commande->getClient()->getPrenom() . '</td>';
      echo '<td>' . $commande->getId() . '</td>';
      echo '<td>' . $commande->getDateCommande() . '</td>';
      echo '<td>' . $commande->getDateExpedition() . '</td>';
      echo '<td>' . $commande->getStatut()->getLibelle() . '</td>';
      echo '<td><a href="./index.php?action=formEditCommande&id=' . $commande->getId() . '"">Editer</a></td>';
      echo '<td><a href="./index.php?action=deleteCommande&id=' . $commande->getId() . '">Supprimer</a></td>';
      echo '</tr>';  
    }
    ?>
  </tbody>
</table>
<!-- Afficher ici le message d'erreur ou de confirmation lors d'une suppression -->
<label><?php if(isset($message)) echo $message ?></label>
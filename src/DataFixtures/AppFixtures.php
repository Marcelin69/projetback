<?php

namespace App\DataFixtures;

use App\Entity\Salle;
use App\Entity\Logiciel;
use App\Entity\Materiel;
use App\Entity\Ergonomie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void

    {


        
    $salles = [

        [
          "nom" => "Salle Émeraude",
          "capacite" => 20,
        ],
        [
          "nom" => "Salle Rubis",
          "capacite" => 12,
        ],
        [
          "nom" => "Salle Diamant",
          "capacite" => 30,
        ],
        [
          "nom" => "Salle Saphir",
          "capacite" => 15,
        ],
        [
          "nom" => "Salle Topaze",
          "capacite" => 10,
        ],
        [
          "nom" => "Salle Améthyste",
          "capacite" => 25,
        ],
        [
          "nom" => "Salle Onyx",
          "capacite" => 18,
        ],
        [
          "nom" => "Salle Perle",
          "capacite" => 8,
        ],
        [
          "nom" => "Salle Opale",
          "capacite" => 14,
        ],
        [
          "nom" => "Salle Jade",
          "capacite" => 22,
        ],
        [
          "nom" => "Salle Cristal",
          "capacite" => 16,
        ],
        [
          "nom" => "Salle Quartz",
          "capacite" => 10,
        ],
      ];
      foreach ($salles as $item) {
        $salles = new Salle();
        // On affecte chaque valeur du tableau aux propriétés correspondantes
        $salles->setNom($item['nom']);
        $salles->setCapacite($item['capacite']);
  
        // Persist permet de sauvegarder les données dans la base de données
        $manager->persist($salles);
      }
  
      $ergonomie = [
        [
          "description" => "Chaises confortables, tables spacieuses"
        ],
        [
          "description" => "Fauteuils ergonomiques, éclairage ajustable"
        ],
        [
          "description" => "Tables modulables, chaises pliantes"
        ],
        [
          "description" => "Sièges rembourrés, climatisation réglable"
        ],
        [
          "description" => "Tables avec connectivité électrique, éclairage naturel"
        ],
        [
          "description" => "Chaises ergonomiques avec accoudoirs, rideaux occultants"
        ],
        [
          "description" => "Sièges pivotants, isolation acoustique"
        ],
        [
          "description" => "Fauteuils en cuir, tapis moelleux"
        ],
        [
          "description" => "Chaises empilables, fenêtres avec vue panoramique"
        ],
        [
          "description" => "Tables avec rangement intégré, éclairage LED"
        ],
        [
          "description" => "Chaises avec soutien lombaire, climatisation zonée"
        ],
        [
          "description" => "Chaises pliantes, décoration moderne"
        ]
      ];
      foreach ($ergonomie as $item) {
        $ergo = new Ergonomie();
        $ergo->setDescription($item['description']);
        $manager->persist($ergo);
      }
  
  
  
  
  
      $logiciel = [
        [
          "description" => "Vidéoconférence intégrée"
        ],
        [
          "description" => "Présentation sans fil"
        ],
        [
          "description" => "Enregistrement de réunions"
        ],
        [
          "description" => "Partage d'écran"
        ],
        [
          "description" => "Annotation collaborative"
        ],
        [
          "description" => "Chat en direct"
        ],
        [
          "description" => "Planification de réunions"
        ],
        [
          "description" => "Gestionnaire de tâches intégré"
        ],
        [
          "description" => "Enregistrement audio"
        ],
        [
          "description" => "Partage de fichiers"
        ],
        [
          "description" => "Gestionnaire de sondages"
        ],
        [
          "description" => "Visioconférence sécurisée"
        ]
      ];
      foreach ($logiciel as $item) {
        $logiciel = new Logiciel();
        $logiciel->setDescription($item['description']);
        $manager->persist($logiciel);
      }
  
  
  
      $matereil = [
        [
          "description" => "Rétroprojecteur, tableau blanc"
        ],
        [
          "description" => "Écran LCD, système de sonorisation"
        ],
        [
          "description" => "Tableau interactif, système de visioconférence"
        ],
        [
          "description" => "Projecteur HD, système de son surround"
        ],
        [
          "description" => "Écran tactile interactif, microphone sans fil"
        ],
        [
          "description" => "Écran de projection, système de conférence audio"
        ],
        [
          "description" => "Tableau magnétique, lecteur DVD"
        ],
        [
          "description" => "Téléviseur HD, système de visioconférence"
        ],
        [
          "description" => "Tableau à feuilles mobiles, haut-parleurs intégrés"
        ],
        [
          "description" => "Écran interactif, système de conférence téléphonique"
        ],
        [
          "description" => "Écran de projection motorisé, microphone de table"
        ],
        [
          "description" => "Tableau magnétique, système de son intégré"
        ]
      ];
  
      foreach ($matereil as $item) {
        $matereil = new Materiel();
        $matereil->setDescription($item['description']);
        $manager->persist($matereil);
      }
  
  
     

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}

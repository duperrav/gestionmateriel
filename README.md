# gestionmateriel
Projet Symfony pour la gestion d'équipements dans un établissement.

L’objectif est de pouvoir donner la possibilité au responsable de connaître l’état des
équipements pour chaque salle et si besoin signaler un problème via un ticket d’incident. Le
technicien prendra en charge le problème.

# Diagramme de cas d'utilisation

![image](https://github.com/duperrav/gestionmateriel/assets/101574941/982098f4-4eaa-48dd-b45b-ee58515b69b1)


# Fonctionnement global de l’application web

Page d’authentification : 
  
Saisie du login (utilisateur/ mot de passe).

Page d’accueil de l’espace responsable :  
  
Menu déroulant comprenant le nom des salles et un bouton pour y accéder.

Page de sélection de matériel (responsable):
  
Affichage de la liste de matériels présents dans la salle avec un lien menant à la page de gestion
du matériel.

Page de gestion du matériel (responsable):  
  
-Affichage des logiciels installés  
  
-Etat des licences des logiciels  
  
-Possibilité d’émettre un ticket d’incident  

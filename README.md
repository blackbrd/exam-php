exam-php
========

EXERCICE : inscription comme utilisateur à mon TFE, avec email de confirmation mis en forme. (max:14/20)

BUGS : 

  - je n'ai pas réussi l'email de confirmation ... malgré le fait que cela semble facile à mettre en place. 
  Je n'ai pas trouvé d'ou vient l'erreur.
  
  - L'affichage des erreurs n'est pas très optimisé, je n'ai jamais réussi malgré l'exercice vu au cours a placer mes erreurs
  dans un tableau afin de pouvoir mieux les afficher a tel ou tel endroit de la page... 
  
  - J'ai essayé en suivant des des tutos vidéos de créer une partie "compte utilisateurs" à mon tfe, loin d'être au point.
  Je n'ai pas trouvé (par manque de temps aussi...mais ce n'est pas une excuse) comment modifier le code afin d'avoir a chaque
  $_SESSION "l'id" de l'utilisateur qui se connect comme "id actif" ou principal ... 
  
  Ce qui fait que seul l'id=idprécisé manuellement dans connect.php est capapble d'aller modifier son profile par exemple.
  
    !!!! id=56 | email : steve@jobs.com | mot de passe : password
    
  - modifier.php qui permet de modifier des informations du profile comprend des bugs, a la validation du form, les champs
  liés au mot de passe même non-modifiés sont soumis comme si ils avaient étés modifiés.J'ai l'impression que l'espace vide est considéré comme étant "quelque chose"
  Je n'avais pas ce problème au début, mais depuis la BETA je n'ai pas pu revoir tout ce qui concerne le php malheureusement. 
 

En gros y'a du chemin a faire encore ... la route est longue. Mais une chose est sure, grâce a ce TFE
je suis aujourd'hui bien plus à l'aise à la lecture de PHP et aussi du JS. 
Et ca me rassure et me boost d'enfin comprendre la base et ce que j'ai sous les yeux.

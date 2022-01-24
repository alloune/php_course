	---	
	Glossaire php

utilisation de la fonctionnalité include pour ajouté une partie d'html "fixe" dans ma page.

$ pour la déclaration d'une variable

echo count pour compter la longueur du tableau

afficher un tableau : 
	implode pour ajouter un caractère entre chaque element du tableau // echo implode("", $var);

	print_r(); pour afficher simplement avec l'index. 

arraypop et arraypush --> retourne la longueur du tableau, attention à quelle variable l'affecter. 

shift enleve au début, 
unshift, ajoute au début

Pour les tableaux à multi dimension, bien prendre doucement le tableau, poupée russe, de la plus grosse à la plus petite dans l'ordre de selection des index


Pour definir un tableau avec une valeur associé à chaque truc $tableau = ["valeur"=>"valeur associée"]; ou bien $tableau = array(même syntaxe);

pour ajouter une valeur et associé un truc $table[nouveau]= valeur associée;

on peut se servir de clef pour aller chercher précisement dans différent tableaux;

Différencier les tableaux ordonnes et à clef-valeur. 
	Ordonés, tu prends en charge les index avec des chiffres, de manières ordonée
avec les clefs valeurs, tu vas associer une clef spécifique à une valeur. 

on peut ajouter 2 tableaux en les ajoutant tout simplement. 

"&" --> la variable est lié à la première, elle pointe en même endroit. 


# TP Symfony Blog

Il faudra me rendre le dossier BlogSymfony en .zip SANS LE REPERTOIRE `vendor`

## Créer un nouveau projet BlogSymfony 

Utiliser composer pour créer un nouveau projet BlogSymfony

## Créer un controlleur PostController

Utiliser la commande `bin/console make:controller` pour créer un nouveau controlleur `PostController`

## Créer 2 méthodes dans ce controlleur 

Ajouter une méthode show en plus de la méthode index dans le controlleur `PostController`

Dans le template `list.html.twig` insérer le faux-texte suivant :

```
<h2>All posts</h2>
<ul>
  <li>
    <a href="#">Post 1</a>
  <li>
  <li>
    <a href="#">Post 2</a>
  <li>
  <li>
    <a href="#">Post 3</a>
  <li>
</ul>
```

Dans le template `show.html.twig` insérer le faux-texte suivant :

```
<h2>Post 1</h2>
<p>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus.
  Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies
  sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius 
  a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy 
  molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. 
  Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium 
  a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor. 
  Cras vestibulum bibendum augue. Praesent egestas leo in pede. Praesent 
  blandit odio eu enim. Pellentesque sed dui ut augue blandit sodales. 
</p>

<p>Published : 01/01/2020</p>

<p>Author : John Doe</p>
```

## Créer l’entité Message avec les propriétés

Avec la commande make:entity créer une entité `Post` avec les propriétés suivantes :

* title (string)
* content (text)
* publishedAt (date)
* author (string)

Tous les champs sont obligatoires.

Générer la structure de la base de données avec `bin/console`

Insérer ensuite des données de tests avec phpMyAdmin.

## Créer un service

Créer un service PostManager et lui injecter ManagerRegistry

Ajouter 4 méthodes :

* findAll (qui appelle la méthode findAll du Repository)
* find (qui appelle la méthode find du Repository)
* save (qui appelle les méthodes persist puis flush du Manager)
* delete (qui appelle les méthodes persist puis flush du Manager)

## Développer le controller et les templates

Dans PostController, appeler les méthodes findAll et find puis remplacer le faux-texte dans le template
par le contenu de la base de données

## Créer un contrôleur AdminPostController

Y ajouter 4 méthodes :
* index accessible via l'URL /admin/posts/
* create accessible via l'URL /admin/posts/create/
* update accessible via l'URL /admin/posts/{postId}/update/
* delete accessible via l'URL /admin/posts/{postId}/delete/

L'index affichera la liste des posts et des liens vers les pages create, update et delete

## Créer un formulaire

Utiliser make:form pour créer un formulaire à partir de l'entité Post

Ajouter des validateurs si nécessaire.

Tous les champs sont obligatoires.

## Ajouter des Users

Suivre le chapitre https://symfony.com/doc/4.4/security.html pour créer une Entity User et un formulaire de login

Rendre inaccessible les routes commençant par `/admin` à un User qui n'aurait pas le role `ROLE_ADMIN`.

## Transformer l'entité Post pour que l'auteur soit la personne connectée

Transformer author dans l'entité Post en une association vers `User` (il faudra peut être supprimer les enregistrements au prélable)

Dans le formulaire de création et d'update récupérer le User connecté et le passer à setAuthor avant l'appel à PostManager.


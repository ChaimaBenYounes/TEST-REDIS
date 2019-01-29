<?php
/**
 * Created by PhpStorm.
 * User: wap58
 * Date: 09/01/19
 * Time: 14:32
 */

require "../vendor/autoload.php";
Predis\Autoloader::register();

$oClient = new Predis\Client(array(
    "scheme" => "tcp",
    "host" => "redis-14041.c59.eu-west-1-2.ec2.cloud.redislabs.com:14041",

    "password" => "HvLiPtOOQT96V7tRs7zBeozIMA8Cn64H")
);


// cas classique enregitsrement d'un key avec sa valeur sans contrainte
$oClient->set('test1', 'Hello World_1');

// la key test ne sera disponible 10 secondes (elle expire au bout de 10 secondes
$oClient->set('test2', 'Hello World_2', 'ex' , 10);

// la key test sera disponible 5 secondes (elle expire au bout de 5 secondes (écrit en millisecondes)
$oClient->set('test3', 'Hello World_3', 'px', 5000);

// la key test sera affectée seulement si elle n'existait pas avant
$oClient->set('test4', 'Hello World_4', 'nx');

// la key test sera affectée seulement si elle existait avant
$oClient->set('test5', 'Hello World_5', 'xx');

// echo $oClient->get('test4') ;
?>


<div id="messages">
    <!-- les messages du tchat -->
    <ul>
        <li> </li>
    </ul>
</div>



<form action="index0.php" methode ="POST" class="form-group">

    <input type="text" name="message" value="" id="message">
    <input type="submit" name="submit" value="Submit" id="envoi" >

</form>

<script>

    $('#envoi').click(function(e){
        e.preventDefault(); // on empêche le bouton d'envoyer le formulaire

        var message = encodeURIComponent( $('#message').val() );

        // on vérifie que les variables ne sont pas vides
            $.ajax({
                url : "index0.php", // on donne l'URL du fichier de traitement
                type : "POST", // la requête est de type POST
                data : "&message=" + message // et on envoie nos données
            });

            $('#messages').append("<li>" + message + "</li>"); // on ajoute le message dans la zone prévue

    });



</script>


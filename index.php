<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
#Iniciamos una sesión de culr: ch = curl handle
$ch = curl_init(API_URL);
// Indicar que ueremos recibir el resultado de lla peticion y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//Indicamos que no tenga en cuenta los certificados para pruebas en local
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
/*Ejercutamos la peticion y guardamos*/
$result  = curl_exec($ch);
$data = json_decode($result, true);



?>

<head>
    <title>La proxima pelicula de Marvel</title>
    <meta charset="UTF-8" />
    <meta name="description" content="Proxima pelicula de marvel" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>
<main>
    <section>
        <img 
        src="<?=  $data["poster_url"];  ?>" width="350" alt="Poster de <?= $data["poster_url"]; ?>"
        style="border-radius: 16px">
    </section>
    <hgroup>
        <h2><?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> días</h2>
        <p>fecha de estreno: <?= $data["release_date"]; ?></p>
        <p>La siguiente es: <?= $data["following_production"]["title"]; ?></p>
    </hgroup>

</main>


<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }
    section{
        display: flex;
        place-content: center;
        text-align: center;
    }

    img{
        margin: 0 auto;
    }
    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
</style>
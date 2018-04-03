<?php

include_once 'panels_display.php';

function load_plugin_backend(){

    $panel = new panels();

  echo '<h1> Typy aut <sub style="font-size:15px;">(tylko do podglądu)</sub></h1>';
    $panel->types();

  echo '<h1> Modele aut </h1>';
    $panel->models();

  echo '<h1>Dodatkowe opcje</h1>';

    $panel->additionalSetup();

  echo '<h1>Rezerwacje <sub style="font-size:15px;">(tylko do kasowania)</sub></h1>';
    $panel->reservations();

  echo '<H1>Ceny najmu</h1>';
    $panel->rentingPrice();
  ;

}

?>

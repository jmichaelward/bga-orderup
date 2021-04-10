<?php
/**
 *------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * OrderUp implementation : © <Your name here> <Your email address here>
 *
 * This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
 * See http://en.boardgamearena.com/#!doc/Studio for more information.
 * -----
 *
 * material.inc.php
 *
 * OrderUp game material description
 *
 * Here, you can describe the material of your game with PHP variables.
 *
 * This file is loaded in your game logic class constructor, ie these variables
 * are available everywhere in your game logic code.
 *
 */

use JMichaelWard\OrderUp\Cube;


/*

Example:

$this->card_types = array(
    1 => array( "card_name" => ...,
                ...
              )
);

*/


$this->cubes = [
    new Cube(clienttranslate('Beverage'), 'yellow', 40),
    new Cube(clienttranslate('Appetizer'), 'green', 30),
    new Cube(clienttranslate('Entree'), 'red', 35),
    new Cube(clienttranslate('Dessert'), 'white', 30),
    new Cube(clienttranslate('Mess Up'), 'black', 30),
];

//$this->tableCards         = [];
//$this->actionCards        = [];
//$this->specialActionCards = [];
//$this->upsellTokens       = [];
//$this->complaintTokens    = [];
//$this->shotGlass          = [];

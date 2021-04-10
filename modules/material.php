<?php
/**
 * File containing material objects.
 */
namespace JMichaelWard\OrderUp;

/**
 * Class Cube
 * @package JMichaelWard\OrderUp
 */
class Cube {
    /**
     * Type of cube.
     *
     * @var string
     */
    private $type;

    /**
     * Name of the cube.
     *
     * @var string
     */
    private $name;

    /**
     * Number of cubes.
     *
     * @var int
     */
    private $quantity;

    /**
     * Color of the cube.
     *
     * @var string
     */
    private $color;

    /**
     * Cube constructor.
     * @param string $name
     * @param string $color
     * @param int    $quantity
     */
    public function __construct(string $name, string $color, int $quantity)
    {
        $this->type = $this->setType( $name );
        $this->name = $name;
        $this->color = $color;
        $this->quantity = $quantity;
    }

    /**
     * Set the type of cube based on its name.
     *
     * @param string $name
     *
     * @return string
     */
    private function setType( string $name ) {
        return in_array($name, ['Beverage', 'Appetizer', 'Entree', 'Dessert'], true) ? 'course' : 'mess-up';
    }
}

abstract class Card {
    private $name;
    private $id;
}

class TableCard extends Card {

}

class ActionCard extends Card {

}

class SpecialActionCard extends Card {

}

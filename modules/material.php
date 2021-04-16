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

/**
 * Abstract representation of the cards in Order Up.
 *
 * @package JMichaelWard\OrderUp
 */
abstract class Card {
    /**
     * Numeric ID of the card.
     *
     * @var int
     */
    protected $id;

    /**
     * The name of the card.
     *
     * @var string
     */
    protected $name;

    /**
     * Card constructor.
     *
     * @param int    $id The card ID.
     * @param string $name The card name.
     */
    public function __construct( int $id, string $name )
    {
        $this->id = $id;
        $this->name = $name;
    }
}

/**
 * Model for the table cards in Order Up.
 *
 * @package JMichaelWard\OrderUp
 */
class TableCard extends Card
{
    /**
     * The type of card: one of Positive, Negative, or Neutral.
     *
     * @var string
     */
    private $type;

    /**
     * The table card description.
     *
     * @var string
     */
    private $description = '';

    /**
     * The amount of VP the card is worth if its orders are fulfilled.
     *
     * @var int
     */
    private $vp;

    /**
     * The orders for the table.
     * e.g., 1 Appetizer, 0 Entrees, 1 Dessert, 0 Cocktails.
     *
     * @var object
     */
    private $orders;

    /**
     * There are three types of upsells:
     * - Desserts
     * - Appetizers
     * - Cocktails
     *
     * Each upsell on a card grants the card 1 extra VP.
     *
     * @var object
     */
    private $upsells;

    /**
     * Model of the table card.
     *
     * @param int         $id          ID of the card.
     * @param string      $name        Name of the card.
     * @param int         $vp          Potential VP the card is worth
     * @param object      $orders      Orders required to complete the card.
     * @param string      $description Optional flavor text.
     * @param object|null $upsells     Optional upsells.
     */
    public function __construct(
        int $id,
        string $name,
        string $type,
        int $vp,
        object $orders,
        string $description = '',
        object $upsells = null
    ) {
        parent::__construct( $id, $name );
        $this->type        = $type;
        $this->vp          = $vp;
        $this->orders      = $orders;
        $this->description = $description;
        $this->upsells     = $upsells;
    }
}

class ActionCard extends Card {
    public const MOD_TAKE_CUBE_FROM_BAG = 1;
    public const MOD_TAKE_TWO_CUBES_FROM_BAG = 2;
    public const MOD_SAME_TRAY = 3;
    public const MOD_PLAY_ACTION_CARD = 4;
    public const MOD_DRAW_TWO_ACTION_CARDS = 5;

    /**
     * Total number of this card available in the game.
     *
     * @var int
     */
    private $quantity;

    /**
     * What set of cards this card is in.
     *
     * One of: Base Set, Mess-ups.
     *
     * @var string
     */
    private $version;

    /**
     * One of: Chef, Bartender, Busboy, Manager
     *
     * @var string
     */
    private $suit;

    /**
     * Required orders for this action.
     *
     * The card has two slots for order requirements. Values can be one of the following:
     * Beverage (Drink), Appetizer, Dessert, Entree, Mess-up, AnyCourse
     *
     * @var array
     */
    private $required_orders;

    /**
     * How this action modifies the gameplay.
     *
     * @var string
     */
    private $modification;

    /**
     * Card text.
     *
     * @var string
     */
    private $text;

    /**
     * Amount of VP this action is worth.
     *
     * @var int
     */
    private $vp;

    /**
     * ActionCard constructor.
     * @param int      $id ID of the card.
     * @param string   $name
     * @param int      $quantity
     * @param string   $version
     * @param string   $suit
     * @param array    $required_orders
     * @param int|null $modification
     * @param string   $text
     * @param int      $vp
     */
    public function __construct(
        int $id,
        string $name,
        int $quantity,
        string $version,
        string $suit,
        array $required_orders,
        int $modification = null,
        string $text = '',
        int $vp = 0
    ) {
        parent::__construct($id, $name);
        $this->quantity        = $quantity;
        $this->version         = $version;
        $this->suit            = $suit;
        $this->required_orders = $required_orders;
        $this->modification    = $modification;
        $this->text            = $text;
        $this->vp              = $vp;
    }
}

/**
 * Class SpecialActionCard
 * @package JMichaelWard\OrderUp
 */
class SpecialActionCard extends Card {
    /**
     * @var int
     */
    private $quantity;

    /**
     * @var int
     */
    private $vp;

    /**
     * SpecialActionCard constructor.
     * @param int    $id
     * @param string $name
     * @param int    $quantity
     * @param int    $vp
     */
    public function __construct(int $id, string $name, int $quantity, int $vp)
    {
        parent::__construct($id, $name);
        $this->quantity = $quantity;
        $this->vp = $vp;
    }
}

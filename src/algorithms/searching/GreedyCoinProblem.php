<?php
/**
 * @author Michele Andreoli <michi.andreoli[at]gmail.com>
 * @name CoinChanger.class.php
 * @version 0.1 updated 30-08-2014
 * @license http://opensource.org/licenses/gpl-license-php GNU Public License
 * @package CoinsChanger
 */

/**
 * Description of CoinChanger
 *
 * @author tux
 */
class CoinsManager {
    private $coins = null;
    private $limits = null;
    private $amount = null;
    private $changed = null;

    /**
     * Constructor for CoinManager class
     * @param array $coins Array of coins
     * @param array [$limited] Limitation for each coins
     */
    public function __construct($coins, $limits = null) {
        if (!isset($coins)) {
            $coins = [];
        }
        if (!isset($limits)) {
            $limits = [];
        }
        $this->limits = $limits;
        $this->coins = $coins;
    }

    /**
     * Gives the coins to make amount
     * @param int $amount Number to exchange
     * @return Array of coins. The method returns -1 if the amount isn't exchangable. If an error occurs the method returns FALSE.
     */
    public function getChange($amount) {
        $this->changed = [];

        if ($this->isLimited() && count($this->limits) != count($this->coins)) {
            return FALSE;
        }

        if (!isset($amount)) {
            $this->amount = 0;
        }
        $this->amount = $amount;
        $this->changed = $this->makeChange($this->amount);

        return $this->changed;
    }

    /**
     * Get coins with each amounts
     * @param array $coins Array of coins
     * @return Returns an associative array with key => Coin type, value => number of coins
     */
    public function groupBy($coins) {
        $groups = [];
        if (!isset($coins) || $coins < 0) {
            return FALSE;
        }
        for ($k = 0; $k < count($coins); $k++) {
            $coin = strval($coins[$k]);
            if (!array_key_exists($coin, $groups) && !isset($groups[$coin])) {
                $groups[$coin] = 1;
            }
            else {
                $counter = $groups[$coin] + 1;
                $groups[$coin] = $counter;
            }
        }

        return $groups;
    }

    /**
     * Greedy Algorithm approach
     * @param int $amount Number to exchange
     * @return Array of coins
     */
    private function makeChange($amount) {
        $maxCoin = 0;
        $sum = 0;
        $limited = $this->isLimited();

        while ($sum < $amount) {
            $maxCoin = $this->getLocalMax($amount, $sum);
            if (!isset($maxCoin)) {
                return -1;
            }

            if ($limited && $this->checkQuantity($maxCoin)) {
                array_push($this->changed, $maxCoin);
                $this->setQuantity($maxCoin, $this->popQuantity($maxCoin));
                $sum = $sum + $maxCoin;
            }
            else if (!$limited) {
                array_push($this->changed, $maxCoin);
                $sum = $sum + $maxCoin;
            }
        }

        return $this->changed;
    }

    /**
     * Check if there is disponibility for the given coin
     * @param int $coin Coin value
     * @return The method returns TRUE if the coin is available, FALSE otherwise.
     */
    private function checkQuantity($coin) {
        $result = TRUE;
        if ($this->getQuantity($coin) <= 0) {
            $result = FALSE;
        }
        return $result;
    }

    /**
     * Get the coin's index into array
     * @param int $key
     * @return Returns the coin's index into array
     */
    private function getIndex($key) {
        $index = array_search($key, $this->coins);
        return $index;
    }

    /**
     * Get the remaining amount for the given coin
     * @param int $coin Coin value
     * @return Returns the quantity for the given coin
     */
    private function getQuantity($coin) {
        $index = $this->getIndex($coin);
        $quantity = $this->limits[$index];
        return $quantity;
    }

    /**
     * Set the remaining amount for the given coin
     * @param int $coin Coin value
     * @param int $newQuantity New value
     */
    private function setQuantity($coin, $newQuantity) {
        $index = $this->getIndex($coin);
        $this->limits[$index] = $newQuantity;
    }

    /**
     * Removes one unit of given coin
     * @param int $coin Coin value
     * @return Returns the new quantity for the given coin
     */
    private function popQuantity($coin) {
        $quantity = $this->getQuantity($coin);
        $newQuantity = $quantity - 1;
        return $newQuantity;
    }

    /**
     * Adds one unit of given coin
     * @param int $coin Coin value
     * @return Returns the new quantity for the given coin
     */
    private function pushQuantity($coin) {
        $quantity = $this->getQuantity($coin);
        $newQuantity = $quantity + 1;
        return $newQuantity;
    }

    /**
     * Removes one unity of given coin
     * @return Returns TRUE if there is a limit of coins setted, FALSE otherwise
     */
    private function isLimited() {
        if (count($this->limits) <= 0) {
            return FALSE;
        }
        return TRUE;
    }

    /**
     * Retrieves the first biggest coin available
     * @param array $coins
     * @param int $amount Number to be exchanged
     * @param int $sum Current amount exchanged
     * @return Returns the first bigger coin available
     */
    private function getLocalMax($amount, $sum) {
        $max = null;
        $coins = $this->coins;
        for ($k = 0; $k < count($coins); $k++) {
            if (($coins[$k] + $sum <= $amount) && (!$this->isLimited() || $this->checkQuantity($coins[$k]))) {
                $max = $coins[$k];
                break;
            }
        }
        return $max;
    }
}

    $amount = 45;
    $coins = [50, 10, 5, 2, 1, 0.5];
    $limits = [1, 2, 1, 5, 3, 10];

    //Coin change problem with FINITE coins supply
    $changerMngr = new CoinsManager($coins, $limits);

    print_r($exchange = $changerMngr->getChange($amount));
    print_r($groups = $changerMngr->groupBy($exchange));

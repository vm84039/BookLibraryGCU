<?php
namespace App\Models;
use App\Models\BookModel;
use App\Models\UserModel;


class CartModel
{
    private $cartID;
    private $userID;
    private $bookID;
    private $title;
    private $date;

    /**
     * @param $cartID
     * @param $bookID
     * @param $userID
     * @param $title
     * @param $date
     */
    public function __construct($userID, $bookID, $title, $date)
    {
        $this->bookID = $bookID;
        $this->userID = $userID;
        $this->title = $title;
        $this->date = $date;
    }


    /**
     * @return mixed
     */
    public function getCartID()
    {
        return $this->cartID;
    }

    /**
     * @param mixed $cartID
     */
    public function setCartID($cartID): void
    {
        $this->cartID = $cartID;
    }

    /**
     * @return mixed
     */
    public function getBookID()
    {
        return $this->bookID;
    }

    /**
     * @param mixed $bookID
     */
    public function setBookID($bookID): void
    {
        $this->bookID = $bookID;
    }

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID): void
    {
        $this->userID = $userID;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

}

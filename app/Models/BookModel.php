<?php

/*
 * ---------------------------------------------------------------
 * Name      : Group Assignment
 * Date      : 2022-04-09
 * Class     : CST-323 Cloud Computing
 * Professor : Bradley Mauger PhD
 * Assignment: Milestone
 * Disclaimer: This is my own work
 * ---------------------------------------------------------------
 * Description:
 * 1. Model to hold Book information
 * 2. Library book and if checked out, check out info
 * 3.
 * ---------------------------------------------------------------
 * Revision History:
 * Name            Date       Description
 * --------------- ---------- ------------------------------------
 * Kelly           2022-04-09 Initial Creation
 *
 *
 * ---------------------------------------------------------------
 */

namespace App\Models;

use Carbon\Carbon;

class BookModel
{
    private $id;
    private $title;
    private $author;
    private $publisher;
    private $date;
    private $genre;
    private $isbn;
    private $checked_out;
    private $checkout_user_id;
    private $checkout_date;
    private $return_date;
    private $due_date;
    private $img;



    public function __construct($id, $title, $author, $publisher, $date, $genre, $isbn, $checked_out, $checkout_user_id, $checkout_date, $return_date, $due_date, $img)
    {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->publisher = $publisher;
        $this->date = $date;
        $this->genre = $genre;
        $this->isbn = $isbn;
        $this->checked_out = $checked_out;
        $this->checkout_user_id = $checkout_user_id;
        $this->checkout_date = $checkout_date;
        $this->return_date = $return_date;
        $this->due_date = $due_date;
        $this->img =$img;
    }

    public function available() {
        $due = Carbon::parse($this->return_date)->format('dd/mm/yyyy');
        if ($this->checked_out == 0)
        {
            return "Available";
        }
        else {
            return $due;
        }
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }
    public function getYear()
    {
        return Carbon::createFromFormat('Y-m-d', $this->date)->format('Y');
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @return mixed
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @return mixed
     */
    public function getChecked_out()
    {
        return $this->checked_out;
    }

    /**
     * @return mixed
     */
    public function getCheckout_user_id()
    {
        return $this->checkout_user_id;
    }

    /**
     * @return mixed
     */
    public function getCheckout_date()
    {
        return $this->checkout_date;
    }

    /**
     * @return mixed
     */
    public function getReturn_date()
    {
        return $this->return_date;
    }

    /**
     * @return mixed
     */
    public function getDue_date()
    {
        return $this->due_date;
    }
    public function formatDate($d){
        return \Carbon\Carbon::createFromFormat('Y-m-d', $d)->format('M d, Y');
    }


    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @param mixed $publisher
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @param mixed $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    /**
     * @param mixed $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    /**
     * @param mixed $checked_out
     */
    public function setChecked_out($checked_out)
    {
        $this->checked_out = $checked_out;
    }

    /**
     * @param mixed $checkout_user_id
     */
    public function setCheckout_user_id($checkout_user_id)
    {
        $this->checkout_user_id = $checkout_user_id;
    }

    /**
     * @param mixed $checkout_date
     */
    public function setCheckout_date($checkout_date)
    {
        $this->checkout_date = $checkout_date;
    }

    /**
     * @param mixed $return_date
     */
    public function setReturn_date($return_date)
    {
        $this->return_date = $return_date;
    }

    /**
     * @param mixed $due_date
     */
    public function setDue_date($due_date)
    {
        $this->due_date = $due_date;
    }
    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img): void
    {
        $this->img = $img;
    }
}

?>

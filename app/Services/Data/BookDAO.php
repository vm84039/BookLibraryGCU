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
 * 1. DAO - Books (Libary Properties)
 * 2. Various Books CRUD
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

namespace App\Services\Data;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\BookModel;

class BookDAO
{
    public function __construct()
    {}

    // -------------------------------------------------------------------
    // Create Functionality Methods
    // -------------------------------------------------------------------

    public function createBook($bookModel)
    {
        $title = $bookModel->getTitle();
        $author = $bookModel->getAuthor();
        $publisher = $bookModel->getPublisher();
        $date = $bookModel->getDate();
        $genre = $bookModel->getGenre();
        $isbn = $bookModel->getIsbn();
        $checked_out = $bookModel->getChecked_out();
        $checkout_user_id = $bookModel->getCheckout_user_id();
        $checkout_date = $bookModel->getCheckout_date();
        $return_date = $bookModel->getReturn_date();
        $due_date = $bookModel->getDue_date();
        $img = $bookModel->getImg();

        $sql = 'INSERT INTO books (TITLE, AUTHOR, PUBLISHER, DATE, GENRE, ISBN, CHECKED_OUT, CHECKOUT_USER_ID, CHECKOUT_DATE, RETURN_DATE, DUE_DATE, IMG) ' .
            'VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
        DB::insert($sql, [$title, $author, $publisher, $date, $genre, $isbn, $checked_out, $checkout_user_id, $checkout_date, $return_date, $due_date, $img]);

        // Get the id for the book just created
        $book_id = DB::getPdo()->lastInsertId();
        $bookModel->setID($book_id);

        return $bookModel;
    }


    // -------------------------------------------------------------------
    // Retrieve Functionality Methods
    // -------------------------------------------------------------------

    public function getAllBooks(): array
    {
        $books = array();
        $index = 0;

        $rows = DB::select('SELECT * FROM books ORDER BY ID ASC');

        foreach ($rows as $row)
        {
            $book = new BookModel($row->ID,
                $row->TITLE,
                $row->AUTHOR,
                $row->PUBLISHER,
                $row->DATE,
                $row->GENRE,
                $row->ISBN,
                $row->CHECKED_OUT,
                $row->CHECKOUT_USER_ID,
                $row->CHECKOUT_DATE,
                $row->RETURN_DATE,
                $row->DUE_DATE,
                $row->IMG);
            $books[$index] = $book;
            ++$index;
        }

        return $books;
    }
    public function getBooksbyUserID(int $id): BookModel
    {
        $temp = DB::table('books')->where('CHECKOUT_USER_ID', $id)->get();
        $temp2 = $temp->first();
        return new BookModel($temp2->getId(), $temp2->getAuthor(), $temp2->getPublisher(),$temp2->getDate(),$temp2->getGenre(),
            $temp2->getIsbn(),$temp2->getChecked_out(),$temp2->getCheckout_date(),$temp2->getCheckout_user_id(),
            $temp2->getCheckout_date(),$temp2->getReturn_date(),$temp2->getdDue_date(),$temp2->getImg());
    }

    public function checkout(int $bookID, int $userID): int
    {
        $checkout = now();
        $checkin = $checkout->addDays(7);

        return DB::table('users')
            ->where('ID', $bookID)
            ->update(
                ['CHECKED_OUT'=>1],
                ['CHECKOUT_USER_ID'=>$userID],
                ['CHECKOUT_DATE'=>$checkout],
                ['DUE_DATE'=>$checkin],
            );
    }

    public function getBooksSearch($title, $author, $isbn, $genre)
    {
        $books = array();
        $index = 0;

        $sql = "SELECT * FROM books WHERE TITLE LIKE ? OR AUTHOR LIKE ? OR ISBN LIKE ? OR GENRE LIKE ? ORDER BY ID ASC'";
        $data = [$title, $author, $isbn, $genre];
        $rows = DB::select($sql, $data);

        foreach ($rows as $row)
        {
            $book = new BookModel($row->ID,
                $row->TITLE,
                $row->AUTHOR,
                $row->PUBLISHER,
                $row->DATE,
                $row->GENRE,
                $row->ISBN,
                $row->CHECKED_OUT,
                $row->CHECKOUT_USER_ID,
                $row->CHECKOUT_DATE,
                $row->RETURN_DATE,
                $row->DUE_DATE,
                $row->IMG);
            $books[$index] = $book;
            ++$index;
        }

        return $books;
    }

    public function getBookByID($book_id): BookModel
    {
        $row = DB::select('SELECT * FROM books WHERE ID = ?', [$book_id]);

        $book = new BookModel($row[0]->ID,
            $row[0]->TITLE,
            $row[0]->AUTHOR,
            $row[0]->PUBLISHER,
            $row[0]->DATE,
            $row[0]->GENRE,
            $row[0]->ISBN,
            $row[0]->CHECKED_OUT,
            $row[0]->CHECKOUT_USER_ID,
            $row[0]->CHECKOUT_DATE,
            $row[0]->RETURN_DATE,
            $row[0]->DUE_DATE,
            $row[0]->IMG);


        return $book;
    }


    // -------------------------------------------------------------------
    // Update Functionality Methods
    // -------------------------------------------------------------------

    public function updateBook($bookModel)
    {
        $book_id = $bookModel->getId();
        $title = $bookModel->getTitle();
        $author = $bookModel->getAuthor();
        $publisher = $bookModel->getPublisher();
        $date = $bookModel->getDate();
        $genre = $bookModel->getGenre();
        $isbn = $bookModel->getIsbn();
        $checked_out = $bookModel->getChecked_out();
        $checkout_user_id = $bookModel->getCheckout_user_id();
        $checkout_date = $bookModel->getCheckout_date();
        $return_date = $bookModel->getReturn_date();
        $due_date = $bookModel->getDue_date();
        $img = $bookModel->getImg();

        $sql = 'UPDATE books SET TITLE = ?, AUTHOR = ?, PUBLISHER = ?, DATE = ?, GENRE = ?, ISBN = ?, CHECKED_OUT = ?, CHECKOUT_USER_ID = ?, CHECKOUT_DATE = ?, RETURN_DATE = ?, DUE_DATE = ?, IMG = ? WHERE ID = ?';
        $data = [$title, $author, $publisher, $date, $genre, $isbn, $checked_out, $checkout_user_id, $checkout_date, $return_date, $due_date, $img, $book_id];
        $count = DB::update($sql, $data);

        return $count;
    }

    public function checkoutBook($bookID, $userID)
    {
        $checkout = 1;
        $checkoutDate= Carbon::now();
        $dueDate = Carbon::now()->addDays(7);

        $affected = DB::table('books')
            ->where('ID', $bookID)
            ->update(['CHECKED_OUT' => 1,'CHECKOUT_USER_ID' => $userID, 'CHECKOUT_DATE' => $checkoutDate,
                'DUE_DATE' => $dueDate]);
    }

    public function checkinBook($bookID)
    {
        $returnDate = Carbon::now();

        $affected = DB::table('books')
            ->where('ID', $bookID)
            ->update(['CHECKED_OUT' => 0,'CHECKOUT_USER_ID' => null, 'CHECKOUT_DATE' => null, 'DUE_DATE' => null,
                'RETURN_DATE' => $returnDate]);
    }

    // -------------------------------------------------------------------
    // Delete Functionality Methods
    // -------------------------------------------------------------------

    public function deleteBook($book_id): int
    {
        $count = DB::delete('DELETE FROM books WHERE ID = ?', [$book_id]);
        return $count;
    }
    public function checkedOutBooks($userID): \Illuminate\Support\Collection
    {
        return DB::table('books')
            ->select('ID','TITLE', 'CHECKOUT_DATE', 'DUE_DATE' )
            ->where ('CHECKOUT_USER_ID', '=', $userID)
            ->get();
    }
    public function numCheckedOut($userID): int
    {
        return DB::table('books')
            ->select('TITLE', 'CHECKOUT_DATE', 'DUE_DATE' )
            ->where ('CHECKOUT_USER_ID', '=', $userID)
            ->count();
    }
}

?>

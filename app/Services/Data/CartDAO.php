<?php
namespace App\Services\Data;
use Illuminate\Support\Facades\DB;
use App\Models\CartModel;

class CartDAO
{
    public function getCart(int $id): \Illuminate\Support\Collection
    {
        return DB::table('cart')->where('USERID', $id)->get();
    }
    public function insert(CartModel $cartModel): int
    {
        $num=0;
        $count = DB::table('cart')
            ->where('BOOKID', '=', $cartModel->getBookID())
            ->count();
        if ($count == 0) {
            $sql = 'INSERT INTO cart (USERID, BOOKID, TITLE, DATE) ' .
                'VALUES (?,?,?,?)';
            $num = DB::insert($sql, [$cartModel->getUserID(), $cartModel->getBookID(), $cartModel->getTitle(), $cartModel->getDate()]
            );
            // Get the id for the book just created
            $cart_ID = DB::getPdo()->lastInsertId();
            $cartModel->setCartID($cart_ID);
        }
        return $num;
    }
    public function deleteCart (int $userID)
    {
        return DB::table('cart')
            ->where('USERID', '=', $userID)
            ->delete();
    }
    public function deleteUserCart (int $cartID)
    {
        return DB::table('cart')
            ->where('CARTID', '=', $cartID)
            ->delete();
    }
}

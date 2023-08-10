<?php
namespace App\Http\Controllers;
use App\Models\BookModel;
use App\Models\CartModel;
use App\Models\UserModel;
use App\Services\Data\BookDAO;
use App\Services\Data\CartDAO;
use App\Services\Data\UserDAO;
use App\Services\Utility\MyLogger;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class CartController extends Controller
{

    public function addCart(Request $request): Factory|View|Application
    {
        $userID = $request->input('userID');
        $bookID = $request->input('bookID');

        $cartDAO = new CartDAO();
        $bookDAO = new BookDAO();
        $book =$bookDAO->getBookByID($bookID);
        $cart = new CartModel($userID, $bookID, $book->getTitle(), $book->getDate());
        $cartDAO->insert($cart);
        $userDAO = new UserDAO();
        $user = $userDAO->getUser($userID);
        $data = ['userID' => $user->getId(),
            'firstName' => $user->getFirstName() ,
            'lastName' => $user->getLastName()];
        $log = new MyLogger();
        //$log->logglyWithData('Entering CartController::addCart', $data);
        return view('customer.landingPage')->with($data);
    }
    public function deleteCart(Request $request): Factory|View|Application
    {
        $cartID = $request->input('cartID');
        $userID = $request->input('userID');
        $cartDAO = new CartDAO();
        $cartDAO->deleteUserCart($cartID);

        $userDAO = new UserDAO();
        $user = $userDAO->getUser($userID);


        $data = ['userID' => $user->getId(),
            'firstName' => $user->getFirstName() ,
            'lastName' => $user->getLastName()];
        $log = new MyLogger();
        //$log->logglyWithData('Entering CartController::deleteCart', $data);
        return view('customer.landingPage')->with($data);

    }
    public function checkout(Request $request): Factory|View|Application
    {
        $userID = $request->input('userID');
        $userDAO = new UserDAO();
        $user = $userDAO->getUser($userID);

        $cartDAO = new CartDAO();
        $bookDAO = new BookDAO();

        $carts = $cartDAO->getCart($userID);
        foreach($carts as $cart){
            $book = $bookDAO->getBookByID($cart->BOOKID);
            $bookDAO->checkoutBook($cart->BOOKID, $userID);
        }
        $cartDAO->deleteCart($userID);

        $data = ['userID' => $user->getId(),
            'firstName' => $user->getFirstName() ,
            'lastName' => $user->getLastName()];
        $log = new MyLogger();
        //$log->logglyWithData('Entering CartController::checkout', $data);
        return view('customer.landingPage')->with($data);

    }
    public function checkIn(Request $request): Factory|View|Application
    {
        $bookID = $request->input('bookID');
        $userID = $request->input('userID');
        $userDAO = new UserDAO();
        $user = $userDAO->getUser($userID);

        $cartDAO = new CartDAO();
        $bookDAO = new BookDAO();



        $data = ['userID' => $user->getId(),
            'firstName' => $user->getFirstName() ,
            'lastName' => $user->getLastName()];
        $log = new MyLogger();
        //$log->logglyWithData('Entering CartController::checkIn', $data);
        return view('customer.landingPage')->with($data);

    }
}

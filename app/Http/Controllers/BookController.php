<?php
namespace App\Http\Controllers;
use App\Models\BookModel;
use App\Models\UserModel;
use App\Services\Data\BookDAO;
use App\Services\Data\UserDAO;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Services\Utility\MyLogger;


class BookController extends Controller
{
    public function moreInfo(Request $request): Factory|View|Application{
        $bookID = $request->input('bookID');
        $data = ['bookID' => $bookID];
        $log = new MyLogger();
        //$log->logglyWithData('Entering BookController::moreInfo', $data);
        return view('moreInfo')->with($data);
    }
    public function customerDetail(Request $request): Factory|View|Application{
        $bookID = $request->input('bookID');
        $userID = $request->input('userID');
        $data = ['bookID' => $bookID,
                 'userID' => $userID
        ];
        $log = new MyLogger();
        //$log->logglyWithData('Entering BookController::customerDetail', $data);
        return view('customer.customerMoreInfo ')->with($data);
    }


    public function bookReturn(Request $request): Factory|View|Application{
        $bookID = $request->input('bookID');
        $DAO = new BookDAO();
        $DAO->checkinBook($bookID);

        /* For Now, return to customer landing page
        ** This functionality may be changed to librarian only (not user)
        */
        $userID = $request->input('userID');
        $userDAO = new UserDAO();
        $user = $userDAO->getUser($userID);

        $data = ['userID' => $user->getId(),
            'firstName' => $user->getFirstName() ,
            'lastName' => $user->getLastName()];
        $log = new MyLogger();
        //$log->logglyWithData('Entering BookController::bookReturn', $data);
        return view('customer.landingPage')->with($data);
    }
}

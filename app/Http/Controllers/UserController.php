<?php
namespace App\Http\Controllers;
use App\Services\Data\BookDAO;
use App\Services\Data\UserDAO;
use App\Services\Utility\MyLogger;
use Illuminate\Http\Request;

use App\Models\UserModel;
use App\Services\Data\SecurityDAO;


class UserController extends Controller
{
    public function registerUser(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $email = $request->input('email');
        $mobile = $request->input('phone');
        $password = $request->input('password');
        $roleID = 1;

        $DAO=new UserDAO();
        $log = new MyLogger();
        $data = ['email' => $email];
        if($DAO->UserEmailAvailable($email)) {
            $user = new UserModel(0, $firstName, $lastName, $email, $mobile, $password, $roleID);
            $DAO->createUser($user);

          //  ////$log->logglyWithData('Registration Successful', $data);
            return view('auth.login');
        }
        else
        {
        //    ////$log->logglyWithData('Registration Failed', $data);
            return view('auth.register')->withErrors(['email' => 'Email already in use - try another.']);
        }
    }
    public function login(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $DAO=new SecurityDAO();
        $log = new MyLogger();

        if($DAO->AuthenticateLogin($email, $password)) {
            $UserDAO = new UserDAO();
            $user= $UserDAO->getUserbyEmail($email);

            $data = ['userID' => $user->getId(),
                'firstName' => $user->getFirstName() ,
                'lastName' => $user->getLastName()];
            ////$log->logglyWithData('Login Successful', $data);
            return view('customer.landingPage')->with($data);
        }
        else
            $data = ['email' => $email];
            ////$log->logglyWithData('Login Failed', $data);
            return view('auth.loginFailed');
    }
    public function toLandingPage(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $userID = $request->input('userID');
        $DAO = new UserDAO();
        $user = $DAO->getUser($userID);


        $data = ['userID' => $user->getId(),
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName()];
        $log = new MyLogger();
        ////$log->logglyWithData('Entering CartController::checkout', $data);
        return view('customer.landingPage')->with($data);

    }
    //    ****************************Customer Controller Methods**********************

}

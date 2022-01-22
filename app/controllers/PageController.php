<?php
// include_once '..' . DS . 'app' . DS . 'models' . DS . 'Users.php';

use App\Core\BaseController;
use App\Models\Users;
use App\Core\Session;


class PageController extends BaseController
{
    protected $data;
    private $userModel;


    public function __construct()
    {
        $this->userModel = new Users();
    }
    public function index()
    {
        $currentUserInfo = Session::get('currentUser');
        
        if( $currentUserInfo != NULL){

            view('indexView', compact('currentUserInfo'));
        }else{

            redirectTo('/page/login');
        }
    }
    public function users()
    {
        $users = $this->userModel->all();
       

        // $getDataFromServer = Http::get('https://jsonplaceholder.typicode.com/todos/');
        // dd($getDataFromServer);
        // $data = [];
        // $getDataFromServer = Http::get('https://jsonplaceholder.typicode.com/todos/');
        // $data['getDataFromServer'] = json_decode($getDataFromServer);

        // $this->view->LoadView('pageView', $data);
    }
    public function registration()
    {
        $currentUser = Session::exits('currentUser');
        if(!$currentUser){
            view('registrationView');
        }else{
            redirectTo('/page/index');
        }
    }
 
    public function takeDataRegistration()
    {
        if (
            $_SERVER["REQUEST_METHOD"] == "POST" &&
            !empty($_POST['name']) &&
            !empty($_POST['email']) &&
            !empty($_POST['phone']) &&
            !empty($_POST['country']) &&
            !empty($_POST['password'])
        ) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $country = $_POST['country'];
            $password = $_POST['password'];

            $data = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'country' => $country,
                'password' => $password
            ];

            $result = $this->userModel->insertRegForm('users', $data);

            if ($result ) {
                $currentUserData = [
                    'id' => $result->id,
                    'name' => $result->name,
                    'email' => $result->email,
                ];
                Session::set('currentUser', $currentUserData);
                redirectTo('/page/index');
            }
            
        }
    }

    // Login Part
    public function login()
    {
        $currentUser = Session::exits('currentUser');
        if(!$currentUser){
            view('loginView');
        }else{
            redirectTo('/page/index');
        }
    }

    public function takeDataLogin()
    {
        if (
            $_SERVER["REQUEST_METHOD"] == "POST"
            && !empty($_POST['email'])
            && !empty($_POST['password'])
        ) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $data = [
                'email' => $email,
                'password' => $password,
            ];

            $result = $this->userModel->loginData($data);
            if ($result) {
                $currentUserData = [
                    'id' => $result->id,
                    'name' => $result->name,
                    'email' => $result->email,
                ];
                Session::set('currentUser', $currentUserData);
                if ($password === $result->password) {
                    redirectTo('/page/index');
                }               
            }
            else{
                Session::set('notFoundUser','There is no user');
                // Session::set('loginTryTime', time());
                // dd(Session::get('notFoundUser'));
                redirectTo('/page/login');
            }
        }
    }

    public function profile()
    {
        view('profileView');
    }

    public function takeUpdateProfile()
    {
        if (
            $_SERVER["REQUEST_METHOD"] == "POST" &&
            !empty($_POST['name']) &&
            !empty($_POST['email']) &&
            !empty($_POST['phone']) &&
            !empty($_POST['country']) &&
            !empty($_POST['password'])
        ) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $country = $_POST['country'];
            $password = $_POST['password'];

            $currentUserId = Session::get('currentUser');
            $data = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'country' => $country,
                'password' => $password,
                'id' => $currentUserId['id']
            ];

            $result = $this->userModel->insertUpdatedData('users', $data);
        }
    }
    public function takeDeleteUser()
    {
       
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
            $id = Session::get('currentUser')['id'];
           
            $result = $this->userModel->deleteUser('users', $id);
        }
        if ($result) {
            Session::delete('currentUser');
            redirectTo('/page/login');
        }
    }

    public function logout()
    {
        Session::delete('currentUser');
        redirectTo('/page/login');
    }
}

<?php
// include_once '..' . DS . 'app' . DS . 'models' . DS . 'Users.php';

use App\Core\BaseController;
use App\Models\Users;
use App\Core\Session;
use App\Libraries\Http;

class trelloController extends BaseController
{
    protected $baseUrl = 'https://api.trello.com/1/';
    protected $apiKey;

    // key=f64e7d747fcc4405611f43c0fff82f66



    public  function index()
    {
        view('trelloAuthView');
    }

    public function takeKey()
    {
        if (
            $_SERVER["REQUEST_METHOD"] == "POST" &&
            !empty($_POST['key'])
        ) {
            $this->apiKey = $_POST['key'];
            redirectTo('/trello/getAccessTokenView/' . $this->apiKey);
        }
        // dd($this->apiKey);
    }

    public function getAccessTokenView($apiKey)
    {

        $data = [

            "urlWithKey" => $this->baseUrl . 'authorize?expiration=never&name=trelloToken&scope=read,write,account&response_type=token&key=' . $apiKey
        ];

        view('trelloGetAccessTokenView', $data);
    }

    public function returnUrlToken()
    {
        var_dump($_SERVER);
    }


    public function getBoardData()
    {
        // b79db683d8ba4fced5912155318215cfe852d0e1539d2e58234b4db874d9a6b4

        $urlGetBorad = $this->baseUrl . 'boards/aKI35Uq2/?key=f64e7d747fcc4405611f43c0fff82f66&token=92c62596ead592e1c7180cb94573e94ec4dad6e6ed727ab4b1cb0b843d3323e6';

        $getBoard = Http::get($urlGetBorad);

        var_dump($getBoard);
    }

    public function createCard()
    {
        $urlGetBorad = $this->baseUrl . 'cards/?key=f64e7d747fcc4405611f43c0fff82f66&token=92c62596ead592e1c7180cb94573e94ec4dad6e6ed727ab4b1cb0b843d3323e6';
        $query = array(
            "name" => "trello Bitcode",
            "idBoard" => "61e99ee1c5ff3d8b80356b25",
            "idList" => "61e99ee1c5ff3d8b80356b26"
        );

        $response = Http::post(
            $urlGetBorad,
            $query
        );

        var_dump($response);
    }
}

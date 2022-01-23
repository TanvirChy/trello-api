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
    protected $accessToken;

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
    }

    public function getAccessTokenView($apiKey)
    {
        $data = [

            "urlWithKey" => $this->baseUrl . 'authorize?expiration=never&name=trelloToken&scope=read,write,account&response_type=token&key=' . $apiKey . '&return_url=http://localhost/trelloapi/trello/returnUrlToken'
        ];

        view('trelloGetAccessTokenView', $data);
    }

    public function returnUrlToken()
    {

        // $return_url = ("<script type='text/javascript'> window.location.href</script>");
        // echo $return_url;
        // var_dump($_SERVER);

        view('returnUrlTokenView');
    }


    public function getBoardData()
    {


        $urlGetBorad = $this->baseUrl . 'boards/aKI35Uq2/?key=' . $this->apiKey . '&token=' . $this->accessToken;

        $getBoard = Http::get($urlGetBorad);

        var_dump($getBoard);
    }

    public function createCard()
    {
        $urlGetBorad = $this->baseUrl . 'cards/?key=' . $this->apiKey . '&token=' . $this->accessToken;
        $query = array(
            "name" => "hello everone",
            "idBoard" => "61e99ee1c5ff3d8b80356b25",
            "idList" => "61e99ee1c5ff3d8b80356b26"
        );

        $response = Http::post(
            $urlGetBorad,
            $query
        );

        var_dump($response);
    }

    public function takeHash()
    {
        $this->accessToken = $_POST['#token'];


        echo " hello every one {$this->accessToken}";
    }
}

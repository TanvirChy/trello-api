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
        // b79db683d8ba4fced5912155318215cfe852d0e1539d2e58234b4db874d9a6b4
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
        Session::set('apiKeySession', $apiKey);
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

        $apiKey = Session::get('apiKeySession');
        $accessToken = Session::get('accessToken');

        $urlGetBoradUrl = $this->baseUrl . 'boards/aKI35Uq2/?key=' . $apiKey . '&token=' . $accessToken;
        $urlGetBoardListsUrl = $this->baseUrl . 'boards/aKI35Uq2/lists?key=' . $apiKey . '&token=' . $accessToken;

        $getBoard = Http::get($urlGetBoradUrl);
        $urlGetBoardLists = Http::get($urlGetBoardListsUrl);

        $getBoardDataDecode = json_decode($getBoard);
        $urlGetBoardListsDecode = json_decode($urlGetBoardLists);

        $data = [
            "getBoradData" => $getBoardDataDecode,
            "urlGetBoardLists" => $urlGetBoardListsDecode
        ];

        view('getBoardDataView', $data);
    }

    // public function getBoardAllCards()
    // {
    //     $apiKey = Session::get('apiKeySession');
    //     $accessToken = Session::get('accessToken');

    //     $urlGetBoradAllCards =  $this->baseUrl . '/boards/aKI35Uq2/cards?key=' . $apiKey . '&token=' . $accessToken;

    //     $getBoardAllCards = Http::get($urlGetBoradAllCards);

    //     $data = ["getBoardAllCards" => $getBoardAllCards];
    //     view('getBoardDataView', $data);
    // }

    public function createCard()
    {
        $apiKey = Session::get('apiKeySession');
        $accessToken = Session::get('accessToken');
        $urlGetBorad = $this->baseUrl . 'cards/?key=' . $apiKey . '&token=' . $accessToken;
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
        $accessToken = $_POST['#token'];
        Session::set('accessToken', $accessToken);
    }

    public function boardList($id)
    {
        $apiKey = Session::get('apiKeySession');
        $accessToken = Session::get('accessToken');
        $urlGetBoradListCards = $this->baseUrl . 'lists/' . $id . '/cards?key=' . $apiKey . '&token=' . $accessToken;

        $urlGetBoradListCards = Http::get($urlGetBoradListCards);
        $urlGetBoradListCardsDecode = json_decode($urlGetBoradListCards);

        $data = [
            "urlGetBoradListCards" => $urlGetBoradListCardsDecode
        ];

        view('listCardsView',$data);
    }
}

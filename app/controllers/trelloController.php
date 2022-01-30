<?php
// include_once '..' . DS . 'app' . DS . 'models' . DS . 'Users.php';

use App\Core\BaseController;
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
        $card = null;
        if (isset($_POST['card'])) {
            $card = $_POST['card'];
        }
        $apiKey = Session::get('apiKeySession');
        $accessToken = Session::get('accessToken');
        $boardListData = Session::get('urlGetBoradListCards');
        

        $boardId = Session::get('boardId');
        $listId = Session::get('listId');
        // dd($listId);
        echo "{$listId} from create page";
        $urlGetBorad = $this->baseUrl . '/cards/?idList=' . $listId . '&key=' . $apiKey . '&token=' . $accessToken;
        $query = array(
            "name" => $card,
        );

        $response = Http::post(
            $urlGetBorad,
            $query
        );

        if ($response) {

            redirectTo('/trello/boardList/' . $boardId);
        }
    }

    public function takeHash()
    {
        $accessToken = $_POST['#token'];
        Session::set('accessToken', $accessToken);
    }

    public function boardList($id)
    {
        Session::set('boardId', $id);
        $apiKey = Session::get('apiKeySession');
        $accessToken = Session::get('accessToken');
        $urlGetBoradListCards = $this->baseUrl . 'lists/' . $id . '/cards?key=' . $apiKey . '&token=' . $accessToken;

        $apiResponse = Http::get($urlGetBoradListCards);
        
        // dd( $apiResponse);
        $apiResponseDecoded = json_decode($apiResponse);
        $listId = $apiResponseDecoded[0]->idList;
       
       
        Session::set('urlGetBoradListCards', $apiResponseDecoded);
        $data = [
            "urlGetBoradListCards" => $apiResponseDecoded
        ];


        view('listCardsView', $data);
    }
}

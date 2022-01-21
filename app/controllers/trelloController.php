<?php
// include_once '..' . DS . 'app' . DS . 'models' . DS . 'Users.php';

use App\Core\BaseController;
use App\Models\Users;
use App\Core\Session;
use App\Libraries\Http;

class trelloController extends BaseController
{


    public  function index()
    {
        view('trelloAuthView');
    }

    public function getBoardData()
    {
        $urlGetBorad = 'https://api.trello.com/1/boards/aKI35Uq2/?key=f64e7d747fcc4405611f43c0fff82f66&token=92c62596ead592e1c7180cb94573e94ec4dad6e6ed727ab4b1cb0b843d3323e6';

        $getBoard = Http::get($urlGetBorad);

        var_dump($getBoard);
    }

    public function createCard()
    {
        $urlGetBorad = 'https://api.trello.com/1/cards/?key=f64e7d747fcc4405611f43c0fff82f66&token=92c62596ead592e1c7180cb94573e94ec4dad6e6ed727ab4b1cb0b843d3323e6';
        $query = array(
            "name"=> "MithoDadaCard",
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

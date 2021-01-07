<?php


namespace App\Exceptions;

use App\Common\Response;
use Exception;
use Illuminate\Http\Request;

class BaseException extends Exception
{
    const BASE_ERR_CODE = 50000;
    const VALIDATOR_ERR_CODE = 50001;

    private $codeMessage = [
        self::BASE_ERR_CODE => '框架出现未知错误',
        self::VALIDATOR_ERR_CODE => '数据格式不合法'
    ];

    public function __construct($code)
    {
        parent::__construct($this->codeMessage[$code], $code, null);
    }

    public function render(Request $request)
    {
        $res = new Response($this->code, $this->message);
        return response()->json($res->response());
    }
}

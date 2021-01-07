<?php

namespace App\Http\Controllers;

use App\Common\Response;
use App\Exceptions\BaseException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //函数返回方式的封装以及添加返回数据的封装

    private $response;

    public function __construct()
    {
        $this->response = app(Response::class);
    }

    /**
     * 设置添加数据
     * @param $key
     * @param $value
     */
    public function put_data($key,$value)
    {
        $this->response->set_data($key,$value);
    }

    public function response()
    {
        return $this->response->response();
    }

    //重写validator的返回格式
    protected function throwValidationException(Request $request, $validator)
    {
        $response = [
            'code' => BaseException::VALIDATOR_ERR_CODE,
            'message'  => (new BaseException(BaseException::VALIDATOR_ERR_CODE))->getMessage(),
            'data' => $validator->errors()->toArray(),
        ];
        throw new ValidationException($validator, response()->json($response));
    }

}

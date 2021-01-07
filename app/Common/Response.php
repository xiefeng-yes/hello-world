<?php


namespace App\Common;

/**
 * 业务响应对象
 * Class Response
 * @package App\Common
 */
class Response
{
    protected $code = 0;
    protected $error = null;
    protected $data = null;

    public function __construct($code = 0, $error = null)
    {
        $this->code = $code;
        $this->error = $error;
    }

    /**
     * 获取指定key的数据
     * @param $key
     * @param $value
     */
    public function set_data($key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * 获取所有数据
     * @param null $key
     * @param null $default
     * @return mixed|null
     */
    public function get_data($key = null, $default = null)
    {
        if (!$key) {
            return $this->data;
        }
        return isset($this->data[$key]) ? $this->data[$key] : $default;
    }

    /**
     * 获取结果的返回数组
     * @return array
     */
    public function response()
    {
        return [
            'code' => $this->code,
            'error' => $this->error,
            'data' => $this->data
        ];
    }
}

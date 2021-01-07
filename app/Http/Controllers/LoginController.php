<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $data;
    public function __construct($data=null)
    {
        parent::__construct();
        $this->data=$data;
    }

    public function login_in(Request $request)
    {
        $name = $request["name"];
        echo $name;
    }

    public function login_out(Request $request)
    {
        $this->validate( $request, ['name'=>'Required|string']);
//        $this->data['name'] = $request["name"];
//        $this->data['age'] = '18';
        $this->put_data('name',$request['name']);
        $this->put_data('age',18);
        return $this->response();
    }
}

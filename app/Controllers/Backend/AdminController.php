<?php
namespace App\Controllers\Backend;
use \App\Controllers\BaseController;
class AdminController extends BaseController
{

    public function index()
    {
        $data['user']=db_connect()->table('users')->where('id',1)->get()->getRow();

        return view('backend\index',$data);
    }



}

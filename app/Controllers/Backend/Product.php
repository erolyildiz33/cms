<?php

namespace App\Controllers\Backend;

use \App\Controllers\BaseController;
use App\Model\Backend\Product_model;
use CodeIgniter\HTTP\Request;

class Product extends BaseController
{
    private $db, $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = model('App\Models\Backend\Product_model');
        $this->db = db_connect()->table('Product');


    }

    public function index()
    {

        $viewData['product'] = $this->model->asObject()->findAll();
        return view('backend/product/index', $viewData);
    }

    public function form($id=null)
    {
        helper(['form', 'url']);
        $id=$this->request->uri->getSegment(4);

        if (empty($id)) {
            if ($this->request->getMethod() == 'get') {
                return view('backend/product/form');
            } else {

                $input = $this->validate(['title' => 'required|min_length[3]']);
                $formModel = new Product_model();

                if (!$input) {
                    echo view('backend/product/form', [
                        'validation' => $this->validator
                    ]);
                } else {

                    $formModel->save([
                        'title' => $this->request->getVar('title'),
                        'decription' => $this->request->getVar('decription'),
                        'url' => urlYap($this->request->getVar('title')),
                        'rank' => 0,
                        'isActive' => 1,

                    ]);


                }
                return $this->response->redirect('/admin/product');
            }
        } else {
            if ($this->request->getMethod() == 'get') {
                $formModel =new Product_model();
                $obj=$formModel->asObject()->find($id);
                return view('backend/product/form',['finditem'=>$obj]);
            } else {
                helper(['form', 'url']);
                $input = $this->validate(['title' => 'required|min_length[3]']);
                $formModel = new Product_model();
                $obj=$formModel->asObject()->find($id);
                if (!$input) {
                    echo view('backend/product/form', [
                        'finditem'=>$obj,
                        'validation' => $this->validator
                    ]);
                } else {
                    echo $id;exit();
                    $formModel->update($id,[
                        'title' => $this->request->getVar('title'),
                        'decription' => $this->request->getVar('decription'),
                        'url' => urlYap($this->request->getVar('title')),
                        'rank' => 0,
                        'isActive' => 1,

                    ]);


                }
               // return $this->response->redirect('/admin/product');
            }
        }
    }


    public function update()
    {
        if ($this->request->getVar('isActive') == 'true') {
            $isActive = 1;
        } else {
            $isActive = 0;
        }
        $this->model->update($this->request->getVar('id'), ['isActive' => $isActive]);
    }

    public function insert()
    {
        helper(['form', 'url']);
        $input = $this->validate(['title' => 'required|min_length[3]']);


        $formModel = new Product_model();

        if (!$input) {
            echo view('backend/product/form', [
                'validation' => $this->validator
            ]);
        } else {
            echo $this->request->getVar('title');
            /*
            $formModel->save([
                'title' => $this->request->getVar('title'),

            ]);

            */
        }


    }
}

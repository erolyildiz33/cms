<?php

namespace App\Controllers\Backend;

use \App\Controllers\BaseController;
use App\Model\Backend\Product_model;
use CodeIgniter\HTTP\Request;

class Product extends BaseController
{
    private $db, $model, $session;

    public function __construct()
    {
        parent::__construct();
        $this->model = model('App\Models\Backend\Product_model');
        $this->db = db_connect()->table('Product');
        $this->session = session();
    }

    public function index()
    {
        $viewData['product'] = $this->model->orderBy('rank', 'ASC')->asObject()->findAll();
        return view('backend/product/index', $viewData);
    }

    public function form($id = null)
    {
        helper(['form', 'url']);
        if ($this->request->getMethod() == 'get') { /* GET VARMI */
            $segment = $this->request->uri->getSegment(4);
            if (!empty($segment)) { /* GET SEGMENT VARMI */

                $formModel = new Product_model();
                $obj = $formModel->asObject()->find($segment);

                if ($obj) { /* GET KAYIT VARMI */

                    echo view('backend/product/form', [
                        'finditem' => $obj,
                    ]);
                } else {
                    $this->session->setFlashdata('message', '<?php echo display("noitemadd") ?> <a href="#"><?php echo display("click") ?></a>');
                    return $this->response->redirect('/admin/product');
                }
            } else {
                return view('backend/product/form');
            }
        } elseif ($this->request->getMethod() == 'post') {/* POST VARMI */
            $updateId = $this->request->getVar('update');
            if ($updateId) {
                $input = $this->validate(['title' => 'required|min_length[3]']);
                if ($input) { /* POST  VALIDATE */
                    $formModel = new Product_model();
                    $formModel->update($updateId, [
                        'title' => $this->request->getVar('title'),
                        'description' => $this->request->getVar('description'),
                        'url' => urlYap($this->request->getVar('title')),
                        'rank' => 0,
                        'isActive' => 1,
                    ]);
                    $this->session->setFlashdata('message', "kayıt güncellendi");
                    return $this->response->redirect('/admin/product');
                } else {
                    $this->session->setFlashdata('updateError', '1');
                    $this->session->setFlashdata('validation', $this->validator->getError('title'));

                    return $this->response->redirect('/admin/product/form/' . $updateId);
                }
            } else {
                $input = $this->validate(['title' => 'required|min_length[3]']);
                if ($input) { /* POST  VALIDATE */
                    $formModel = new Product_model();
                    $formModel->save([
                        'title' => $this->request->getVar('title'),
                        'description' => $this->request->getVar('description'),
                        'url' => urlYap($this->request->getVar('title')),
                        'rank' => 0,
                        'isActive' => 1,
                    ]);
                    $this->session->setFlashdata('message', "kayıt eklendi");
                    return $this->response->redirect('/admin/product');
                } else {
                    $this->session->setFlashdata('validation', $this->validator->getError('title'));
                    return $this->response->redirect('/admin/product/form');
                }
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
        if ($this->model->update($this->request->getVar('id'), ['isActive' => $isActive]))
            echo "yes"; else echo "no";

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

        }


    }


    public function delete()
    {
        $this->model->delete($this->request->getVar('id'));
    }

    public function ranksetter()
    {
        $data = $this->request->getVar('data');
        parse_str($data,$order);
        $items=$order['ord'];
        foreach ($items as $rank=>$id){
            $this->model->update(['id'=>$id,'rank'!=$rank],['rank'=>$rank]);
        }
    }
    public function image_form($id = null){
        return view('backend/product/images');
    }
}

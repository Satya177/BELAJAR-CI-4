<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductCategoryModel;
use CodeIgniter\HTTP\ResponseInterface;

class ProductCategoryController extends BaseController
{

     protected $product_categoy; 

    function __construct()
    {
        $this->product_categoy = new ProductCategoryModel();
    } 

	public function index()
    {
        $product_categoy = $this->product_categoy->findAll();
        $data['product_categoy'] = $product_categoy;

        return view('v_productcategory', $data);
    }
    public function create()
    {
        

        $dataForm = [
            'nama' => $this->request->getPost('nama'),
            'slug' => $this->request->getPost('slug'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'created_at' => date("Y-m-d H:i:s")
        ];

        $this->product_categoy->insert($dataForm);

        return redirect('productcategory')->with('success', 'Data Berhasil Ditambah');
    } 
    public function edit($id)
    {
        $dataProductCategory = $this->product_categoy->find($id);

        $dataForm = [
            'nama' => $this->request->getPost('nama'),
            'slug' => $this->request->getPost('slug'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'updated_at' => date("Y-m-d H:i:s")
        ];

        

        $this->product_categoy->update($id, $dataForm);

        return redirect('productcategory')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $dataProductCategory     = $this->product_categoy->find($id);



        $this->product_categoy->delete($id);

        return redirect('productcategory')->with('success', 'Data Berhasil Dihapus');
    }
}
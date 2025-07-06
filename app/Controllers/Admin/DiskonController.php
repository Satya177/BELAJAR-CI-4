<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DiskonModel;

class DiskonController extends BaseController
{
    protected $diskonModel;

    public function __construct()
    {
        $this->diskonModel = new DiskonModel();
    }

    public function index()
    {
        if (!session()->get('role') || session()->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
        }

        $data = [
            'title' => 'Manajemen Diskon',
            'diskons' => $this->diskonModel->orderBy('tanggal', 'ASC')->findAll()
        ];

        return view('admin/diskon/index', $data);
    }

    public function create()
    {
        if (!session()->get('role') || session()->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Akses ditolak.');
        }

        $data = [
            'title' => 'Tambah Diskon',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/diskon/create', $data);
    }

public function store()
{
    if (!session()->get('role') || session()->get('role') !== 'admin') {
        return redirect()->to('/login')->with('error', 'Akses ditolak.');
    }

    $validation = \Config\Services::validation();

    $rules = [
        'tanggal' => [
            'rules' => 'required|valid_date|is_unique[diskon.tanggal]',
            'errors' => [
                'required' => 'Tanggal harus diisi',
                'valid_date' => 'Format tanggal tidak valid',
                'is_unique' => 'Tanggal sudah ada. Tidak boleh menambahkan diskon untuk tanggal yang sama.'
            ]
        ],
        'nominal' => [
            'rules' => 'required|numeric|greater_than[0]',
            'errors' => [
                'required' => 'Nominal harus diisi',
                'numeric' => 'Nominal harus berupa angka',
                'greater_than' => 'Nominal harus lebih besar dari 0'
            ]
        ]
    ];

    if (!$this->validate($rules)) {
        // Kirim kembali ke index dengan validasi dan input sebelumnya
        return redirect()->to('/admin/diskon')->withInput()->with('validation', $validation);
    }

    $this->diskonModel->save([
        'tanggal' => $this->request->getPost('tanggal'),
        'nominal' => $this->request->getPost('nominal')
    ]);

    return redirect()->to('/admin/diskon')->with('success', 'Data diskon berhasil ditambahkan');
}


    public function edit($id)
    {
        if (!session()->get('role') || session()->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Akses ditolak.');
        }

        $diskon = $this->diskonModel->find($id);
        if (!$diskon) {
            return redirect()->to('/admin/diskon')->with('error', 'Data diskon tidak ditemukan');
        }

        $data = [
            'title' => 'Edit Diskon',
            'diskon' => $diskon,
            'validation' => \Config\Services::validation()
        ];

        return view('admin/diskon/edit', $data);
    }

    public function update($id)
    {
        if (!session()->get('role') || session()->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Akses ditolak.');
        }

        $diskon = $this->diskonModel->find($id);
        if (!$diskon) {
            return redirect()->to('/admin/diskon')->with('error', 'Data diskon tidak ditemukan');
        }

        $rules = [
            'nominal' => [
                'rules' => 'required|numeric|greater_than[0]',
                'errors' => [
                    'required' => 'Nominal harus diisi',
                    'numeric' => 'Nominal harus berupa angka',
                    'greater_than' => 'Nominal harus lebih besar dari 0'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $this->diskonModel->update($id, [
            'tanggal' => $diskon['tanggal'],
            'nominal' => $this->request->getPost('nominal')
        ]);

        return redirect()->to('/admin/diskon')->with('success', 'Data diskon berhasil diperbarui');
    }

    public function delete($id)
    {
        if (!session()->get('role') || session()->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Akses ditolak.');
        }

        $diskon = $this->diskonModel->find($id);
        if (!$diskon) {
            return redirect()->to('/admin/diskon')->with('error', 'Data diskon tidak ditemukan');
        }

        $this->diskonModel->delete($id);
        return redirect()->to('/admin/diskon')->with('success', 'Data diskon berhasil dihapus');
    }
}

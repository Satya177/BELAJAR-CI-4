<?php

namespace App\Models;

use CodeIgniter\Model;

class DiskonModel extends Model
{
    protected $table = 'diskon'; // ✅ sesuai dengan nama tabel
    protected $primaryKey = 'id'; // ✅ ini wajib biar bisa update/delete
    protected $useAutoIncrement = true;

    protected $allowedFields = ['tanggal', 'nominal', 'created_at', 'updated_at'];

    protected $useTimestamps = true; // ✅ agar otomatis isi created_at & updated_at
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}

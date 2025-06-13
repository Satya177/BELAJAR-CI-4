<?php 
namespace App\Models;

use CodeIgniter\Model;

class ProductCategoryModel extends Model
{
	protected $table = 'product_categoy'; 
	protected $primaryKey = 'id';	
	protected $allowedFields = [
		'nama','slug','deskripsi','created_at','updated_at'
	];  
}
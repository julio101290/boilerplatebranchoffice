<?php

namespace julio101290\boilerplatebranchoffice\Models;

use CodeIgniter\Model;

class BranchofficesModel extends Model{

    protected $table      = 'branchoffices';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['key'
    ,'name'
    ,'cologne'
    ,'city'
    ,'postalCode'
    ,'timeDifference'
    ,'tax'
    ,'dateAp'
    ,'phone'
    ,'fax'
    ,'companie'
    ,'arqueoCaja'
    ,'created_at
    ','deleted_at'
    ,'updated_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules = [
        'key'           => 'required|alpha_numeric|max_length[8]',
        'name'          => 'permit_empty|string|max_length[256]',
        'cologne'       => 'permit_empty|string|max_length[64]',
        'city'          => 'permit_empty|string|max_length[128]',
        'postalCode'    => 'permit_empty|numeric|exact_length[5]',
        'timeDifference'=> 'permit_empty|string|max_length[4]',
        'tax'           => 'permit_empty|string|max_length[4]',
        'dateAp'        => 'valid_date',
        'phone'         => 'permit_empty|string|max_length[16]',
        'fax'           => 'permit_empty|string|max_length[16]',
        'companie'      => 'permit_empty|alpha_numeric|max_length[8]',
        'arqueoCaja'    => 'permit_empty|string|max_length[5]',
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    
    
        public function mdlSucursalesPorUsuario($usuario){


        $resultado =$this->db->table('branchoffices a, usuarios_sucursal b')
        ->select('a.id,a.name,key,a.created_at,a.updated_at,a.deleted_at')
        ->where('a.id', 'b.idSucursal', FALSE)
        ->where('b.status', 'on')
        ->where('b.idUsuario', $usuario)->get()->getResultArray();

        return $resultado;

    }

}
        
<?php

namespace julio101290\boilerplatebranchoffice\Models;

use CodeIgniter\Model;

class BranchofficesModel extends Model{

    protected $table      = 'branchoffices';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id'
    ,'key'
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

    protected $validationRules    =  [
         'key ' => 'is_unique[branchoffices.key]',

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
        
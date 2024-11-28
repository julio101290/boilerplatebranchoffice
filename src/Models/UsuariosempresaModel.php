<?php

namespace julio101290\boilerplatebranchoffice\Models;

use CodeIgniter\Model;

class UsuariosempresaModel extends Model {

    protected $table = 'usuariosempresa';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'idEmpresa', 'idUsuario', 'status', 'created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function mdlUsuariosPorEmpresa($idEmpresa, $busqueda) {


        $resultado = $this->db->table('usuariosempresa a, users b')
                        ->select('b.id,b.firstname,b.lastname,b.username')
                        ->where('a.idUsuario', 'b.id', FALSE)
                        ->where('a.status', 'on')
                        ->where('a.idEmpresa', $idEmpresa)
                        ->groupStart()
                        ->like("b.username", $busqueda)
                        ->orlike("b.firstname", $busqueda)
                        ->orlike("b.lastname", $busqueda)
                        ->groupEnd()
                        ->get()->getResultArray();

        return $resultado;
    }
}

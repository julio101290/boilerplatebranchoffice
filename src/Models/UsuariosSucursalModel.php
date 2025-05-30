<?php

namespace julio101290\boilerplatebranchoffice\Models;

use CodeIgniter\Model;

class UsuariosSucursalModel extends Model {

    protected $table = 'usuarios_sucursal';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'idEmpresa', 'idSucursal', 'idUsuario', 'status', 'created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    function mdlSucursalesPorUsuario($sucursal, $empresasID) {

        $isPostgres = $this->db->DBDriver === 'Postgre';
        $semiC = $isPostgres ? '"' : '';

        $result = $this->db->table('users a, usuariosempresa b')
                ->select(
                        'COALESCE(a.id,0) as id
            ,a.username as username
            ,b.idEmpresa as idEmpresa
            ,' . $sucursal . ' as idSucursal
            ,COALESCE((
                select status 
                from usuarios_sucursal z
                where ' . $semiC . 'z' . $semiC . '.' . $semiC . 'idUsuario' . $semiC . ' = ' . $semiC . 'a' . $semiC . '.' . $semiC . 'id' . $semiC . '
                    and ' . $semiC . 'z' . $semiC . '.' . $semiC . 'idEmpresa' . $semiC . ' = ' . $semiC . 'b' . $semiC . '.' . $semiC . 'idEmpresa' . $semiC . '
                    and ' . $semiC . 'z' . $semiC . '.' . $semiC . 'idSucursal' . $semiC . ' = ' . $sucursal . '
            ), \'off\') as status
            ,COALESCE((
                select id 
                from usuarios_sucursal z
                where ' . $semiC . 'z' . $semiC . '.' . $semiC . 'idUsuario' . $semiC . ' = ' . $semiC . 'a' . $semiC . '.' . $semiC . 'id' . $semiC . '
                    and ' . $semiC . 'z' . $semiC . '.' . $semiC . 'idEmpresa' . $semiC . ' = ' . $semiC . 'b' . $semiC . '.' . $semiC . 'idEmpresa' . $semiC . '
                    and ' . $semiC . 'z' . $semiC . '.' . $semiC . 'idSucursal' . $semiC . ' = ' . $sucursal . '
            ), 0) as ' . $semiC . 'idSucursalUsuario' . $semiC
                )
                ->where('a.id', $semiC . 'b' . $semiC . '.' . $semiC . 'idUsuario' . $semiC, FALSE)
                ->where('b.idEmpresa', $empresasID);

        return $result;
    }
}

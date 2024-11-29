<?php

namespace julio101290\boilerplatebranchoffice\Models;

use CodeIgniter\Model;

class UsuariosSucursalModel extends Model
{
    protected $table      = 'usuarios_sucursal';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'idEmpresa', 'idSucursal', 'idUsuario', 'status', 'created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    =  [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    public function mdlSucursalesPorUsuario($sucursal, $empresasID)
    {

        $result = $this->db->table('users a, usuariosempresa b')
            ->select(
                'ifnull(a.id,0) as id
                ,a.username
                ,b.idEmpresa
                ,' . $sucursal . ' as idSucursal
                ,ifnull((select status 
                            from usuarios_sucursal z
                            where z.idUsuario = a.id
                                and z.idEmpresa=b.idEmpresa
                                    and z.idSucursal=' . $sucursal . '
                                    ),\'off\') as status
                                        
                ,ifnull((select id 
                        from usuarios_sucursal z
                        where z.idUsuario = a.id
                            and z.idEmpresa=b.idEmpresa
                                and z.idSucursal=' . $sucursal . '
                                ),0) as idSucursalUsuario
                '

            )

            ->where('a.id', 'b.idUsuario', FALSE)
            ->where('b.idEmpresa', $empresasID);

        return $result;
    }
}

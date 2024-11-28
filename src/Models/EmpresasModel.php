<?php

namespace julio101290\boilerplatecompanies\Models;

use CodeIgniter\Model;

/**
 * @method User|null first()
 */
class EmpresasModel extends Model {

    protected $table = 'empresas';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id'
        , 'nombre'
        , 'direccion'
        , 'rfc'
        , 'telefono'
        , 'correoElectronico'
        , 'diasEntrega'
        , 'caja'
        , 'logo'
        
        , 'certificado'
        , 'archivoKey'
        , 'contraCertificado'
        
        , 'certificadoCSD'
        , 'archivoKeyCSD'
        , 'contraCertificadoCSD'
        
        , 'regimenFiscal'
        , 'razonSocial'
        , 'CURP'
        , 'codigoPostal'
        , 'email'
        , 'host'
        , 'smtpDebug'
        , 'SMTPAuth'
        , 'port'
        , 'smptSecurity'
        , 'pass'
        , 'created_at '
        , 'updated_at '
        , 'deleted_at'
        , 'facturacionRD'
    ];
    protected $useTimestamps = true;

    /*
    protected $validationRules = [
        'correoElectronico' => 'required|valid_email',
        'razonSocial ' => 'required|alpha_numeric_punct|min_length[3]|is_unique[empresas.razonSocial]',
        'rfc ' => 'is_unique[empresas.rfc]',
    ];

    */

    protected $validationRules = [
        'correoElectronico' => 'required|valid_email',
        'razonSocial ' => 'required|alpha_numeric_punct|min_length[3]|',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;


    /**
     * Empresas Por Usuario
     * 
     */
    public function mdlEmpresasPorUsuario($usuario){


        $resultado =$this->db->table('empresas a, usuariosempresa b')
        ->select('a.id,a.nombre,rfc,a.created_at,a.updated_at,a.deleted_at,a.facturacionRD')
        ->where('a.id', 'b.idEmpresa', FALSE)
        ->where('b.status', 'on')
        ->where('b.idUsuario', $usuario)->get()->getResultArray();

        return $resultado;

    }

}
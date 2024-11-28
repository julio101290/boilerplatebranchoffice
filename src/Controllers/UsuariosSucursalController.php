<?php

namespace julio101290\boilerplatebranchoffice\Controllers;

use App\Controllers\BaseController;
use \julio101290\boilerplatebranchoffice\Models\{
    UsuariosSucursalModel
};
use julio101290\boilerplatelog\Models\LogModel;
use CodeIgniter\API\ResponseTrait;

class UsuariosSucursalController extends BaseController {

    use ResponseTrait;

    protected $log;
    protected $usuariosSucursal;

    public function __construct() {
        $this->usuariosSucursal = new UsuariosSucursalModel();
        $this->log = new LogModel();
        helper('menu');
    }

    public function index() {
        if ($this->request->isAJAX()) {
            $datos = $this->usuariosSucursal>select('id,idEmpresa,idSucursal,idUsuario,status,created_at,updated_at,deleted_at')->where('deleted_at', null);
            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }
        $titulos["title"] = "Usuarios Sucursal";
        $titulos["subtitle"] = "Usuarios Por Sucursal";
        return view('usuariosAlmacen', $titulos);
    }

    /**
     * Read Usuariosempresa
     */
    public function getUsuariosAlmacen() {
        $idUsuariosAlmacen = $this->request->getPost("idUsuariosSucursal");
        $datosUsuariosAlmacen = $this->usuariosAlmacen->find($idUsuariosAlmacen);
        echo json_encode($datosUsuariosAlmacen);
    }

    /**
     * Save or update Usuariosempresa
     */
    public function save() {
        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;
        $datos = $this->request->getPost();
        if ($datos["idUsuariosSucursal"] == 0) {
            try {
                if ($this->usuariosSucursal->save($datos) === false) {
                    $errores = $this->usuariosSucursal->errors();
                    foreach ($errores as $field => $error) {
                        echo $error . " ";
                    }
                    return;
                }
                $dateLog["description"] = "Usuarios Por Sucursal" . json_encode($datos);
                $dateLog["user"] = $userName;
                $this->log->save($dateLog);
                echo "Guardado Correctamente";
            } catch (\PHPUnit\Framework\Exception $ex) {
                echo "Error al guardar " . $ex->getMessage();
            }
        } else {
            if ($this->usuariosSucursal->update($datos["idUsuariossucursal"], $datos) == false) {
                $errores = $this->usuariosSucursal->errors();
                foreach ($errores as $field => $error) {
                    echo $error . " ";
                }
                return;
            } else {
                $dateLog["description"] = lang("usuariosSucursal.logUpdated") . json_encode($datos);
                $dateLog["user"] = $userName;
                $this->log->save($dateLog);
                echo "Actualizado Correctamente";
                return;
            }
        }
        return;
    }

    /**
     * Delete Usuariosempresa
     * @param type $id
     * @return type
     */
    public function delete($id) {
        $infoUsuariosSucursal = $this->usuariosSucursal->find($id);
        helper('auth');
        $userName = user()->username;
        if (!$found = $this->usuariosSucursal->delete($id)) {
            return $this->failNotFound(lang('usuariosempresa.msg.msg_get_fail'));
        }
        $this->usuariosSucursal->purgeDeleted();
        $logData["description"] = "Datos Anteriores Usuarios Por Sucursal" . json_encode($infoUsuariosSucursal);
        $logData["user"] = $userName;
        $this->log->save($logData);
        return $this->respondDeleted($found, lang('usuariossucursal.msg_delete'));
    }

}

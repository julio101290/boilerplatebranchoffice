<?php

namespace julio101290\boilerplatebranchoffice\Database\Seeds;

use CodeIgniter\Config\Services;
use CodeIgniter\Database\Seeder;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;

/**
 * Class BoilerplateSeeder.
 */
class BoilerplateBranchofficeCRUD extends Seeder {

    /**
     * @var Authorize
     */
    protected $authorize;

    /**
     * @var Db
     */
    protected $db;

    /**
     * @var Users
     */
    protected $users;

    public function __construct() {
        $this->authorize = Services::authorization();
        $this->db = \Config\Database::connect();
        $this->users = new UserModel();
    }

    public function run() {


        // Permission
        $this->authorize->createPermission('branchoffices-permission', 'Permissions for backups');

        // Assign Permission to user
        $this->authorize->addPermissionToUser('branchoffices-permission', 1);

    }

    public function down() {
        //
    }
}

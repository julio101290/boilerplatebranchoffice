<?php

namespace julio101290\boilerplatebranchoffice\Commands;

use CodeIgniter\CLI\BaseCommand;
use Config\Database;
use Config\Autoload;
use CodeIgniter\CLI\CLI;

/**
 * Class InstallCommand.
 */
class InstallCommandBranchOffice extends BaseCommand
{
    /**
     * The group the command is lumped under
     * when listing commands.
     *
     * @var string
     */
    protected $group = 'boilerplatebranchoffice';

    /**
     * The command's name.
     *
     * @var string
     */
    protected $name = 'boilerplatebranchoffice:installbranchoffice';

    /**
     * The command's short description.
     *
     * @var string
     */
    protected $description = 'Db install for basic boilerplate CRUD branchoffice data.';

    /**
     * The command's usage.
     *
     * @var string
     */
    protected $usage = 'boilerplatebranchoffice:installbranchoffice';

    /**
     * The commamd's argument.
     *
     * @var array
     */
    protected $arguments = [];

    /**
     * The command's options.
     *
     * @var array
     */
    protected $options = [];

    //--------------------------------------------------------------------

    /**
     * Displays the help for the spark cli script itself.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        try {
            
            $this->determineSourcePath();
            
            $this->publishMigration();
            $this->call('migrate');
            // then seed data
            $seeder = Database::seeder();
            $seeder->call('julio101290\boilerplatebranchoffice\Database\Seeds\BoilerplateBranchofficeCRUD');
        } catch (\Exception $e) {
            $this->showError($e);
        }
    }
    
    protected function publishMigration()
    {
        $map = directory_map($this->sourcePath.'/Database/Migrations');

        foreach ($map as $file) {
            $content = file_get_contents("{$this->sourcePath}/Database/Migrations/{$file}");
            //$content = str_replace('namespace julio101290\boilerplatesettings\Database\Migrations', 'namespace '.APP_NAMESPACE.'\Database\Migrations', $content);

            $this->writeFile("Database/Migrations/{$file}", $content);
        }
    }
    
    
     protected function determineSourcePath()
    {
        $this->sourcePath = realpath(__DIR__.'/../');

        if ($this->sourcePath == '/' || empty($this->sourcePath)) {
            CLI::error('Unable to determine the correct source directory. Bailing.');
            exit();
        }
    }
    
        /**
     * Write a file, catching any exceptions and showing a
     * nicely formatted error.
     *
     * @param string $path
     * @param string $content
     */
    protected function writeFile(string $path, string $content)
    {
        $config = new Autoload();
        $appPath = $config->psr4[APP_NAMESPACE];

        $directory = dirname($appPath.$path);

        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        try {
            write_file($appPath.$path, $content);
        } catch (\Exception $e) {
            $this->showError($e);
            exit();
        }

        $path = str_replace($appPath, '', $path);

        CLI::write(CLI::color('  created: ', 'green').$path);
    }
    
}

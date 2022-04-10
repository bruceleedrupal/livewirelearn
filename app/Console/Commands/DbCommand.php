<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DbCommand extends Command
{
    protected $database;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db {type}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup ＆ Restore Mysql Database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $connection = config('database.connections.' . config('database.default'));

        $this->database = [
            $connection['username'], //"user" 
            $connection['password'], //"password" =
            $connection['database'], //"database"
            storage_path() . "/" . $connection['database'] . ".sql" //"filename"
        ];
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $type = $this->argument('type');
        if ($type == "b") {
            $this->backup();
        } else if ($type == "r" && $this->confirm('还原数据库?')) {
            $this->restore();
        }
    }

    protected function backup()
    {

        [$user, $password, $database, $filename] = $this->database;
        $command = "mysqldump -u$user -p$password --no-tablespaces $database>$filename";

        exec($command);
        return 0;
    }

    protected function restore()
    {
        [$user, $password, $database, $filename] = $this->database;
        $command = "mysql -u$user -p$password $database < $filename";

        exec($command);
        return 0;
    }
}

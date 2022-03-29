<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ImportFromFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file_name = resource_path('database').'/blog.sql';
        //echo $file_name;
        //print_r($_SERVER);
        $db_username = config('database.connections.mysql.username');
        $db_password = config('database.connections.mysql.password');
        $password_option = $db_password == ''? '' : " -p $db_password ";
        $db_database = config('database.connections.mysql.database');
        $command = "mysql -u $db_username $password_option --database $db_database < $file_name";
        //echo $command;

        //$command = "sudo mysql -u root --database blog2 < $file_name"; // For Linux
        if(!system($command)){
            echo "Execution failed. Could not import database.";
            return false;
        }
    }
}

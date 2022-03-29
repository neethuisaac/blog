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
        echo $file_name;
        print_r($_SERVER['OS']);
        $command = "sudo mysql -u root --database blog2 < $file_name";

        //exec($command);
    }
}

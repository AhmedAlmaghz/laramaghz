<?php

namespace Almaghz\Laramaghz\Laramaghz\Traits;


use Almaghz\Laramaghz\Laramaghz\Seeders\ItemsSeeder;

trait laramaghzSeederTrait
{


    /*
    * load laramaghz modules
    * loop in modules folder
    * get all seeders
    * add them
    */

    protected function getlaramaghzSeeder(){

        $this->call(ItemsSeeder::class);

        $path = fixPath(base_path('app/Modules'));

        if(is_dir($path)){

            $directories = \Illuminate\Support\Facades\File::directories($path);

            if(!empty($directories)){

                foreach ($directories as $directory){

                    $moduleName = explode(DIRECTORY_SEPARATOR , $directory);

                    $moduleName = end($moduleName);

                    $fullProviderPath = fixPath($directory.'/Database/seeds/'.$moduleName.'Seeder.php');

                    if(file_exists($fullProviderPath)){

                        $nameSpace = 'App\\Modules\\'.$moduleName.'\\Database\\Seeds\\'.$moduleName.'Seeder';

                        $this->call($nameSpace);

                    }
                }
            }
        }

    }

}

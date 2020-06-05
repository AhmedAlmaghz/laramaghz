<?php

namespace Almaghz\Laramaghz\Providers;



//use almaghz\zipper\Zipper;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Almaghz\Laramaghz\Laramaghz\Commands\AdminAddEditCommand;
use Almaghz\Laramaghz\Laramaghz\Commands\AdminControllerCommand;
use Almaghz\Laramaghz\Laramaghz\Commands\AdminFormCommand;
use Almaghz\Laramaghz\Laramaghz\Commands\AdminIndexCommand;
//use Almaghz\Laramaghz\Laramaghz\Commands\AdminRelationCommand;
use Almaghz\Laramaghz\Laramaghz\Commands\AdminRequestCommand;
use Almaghz\Laramaghz\Laramaghz\Commands\AdminRouteCommand;
use Almaghz\Laramaghz\Laramaghz\Commands\ApiControllerCommand;
use Almaghz\Laramaghz\Laramaghz\Commands\ApiRequestCommand;
use Almaghz\Laramaghz\Laramaghz\Commands\ApiResourcesCommand;
use Almaghz\Laramaghz\Laramaghz\Commands\ApiRouteCommand;
use Almaghz\Laramaghz\Laramaghz\Commands\ConfigCommand;
use Almaghz\Laramaghz\Laramaghz\Commands\FrontAddEditCommand;
use Almaghz\Laramaghz\Laramaghz\Commands\FrontControllerCommand;
use Almaghz\Laramaghz\Laramaghz\Commands\FrontFormCommand;
use Almaghz\Laramaghz\Laramaghz\Commands\FrontIndexCommand;
use Almaghz\Laramaghz\Laramaghz\Commands\FrontRequestCommand;
use Almaghz\Laramaghz\Laramaghz\Commands\FrontRouteCommand;
use Almaghz\Laramaghz\Laramaghz\Commands\InstallCommand;
use Almaghz\Laramaghz\Laramaghz\Commands\LangCommand;
use Almaghz\Laramaghz\Laramaghz\Commands\MigrationCommand;
use Almaghz\Laramaghz\Laramaghz\Commands\ModelCommand;
use Almaghz\Laramaghz\Laramaghz\Commands\SeederCommand;
use Almaghz\Laramaghz\Laramaghz\Commands\ServiceProviderCommand;
use Almaghz\Laramaghz\Laramaghz\Traits\FileTrait;


class LaramaghzServiceProvider extends ServiceProvider
{

   use FileTrait;

    protected $DS = DIRECTORY_SEPARATOR;

    /**
     * Bootstrap services.
     *
     * @return void
     * @throws \Exception
     */

    public function boot()
    {

        $modulePath = app_path('Modules');

        $this->createFolder($modulePath);

        $location = __DIR__.$this->DS.'../Resources'.$this->DS.'Modules'.$this->DS.'Users.zip';

        $destination = app_path('Modules');

        $zip = new  \Madnest\Madzipper\Madzipper;

        $zip->zip($location)->extractTo($destination);

        // extract assets.zip  then publish its
        $locationAssets = __DIR__.$this->DS.'../Resources'.$this->DS.'assets.zip';
       
        $destinationAssets= __DIR__.$this->DS.'../Resources';

      //  $Assets = new  \Madnest\Madzipper\Madzipper;
        $zip->zip($locationAssets)->extractTo($destinationAssets);


        /*
         * change the auth to laramaghz auth
         */

        $this->publishes([
            __DIR__ . '/../Resources/config' => base_path('config'),
        ], 'laramaghz');


        /*
         * publish Admin panel Style
         * first put all js and css in public folder
         */

        $this->publishes([
            __DIR__ . '/../Resources/assets' => public_path('assets'),
        ], 'laramaghz');

        /*
         * copy All users files to modules
         */

        $this->publishes([
            __DIR__ . '/../Resources/Modules' => $modulePath,
        ], 'laramaghz');


        /*
         * load laramaghz language files
         */

        $this->loadTranslationsFrom(__DIR__ . '/../laramaghz/lang', 'laramaghz');

        /*
         * load laramaghz migrations files
         */

        $this->loadMigrationsFrom(__DIR__ . '/../laramaghz/migrations');

        /*
         * load laramaghz routes
         * generators routes
         */

        $this->loadRoutesFrom(__DIR__ . '/../laramaghz/routes/admin.php');

        /*
         * loads laramaghz files
         * generators views
         */

        $this->loadViewsFrom(__DIR__ . '/../laramaghz/views', 'laramaghz');

        /*
       * load all Providers
       */

        $this->loadProviders();

        /*
         * register command
         */

        $this->commands([
            MigrationCommand::class,
            ServiceProviderCommand::class,
            AdminRouteCommand::class,
            ModelCommand::class,
            AdminIndexCommand::class,
            AdminAddEditCommand::class,
            AdminControllerCommand::class,
            AdminFormCommand::class,
            AdminRequestCommand::class,
            ConfigCommand::class,
            SeederCommand::class,
            InstallCommand::class,
            LangCommand::class,
            ApiResourcesCommand::class,
            ApiRouteCommand::class,
            ApiControllerCommand::class,
            ApiRequestCommand::class,
            FrontRouteCommand::class,
            FrontIndexCommand::class,
            FrontAddEditCommand::class,
            FrontControllerCommand::class,
            FrontFormCommand::class,
            FrontRequestCommand::class
        ]);

    }

    /**
     * Register services.
     *
     * @return void
     */

    public function register()
    {

        /*
         * register helpers files
         */

        $this->registerHelpers('arrays');
        $this->registerHelpers('path');
        $this->registerHelpers('crud');
        $this->registerHelpers('lang');
        $this->registerHelpers('function');

    }

    /**
     * load helpers.
     *
     * @return void
     */

    public function registerHelpers($file)
    {
        // Load the helpers in app/Http/helpers.php
        if (file_exists($file = __DIR__ . '/../laramaghz/Helpers/' . $file . '.php')) {
            require $file;
        }
    }


    /*
     * load All Providers
     * that will generated with laramaghz
     */

    public function loadProviders()
    {

        $path = base_path('app' . $this->DS . 'Modules');

        if (is_dir($path)) {

            $directories = File::directories($path);

            if (!empty($directories)) {

                foreach ($directories as $directory) {

                    $moduleName = explode($this->DS, $directory);

                    $moduleName = end($moduleName);

                    $fullProviderPath = $directory . $this->DS . 'Providers' . $this->DS . 'laramaghz' . $moduleName . 'ServicesProvider.php';

                    if (file_exists($fullProviderPath)) {

                        $nameSpace = 'App\\Modules\\' . $moduleName . '\\Providers\\' . 'laramaghz' . $moduleName . 'ServicesProvider';

                        app()->register($nameSpace);

                    }
                }
            }
        }

    }


}

<?php

namespace Almaghz\Laramaghz\Providers;



//use almaghz\zipper\Zipper;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use almaghz\laramaghz\Laramaghz\Commands\AdminAddEditCommand;
use almaghz\laramaghz\Laramaghz\Commands\AdminControllerCommand;
use almaghz\laramaghz\Laramaghz\Commands\AdminFormCommand;
use almaghz\laramaghz\Laramaghz\Commands\AdminIndexCommand;
//use almaghz\laramaghz\Laramaghz\Commands\AdminRelationCommand;
use almaghz\laramaghz\Laramaghz\Commands\AdminRequestCommand;
use almaghz\laramaghz\Laramaghz\Commands\AdminRouteCommand;
use almaghz\laramaghz\Laramaghz\Commands\ApiControllerCommand;
use almaghz\laramaghz\Laramaghz\Commands\ApiRequestCommand;
use almaghz\laramaghz\Laramaghz\Commands\ApiResourcesCommand;
use almaghz\laramaghz\Laramaghz\Commands\ApiRouteCommand;
use almaghz\laramaghz\Laramaghz\Commands\ConfigCommand;
use almaghz\laramaghz\Laramaghz\Commands\FrontAddEditCommand;
use almaghz\laramaghz\Laramaghz\Commands\FrontControllerCommand;
use almaghz\laramaghz\Laramaghz\Commands\FrontFormCommand;
use almaghz\laramaghz\Laramaghz\Commands\FrontIndexCommand;
use almaghz\laramaghz\Laramaghz\Commands\FrontRequestCommand;
use almaghz\laramaghz\Laramaghz\Commands\FrontRouteCommand;
use almaghz\laramaghz\Laramaghz\Commands\InstallCommand;
use almaghz\laramaghz\Laramaghz\Commands\LangCommand;
use almaghz\laramaghz\Laramaghz\Commands\MigrationCommand;
use almaghz\laramaghz\Laramaghz\Commands\ModelCommand;
use almaghz\laramaghz\Laramaghz\Commands\SeederCommand;
use almaghz\laramaghz\Laramaghz\Commands\ServiceProviderCommand;
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

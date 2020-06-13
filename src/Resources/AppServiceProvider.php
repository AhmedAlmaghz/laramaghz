<?php

namespace App\Providers;

use Almaghz\Laramaghz\Laramaghz\Models\MenuItem;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            //    $event->menu->add(trans('menu.pages'));
            $menuItem = [];
            $items = MenuItem::where('menu_id', 1)->get();
            foreach ($items->where('parent_id',0)->whereNotIn('name_en', ['Modules', 'Users']) as $i => $item) {

                $menuItem[$i] = [
                    'text' => $item['name_en'],
                  //  'url' => $item['link'],
                    'icon' => $item['icon']
                ];
                foreach ($items->where('parent_id',$item['id']) as $is => $itemSub) {
                    $menuItem[$i]['submenu'][$is] = [
                        'text' => $itemSub['name_en'],
                        'url' => $itemSub['link'],
                        'icon' => $itemSub['icon']
                    ];
                }
            };

            $event->menu->add(...$menuItem);
        });
    }
}

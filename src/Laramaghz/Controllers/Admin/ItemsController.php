<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 6/5/18
 * Time: 2:37 AM
 */

namespace Almaghz\Laramaghz\Laramaghz\Controllers\Admin;

use Almaghz\Laramaghz\Laramaghz\Models\MenuItem;
use Almaghz\Laramaghz\Laramaghz\Requests\ItemsRequest;


class ItemsController
{

    public function store(ItemsRequest $request, MenuItem $item)
    {

        $item->create($request->all());

        return redirect()->back();
    }

    public function destroy($id, MenuItem $item)
    {

        $item->findOrFail($id)->delete();

        return redirect()->back();
    }

    public function update($id  , ItemsRequest $request, MenuItem $item){

        $item->findOrFail($id)->update($request->all());

        return redirect()->back();
    }


}

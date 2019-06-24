<?php

namespace App\Http\Controllers\Shop;

use App\Models\ShopItem;
use App\Repositories\ShopCategoryRepository;
use App\Repositories\ShopItemRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends BaseController
{

    /**
     * @var ShopItemRepository
     */
    private $shopItemRepository;

    /**
     * @var ShopCategoryRepository
     */
    private $shopCategoryRepository;

    /**
     * ItemController constructor.
     */
    public function __construct()
    {
        $this->shopItemRepository = app(ShopItemRepository::class);
        $this->shopCategoryRepository = app(ShopCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->shopItemRepository->getAllWithPaginate(3);

        return view('shop.items.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = $this->shopItemRepository->getEdit($id);
        if(empty($item)){
            abort(404);
        }

        $categoryList = $this->shopCategoryRepository->getForComboBox();

        return view('shop.items.show', compact('item', 'categoryList'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

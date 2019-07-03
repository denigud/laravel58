<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\ShopItemRepository;


class ItemsApiController extends Controller
{

    /**
     * @var ShopItemRepository
     */
    private $shopItemRepository;

    public function __construct()
    {
        $this->shopItemRepository = app(ShopItemRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->shopItemRepository->getAllWithPaginate(25);

        return $paginator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop()
    {
        $paginator = $this->shopItemRepository->getAllWithPaginate(3);

        return $paginator;
    }

}

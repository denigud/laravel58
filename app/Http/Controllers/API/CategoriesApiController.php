<?php

namespace App\Http\Controllers\API;

use App\Repositories\ShopCategoryRepository;
use App\Http\Controllers\Controller;


class CategoriesApiController extends Controller
{

    /**
     * @var ShopCategoryRepository
     */
    private $shopCategoryRepository;

    public function __construct()
    {
        $this->shopCategoryRepository = app(ShopCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->shopCategoryRepository->getAllWithPaginate(10);

        return $paginator;
    }


    public function all()
    {
        $categoryList = $this->shopCategoryRepository->getForComboBox();

        return $categoryList;
    }

}

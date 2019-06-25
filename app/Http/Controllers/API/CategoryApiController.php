<?php

namespace App\Http\Controllers\API;

use App\Repositories\ShopCategoryRepository;
use App\Http\Controllers\Controller;

class CategoryApiController extends Controller
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
        $id = $_GET['categoryId'];

        $category = $this->shopCategoryRepository->getEdit($id);
        if (empty($category)){
            abort(404);
        }

        $categoryList = $this->shopCategoryRepository->getForComboBox();

        return compact('category','categoryList');
    }

}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\ShopCategoryCreateRequest;
use App\Http\Requests\ShopCategoryUpdateRequest;
use App\Models\ShopCategory;
use App\Repositories\ShopCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\This;

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
        $paginator = $this->shopCategoryRepository->getAllWithPaginate(10);

        return $paginator;
    }

}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\ShopCategoryCreateRequest;
use App\Http\Requests\ShopCategoryUpdateRequest;
use App\Models\ShopCategory;
use App\Repositories\ShopCategoryRepository;
use App\Http\Controllers\Controller;
use http\Env\Request;

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

    public function store(ShopCategoryCreateRequest $request)
    {
        $data = $request->input();

        $item = new ShopCategory($data);
        $item->save();

        if ($item){
            return ['success' => 'Успешно сохранено'];
        }else{
            return ['msg' => "Ошибка сохранения"];
        }
    }

    public function update(ShopCategoryUpdateRequest $request)
    {
        $data = $request->input();
        $id = $data['id'];

        $item = $this->shopCategoryRepository->getEdit($id);
        if (empty($item)){
            return ['msg' => "Запись id=[{$id}] не найдена"];
        }

        $result = $item->update($data);

        if ($result){
            return ['msg' => 'Успешно сохранено'];
        }else{
            return ['msg' => "Ошибка сохранения"];
        }
    }
}

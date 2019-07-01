<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShopItemCreateRequest;
use App\Http\Requests\ShopItemUpdateRequest;
use App\Models\ShopItem;
use App\Repositories\ShopCategoryRepository;
use App\Repositories\ShopItemRepository;
use http\Env\Request;

class ItemApiController extends Controller
{

    /**
     * @var ShopItemRepository
     */
    private $shopItemRepository;

    /**
     * @var ShopCategoryRepository
     */
    private $shopCategoryRepository;

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
        $id = $_GET['itemId'];

        $item = $this->shopItemRepository->getEdit($id);
        if (empty($item)){
            abort(404);
        }

        $categoryList = $this->shopCategoryRepository->getForComboBox();

        return compact('item','categoryList');
    }

    public function store(ShopItemCreateRequest $request)
    {
        $data = $request->input();

        $item = (new ShopItem())->create($data);

        if ($item){
            return ['success' => 'Успешно сохранено'];
        }else{
            return ['msg' => "Ошибка сохранения"];
        }
    }

    public function update(ShopItemUpdateRequest $request)
    {
        $data = $request->input();
        $id = $data['id'];

        $item = $this->shopItemRepository->getEdit($id);
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

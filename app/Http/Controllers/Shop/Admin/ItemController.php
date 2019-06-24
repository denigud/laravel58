<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Requests\ShopCategoryCreateRequest;
use App\Http\Requests\ShopItemCreateRequest;
use App\Http\Requests\ShopItemUpdateRequest;
use App\Models\ShopItem;
use App\Repositories\ShopCategoryRepository;
use App\Repositories\ShopItemRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * Class ItemController
 * @package App\Http\Controllers\Shop\Admin
 */
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
        parent::__construct();

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
        $paginator = $this->shopItemRepository->getAllWithPaginate(25);

        return view('shop.admin.items.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new ShopItem();

        $categoryList = $this->shopCategoryRepository->getForComboBox();

        return view('shop.admin.items.edit', compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShopItemCreateRequest $request)
    {
        $data = $request->all();

        $item = (new ShopItem())->create($data);

        if($item){
            return redirect()
                ->route('shop.admin.items.edit', [$item->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->shopItemRepository->getEdit($id);
        if(empty($item)){
            abort(404);
        }

        $categoryList = $this->shopCategoryRepository->getForComboBox();

        return view('shop.admin.items.edit', compact('item', 'categoryList'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShopItemUpdateRequest $request, $id)
    {
        $item = $this->shopItemRepository->getEdit($id);

        if (empty($item)){
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();
        $result = $item->update($data);

        if($result){
            return redirect()
                ->route('shop.admin.items.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = ShopItem::destroy($id);

        if($result){
            return redirect()
                ->route('shop.admin.items.index')
                ->with(['success' => "Запись id[$id] удалена"]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка удаления']);
        }
    }
}

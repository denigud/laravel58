<?php


namespace App\Repositories;

use App\Models\ShopItem  as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ShopItemRepository extends CoreRepository
{

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }


    /**
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate($perPage = null)
    {

        $columns = [
          'id',
          'title',
          'slug',
          'price',
          'description',
          'is_active',
          'category_id',
        ];

        $result = $this->startConditions()
                        ->select($columns)
                        ->orderBy('id')
                        ->with([
                            'category' => function($query){
                                $query->select(['id', 'title']);
                            },
                        ])
                        ->paginate($perPage);

        return $result;
    }

    /**
     * @param int $id
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

}

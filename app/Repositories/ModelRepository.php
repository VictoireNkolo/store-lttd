<?php


namespace App\Repositories;


use App\Models\Model;

class ModelRepository
{

    /**
     * @var Model
     */
    private $model;

    public function __construct(
        Model $model
    )
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model::where(['is_deleted' => 0])
            ->orderBy('name')
            ->paginate(50);
    }

    public function one($id)
    {
        return $this->model::whereId($id)
            ->first();
    }

    /**
     * Creates a model
     *
     * @param array $arrData
     * @return bool
     */
    public function store(array $arrData)
    {
        $this->model->name = $arrData['name'];
        $this->model->description = $arrData['description'];
        if (isset($arrData['image'])) {
            $this->model->image = $arrData['image'];
        }
        $this->model->phone = $arrData['phone'];
        $this->model->products_purchased = $arrData['products_purchased'];
        $this->model->is_active = 1;
        $this->model->is_deleted = 0;
        return $this->model->save();
    }

    /**
     * Updates a model
     * @param array $arrData
     * @return bool
     */
    public function update(array $arrData)
    {

        $model = $this->model::find($arrData['id']);

        $model->name = $arrData['name'];
        $model->description = $arrData['description'];
        $model->phone = $arrData['phone'];
        $model->products_purchased = $arrData['products_purchased'];
        if (isset($arrData['image'])) {
            $model->image = $arrData['image'];
        }
        return $model->save();
    }

    /**
     * Soft deletes a model
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $model = $this->model::find($id);
        $model->is_deleted = 1;
        return $model->save();
    }
}

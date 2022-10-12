<?php


namespace App\Repositories;


use App\Models\Partner;

class PartnerRepository
{

    /**
     * @var Partner
     */
    private $partner;

    public function __construct(
        Partner $partner
    )
    {
        $this->partner = $partner;
    }

    public function getAll()
    {
        return $this->partner::where(['is_deleted' => 0])
            ->orderBy('name')
            ->paginate(50);
    }

    public function one($id)
    {
        return $this->partner::whereId($id)
            ->first();
    }

    /**
     * Creates a partner
     *
     * @param array $arrData
     * @return bool
     */
    public function store(array $arrData)
    {
        $this->partner->name = $arrData['name'];
        $this->partner->description = $arrData['description'];
        if (isset($arrData['image'])) {
            $this->partner->image = $arrData['image'];
        }
        $this->partner->link = $arrData['link'];
        $this->partner->is_active = 1;
        $this->partner->is_deleted = 0;
        return $this->partner->save();
    }

    /**
     * Updates a partner
     * @param array $arrData
     * @return bool
     */
    public function update(array $arrData)
    {

        $partner = $this->partner::find($arrData['id']);

        $partner->name = $arrData['name'];
        $partner->description = $arrData['description'];
        $partner->link = $arrData['link'];
        if (isset($arrData['image'])) {
            $partner->image = $arrData['image'];
        }
        return $partner->save();
    }

    /**
     * Soft deletes a partner
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $partner = $this->partner::find($id);
        $partner->is_deleted = 1;
        return $partner->save();
    }
}

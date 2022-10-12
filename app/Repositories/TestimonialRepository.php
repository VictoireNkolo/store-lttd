<?php


namespace App\Repositories;


use App\Models\Testimonial;

class TestimonialRepository
{

    /**
     * @var Testimonial
     */
    private $testimonial;

    public function __construct(
        Testimonial $testimonial
    )
    {
        $this->testimonial = $testimonial;
    }

    public function getAll()
    {
        return $this->testimonial::where(['is_deleted' => 0])
            ->orderBy('name')
            ->paginate(50);
    }

    public function one($id)
    {
        return $this->testimonial::whereId($id)
            ->first();
    }

    /**
     * Creates a testimonial
     *
     * @param array $arrData
     * @return bool
     */
    public function store(array $arrData)
    {
        $this->testimonial->client = $arrData['client'];
        $this->testimonial->comment = $arrData['comment'];
        if (isset($arrData['image'])) {
            $this->testimonial->image = $arrData['image'];
        }
        $this->testimonial->is_active = 1;
        $this->testimonial->is_deleted = 0;
        return $this->testimonial->save();
    }

    /**
     * Updates a testimonial
     * @param array $arrData
     * @return bool
     */
    public function update(array $arrData)
    {

        $testimonial = $this->testimonial::find($arrData['id']);

        $testimonial->client = $arrData['client'];
        $testimonial->comment = $arrData['comment'];
        if (isset($arrData['image'])) {
            $testimonial->image = $arrData['image'];
        }
        return $testimonial->save();
    }

    /**
     * Soft deletes a testimonial
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $testimonial = $this->testimonial::find($id);
        $testimonial->is_deleted = 1;
        return $testimonial->save();
    }
}

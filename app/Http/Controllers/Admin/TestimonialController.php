<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialRequest;
use App\Repositories\ImageRepository;
use App\Repositories\TestimonialRepository;

class TestimonialController extends Controller
{

    private $testimonialRepository;
    private $imageRepository;

    private $imgDimensions = [
        "imgWidth" => 600,
        "imgHeight" => 800,
        "thumbWidth" => 200,
        "thumbHeight" => 260,
    ];

    public function __construct(
        TestimonialRepository $repository,
        ImageRepository $imageRepository
    )
    {
        $this->testimonialRepository = $repository;
        $this->imageRepository = $imageRepository;
    }

    public function index()
    {
        $testimonials = $this->testimonialRepository->getAll();
        return view('backend.admin.testimonials.index', ['testimonials' => $testimonials]);
    }

    public function create()
    {
        return view('backend.admin.testimonials.create');
    }

    public function store(TestimonialRequest $request)
    {
        $inputs = $this->imageRepository->getInputs($request, $this->imgDimensions);
        $iStored = $this->testimonialRepository->store($inputs);

        if ($iStored) {
            session()->flash('success', 'Elément créé avec succès !');
            return redirect()->route('lb_admin.admin.testimonial.index');
        }
        session()->flash('error', 'Vos données n\'ont pas pu être enrégistrées !');
        return redirect()->back();
    }

    public function show($id)
    {
        $testimonial = $this->testimonialRepository->one($id);
        return view('backend.admin.testimonials.show', ['testimonial' => $testimonial]);
    }

    public function edit($id)
    {
        $testimonial = $this->testimonialRepository->one($id);
        return view('backend.admin.testimonials.edit', ['testimonial' => $testimonial]);
    }

    public function update(TestimonialRequest $request)
    {
        if($request->has('image')) {
            $id = $request->toArray()['id'];
            $item = $this->testimonialRepository->one($id);
            $this->imageRepository->deleteImages($item->image);
        }

        $inputs = $this->imageRepository->getInputs($request, $this->imgDimensions);

        $isUpdated = $this->testimonialRepository->update($inputs);
        if ($isUpdated) {
            session()->flash('success', 'Elément mis à jour avec succès !');
            return redirect()->route('lb_admin.admin.testimonial.index');
        }
        session()->flash('error', 'Vos données n\'ont pas pu être mises à jour !');
        return redirect()->back();
    }

    public function delete($id)
    {
        $item = $this->testimonialRepository->one($id);
        $this->imageRepository->deleteImages($item->image);
        $isDeleted = $this->testimonialRepository->delete($id);

        if ($isDeleted) {
            session()->flash('success', 'Suppression effectuée avec succès !');
            return redirect()->route('lb_admin.admin.testimonial.index');
        }
        session()->flash('error', 'Suppression échouée !');
        return redirect()->back();
    }

}

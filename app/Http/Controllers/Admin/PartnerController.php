<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerRequest;
use App\Repositories\ImageRepository;
use App\Repositories\PartnerRepository;

class PartnerController extends Controller
{

    private $partnerRepository;
    private $imageRepository;

    private $imgDimensions = [
        "imgWidth" => 600,
        "imgHeight" => 800,
        "thumbWidth" => 200,
        "thumbHeight" => 260,
    ];

    public function __construct(
        PartnerRepository $repository,
        ImageRepository $imageRepository
    )
    {
        $this->partnerRepository = $repository;
        $this->imageRepository = $imageRepository;
    }

    public function index()
    {
        $partners = $this->partnerRepository->getAll();
        return view('backend.admin.partners.index', ['partners' => $partners]);
    }

    public function create()
    {
        return view('backend.admin.partners.create');
    }

    public function store(PartnerRequest $request)
    {
        $inputs = $this->imageRepository->getInputs($request, $this->imgDimensions);
        $iStored = $this->partnerRepository->store($inputs);

        if ($iStored) {
            session()->flash('success', 'Elément créé avec succès !');
            return redirect()->route('lb_admin.admin.partner.index');
        }
        session()->flash('error', 'Vos données n\'ont pas pu être enrégistrées !');
        return redirect()->back();
    }

    public function show($id)
    {
        $partner = $this->partnerRepository->one($id);
        return view('backend.admin.partners.show', ['partner' => $partner]);
    }

    public function edit($id)
    {
        $partner = $this->partnerRepository->one($id);
        return view('backend.admin.partners.edit', ['partner' => $partner]);
    }

    public function update(PartnerRequest $request)
    {
        if($request->has('image')) {
            $id = $request->toArray()['id'];
            $item = $this->partnerRepository->one($id);
            $this->imageRepository->deleteImages($item->image);
        }

        $inputs = $this->imageRepository->getInputs($request, $this->imgDimensions);

        $isUpdated = $this->partnerRepository->update($inputs);
        if ($isUpdated) {
            session()->flash('success', 'Elément mis à jour avec succès !');
            return redirect()->route('lb_admin.admin.partner.index');
        }
        session()->flash('error', 'Vos données n\'ont pas pu être mises à jour !');
        return redirect()->back();
    }

    public function delete($id)
    {
        $item = $this->partnerRepository->one($id);
        $this->imageRepository->deleteImages($item->image);
        $isDeleted = $this->partnerRepository->delete($id);

        if ($isDeleted) {
            session()->flash('success', 'Suppression effectuée avec succès !');
            return redirect()->route('lb_admin.admin.partner.index');
        }
        session()->flash('error', 'Suppression échouée !');
        return redirect()->back();
    }

}

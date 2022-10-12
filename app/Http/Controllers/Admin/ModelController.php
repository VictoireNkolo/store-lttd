<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\ModelRequest;
use App\Repositories\ImageRepository;
use App\Repositories\ModelRepository;

class ModelController extends Controller
{

    private $modelRepository;
    private $imageRepository;

    private $imgDimensions = [
        "imgWidth" => 600,
        "imgHeight" => 800,
        "thumbWidth" => 200,
        "thumbHeight" => 260,
    ];

    public function __construct(
        ModelRepository $repository,
        ImageRepository $imageRepository
    )
    {
        $this->modelRepository = $repository;
        $this->imageRepository = $imageRepository;
    }

    public function index()
    {
        $models = $this->modelRepository->getAll();
        return view('backend.admin.models.index', ['models' => $models]);
    }

    public function create()
    {
        return view('backend.admin.models.create');
    }

    public function store(ModelRequest $request)
    {
        $inputs = $this->imageRepository->getInputs($request, $this->imgDimensions);
        $iStored = $this->modelRepository->store($inputs);

        if ($iStored) {
            session()->flash('success', 'Elément créé avec succès !');
            return redirect()->route('lb_admin.admin.model.index');
        }
        session()->flash('error', 'Vos données n\'ont pas pu être enrégistrées !');
        return redirect()->back();
    }

    public function show($id)
    {
        $model = $this->modelRepository->one($id);
        return view('backend.admin.models.show', ['model' => $model]);
    }

    public function edit($id)
    {
        $model = $this->modelRepository->one($id);
        return view('backend.admin.models.edit', ['model' => $model]);
    }

    public function update(ModelRequest $request)
    {
        if($request->has('image')) {
            $id = $request->toArray()['id'];
            $item = $this->modelRepository->one($id);
            $this->imageRepository->deleteImages($item->image);
        }

        $inputs = $this->imageRepository->getInputs($request, $this->imgDimensions);

        $isUpdated = $this->modelRepository->update($inputs);
        if ($isUpdated) {
            session()->flash('success', 'Elément mis à jour avec succès !');
            return redirect()->route('lb_admin.admin.model.index');
        }
        session()->flash('error', 'Vos données n\'ont pas pu être mises à jour !');
        return redirect()->back();
    }

    public function delete($id)
    {
        $item = $this->modelRepository->one($id);
        $this->imageRepository->deleteImages($item->image);
        $isDeleted = $this->modelRepository->delete($id);

        if ($isDeleted) {
            session()->flash('success', 'Suppression effectuée avec succès !');
            return redirect()->route('lb_admin.admin.model.index');
        }
        session()->flash('error', 'Suppression échouée !');
        return redirect()->back();
    }

}

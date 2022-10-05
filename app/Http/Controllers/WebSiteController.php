<?php


namespace App\Http\Controllers;

use App\Events\Home;
use App\Repositories\PageRepository;
use App\Repositories\ProductRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class WebSiteController extends Controller
{

    private $pageRepository;
    private $productRepository;
    private $postRepository;

    public function __construct(PageRepository $pageRepository, ProductRepository $productRepository, PostRepository $postRepository)
    {
        $this->pageRepository = $pageRepository;
        $this->productRepository = $productRepository;
        $this->postRepository = $postRepository;
    }

    /**
     * Homepage
     */
    public function index($slug='home')
    {
        event(new Home);
        $page = $this->pageRepository->getBySlug($slug);
        return view('frontend.pages.index');
    }

    /**
     * Function that displays a front page
     */
    public function show($slug)
    {
        //dd(Route::current()->uri);
        if ($slug==='accueil' || $slug === 'home') {
            event(new Home);
        }
        $page = $this->pageRepository->getBySlug($slug);
        return view('frontend.pages.show', compact('page'));
    }

    public function a_propos($slug='a-propos')
    {
        $page = $this->pageRepository->getBySlug('a-propos');
        return view('frontend.pages.a_propos', compact('page'));
    }

    public function nos_services($slug='nos-services')
    {
        $page = $this->pageRepository->getBySlug('nos-services');
        return view('frontend.pages.nos_services', compact('page'));
    }

    public function nos_realisations($slug='nos-realisations')
    {
        $page = $this->pageRepository->getBySlug('nos-realisations');
        return view('frontend.pages.nos_realisations', compact('page'));
    }

    public function contact($slug='contact')
    {
        $page = $this->pageRepository->getBySlug('contact');
        return view('frontend.pages.contact', compact('page'));
    }

    public function shop(Request $request)
    {
        $slug = $request->route('slug');

        if ($slug) {

            $products = $this->productRepository->getCategoryProducts($slug);
            $page = $this->pageRepository->getBySlug('boutique');

            return view('frontend.pages.shop', compact('page', 'products', 'slug'));
        } else {

            $products = $this->productRepository->getAll();
            $page = $this->pageRepository->getBySlug('boutique');

            return view('frontend.pages.shop', compact('page', 'products'));
        }
    }

    public function shop_product_details($product_id)
    {
        $product = $this->productRepository->one($product_id);
        $page = $this->pageRepository->getBySlug('boutique');
        return view('frontend.pages.shop_product_details', compact('page', 'product'));
    }

    public function blog($slug='blog')
    {
        $page = $this->pageRepository->getBySlug('blog');
        return view('frontend.pages.blog', compact('page'));
    }
}

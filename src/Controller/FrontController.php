<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Video;
use App\Utils\CategoryTreeFrontPage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="main_page")
     */
    public function index()
    {
        return $this->render('front/index.html.twig');
    }

    /**
     * @Route("/video-list/category/{categoryname},{id}/{page}", defaults={"page": "1"}, name="video_list")
     * @param $id
     * @param $page
     * @param CategoryTreeFrontPage $categories
     * @return Response
     */
    public function videoList($id, $page, CategoryTreeFrontPage $categories): Response
    {
        $categories->getCategoryListAndParent($id);
        $videos = $this->getDoctrine()->getRepository(Video::class)->findAllPaginated($page);

        return $this->render('front/video_list.html.twig', [
            'subcategories' => $categories,
            'videos' => $videos
        ]);
    }

    /**
     * @Route("/video-details", name="video_details")
     */
    public function videoDetails()
    {
        return $this->render('front/video_details.html.twig');
    }

    /**
     * @Route("/search-results", methods={"POST"}, name="search_results")
     */
    public function searchResults()
    {
        return $this->render('front/search_results.html.twig');
    }

    /**
     * @Route("/pricing", name="pricing")
     */
    public function pricing()
    {
        return $this->render('front/pricing.html.twig');
    }

    /**
     * @Route("/register", name="register")
     */
    public function register()
    {
        return $this->render('front/register.html.twig');
    }

    /**
     * @Route("/login", name="login")
     */
    public function login()
    {
        return $this->render('front/login.html.twig');
    }

    /**
     * @Route("/payment", name="payment")
     */
    public function payment()
    {
        return $this->render('front/payment.html.twig');
    }

    public function mainCategories()
    {
        $categories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findBy(['parent' => null], ['name' => 'ASC']);

        return $this->render('front/_main_categories.html.twig', [
            'categories' => $categories
        ]);
    }
}

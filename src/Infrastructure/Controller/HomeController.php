<?php

namespace App\Infrastructure\Controller;

use App\Domain\Advert\Contracts\AdvertRepositoryInterface;
use App\Infrastructure\Pagination\Pagination;
use App\Infrastructure\Repository\AdvertCriteria;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{

    protected $advertRepository;

    public function __construct(AdvertRepositoryInterface $advertRepository)
    {
        $this->advertRepository = $advertRepository;
    }

    /**
     * @param int $page
     * @return Response
     */
    public function index(int $page = 1): Response
    {

        $criteria  = AdvertCriteria::create()
            ->setPage($page)
            ->setLimit(5);

        $pagination = new Pagination();

        return $this->render('home.html.twig', [
            'adverts' => $this->advertRepository->findByCriteria(
                $criteria
            ),
            'pagination' =>     $pagination->initialize(array(
                'query_string_segment' => '',
                'base_url' => '/',
                'page_query_string' => false,
                'use_page_numbers' => TRUE,
                'total_rows' => $this->advertRepository->getCount($criteria),
                'cur_page' => $page,
                'per_page' => $criteria->getLimit(),
                'num_links' => 10,
                'first_link' => FALSE,
                'last_link' => FALSE,
                'cur_tag_open' => '<li class="active">',
                'cur_tag_close' => '</li>',
                'num_tag_open' => '<li>',
                'num_tag_close' => '</li>',
                //---------
                'next_link' => '<i class="fa fa-angle-right"></i>',
                'next_tag_open' => '<li class="next">',
                'next_tag_close' => '</li>',
                'prev_link' => '<i class="fa fa-angle-left"></i>',
                'prev_tag_open' => '<li class="prev">',
                'prev_tag_close' => '</li>',
            ))->create_links()
        ]);
    }




}
<?php


namespace App\Infrastructure\Controller;


use App\Domain\Advert\Contracts\AdvertRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ViewController extends AbstractController
{
    protected $advertRepository;

    public function __construct(AdvertRepositoryInterface $advertRepository)
    {
        $this->advertRepository = $advertRepository;
    }

    /**
     * @param int $id
     * @return Response
     */
    public function view(int $id ): Response
    {

        return $this->render('view.html.twig', [
            'advert'    =>  $this->advertRepository->findById(
                $id
            )
        ]);
    }
}
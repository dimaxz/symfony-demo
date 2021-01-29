<?php


namespace App\Infrastructure\Pagination;


use App\Domain\Advert\Contracts\AdvertCriteriaInterface;
use App\Infrastructure\Repository\AdvertCriteria;
use Symfony\Component\HttpFoundation\Request;

class CriteriaFactory
{

    /**
     * @param Request $request
     * @return AdvertCriteriaInterface
     */
    public static function buildCriteriaFromRequest(Request $request): AdvertCriteriaInterface
    {
        $criteria  = AdvertCriteria::create();

        if($request->query->get('page')){
           $criteria->setPage($request->query->get('page')-1);
        }

        if($request->query->get('rows')){
            $criteria->setLimit($request->query->get('rows'));
        }
        else{
            $criteria->setLimit(5);
        }

        return $criteria;
    }

}
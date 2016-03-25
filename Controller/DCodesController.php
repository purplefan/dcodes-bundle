<?php

namespace GO\DCodesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DCodesController extends Controller
{
    /**
     * @Route("/dcode")
     */
    public function indexAction()
    {
        return $this->render('GODCodesBundle:Default:index.html.twig');
    }

    /**
     * @Method({"POST"})
     * @Route("/api/getCodes")
     */
    public function getCodesAction(Request $request)
    {
        $count = $request->request->get('count');
        $data = $this->get('god_codes.codegenerator')->generateDiscountCodes($count, $request->request);

        return new JsonResponse($data);
    }
}

<?php

namespace GO\DCodesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DCodesController extends Controller
{
    /**
     * @Route("/dcode")
     */
    public function indexAction()
    {
        return $this->render('GODCodesBundle:Default:index.html.twig');
    }
}

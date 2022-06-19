<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaymentGraphController extends AbstractController
{
    /**
     * @Route("/paymentgraph/", name="paymentgraph_show")
     */
    public function show($id)
    {
        $paymentGraph = $this->getDoctrine()
        ->getRepository(PatmentGraph::class)
        ->find($id);

        if (!$paymentGraph) {
            throw $this->createNotFoundException(
                'No paymentGraph found for id ' . $id
            );
        }
    }
}

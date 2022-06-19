<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PaymentGraphRepository;
use App\Repository\PaymentsRepository;
use App\Entity\Payments;

class IndexController extends AbstractController
{
    public function index(PaymentGraphRepository $paymentGraphRep, PaymentsRepository $paymentsRep): Response
    {
        $paymentGraph = $paymentGraphRep->getAll();
        $payments = $paymentsRep->getAll();

        $paidTotal = 0;
        foreach($payments as $payment) {
            $paidTotal += $payment->getAmount();
        }

        return $this->render('index/index.html.twig', [
            'paymentGraph' => $paymentGraph,
            'payments' => $payments,
            'paidTotal' => $paidTotal,
        ]);
    }

    public function delpay(int $id, PaymentGraphRepository $paymentGraphRep, PaymentsRepository $paymentsRep): Response
    {
        $payToDel = $paymentsRep->findById($id);
        if (!empty($payToDel)) {
            $paymentsRep->remove($payToDel[0]);
        }
        
        $paymentGraph = $paymentGraphRep->getAll();
        $payments = $paymentsRep->getAll();

        $paidTotal = 0;
        foreach($payments as $payment) {
            $paidTotal += $payment->getAmount();
        }

        return $this->render('index/index.html.twig', [
            'paymentGraph' => $paymentGraph,
            'payments' => $payments,
            'paidTotal' => $paidTotal,
        ]);
    }

    public function addpay(Request $request, PaymentGraphRepository $paymentGraphRep, PaymentsRepository $paymentsRep): Response
    {
        $paymentToAdd = new Payments();
        $paymentToAdd->setPaymentDate(\DateTime::createFromFormat('Y-m-d', $request->get('date')));
        $paymentToAdd->setAmount($request->get('amount'));
        $paymentsRep->add($paymentToAdd);
        
        $paymentGraph = $paymentGraphRep->getAll();
        $payments = $paymentsRep->getAll();

        $paidTotal = 0;
        foreach($payments as $payment) {
            $paidTotal += $payment->getAmount();
        }

        return $this->render('index/index.html.twig', [
            'paymentGraph' => $paymentGraph,
            'payments' => $payments,
            'paidTotal' => $paidTotal,
        ]);
    }
}

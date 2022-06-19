<?php

namespace App\Entity;

use App\Repository\PaymentGraphRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaymentGraphRepository::class)
 */
class PaymentGraph
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $paymentDate;

    /**
     * @ORM\Column(type="decimal", precision=9, scale=2, nullable=true)
     */
    private $creditPart;

    /**
     * @ORM\Column(type="decimal", precision=9, scale=2, nullable=true)
     */
    private $interest;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaymentDate(): ?\DateTimeInterface
    {
        return $this->paymentDate;
    }

    public function setPaymentDate(\DateTimeInterface $paymentDate): self
    {
        $this->paymentDate = $paymentDate;

        return $this;
    }

    public function getCreditPart(): ?string
    {
        return $this->creditPart;
    }

    public function setCreditPart(?string $creditPart): self
    {
        $this->creditPart = $creditPart;

        return $this;
    }

    public function getInterest(): ?string
    {
        return $this->interest;
    }

    public function setInterest(?string $interest): self
    {
        $this->interest = $interest;

        return $this;
    }
}

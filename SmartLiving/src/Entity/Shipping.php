<?php

namespace App\Entity;

use App\Repository\ShippingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ShippingRepository::class)
 */
class Shipping
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $shippingDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $deliveryDate;

    /**
     * @ORM\ManyToOne(targetEntity=Order::class, inversedBy="shippings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $order_id;

    /**
     * @ORM\ManyToOne(targetEntity=Address::class, inversedBy="shippings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $address;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShippingDate(): ?\DateTimeInterface
    {
        return $this->shippingDate;
    }

    public function setShippingDate(\DateTimeInterface $shippingDate): self
    {
        $this->shippingDate = $shippingDate;

        return $this;
    }

    public function getDeliveryDate(): ?\DateTimeInterface
    {
        return $this->deliveryDate;
    }

    public function setDeliveryDate(\DateTimeInterface $deliveryDate): self
    {
        $this->deliveryDate = $deliveryDate;

        return $this;
    }

    public function getOrderId(): ?Order
    {
        return $this->order_id;
    }

    public function setOrderId(?Order $order_id): self
    {
        $this->order_id = $order_id;

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): self
    {
        $this->address = $address;

        return $this;
    }
}

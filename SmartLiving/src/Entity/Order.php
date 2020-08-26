<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`order`")
 */
class Order
{
    const CART ='cart';
    const PENDING = 'pending';
    const PAID = 'paid';
    const CANCELED = 'canceled';
    const DISPUTED = 'disputed';
    const REFUNDED = 'refunded';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2)
     */
    private $discount;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $total;

    /**
     * @ORM\Column(type="string", columnDefinition="enum('cart', 'pending', 'paid', 'canceled', 'disputed', 'refunded')")
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity=OrderDetails::class, mappedBy="orderId", cascade={"persist"})
     */
    private $orderDetails;

    /**
     * @ORM\OneToMany(targetEntity=Shipping::class, mappedBy="order_id")
     */
    private $shippings;

    /**
     * @ORM\OneToMany(targetEntity=Payment::class, mappedBy="oder_id")
     */
    private $payments;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="orders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customer;

    public function __construct()
    {
        $this->orderDetails = new ArrayCollection();
        $this->shippings = new ArrayCollection();
        $this->payments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }


    public function getDiscount(): ?string
    {
        return $this->discount;
    }

    public function setDiscount(string $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(string $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getStatus(): ?string
    {
        $statusesFrench = [
            'cart' => 'En panier',
            'pending' => 'En attante',
            'paid' => 'Payé',
            'canceled' => 'Annulé',
            'disputed' => 'Disputed',
            'refunded' => 'Remboursé',
        ];

        return $statusesFrench[$this->status];
    }

    public function setStatus(string $status): self
    {
        if (!in_array($status, array(self::CART, self::PENDING, self::PAID, self::CANCELED, self::DISPUTED, self::REFUNDED ))){
            throw new \InvalidArgumentException('Invalid order status.');
        }

        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection|OrderDetails[]
     */
    public function getOrderDetails(): Collection
    {
        return $this->orderDetails;
    }

    public function addOrderDetail(OrderDetails $orderDetail): self
    {
        if (!$this->orderDetails->contains($orderDetail)) {
            $this->orderDetails[] = $orderDetail;
            $orderDetail->setOrderId($this);
        }

        return $this;
    }

    public function removeOrderDetail(OrderDetails $orderDetail): self
    {
        if ($this->orderDetails->contains($orderDetail)) {
            $this->orderDetails->removeElement($orderDetail);
            // set the owning side to null (unless already changed)
            if ($orderDetail->getOrderId() === $this) {
                $orderDetail->setOrderId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Shipping[]
     */
    public function getShippings(): Collection
    {
        return $this->shippings;
    }

    public function addShipping(Shipping $shipping): self
    {
        if (!$this->shippings->contains($shipping)) {
            $this->shippings[] = $shipping;
            $shipping->setOrderId($this);
        }

        return $this;
    }

    public function removeShipping(Shipping $shipping): self
    {
        if ($this->shippings->contains($shipping)) {
            $this->shippings->removeElement($shipping);
            // set the owning side to null (unless already changed)
            if ($shipping->getOrderId() === $this) {
                $shipping->setOrderId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Payment[]
     */
    public function getPayments(): Collection
    {
        return $this->payments;
    }

    public function addPayment(Payment $payment): self
    {
        if (!$this->payments->contains($payment)) {
            $this->payments[] = $payment;
            $payment->setOderId($this);
        }

        return $this;
    }

    public function removePayment(Payment $payment): self
    {
        if ($this->payments->contains($payment)) {
            $this->payments->removeElement($payment);
            // set the owning side to null (unless already changed)
            if ($payment->getOderId() === $this) {
                $payment->setOderId(null);
            }
        }

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }
}

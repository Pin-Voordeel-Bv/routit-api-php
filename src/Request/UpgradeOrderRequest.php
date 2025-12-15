<?php

namespace Inserve\RoutITAPI\Request;

use DateTimeInterface;
use Inserve\RoutITAPI\Header;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class UpgradeOrderRequest extends AbstractRoutITRequest implements RoutITRequestInterface
{
    protected string $rootNode = 'UpgradeOrderRequest_V1';

    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('OrderId')]
    private int $orderId;

    #[SerializedName('ProductId')]
    private string $productId;

    /**
     * xs:date (YYYY-MM-DD)
     */
    #[SerializedName('UpgradeWishDate')]
    private ?string $upgradeWishDate = null;

    public function getHeader(): ?Header
    {
        return $this->header;
    }

    public function setHeader(?Header $header): self
    {
        $this->header = $header;
        return $this;
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function setOrderId(int $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }

    public function getProductId(): string
    {
        return $this->productId;
    }

    public function setProductId(string $productId): self
    {
        $this->productId = $productId;
        return $this;
    }

    /**
     * Returns the raw xs:date string (YYYY-MM-DD).
     */
    public function getUpgradeWishDate(): ?string
    {
        return $this->upgradeWishDate;
    }

    /**
     * Set using DateTimeInterface => formatted as xs:date (YYYY-MM-DD).
     */
    public function setUpgradeWishDate(?DateTimeInterface $date): self
    {
        $this->upgradeWishDate = $date?->format('Y-m-d');
        return $this;
    }

    /**
     * Optional: allow setting already formatted xs:date string.
     */
    public function setUpgradeWishDateString(?string $date): self
    {
        $this->upgradeWishDate = ($date !== null && $date !== '') ? $date : null;
        return $this;
    }
}
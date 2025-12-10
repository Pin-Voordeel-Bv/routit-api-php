<?php
namespace Inserve\RoutITAPI\Response;

use Inserve\RoutITAPI\Header;
use Inserve\RoutITAPI\Response\NewCustomerResponse\NewCustomerData;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class NewCustomerResponse
{
    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('State')]
    private ?State $state = null;

    #[SerializedName('CustomerData')]
    private ?NewCustomerData $customerData = null;

    public function getHeader(): ?Header
    {
        return $this->header;
    }

    public function setHeader(?Header $header): self
    {
        $this->header = $header;
        return $this;
    }

    public function getState(): ?State
    {
        return $this->state;
    }

    public function setState(?State $state): self
    {
        $this->state = $state;
        return $this;
    }

    public function getCustomerData(): ?NewCustomerData
    {
        return $this->customerData;
    }

    public function setCustomerData(?NewCustomerData $customerData): self
    {
        $this->customerData = $customerData;
        return $this;
    }
}

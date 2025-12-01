<?php

namespace Inserve\RoutITAPI\Request\NewFiberOrderRequest;

use Inserve\RoutITAPI\Request\NewFiberOrderRequest\FullAddress;
use Inserve\RoutITAPI\Request\NewFiberOrderRequest\FiberSurveyData;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class NewFiberRequestData
{
    #[SerializedName('Address')]
    private FullAddress $address;

    #[SerializedName('Company')]
    private string $company;

    #[SerializedName('ContactPersonName')]
    private string $contactPersonName;

    #[SerializedName('ContactPersonPhoneNumber')]
    private string $contactPersonPhoneNumber;

    #[SerializedName('ContactPersonEmailAddress')]
    private string $contactPersonEmailAddress;

    #[SerializedName('ContactPerson2Name')]
    private ?string $contactPerson2Name = null;

    #[SerializedName('ContactPerson2PhoneNumber')]
    private ?string $contactPerson2PhoneNumber = null;

    #[SerializedName('ContactPerson2EmailAddress')]
    private ?string $contactPerson2EmailAddress = null;

    #[SerializedName('FiberSurveyData')]
    private ?FiberSurveyData $fiberSurveyData = null;

    // --- Getters & Setters ---
    public function getAddress(): FullAddress { return $this->address; }
    public function setAddress(FullAddress $address): self { $this->address = $address; return $this; }

    public function setCompany(string $company): self { $this->company = $company; return $this; }
    public function getCompany(): string { return $this->company; }

    public function setContactPersonName(string $v): self { $this->contactPersonName = $v; return $this; }
    public function getContactPersonName(): string { return $this->contactPersonName; }

    public function setContactPersonPhoneNumber(string $v): self { $this->contactPersonPhoneNumber = $v; return $this; }
    public function getContactPersonPhoneNumber(): string { return $this->contactPersonPhoneNumber; }

    public function setContactPersonEmailAddress(string $v): self { $this->contactPersonEmailAddress = $v; return $this; }
    public function getContactPersonEmailAddress(): string { return $this->contactPersonEmailAddress; }

    public function setContactPerson2Name(?string $v): self { $this->contactPerson2Name = $v; return $this; }
    public function getContactPerson2Name(): ?string { return $this->contactPerson2Name; }

    public function setContactPerson2PhoneNumber(?string $v): self { $this->contactPerson2PhoneNumber = $v; return $this; }
    public function getContactPerson2PhoneNumber(): ?string { return $this->contactPerson2PhoneNumber; }

    public function setContactPerson2EmailAddress(?string $v): self { $this->contactPerson2EmailAddress = $v; return $this; }
    public function getContactPerson2EmailAddress(): ?string { return $this->contactPerson2EmailAddress; }

    public function setFiberSurveyData(?FiberSurveyData $data): self { $this->fiberSurveyData = $data; return $this; }
    public function getFiberSurveyData(): ?FiberSurveyData { return $this->fiberSurveyData; }
}

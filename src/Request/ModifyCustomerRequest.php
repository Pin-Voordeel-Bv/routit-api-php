<?php

namespace Inserve\RoutITAPI\Request;

use Inserve\RoutITAPI\Request\ModifyCustomerRequest\Header;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class ModifyCustomerRequest extends AbstractRoutITRequest implements RoutITRequestInterface
{
    protected string $rootNode = 'ModifyCustomerRequest_V3';

    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('CustomerId')]
    private ?string $customerId = null;

    #[SerializedName('Name')]
    private ?string $name = null;

    #[SerializedName('Street')]
    private ?string $street = null;

    #[SerializedName('HouseNr')]
    private ?int $houseNr = null;

    #[SerializedName('HouseNrExtension')]
    private ?string $houseNrExtension = '';

    #[SerializedName('ZipCode')]
    private ?string $zipCode = null;

    #[SerializedName('City')]
    private ?string $city = null;

    #[SerializedName('CountryCode')]
    private ?string $countryCode = null;

    #[SerializedName('Phone1')]
    private ?string $phone1 = null;

    #[SerializedName('Phone2')]
    private ?string $phone2 = null;

    #[SerializedName('Fax')]
    private ?string $fax = null;

    #[SerializedName('Email')]
    private ?string $email = null;

    #[SerializedName('Website')]
    private ?string $website = null;

    #[SerializedName('DebitNr')]
    private ?string $debitNr = null;

    #[SerializedName('IBAN')]
    private ?string $iBAN = null;

    #[SerializedName('BIC')]
    private ?string $bIC = null;

    #[SerializedName('VATNr')]
    private ?string $vATNr = null;

    #[SerializedName('LegalStatus')]
    private ?string $legalStatus = null;

    #[SerializedName('ExternalId')]
    private ?string $externalId = null;

    #[SerializedName('ChamberOfCommerceNr')]
    private ?string $chamberOfCommerceNr = null;

    // ───────────────── Header ─────────────────

    public function getHeader(): ?Header
    {
        return $this->header;
    }

    public function setHeader(?Header $header): self
    {
        $this->header = $header;
        return $this;
    }

    // ───────────────── CustomerId ─────────────────

    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    public function setCustomerId(?string $customerId): self
    {
        $this->customerId = $customerId;
        return $this;
    }

    // ───────────────── Name ─────────────────

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    // ───────────────── Street ─────────────────

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;
        return $this;
    }

    // ───────────────── HouseNr ─────────────────

    public function getHouseNr(): ?int
    {
        return $this->houseNr;
    }

    public function setHouseNr(?int $houseNr): self
    {
        $this->houseNr = $houseNr;
        return $this;
    }

    // ───────────────── HouseNrExtension ─────────────────

    public function getHouseNrExtension(): ?string
    {
        return $this->houseNrExtension;
    }

    public function setHouseNrExtension(?string $houseNrExtension): self
    {
        $this->houseNrExtension = $houseNrExtension ?? '';
        return $this;
    }

    // ───────────────── ZipCode ─────────────────

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(?string $zipCode): self
    {
        $this->zipCode = $zipCode;
        return $this;
    }

    // ───────────────── City ─────────────────

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;
        return $this;
    }

    // ───────────────── CountryCode ─────────────────

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(?string $countryCode): self
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    // ───────────────── Phone1 ─────────────────

    public function getPhone1(): ?string
    {
        return $this->phone1;
    }

    public function setPhone1(?string $phone1): self
    {
        $this->phone1 = $phone1;
        return $this;
    }

    // ───────────────── Phone2 ─────────────────

    public function getPhone2(): ?string
    {
        return $this->phone2;
    }

    public function setPhone2(?string $phone2): self
    {
        $this->phone2 = $phone2;
        return $this;
    }

    // ───────────────── Fax ─────────────────

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(?string $fax): self
    {
        $this->fax = $fax;
        return $this;
    }

    // ───────────────── Email ─────────────────

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    // ───────────────── Website ─────────────────

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;
        return $this;
    }

    // ───────────────── DebitNr ─────────────────

    public function getDebitNr(): ?string
    {
        return $this->debitNr;
    }

    public function setDebitNr(?string $debitNr): self
    {
        $this->debitNr = $debitNr;
        return $this;
    }

    // ───────────────── IBAN ─────────────────

    public function getIBAN(): ?string
    {
        return $this->iBAN;
    }

    public function setIBAN(?string $iBAN): self
    {
        $this->iBAN = $iBAN;
        return $this;
    }

    // ───────────────── BIC ─────────────────

    public function getBIC(): ?string
    {
        return $this->bIC;
    }

    public function setBIC(?string $bIC): self
    {
        $this->bIC = $bIC;
        return $this;
    }

    // ───────────────── VATNr ─────────────────

    public function getVATNr(): ?string
    {
        return $this->vATNr;
    }

    public function setVATNr(?string $vATNr): self
    {
        $this->vATNr = $vATNr;
        return $this;
    }

    // ───────────────── LegalStatus ─────────────────

    public function getLegalStatus(): ?string
    {
        return $this->legalStatus;
    }

    public function setLegalStatus(?string $legalStatus): self
    {
        $this->legalStatus = $legalStatus;
        return $this;
    }

    // ───────────────── ExternalId ─────────────────

    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    public function setExternalId(?string $externalId): self
    {
        $this->externalId = $externalId;

        return $this;
    }

    // ───────────────── ChamberOfCommerceNr ─────────────────

    public function getChamberOfCommerceNr(): ?string
    {
        return $this->chamberOfCommerceNr;
    }

    public function setChamberOfCommerceNr(?string $chamberOfCommerceNr): self
    {
        $this->chamberOfCommerceNr = $chamberOfCommerceNr;

        return $this;
    }
}

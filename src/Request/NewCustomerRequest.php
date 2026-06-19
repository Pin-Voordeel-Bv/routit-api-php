<?php

namespace Inserve\RoutITAPI\Request;

use Inserve\RoutITAPI\Header;
use Inserve\RoutITAPI\Request\NewCustomerRequest\Enum\CountryCode;
use Inserve\RoutITAPI\Request\NewCustomerRequest\Enum\LegalStatus;;
use Inserve\RoutITAPI\Validation\Validator;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class NewCustomerRequest extends AbstractRoutITRequest implements RoutITRequestInterface
{
    protected string $rootNode = 'NewCustomerRequest_V3';

    public function validate(): void
    {
        Validator::assertRequiredFieldsPresent($this, [
            'header', 'name', 'street', 'houseNr', 'zipCode', 'city', 'countryCode', 'phone1', 'email', 'legalStatus'
        ]);
        Validator::assertStringLength($this->name, 'Name', 1, 75);
        Validator::assertStringLength($this->street, 'Street', 1, 100);
        Validator::assertStringLength($this->zipCode, 'ZipCode', 1, 10);
        Validator::assertStringLength($this->city, 'City', 1, 50);
        Validator::assertStringLength($this->phone1, 'Phone1', 1, 20);
        Validator::assertStringLength($this->email, 'Email', 1, 256);
        Validator::assertStringLength($this->legalStatus->value, 'LegalStatus', 2, 50);

        Validator::assertOptionalStringLength($this->houseNrExtension, null, 20, 'HouseNrExtension');
        Validator::assertOptionalStringLength($this->phone2, null, 20, 'Phone2');
        Validator::assertOptionalStringLength($this->fax, null, 20, 'Fax');
        Validator::assertOptionalStringLength($this->website, null, 256, 'Website');
        Validator::assertOptionalStringLength($this->debitNr, null, 20, 'DebitNr');
        Validator::assertOptionalStringLength($this->iban, null, 50, 'IBAN');
        Validator::assertOptionalStringLength($this->bic, null, 20, 'BIC');
        Validator::assertOptionalStringLength($this->vatNr, null, 50, 'VATNr');
        Validator::assertOptionalStringLength($this->externalId, null, 20, 'ExternalId');
        Validator::assertOptionalStringLength($this->chamberOfCommerceNr, null, 15, 'ChamberOfCommerceNr');
    }

    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('Name')]
    private ?string $name = null;

    #[SerializedName('Street')]
    private ?string $street = null;

    #[SerializedName('HouseNr')]
    private ?int $houseNr = null;

    #[SerializedName('HouseNrExtension')]
    private ?int $houseNrExtension = null;

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
        $this->houseNrExtension = $houseNrExtension;
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

    public function setCountryCode(CountryCode|string|null $countryCode): self
    {
        if ($countryCode instanceof CountryCode) {
            $this->countryCode = $countryCode->value;
        } else {
            $this->countryCode = $countryCode;
        }

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

    public function setLegalStatus(LegalStatus|string|null $legalStatus): self
    {
        if ($legalStatus instanceof LegalStatus) {
            $this->legalStatus = $legalStatus->value;
        } else {
            $this->legalStatus = $legalStatus;
        }

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

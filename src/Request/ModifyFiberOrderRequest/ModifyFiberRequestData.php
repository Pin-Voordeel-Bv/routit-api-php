<?php

namespace Inserve\RoutITAPI\Request\ModifyFiberOrderRequest;

use Inserve\RoutITAPI\Validation\Validator;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class ModifyFiberRequestData
{
    #[SerializedName('ContactPersonName')]
    private ?string $contactPersonName = null;

    #[SerializedName('ContactPersonPhoneNumber')]
    private ?string $contactPersonPhoneNumber = null;

    #[SerializedName('ContactPersonEmailAddress')]
    private ?string $contactPersonEmailAddress = null;

    public function validate(): array
    {
        $errors = [];

        Validator::assertRequiredFieldsPresent($this, [
            'contactPersonName',
            'contactPersonPhoneNumber',
            'contactPersonEmailAddress',
        ], $errors);

        Validator::assertStringLength($this->contactPersonName, 1, 100, 'ContactPersonName', $errors);
        Validator::assertStringLength($this->contactPersonPhoneNumber, 1, 30, 'ContactPersonPhoneNumber', $errors);
        Validator::assertStringLength($this->contactPersonEmailAddress, 1, 256, 'ContactPersonEmailAddress', $errors);

        return $errors;
    }

    // ───────────────── ContactPersonName ─────────────────

    public function getContactPersonName(): ?string
    {
        return $this->contactPersonName;
    }

    public function setContactPersonName(?string $contactPersonName): self
    {
        $this->contactPersonName = $contactPersonName;
        return $this;
    }

    // ───────────────── ContactPersonPhoneNumber ─────────────────

    public function getContactPersonPhoneNumber(): ?string
    {
        return $this->contactPersonPhoneNumber;
    }

    public function setContactPersonPhoneNumber(?string $contactPersonPhoneNumber): self
    {
        $this->contactPersonPhoneNumber = $contactPersonPhoneNumber;
        return $this;
    }

    // ───────────────── ContactPersonEmailAddress ─────────────────

    public function getContactPersonEmailAddress(): ?string
    {
        return $this->contactPersonEmailAddress;
    }

    public function setContactPersonEmailAddress(?string $contactPersonEmailAddress): self
    {
        $this->contactPersonEmailAddress = $contactPersonEmailAddress;
        return $this;
    }
}

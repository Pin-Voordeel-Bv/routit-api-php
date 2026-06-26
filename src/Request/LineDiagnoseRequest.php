<?php

namespace Inserve\RoutITAPI\Request;

use Inserve\RoutITAPI\Header;
use Inserve\RoutITAPI\Request\LineDiagnoseRequest\Enum\SymptomCode;
use Inserve\RoutITAPI\Validation\Validator;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class LineDiagnoseRequest extends AbstractRoutITRequest implements RoutITRequestInterface
{
    protected string $rootNode = 'LineDiagnoseRequest_V1';

    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('OrderId')]
    private int $orderId;

    /**
     * Store as string so the XML encoder outputs plain text (no nested nodes).
     */
    #[SerializedName('SymptomCode')]
    private string $symptomCode;

    public function validate(): void
    {
        $errors = [];

        Validator::assertRequiredFieldsPresent($this, ['orderId'], $errors);

        Validator::assertEnumValue(
            $this->symptomCode ?? null,
            ['Sym103', 'Sym104', 'Sym105', 'Sym111'],
            'SymptomCode',
            $errors
        );

        Validator::throwIfErrors($errors);
    }

    // ───────── Header ─────────

    public function getHeader(): ?Header
    {
        return $this->header;
    }

    public function setHeader(?Header $header): self
    {
        $this->header = $header;
        return $this;
    }

    // ───────── OrderId ─────────

    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function setOrderId(int $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }

    // ───────── SymptomCode (raw string) ─────────

    public function getSymptomCode(): string
    {
        return $this->symptomCode;
    }

    public function setSymptomCode(string|SymptomCode|null $symptomCode): self
    {
        $this->symptomCode = $symptomCode instanceof SymptomCode
            ? $symptomCode->value
            : $symptomCode;

        return $this;
    }
}
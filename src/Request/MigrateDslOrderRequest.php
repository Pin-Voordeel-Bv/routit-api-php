<?php

namespace Inserve\RoutITAPI\Request;

use Inserve\RoutITAPI\Header;
use Inserve\RoutITAPI\Request\MigrateDslOrderRequest\MigrateSubnet;
use Inserve\RoutITAPI\Validation\Validator;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class MigrateDslOrderRequest extends AbstractRoutITRequest implements RoutITRequestInterface
{
    protected string $rootNode = 'MigrateDslOrderRequest_V1';

    #[SerializedName('Header')]
    private ?Header $header = null;

    #[SerializedName('DslOrderRequest')]
    private ?NewDslOrderRequest $dslOrderRequest = null;

    #[SerializedName('MigrateSubnet')]
    private ?MigrateSubnet $migrateSubnet = null;

    #[SerializedName('IsRealtime')]
    private ?bool $isRealtime = null;

    public function validate(): void
    {
        $errors = [];

        // @TODO: can be removed
        // Validator::assertRequiredFieldsPresent($this, [], $errors); // No required top-level fields

        // Validate nested DSL order if provided
        Validator::validateOptionalNested($this->dslOrderRequest ?? null, 'dslOrderRequest', $errors, false);

        // Validate migrateSubnet if provided
        Validator::validateOptionalNested($this->migrateSubnet ?? null, 'migrateSubnet', $errors);

        // Optional: isRealtime (boolean)
        Validator::assertOptionalBoolean($this, 'isRealtime', $errors);

        Validator::throwIfErrors($errors);
    }

    public function getHeader(): ?Header
    {
        return $this->header;
    }

    public function setHeader(?Header $header): self
    {
        $this->header = $header;
        return $this;
    }

    public function getDslOrderRequest(): ?NewDslOrderRequest
    {
        return $this->dslOrderRequest;
    }

    public function setDslOrderRequest(?NewDslOrderRequest $dslOrderRequest): self
    {
        $this->dslOrderRequest = $dslOrderRequest;
        return $this;
    }

    public function getMigrateSubnet(): ?MigrateSubnet
    {
        return $this->migrateSubnet;
    }

    public function setMigrateSubnet(?MigrateSubnet $migrateSubnet): self
    {
        $this->migrateSubnet = $migrateSubnet;
        return $this;
    }

    public function isRealtime(): ?bool
    {
        return $this->isRealtime;
    }

    public function setIsRealtime(?bool $isRealtime): self
    {
        $this->isRealtime = $isRealtime;
        return $this;
    }
}
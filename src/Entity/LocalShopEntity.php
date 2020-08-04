<?php declare(strict_types=1);

namespace Crehler\LocalShopsPlugin\Entity;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class LocalShopEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var string
     */
    protected $addressCity;

    /**
     * @var string
     */
    protected $addressZipCode;

    /**
     * @var string
     */
    protected $addressStreet;

    /**
     * @var string
     */
    protected $addressBuildingNumber;

    /**
     * @var string
     */
    protected $contactPhone;

    /**
     * @var string
     */
    protected $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAddressCity(): string
    {
        return $this->addressCity;
    }

    /**
     * @param string $addressCity
     */
    public function setAddressCity(string $addressCity): void
    {
        $this->addressCity = $addressCity;
    }

    /**
     * @return string
     */
    public function getAddressZipCode(): string
    {
        return $this->addressZipCode;
    }

    /**
     * @param string $addressZipCode
     */
    public function setAddressZipCode(string $addressZipCode): void
    {
        $this->addressZipCode = $addressZipCode;
    }

    /**
     * @return string
     */
    public function getAddressStreet(): string
    {
        return $this->addressStreet;
    }

    /**
     * @param string $addressStreet
     */
    public function setAddressStreet(string $addressStreet): void
    {
        $this->addressStreet = $addressStreet;
    }

    /**
     * @return string
     */
    public function getAddressBuildingNumber(): string
    {
        return $this->addressBuildingNumber;
    }

    /**
     * @param string $addressBuildingNumber
     */
    public function setAddressBuildingNumber(string $addressBuildingNumber): void
    {
        $this->addressBuildingNumber = $addressBuildingNumber;
    }

    /**
     * @return string
     */
    public function getContactPhone(): string
    {
        return $this->contactPhone;
    }

    /**
     * @param string $contactPhone
     */
    public function setContactPhone(string $contactPhone): void
    {
        $this->contactPhone = $contactPhone;
    }
}

<?php

namespace AppTemplate\Address\Model;

use DateTime;

class TelecomAddress extends Address
{
    public function __construct(
        private string $countryCode,
        private string $nationalDirectDialingPrefix,
        private string $areaCode,
        private string $number,
        private string $extension,
        private PhysicalType $physicalType,
        ?DateTime $validFrom = null,
        ?DateTime $validTo = null
    ) {
        parent::__construct($validFrom, $validTo);
    }
}

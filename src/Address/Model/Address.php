<?php

namespace AppTemplate\Address\Model;

use DateTime;

abstract class Address
{
    public function __construct(
        protected ?DateTime $validFrom = null,
        protected ?DateTime $validTo = null
    ) {
    }
}

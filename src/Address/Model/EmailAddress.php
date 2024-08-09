<?php

namespace AppTemplate\Address\Model;

use DateTime;

class EmailAddress extends Address
{
    public function __construct(
        private string $emailAddress,
        ?DateTime $validFrom = null,
        ?DateTime $validTo = null
    ) {
        parent::__construct($validFrom, $validTo);

        if (!preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i', $emailAddress)) {
            throw new \InvalidArgumentException("Invalid email address");
        }

        $this->emailAddress = mb_strtolower($emailAddress);
    }
}

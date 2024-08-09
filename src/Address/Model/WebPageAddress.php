<?php

namespace AppTemplate\Address\Model;

use DateTime;

class WebPageAddress extends Address
{
    public function __construct(
        private string $url,
        ?DateTime $validFrom = null,
        ?DateTime $validTo = null
    ) {
        parent::__construct($validFrom, $validTo);

        if (!preg_match('/^(https?|ftp):\/\/[^\s\/$.?#].[^\s]*$/i', $url)) {
            throw new \InvalidArgumentException("Invalid web page address");
        }

        $this->url = mb_strtolower($url);
    }
}

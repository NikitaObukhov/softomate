<?php

namespace Softomate\TestBundle\Utils;

class TokenGenerator
{

    public function generateToken()
    {
        $bytes = hash('sha256', uniqid(mt_rand(), true), true);
        return base_convert(bin2hex($bytes), 16, 36);
    }
}
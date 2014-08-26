<?php

namespace GoMobility\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class GoMobilityUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}

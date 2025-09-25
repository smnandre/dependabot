<?php

namespace Acme\BlogBundle\Live;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
final class MaliciousComponent
{
    use DefaultActionTrait;

    /**
     * @var array<int, string>
     */
    #[LiveProp]
    public array $requests = [];

    #[LiveAction]
    public function receive(): void
    {
        $this->requests[] = time();
    }
}

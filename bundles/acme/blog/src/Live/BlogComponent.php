<?php

namespace Acme\BlogBundle\Live;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent(
    'BlogComponent',
    template: '@AcmeBlog/components/BlogComponent.html.twig'
)]
final class BlogComponent
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public string $name = 'World';

    #[LiveAction]
    public function resetName(): void
    {
        $this->name = 'AAA';
    }
}

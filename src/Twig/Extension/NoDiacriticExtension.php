<?php

namespace Knp\Bundle\PaginatorBundle\Twig\Extension;

use Knp\Bundle\PaginatorBundle\Helper\Processor;
use Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination;

class NoDiacriticExtension extends \Twig_Extension
{
    /**
     * @var RequestStack
     */
    protected $requestStack = null;

    public function __construct(RequestStack $requestStack = null)
    {
        if (is_object($requestStack)) {
            $this->requestStack = $requestStack;
        }
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('nodiacritic', array($this, 'filter'))
        );
    }

    public function getName()
    {
        return 'vria_nodiacritic';
    }

    public function filter($string)
    {

    }
}

<?php

namespace VRia\Bundle\NoDiacriticBundle\Twig\Extension;


use Symfony\Component\HttpFoundation\RequestStack;
use VRia\Utils\NoDiacritic;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class NoDiacriticExtension extends \Twig_Extension
{
    /**
     * @var RequestStack
     */
    protected $requestStack;

    /**
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('nodiacritic', array($this, 'filter'))
        );
    }

    /**
     * @param $string
     * @return string
     */
    public function filter($string, $locale = null)
    {
        return NoDiacritic::filter($string, $locale ? : $this->requestStack->getCurrentRequest()->getLocale());
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vria_nodiacritic';
    }
}

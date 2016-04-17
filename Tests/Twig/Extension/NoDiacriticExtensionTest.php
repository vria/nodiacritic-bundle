<?php

namespace VRia\Bundle\NoDiacriticBundle\Tests\Twig\Extension;


use VRia\Bundle\NoDiacriticBundle\Twig\Extension\NoDiacriticExtension;

class NoDiacriticExtensionTest extends \PHPUnit_Framework_TestCase
{
    const NO_DIACRITIC = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ,./?'\"!@#$%^&*()_-+=абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ";
    const DIACRITIC = "àâçéèêëîïœôùûÀÂÇÈÉÊËÎÏŒáéíñóúüÁÉÍÑÓÚÜÔÙÛàèìòùÀÈÌÒÙãÃçÇòÒóÓõÕäåæðëöøßþüÿÄÅÆÐËÖØÞÜ";

    /**
     * @param string $locale
     * @return NoDiacriticExtension
     */
    private function getExtention($locale = null)
    {
        $request = $this->getMockBuilder('Symfony\Component\HttpFoundation\Request')->getMock();
        $request->method('getLocale')
            ->willReturn($locale);

        $requestStack = $this->getMockBuilder('Symfony\Component\HttpFoundation\RequestStack')
            ->getMock();

        $requestStack->method('getCurrentRequest')
            ->willReturn($request);

        return new NoDiacriticExtension($requestStack);
    }

    public function testNoChangeDefaultLocale()
    {
        $extension = $this->getExtention();

        $this->assertEquals(self::NO_DIACRITIC,
            $extension->filter(self::NO_DIACRITIC));
    }

    public function testNoChangeGermanLocale()
    {
        $extension = $this->getExtention('de');

        $this->assertEquals(self::NO_DIACRITIC,
            $extension->filter(self::NO_DIACRITIC));
    }

    public function testNoChangeDanishLocale()
    {
        $extension = $this->getExtention('de');

        $this->assertEquals(self::NO_DIACRITIC,
            $extension->filter(self::NO_DIACRITIC));
    }

    public function testDefaultLocale()
    {
        $extension = $this->getExtention();

        $this->assertEquals("aaceeeeiioeouuAACEEEEIIOEaeinouuAEINOUUOUUaeiouAEIOUaAcCoOoOoOaaaedeoosthuyAAAEDEOOTHU",
            $extension->filter(self::DIACRITIC));
    }

    public function testGermanLocale()
    {
        $extension = $this->getExtention('de');

        $this->assertEquals("aaceeeeiioeouuAACEEEEIIOEaeinouueAEINOUUeOUUaeiouAEIOUaAcCoOoOoOaeaaedeoeossthueyAeAAEDEOeOTHUe",
            $extension->filter(self::DIACRITIC));
    }

    public function testDanishLocale()
    {
        $extension = $this->getExtention("da");

        $this->assertEquals("aaceeeeiioeouuAACEEEEIIOEaeinouuAEINOUUOUUaeiouAEIOUaAcCoOoOoOaaaaedeooesthuyAAaAeDEOOeTHU",
            $extension->filter(self::DIACRITIC));
    }
}

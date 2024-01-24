<?php

namespace App\Tests;

use App\Entity\Actualite;
use PHPUnit\Framework\TestCase;

class ActualiteTest extends TestCase
{
    public function testSomething(): void
    {
        $this->assertTrue(true);
    }

    public function testIsTrue(): void
    {
        $actualite = new Actualite();
        $dateTime = new \DateTime();

        $actualite->setTitre('titre')
                  ->setContenu('contenu')
                  ->setDateTime($dateTime)
                  ->setSlug('slug');

        $this->assertTrue($actualite->getTitre() === 'titre');
        $this->assertTrue($actualite->getContenu() === 'contenu');
        $this->assertTrue($actualite->getDateTime() === $dateTime);
        $this->assertTrue($actualite->getSlug() === 'slug');
    }

    public function testIsFalse(): void
    {
        $actualite = new Actualite();
        $dateTime = new \DateTime();

        $actualite->setTitre('titre')
                  ->setContenu('contenu')
                  ->setDateTime(new \DateTime())
                  ->setSlug('slug');

        $this->assertFalse($actualite->getTitre() === 'titre2');
        $this->assertFalse($actualite->getContenu() === 'contenu2');
        $this->assertFalse($actualite->getDateTime() === $dateTime);
        $this->assertFalse($actualite->getSlug() === 'slug2');
    }

    public function testIsEmpty(): void
    {
        $actualite = new Actualite();

        $this->assertEmpty($actualite->getTitre());
        $this->assertEmpty($actualite->getContenu());
        $this->assertEmpty($actualite->getDateTime());
        $this->assertEmpty($actualite->getSlug());
    }

}

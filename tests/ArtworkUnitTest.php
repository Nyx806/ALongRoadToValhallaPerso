<?php

namespace App\Tests;

use App\Entity\Artwork;
use PHPUnit\Framework\TestCase;

class ArtworkUnitTest extends TestCase
{
    public function testSomething(): void
    {
        $this->assertTrue(true);
    }

    public function testIsTrue(): void
    {
        $artwork = new Artwork();
        $datetime = new \DateTime();

        $artwork->setNom('lol')
                ->setLargeur(10)
                ->setHauteur(10)
                ->setDateReal($datetime)
                ->setDescription('description')
                ->setSlug('slug')
                ->setFiles('files');
                               

        $this->assertTrue($artwork->getNom() === 'lol');
        $this->assertTrue($artwork->getLargeur() == 10);
        $this->assertTrue($artwork->getHauteur() == 10);
        $this->assertTrue($artwork->getDateReal() === $datetime);
        $this->assertTrue($artwork->getDescription() === 'description');
        $this->assertTrue($artwork->getSlug() === 'slug');
        $this->assertTrue($artwork->getfiles() === 'files');
    }

    public function testIsFalse(): void
    {
        $artwork = new Artwork();
        $datetime = new \DateTime();

        $artwork->setNom('title')
                ->setLargeur(10)
                ->setHauteur(10)
                ->setDateReal($datetime)
                ->setDescription('description')
                ->setSlug('slug')
                ->setFiles('files');
                               

        $this->assertFalse($artwork->getNom() === 'false');
        $this->assertFalse($artwork->getLargeur() == 5);
        $this->assertFalse($artwork->getHauteur() == 5);
        $this->assertFalse($artwork->getDateReal() === new \DateTime());
        $this->assertFalse($artwork->getDescription() === 'false');
        $this->assertFalse($artwork->getSlug() === 'false');
        $this->assertFalse($artwork->getfiles() === 'false');
    }

    public function testIsEmpty(): void
    {
        $artwork = new Artwork();

        $this->assertEmpty($artwork->getNom());
        $this->assertEmpty($artwork->getLargeur());
        $this->assertEmpty($artwork->getHauteur());
        $this->assertEmpty($artwork->getDateReal());
        $this->assertEmpty($artwork->getDescription());
        $this->assertEmpty($artwork->getSlug());
        $this->assertEmpty($artwork->getfiles());
    }

}

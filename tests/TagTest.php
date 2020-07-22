<?php

namespace App\Tests;

use App\Entity\Tag;
use PHPUnit\Framework\TestCase;

class TagTest extends TestCase
{
    public function testNewTagHasEmptyName()
    {
        $tag = new Tag();

        $name = $tag->getName();
        $this->assertEmpty($name);
    }
    
    public function testTagAssignedNameIsValid()
    {
        $name='foo';
        $tag = new Tag();

        $tag->setName($name);

        $this->assertEquals($tag->getName(), $name);
    }

}   
<?php

namespace CanalTP\MediaManager\Test\Media;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Category\AbstractCategory;
use CanalTP\MediaManager\Media\MediaType;
use CanalTP\MediaManager\Media\SoundType;
use CanalTP\MediaManager\Media\Sound;
use CanalTP\MediaManager\Category\Line;

class AbstractMediaTest extends \PHPUnit_Framework_TestCase
{
    private $stub = null;

    protected function setUp()
    {
        $namespace = 'CanalTP\MediaManager\Media\AbstractMedia';
        $this->stub = $this->getMockForAbstractClass($namespace);
    }

    public function testInitialisation()
    {
        $this->assertInternalType(
            'integer', $this->stub->getMediaType(),
            Registry::get('NOT_CORRECT')
        );
        $this->assertEquals(
            $this->stub->getMediaType(), MediaType::UNKNOWN,
            Registry::get('NOT_CORRECT')
        );
        $this->assertInternalType(
            'integer', $this->stub->getSize(),
            Registry::get('NOT_INIT')
        );
        $this->assertEquals(
            $this->stub->getSize(), 0,
            Registry::get('NOT_INIT')
        );
    }

    public function testSetAndGetType()
    {
        $type = $this->stub->getType();

        $this->assertInternalType('integer', $type);
        $this->assertEquals(
            $type, SoundType::UNKNOWN,
            Registry::get('NOT_INIT')
        );
        $this->stub->setType(SoundType::UNKNOWN);
        $this->assertEquals(
            $this->stub->getType(), SoundType::UNKNOWN,
            Registry::get('NOT_SET')
        );
    }

    public function testSetAndGetMediaType()
    {
        $mediaType = $this->stub->getMediaType();

        $this->assertInternalType('integer', $mediaType);
        $this->assertEquals(
            $mediaType, MediaType::UNKNOWN,
            Registry::get('NOT_INIT')
        );
        $this->stub->setMediaType(MediaType::SOUND);
        $this->assertEquals(
            $this->stub->getMediaType(), MediaType::SOUND,
            Registry::get('NOT_SET')
        );
    }

    public function testSetAndGetSize()
    {
        $size = $this->stub->getSize();

        $this->assertInternalType('integer', $size);
        $this->assertNotNull($size, Registry::get('NOT_INIT'));
        $this->stub->setSize(42.42);
        $this->assertEquals(
            $this->stub->getSize(), 42.42,
            Registry::get('NOT_SET')
        );
    }

    public function testSetAndGetExpirationDate()
    {
        $expirationDate = $this->stub->getExpirationDate();
        $date = strtotime("+1 week");

        $this->assertInternalType('integer', $expirationDate);
        $this->assertNotNull($expirationDate, Registry::get('NOT_INIT'));
        $this->stub->setExpirationDate($date);
        $this->assertEquals(
            $this->stub->getExpirationDate(), $date,
            Registry::get('NOT_SET')
        );
    }

    public function testSetAndGetPath()
    {
        $this->assertNull($this->stub->getPath(), Registry::get('NOT_INIT'));
        $this->stub->setPath("/my/path/");
        $this->assertInternalType('string', $this->stub->getPath());
        $this->assertEquals(
            $this->stub->getPath(), "/my/path/",
            Registry::get('NOT_SET')
        );
    }

    public function testSetAndGetCompany()
    {
        $company = 42;

        $this->assertNull(
            $this->stub->getCompany(),
            Registry::get('NOT_INIT')
        );
        $this->stub->setCompany($company);
        $this->assertEquals(
            $this->stub->getCompany(),
            $company, Registry::get('NOT_SET')
        );
    }

    public function testSetAndGetCategory()
    {
        $category = new Line();

        $this->assertNull(
            $this->stub->getCategory(),
            Registry::get('NOT_INIT')
        );
        $this->stub->setCategory($category);
        $this->assertEquals(
            $this->stub->getCategory(), $category,
            Registry::get('NOT_SET')
        );
    }
}

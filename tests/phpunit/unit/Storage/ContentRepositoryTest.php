<?php
namespace Bolt\Tests\Storage;

use Bolt\Tests\BoltUnitTest;
use Bolt\Storage\EntityManager;
use Bolt\Storage\Repository;
use Bolt\Storage\ContentRepository;
use Bolt\Entity\Content;

/**
 * Class to test src/Storage/Repository/Content
 *
 * @author Ross Riley <riley.ross@gmail.com>
 */
class ContentRepositoryTest extends BoltUnitTest
{
    
    
    public function testConstruct()
    {
        $app = $this->getApp();
        $em = new EntityManager($app['db'], $app['dispatcher'], $app['storage.metadata']);
        $repo = $em->getRepository('bolt_showcases');
        
        $this->assertInstanceOf('Bolt\Storage\ContentRepository', $repo);
    }
    
    public function testCreate()
    {
        $app = $this->getApp();
        $em = new EntityManager($app['db'], $app['dispatcher'], $app['storage.metadata']);
        $repo = $em->getRepository('showcases');
        
        $showcase = new Content(array(
            'title' => 'Test Showcase',
            'slug' => 'test-showcase',
            'status' => 'published'
        ));
    
        $res = $repo->save($showcase);
        $this->assertNotEmpty($res);
    }

    
}

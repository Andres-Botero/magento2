<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Cms\Helper;

use Magento\Customer\Model\Context;

/**
 * @magentoAppArea frontend
 */
class PageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @magentoAppIsolation enabled
     * @magentoDataFixture Magento/Cms/_files/pages.php
     */
    public function testRenderPage()
    {
        /** @var $objectManager \Magento\TestFramework\ObjectManager */
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $httpContext = $objectManager->get('Magento\Framework\App\Http\Context');
        $httpContext->setValue(Context::CONTEXT_AUTH, false, false);
        $objectManager->get('Magento\Framework\App\State')->setAreaCode('frontend');
        $arguments = [
            'request' => $objectManager->get('Magento\TestFramework\Request'),
            'response' => $objectManager->get('Magento\TestFramework\Response'),
        ];
        $context = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            'Magento\Framework\App\Action\Context',
            $arguments
        );
        $page = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get('Magento\Cms\Model\Page');
        $page->load('page_design_blank', 'identifier');
        // fixture
        /** @var $pageHelper \Magento\Cms\Helper\Page */
        $pageHelper = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get('Magento\Cms\Helper\Page');
        $result = $pageHelper->renderPage(
            \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
                'Magento\Framework\App\Action\Action',
                ['context' => $context]
            ),
            $page->getId()
        );
        $design = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(
            'Magento\Framework\View\DesignInterface'
        );
        $this->assertEquals('Magento/blank', $design->getDesignTheme()->getThemePath());
        $this->assertTrue($result);
    }
}

<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Framework\Code\Generator\TestAsset;

class TestGenerationClass
{
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     *
     * @param \Magento\Framework\Code\Generator\TestAsset\ParentClass $parentClass
     * @param \Magento\Framework\Code\Generator\TestAsset\SourceClass $sourceClass
     * @param \Not_Existing_Class $notExistingClass
     */
    public function __construct(
        \Magento\Framework\Code\Generator\TestAsset\ParentClass $parentClass,
        \Magento\Framework\Code\Generator\TestAsset\SourceClass $sourceClass,
        \Not_Existing_Class $notExistingClass
    ) {
    }
}

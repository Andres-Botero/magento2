<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

require __DIR__ . '/../../../Magento/Customer/_files/customer.php';
require __DIR__ . '/../../../Magento/Catalog/_files/product_simple.php';

$wishlist = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create('Magento\Wishlist\Model\Wishlist');
$wishlist->loadByCustomerId($customer->getId(), true);
$item = $wishlist->addNewItem($product, new \Magento\Framework\Object([]));
//    'product' => '1',
//    'related_product' => '',
//    'options' => array(
//        1 => '1-text',
//        2 => array('month' => 1, 'day' => 1, 'year' => 2001, 'hour' => 1, 'minute' => 1),
//        3 => '1',
//        4 => '1',
//    ),
//    'validate_datetime_2' => '',
//    'qty' => '1',
$wishlist->setSharingCode('fixture_unique_code')->save();

<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Prefix\Magento2Module\Plugin;

use Magento\Catalog\Model\Product as MagentoProduct;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Product
{
    /**
     * var ScopeConfigInterface
     */
    protected ScopeConfigInterface $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }
    public function getConfigValue()
    {
        return $this->scopeConfig->getValue('catalog/frontend/product_prefix');
    }
    public function afterGetName(MagentoProduct $product, string $result) : string {
        $value= $this->getConfigValue();
       // $value="shh-";
        return $value . $result;
    }

}

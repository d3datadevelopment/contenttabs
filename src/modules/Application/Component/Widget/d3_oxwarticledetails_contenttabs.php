<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * http://www.shopmodule.com
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

namespace D3\Contenttabs\Modules\Application\Component\Widget;

/**
 * Class d3_oxwarticledetails_contenttabs
 */
use D3\Contenttabs\Application\Model\contentTabs as TabsModel;
use D3\Contenttabs\Modules\Application\Model\d3_oxarticle_longtexts;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;

class d3_oxwarticledetails_contenttabs extends d3_oxwarticledetails_contenttabs_parent
{
    /**
     * @return array|null
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     */
    public function d3GetTabs()
    {
        /** @var d3_oxarticle_longtexts $oArticle */
        $oArticle = $this->getProduct();

        /** @var TabsModel $oTabs */
        $oTabs = oxNew(TabsModel::class, $oArticle);
        return $oTabs->getTabs();
    }
}

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
use OxidEsales\Eshop\Application\Model\Article;

class d3_oxwarticledetails_contenttabs extends d3_oxwarticledetails_contenttabs_parent
{

    /**
     * @return array|null
     */
    public function d3GetTabs()
    {
        /**
         * @var Article
         */
        $oArticle = $this->getProduct();

        return oxNew(TabsModel::class, $oArticle)->getTabs();
    }
}

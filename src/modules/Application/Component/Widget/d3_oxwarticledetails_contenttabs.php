<?php

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

<?php

/**
 * Class d3_oxwarticledetails_contenttabs
 */
class d3_oxwarticledetails_contenttabs extends d3_oxwarticledetails_contenttabs_parent
{

    /**
     * @return array|null
     */
    public function d3GetTabs()
    {
        /**
         * @var oxArticle
         */
        $oArticle = $this->getProduct();

        return oxNew(d3\contenttabs\Application\Model\contentTabs::class, $oArticle)->getTabs();
    }
}

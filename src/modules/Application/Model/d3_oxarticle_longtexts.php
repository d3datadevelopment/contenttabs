<?php

/**
 * Article manager.
 * Creates fully detailed article object, with such information as VAT,
 * discounts, etc.
 *
 */
class d3_oxarticle_longtexts extends d3_oxarticle_longtexts_parent
{
    /**
     * Deletes record and other information related to this article such as images from DB,
     * also removes variants. Returns true if entry was deleted.
     *
     * @param string $sOXID Article id
     *
     * @throws \Exception
     *
     * @return bool
     */
    public function delete($sOXID = null)
    {
        if (!$sOXID) {
            $sOXID = $this->getId();
        }
        if (!$sOXID) {
            return parent::delete($sOXID);
        }

        oxNew(d3\contenttabs\Application\Model\contentTabs::class, $this)->deleteAllLongtexts($sOXID);

        return parent::delete($sOXID);
    }
}

<?php
/**
 * @copyright     © D³ Data Development
 *
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
 * @author        D3 Data Development <support@shopmodule.com>
 * @link          http://www.oxidmodule.com
 */

namespace D3\Contenttabs\Application\Controller\Admin;

// Controller
use \OxidEsales\Eshop\Application\Controller\Admin\AdminListController;
// Core
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use \OxidEsales\Eshop\Core\Registry;
use \OxidEsales\Eshop\Core\Request;
use \OxidEsales\Eshop\Core\DatabaseProvider;
// Models
use \OxidEsales\Eshop\Application\Model\Article;
use \OxidEsales\Eshop\Application\Model\ArticleList;
use \OxidEsales\Eshop\Application\Model\CategoryList;
use \OxidEsales\Eshop\Application\Model\ManufacturerList;
use \OxidEsales\Eshop\Application\Model\VendorList;


/**
 * Class contentTabList
 * @package D3\Contenttabs\Application\Controller\Admin
 */
class contentTabList extends AdminListController
{
    protected $_iViewListSize = 5;

    protected $_sThisTemplate = 'contentTabList.tpl';

    /**
     * Name of chosen object class (default null).
     *
     * @var string
     */
    protected $_sListClass = Article::class;

    /**
     * Type of list.
     *
     * @var string
     */
    protected $_sListType = ArticleList::class;

    /**
     * @return string
     */
    public function render()
    {
        $myConfig      = $this->getConfig();
        $request       = Registry::get(Request::class);
        $sPwrSearchFld = $request->getRequestEscapedParameter("pwrsearchfld");
        $sPwrSearchFld = $sPwrSearchFld ? strtolower($sPwrSearchFld) : "oxtitle";
        $oArticle      = null;
        $oList         = $this->getItemList();

        if ($oList) {
            foreach ($oList as $key => $oArticle) {
                $sFieldName = "oxarticles__{$sPwrSearchFld}";

                // formatting view
                if (!$myConfig->getConfigParam('blSkipFormatConversion')) {
                    if ($oArticle->$sFieldName->fldtype == "datetime") {
                        Registry::getUtilsDate()->convertDBDateTime($oArticle->$sFieldName);
                    } elseif ($oArticle->$sFieldName->fldtype == "timestamp") {
                        Registry::getUtilsDate()->convertDBTimestamp($oArticle->$sFieldName);
                    } elseif ($oArticle->$sFieldName->fldtype == "date") {
                        Registry::getUtilsDate()->convertDBDate($oArticle->$sFieldName);
                    }
                }

                $oArticle->pwrsearchval = $oArticle->$sFieldName->value;
                $oList[$key]            = $oArticle;
            }
        }

        $return = parent::render();

        // load fields
        if (!$oArticle && $oList) {
            $oArticle = $oList->getBaseObject();
        }
        $this->_aViewData["pwrsearchfields"] = $oArticle ? $this->getSearchFields() : null;
        $this->_aViewData["pwrsearchfld"]    = strtoupper($sPwrSearchFld);

        $aFilter = $this->getListFilter();
        if (isset($aFilter["oxarticles"][$sPwrSearchFld])) {
            $this->_aViewData["pwrsearchinput"] = $aFilter["oxarticles"][$sPwrSearchFld];
        }

        $sType   = '';
        $sValue  = '';
        $sArtCat = $request->getRequestEscapedParameter("art_category");

        if ($sArtCat && strstr($sArtCat, "@@") !== false) {
            list($sType, $sValue) = explode("@@", $sArtCat);
        }
        $this->_aViewData["art_category"] = $sArtCat;

        // parent categorie tree
        $this->_aViewData["cattree"] = $this->getCategoryList($sType, $sValue);

        // manufacturer list
        $this->_aViewData["mnftree"] = $this->getManufacturerList($sType, $sValue);

        // vendor list
        $this->_aViewData["vndtree"] = $this->getVendorList($sType, $sValue);

        return $return;
    }

    public function getSearchFields()
    {
        $aSkipFields = [
            "oxblfixedprice", "oxvarselect", "oxamitemid",
            "oxamtaskid", "oxpixiexport", "oxpixiexported"
        ];
        $oArticle    = oxNew(Article::class);

        return array_diff($oArticle->getFieldNames(), $aSkipFields);
    }

    public function getCategoryList($sType, $sValue)
    {
        /** @var \OxidEsales\Eshop\Application\Model\CategoryList $oCatTree parent category tree */
        $oCatTree = oxNew(CategoryList::class);
        $oCatTree->loadList();
        if ($sType === 'cat') {
            foreach ($oCatTree as $oCategory) {
                if ($oCategory->oxcategories__oxid->value == $sValue) {
                    $oCategory->selected = 1;
                    break;
                }
            }
        }

        return $oCatTree;
    }


    /**
     * Load manufacturer list, mark active category;
     *
     * @param string $sType  active list type
     * @param string $sValue active list item id
     *
     * @return ManufacturerList
     */
    public function getManufacturerList($sType, $sValue)
    {
        $oMnfTree = oxNew(ManufacturerList::class);
        $oMnfTree->loadManufacturerList();
        if ($sType === 'mnf') {
            foreach ($oMnfTree as $oManufacturer) {
                if ($oManufacturer->oxmanufacturers__oxid->value == $sValue) {
                    $oManufacturer->selected = 1;
                    break;
                }
            }
        }

        return $oMnfTree;
    }

    /**
     * Load vendor list, mark active category;
     *
     * @param string $sType  active list type
     * @param string $sValue active list item id
     *
     * @return VendorList
     */
    public function getVendorList($sType, $sValue)
    {
        $oVndTree = oxNew(VendorList::class);
        $oVndTree->loadVendorList();
        if ($sType === 'vnd') {
            foreach ($oVndTree as $oVendor) {
                if ($oVendor->oxvendor__oxid->value == $sValue) {
                    $oVendor->selected = 1;
                    break;
                }
            }
        }

        return $oVndTree;
    }

    /**
     * @param null $oListObject
     * @return string
     * @throws DatabaseConnectionException
     */
    protected function _buildSelectString($oListObject = null)
    {
        $sQ = parent::_buildSelectString($oListObject);
        if ($sQ) {
            $sTable = getViewName("oxarticles");
            $sQ .= " and $sTable.oxparentid = '' ";

            $sType = false;
            $request       = Registry::get(Request::class);
            $sArtCat = $request->getRequestEscapedParameter("art_category");
            if ($sArtCat && strstr($sArtCat, "@@") !== false) {
                list($sType, $sValue) = explode("@@", $sArtCat);
            }

            switch ($sType) {
                // add category
                case 'cat':
                    $oStr = getStr();
                    $sViewName = getViewName("oxobject2category");
                    $sInsert = "from $sTable left join {$sViewName} on {$sTable}.oxid = {$sViewName}.oxobjectid " .
                        "where {$sViewName}.oxcatnid = " . DatabaseProvider::getDb()->quote($sValue) . " and ";
                    $sQ = $oStr->preg_replace("/from\s+$sTable\s+where/i", $sInsert, $sQ);
                    break;
                // add category
                case 'mnf':
                    $sQ .= " and $sTable.oxmanufacturerid = " . DatabaseProvider::getDb()->quote($sValue);
                    break;
                // add vendor
                case 'vnd':
                    $sQ .= " and $sTable.oxvendorid = " . DatabaseProvider::getDb()->quote($sValue);
                    break;
            }
        }

        return $sQ;
    }

    public function buildWhere()
    {
        // we override this to select only parent articles
        $this->_aWhere = parent::buildWhere();

        // adding folder check
        $request       = Registry::get(Request::class);
        $sFolder = $request->getRequestEscapedParameter('folder');
        if ($sFolder && $sFolder != '-1') {
            $this->_aWhere[getViewName("oxarticles") . ".oxfolder"] = $sFolder;
        }

        return $this->_aWhere;
    }
}

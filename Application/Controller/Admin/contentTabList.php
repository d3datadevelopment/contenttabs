<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * https://www.d3data.de
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      https://www.oxidmodule.com
 */

namespace D3\Contenttabs\Application\Controller\Admin;

// Controller
use D3\Contenttabs\Application\Model\Constants;
use OxidEsales\Eshop\Application\Controller\Admin\AdminListController;
// Core
use OxidEsales\Eshop\Application\Model\Object2Category;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Model\ListModel;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\DatabaseProvider;
// Models
use OxidEsales\Eshop\Application\Model\Article;
use OxidEsales\Eshop\Application\Model\ArticleList;
use OxidEsales\Eshop\Application\Model\CategoryList;
use OxidEsales\Eshop\Application\Model\ManufacturerList;
use OxidEsales\Eshop\Application\Model\VendorList;
use OxidEsales\Eshop\Core\Str;

/**
 * Class contentTabList
 * @package D3\Contenttabs\Application\Controller\Admin
 */
class contentTabList extends AdminListController
{
    protected $_iViewListSize = 5;

    protected $_sThisTemplate = '@'.Constants::OXID_MODULE_ID.'/admin/contentTabList';

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
        $myConfig      = Registry::getConfig();
        $request       = Registry::getRequest();
        $sPwrSearchFld = $request->getRequestEscapedParameter("pwrsearchfld");
        $sPwrSearchFld = $sPwrSearchFld ? strtolower($sPwrSearchFld) : "oxtitle";
        /** @var ListModel $oList */
        $oList         = $this->getItemList();

        if ($oList) {
            foreach ($oList as $key => $oArticle) {
                $sFieldName = 'oxarticles__' . $sPwrSearchFld;

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
        if (false === isset($oArticle) && $oList) {
            $oArticle = $oList->getBaseObject();
        }

        $this->_aViewData["pwrsearchfields"] = (isset($oArticle) && $oArticle) ? $this->getSearchFields() : null;
        $this->_aViewData["pwrsearchfld"]    = strtoupper($sPwrSearchFld);

        $aFilter = $this->getListFilter();
        if (isset($aFilter["oxarticles"][$sPwrSearchFld])) {
            $this->_aViewData["pwrsearchinput"] = $aFilter["oxarticles"][$sPwrSearchFld];
        }

        $sType   = '';
        $sValue  = '';
        $sArtCat = $request->getRequestEscapedParameter("art_category");

        if ($sArtCat && str_contains($sArtCat, "@@")) {
            [$sType, $sValue] = explode("@@", $sArtCat);
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

    public function getSearchFields(): array
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
        /** @var CategoryList $oCatTree parent category tree */
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
     * @param null $listObject
     *
     * @return string
     * @throws DatabaseConnectionException
     */
    protected function buildSelectString($listObject = null)
    {
        $sQ = parent::buildSelectString($listObject);
        if ($sQ !== '' && $sQ !== '0') {
            $sTable = oxNew(Article::class)->getViewName();
            $sQ .= sprintf(" and %s.oxparentid = '' ", $sTable);

            $request       = Registry::getRequest();
            $sArtCat = $request->getRequestEscapedParameter("art_category");
            if ($sArtCat && str_contains($sArtCat, "@@")) {
                [$sType, $sValue] = explode("@@", $sArtCat);

                switch ($sType) {
                    // add category
                    case 'cat':
                        $oStr      = Str::getStr();
                        $sViewName = oxNew(Object2Category::class)->getViewName();
                        $sInsert   = sprintf('from %s left join %s on %s.oxid = %s.oxobjectid ', $sTable, $sViewName, $sTable, $sViewName) . sprintf('where %s.oxcatnid = ', $sViewName) . DatabaseProvider::getDb()->quote($sValue) . " and ";
                        $sQ        = $oStr->preg_replace(sprintf('/from\s+%s\s+where/i', $sTable), $sInsert, $sQ);
                        break;
                        // add category
                    case 'mnf':
                        $sQ .= sprintf(' and %s.oxmanufacturerid = ', $sTable) . DatabaseProvider::getDb()->quote($sValue);
                        break;
                        // add vendor
                    case 'vnd':
                        $sQ .= sprintf(' and %s.oxvendorid = ', $sTable) . DatabaseProvider::getDb()->quote($sValue);
                        break;
                }
            }
        }

        return $sQ;
    }

    public function buildWhere()
    {
        // we override this to select only parent articles
        $this->_aWhere = parent::buildWhere();

        // adding folder check
        $sFolder = Registry::getRequest()->getRequestEscapedParameter('folder');
        if ($sFolder && $sFolder != '-1') {
            $this->_aWhere[oxNew(Article::class)->getViewName() . ".oxfolder"] = $sFolder;
        }

        return $this->_aWhere;
    }
}

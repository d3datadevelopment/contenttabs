[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]
[{capture name="emptyCapture"}]
    <script type="text/javascript">
        [{capture name="d3JavaScript"}]
            function editThis( sID )
            {
                var oTransfer = top.basefrm.edit.document.getElementById( "transfer" );
                oTransfer.oxid.value = sID;
                oTransfer.cl.value = top.basefrm.list.sDefClass;

                //forcing edit frame to reload after submit
                top.forceReloadingEditFrame();

                var oSearch = top.basefrm.list.document.getElementById( "search" );
                oSearch.oxid.value = sID;
                oSearch.actedit.value = 0;
                oSearch.submit();
            }
        [{/capture}]
    </script>
[{/capture}]
[{oxscript add=$smarty.capture.d3JavaScript}]

[{if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
    [{assign var="canSaveLongtext" value=true}]
[{/if}]

<form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="oxidCopy" value="[{$oxid}]">
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="editlanguage" value="[{$editlanguage}]">
</form>

[{d3modcfgcheck modid="d3contenttabs"}][{/d3modcfgcheck}]
[{if $mod_d3contenttabs}]
    [{if $oxid == "-1"}]
        <div class="messagebox">
            [{oxmultilang ident="D3_CONTENT_TABS_FIRST_SELECT_ARTICLE"}]
        </div>
    [{else}]
        <form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post" onSubmit="copyLongDesc('[{$oView->getLongDescContentField()}]');">
            <div>
                [{$oViewConf->getHiddenSid()}]
                <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                <input type="hidden" name="fnc" value="save">
                <input type="hidden" name="oxid" value="[{$oxid}]">
                <input type="hidden" name="voxid" value="[{$oxid}]">
                <input type="hidden" name="changelang" value="[{$editlanguage}]">
                <input type="hidden" name="editval[oxarticles__oxid]" value="[{$oxid}]">
                <input type="hidden" name="editval[[{$oView->getLongDescContentField()}]]" value="">
                [{if $canSaveLongtext}]
                    <input type="hidden" name="isPermittedToSaveData" value='1'>
                [{/if}]
            </div>
            <table cellpadding="0" cellspacing="0" border="0" style="width:80%;">
                <tr>
                    <td class="edittext" style="padding: 1px 5px;">
                        <b>[{oxmultilang ident="D3_CONTENT_TABS_ARTICLE_SELECTED_ARTICLE_TO_EDIT"}]: </b>
                    </td>
                    <td>
                        [{$edit->oxarticles__oxtitle->value}]
                        [{if $parentarticle}]
                            [{$parentarticle->oxarticles__oxtitle->value}] -- [{$edit->oxarticles__oxvarselect->value}]
                        [{/if}]

                        ([{$edit->oxarticles__oxartnum->value}])
                    </td>
                    <td align="right" style="min-width:150px;">
                        [{if !$posslang}]
                            [{oxmultilang ident="D3_CONTENT_TABS_ARTICLE_GENERAL_LANGUAGE"}]
                            [{foreach from=$languages item=lang}]
                                [{if $lang->selected}][{$lang->name}][{/if}]
                            [{/foreach}]
                        [{/if}]
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><hr></td>
                </tr>
                [{if $mylist}]
                    <tr>
                        <td class="edittext" style="padding: 1px 5px;">
                            [{oxmultilang ident="D3_CONTENT_TABS_ARTICLE_VARIANTSELECT"}]
                        </td>
                        <td class="edittext" colspan="2">
                            <select id="ctabvariantselect" name="variantselect" style="width:100%;" onchange="editThis(this.value);">
                                <option value="">--</option>
                                [{if $oViewConf->isBuyableParent()}]
                                    <option value="[{$edit->oxarticles__oxid->value}]" [{if $edit->oxarticles__oxactive->value == 1}]style="background-color: #D4F554;"[{/if}]>
                                        [{$edit->oxarticles__oxtitle->value}] -- [{$edit->oxarticles__oxvarname->value}] ([{oxmultilang ident="D3_CONTENT_TABS_ARTICLE_PARENTARTICLE"}])
                                    </option>
                                [{/if}]
                                [{foreach from=$mylist item=listitem}]
                                    <option value="[{$listitem->oxarticles__oxid->value}]" [{if $listitem->oxarticles__oxactive->value == 1}]style="background-color: #D4F554;"[{/if}]>
                                        [{$listitem->oxarticles__oxartnum->value}] -- [{$listitem->oxarticles__oxvarselect->value}]
                                    </option>
                                [{/foreach}]
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><hr></td>
                    </tr>
                [{/if}]
                [{if $parentarticle}]
                    <tr>
                        <td class="edittext" style="padding: 1px 5px;"><b>[{oxmultilang ident="D3_CONTENT_TABS_ARTICLE_PARENTARTICLE"}]: </b></td>
                        <td colspan="2">
                            <a href="Javascript:editThis('[{$parentarticle->oxarticles__oxid->value}]');" class="edittext">
                                [{$parentarticle->oxarticles__oxtitle->value}]  ([{$parentarticle->oxarticles__oxartnum->value}])
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><hr></td>
                    </tr>
                [{/if}]
                <tr>
                    <td colspan="3">
                        <div style="float:left; width:20%;">
                            <input type="hidden" name="editval[[{$oView->getLongDescActiveField()}]]" value="0">
                            <input class="edittext" type="checkbox" name="editval[[{$oView->getLongDescActiveField()}]]" value='1' [{if $oView->isLongDescActive($edit, $sCurrentTabId)}]checked[{/if}] [{$readonly}] [{if !$oView->isActiveFieldSaveable()}] checked readonly disabled[{/if}]>
                            <span>[{oxmultilang ident="D3_CONTENT_TABS_ARTICLE_MAIN_ACTIVE"}]</span>
                            <span>[{oxinputhelp ident="D3_CONTENT_TABS_ARTICLE_MAIN_ACTIVE_HELP"}]</span>
                        </div>
                        <div style="float:left; width:80%;">
                            <select name="sTabId" style="width: 100%;" onChange="document.myedit.fnc.value=''; document.myedit.submit();">
                                [{foreach from=$oView->getTabIdList() item="tabId" key="sMultiLangDesc" name="ctabTabSelect"}]
                                    <option value="[{$tabId}]" [{if $sCurrentTabId == $tabId}]selected[{/if}] style="[{if $oView->tabExists($edit, $tabId)}]background-color: #D4F554;[{/if}]">
                                        [{oxmultilang ident="D3_CONTENT_TABS_FIELD"}] [{$tabId}]
                                        [{assign var="sLongDescTitle" value=$oView->getLongDescTitle($edit, $tabId)}]
                                        [{if $sLongDescTitle}]: [{$sLongDescTitle}][{/if}]
                                    </option>
                                [{/foreach}]
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><hr></td>
                </tr>
                <tr>
                    <td colspan="2">
                        [{oxmultilang ident="D3_CONTENT_TABS_TITEL"}]:
                        [{assign var='sLongDescTitleField' value=$oView->getLongDescTitleField()}]
                        <input type="text" name="editval[[{$sLongDescTitleField}]]"
                               value="[{$oView->getLongDescTitle($edit, $sCurrentTabId)}]" size="30"  [{$readonly}]>
                        [{if !$oView->isActiveFieldSaveable()}]
                            [{oxmultilang ident="D3_CONTENT_TABS_TITEL_DEFAULT"}]
                        [{/if}]
                    </td>
                    <td align="right">
                        <div class="d3modcfg_btn icon d3color-red" style="float: right; margin-left: 10px">
                            <button type="submit" name="ok" [{$readonly}] [{if !$oView->isActiveFieldSaveable() || !$oView->tabExists($edit, $sCurrentTabId)}] readonly disabled[{/if}]  onClick="document.myedit.fnc.value='delete'">
                                <i class="fa fa-times-circle fa-inverse"></i>[{oxmultilang ident="D3_CONTENT_TABS_GENERAL_DELETE"}]
                            </button>
                        </div>
                        <div class="d3modcfg_btn icon d3color-green" style="float: right;">
                            <button type="submit" name="ok" [{$readonly}]>
                                <i class="fa fa-check-circle fa-inverse"></i>[{oxmultilang ident="D3_CFG_MOD_GENERAL_SAVE"}]
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <br>
                        [{block name="admin_article_tabs_editor"}]
                            [{$editor}]
                        [{/block}]
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <br>
                        <div class="messagebox">
                            [{oxmultilang ident="D3_CONTENT_TABS_ARTICLE_EDITOR_PLAINTEXT_HINT"}]
                        </div>
                    </td>
                </tr>
            </table>
        </form>

    [{/if}]
[{else}]
    <div class="messagebox">
        [{oxmultilang ident="D3_CFG_MOD_NOTACTIVE"}]
    </div>
[{/if}]

[{include file="d3_cfg_mod_inc.tpl"}]

[{include file="bottomnaviitem.tpl" sHelpURL = ''}]

[{include file="bottomitem.tpl"}]
[{d3modcfgcheck modid="d3contenttabs"}][{/d3modcfgcheck}]
[{if $mod_d3contenttabs}]
    [{assign var='d3Tabs' value=$oView->d3GetTabs()}]
    [{assign var="oContentTabs" value=$oDetailsProduct->d3GetContentTabs()}]
    [{assign var='blFirstTab' value=true}]

    [{if $d3Tabs}]
        [{assign var=iMaxTabIndex value=$oContentTabs->getTabCount()+1}]

        [{if $oModCfg_d3contenttabs->isThemeIdMappedTo('flow')}]
            [{* FLOW *}]
            [{section name=tab start=1 loop=$iMaxTabIndex}]
                [{assign var="tabId" value=$smarty.section.tab.index}]
                [{if $oContentTabs->canGetLongDescription($tabId)}]
                    [{capture append="tabs"}]
                        <a href="#tab_[{$tabId}]" data-toggle="tab">
                            [{$oDetailsProduct->d3GetLongDescriptionTitle($tabId)}]
                        </a>
                    [{/capture}]
                    [{capture append="tabsContent"}]
                        <div id="tab_[{$tabId}]" class="tab-pane[{if $blFirstTab}] active[{/if}]" itemprop="description">
                            [{if '1' == $tabId}]
                                [{include file='@d3contenttabs/d3contenttabs_tab1.tpl'}]
                            [{else}]
                                [{assign var="tabContent" value=$oDetailsProduct->d3GetLongDescription($tabId)}]
                                [{oxeval var=$tabContent}]
                            [{/if}]
                        </div>
                    [{/capture}]
                    [{assign var='blFirstTab' value=false}]
                [{/if}]
            [{/section}]
        [{elseif $oModCfg_d3contenttabs->isThemeIdMappedTo('wave')}]    
            [{* WAVE *}]
            [{section name=tab start=1 loop=$iMaxTabIndex}]
                [{assign var="tabId" value=$smarty.section.tab.index}]
                [{if $oContentTabs->canGetLongDescription($tabId)}]
                    [{capture append="tabs"}]
                        <a class="nav-link[{if $blFirstTab}] active[{/if}]" href="#tab_[{$tabId}]" data-toggle="tab">
                            [{$oDetailsProduct->d3GetLongDescriptionTitle($tabId)}]
                        </a>
                    [{/capture}]
                    [{capture append="tabsContent"}]
                        <div id="tab_[{$tabId}]" class="tab-pane[{if $blFirstTab}] active[{/if}]" itemprop="description">
                            [{if '1' == $tabId}]
                                [{include file='@d3contenttabs/d3contenttabs_tab1.tpl'}]
                            [{else}]
                                [{assign var="tabContent" value=$oDetailsProduct->d3GetLongDescription($tabId)}]
                                [{oxeval var=$tabContent}]
                            [{/if}]
                        </div>
                    [{/capture}]
                    [{assign var='blFirstTab' value=false}]
                [{/if}]
            [{/section}]
        [{else}]
            [{* AZURE *}]
            [{section name=tab start=1 loop=$iMaxTabIndex}]
                [{assign var="tabId" value=$smarty.section.tab.index}]
                [{if $oContentTabs->canGetLongDescription($tabId)}]
                    [{capture append="tabs"}]
                        <a href="#tab_[{$tabId}]">
                            [{$oDetailsProduct->d3GetLongDescriptionTitle($tabId)}]
                        </a>
                    [{/capture}]
                    [{capture append="tabsContent"}]
                        <div id="tab_[{$tabId}]" class="cmsContent">
                            [{if '1' == $tabId}]
                                [{include file='@d3contenttabs/d3contenttabs_tab1.tpl'}]
                            [{else}]
                                [{assign var="tabContent" value=$oDetailsProduct->d3GetLongDescription($tabId)}]
                                [{oxeval var=$tabContent}]
                            [{/if}]
                        </div>
                    [{/capture}]
                    [{assign var='blFirstTab' value=false}]
                [{/if}]
            [{/section}]
        [{/if}]
    [{else}]
        [{$smarty.block.parent}]
    [{/if}]
[{else}]
    [{$smarty.block.parent}]
[{/if}]
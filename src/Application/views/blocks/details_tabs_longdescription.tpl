[{d3modcfgcheck modid="d3contenttabs"}][{/d3modcfgcheck}]
[{if $mod_d3contenttabs}]
    [{assign var='d3Tabs' value=$oView->d3GetTabs()}]

    [{if $d3Tabs}]
        [{if $oModCfg_d3contenttabs->isThemeIdMappedTo('flow')}]
            [{* FLOW *}]
            [{foreach from=$d3Tabs item='tabData' name="tabs" key='current'}]
                [{if 'inactive' == $tabData.TAB}]
                    <!-- inactive first tab -->
                [{elseif $tabData.TAB != false}]
                    [{capture append="tabs"}]
                        <a href="#tab_[{$current}]" data-toggle="tab">
                            [{$tabData.TITLE}]
                        </a>
                    [{/capture}]
                    [{capture append="tabsContent"}]
                        <div id="tab_[{$current}]" class="tab-pane[{if $blFirstTab}] active[{/if}]" itemprop="description">
                            [{if '1' == $tabData.TAB}]
                                [{include file='d3contenttabs_tab'|cat:$current|cat:'.tpl'}]
                            [{else}]
                                [{oxeval var=$tabData.CONTENT}]
                            [{/if}]
                        </div>
                    [{/capture}]
                    [{assign var='blFirstTab' value=false}]
                [{else}]
                    <!-- standard -->
                    [{$smarty.block.parent}]
                [{/if}]
            [{/foreach}]
        [{else}]
            [{* AZURE *}]
            [{foreach from=$d3Tabs item='tabData' name="tabs" key='current'}]
                [{if 'inactive' == $tabData.TAB}]
                    <!-- inactive first tab -->
                [{elseif $tabData.TAB != false}]
                    [{capture append="tabs"}]
                        <a href="#tab_[{$current}]">
                            [{$tabData.TITLE}]
                        </a>
                    [{/capture}]
                    [{capture append="tabsContent"}]
                        <div id="tab_[{$current}]" class="cmsContent">
                            [{if '1' == $tabData.TAB}]
                                [{include file='d3contenttabs_tab'|cat:$current|cat:'.tpl'}]
                            [{else}]
                                [{oxeval var=$tabData.CONTENT}]
                            [{/if}]
                        </div>
                    [{/capture}]
                [{else}]
                    <!-- standard -->
                    [{$smarty.block.parent}]
                [{/if}]
            [{/foreach}]
        [{/if}]
    [{else}]
        [{$smarty.block.parent}]
    [{/if}]
[{else}]
    [{$smarty.block.parent}]
[{/if}]

[{if $tabs}]
    <div class="tabbedWidgetBox clear">
        <ul id="itemTabs" class="nav nav-tabs">
            [{foreach from=$tabs item="tab" name="tabs"}]
                <li[{if $smarty.foreach.tabs.first}] class="active rounded"[{else}] class="rounded" [{/if}]>[{$tab}]</li>
            [{/foreach}]
            [{block name="details_tabs_social_navigation"}][{/block}]
        </ul>
        <div class="tab-content">
            [{foreach from=$tabsContent item="tabContent" name="tabsContent"}]
            [{$tabContent}]
            [{/foreach}]
            [{block name="details_tabs_social_content"}][{/block}]
        </div>
    </div>
[{/if}]

[{oxstyle include=$oViewConf->getModuleUrl("d3contenttabs", "out/src/css/d3contenttabs.css")}]
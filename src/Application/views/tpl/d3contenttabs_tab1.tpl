[{block name="d3_details_contenttabs_longdesc1"}]
    [{oxeval var=$oDetailsProduct->getLongDescription()}]
    [{if $oDetailsProduct->oxarticles__oxexturl->value}]
        <a id="productExturl" class="external" href="[{$oDetailsProduct->oxarticles__oxexturl->value}]">
            [{if $oDetailsProduct->oxarticles__oxurldesc->value}]
                [{$oDetailsProduct->oxarticles__oxurldesc->value}]
            [{else}]
                [{$oDetailsProduct->oxarticles__oxexturl->value}]
            [{/if}]
        </a>
    [{/if}]
[{/block}]

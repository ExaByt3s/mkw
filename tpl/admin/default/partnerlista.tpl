{extends "../base.tpl"}

{block "inhead"}
<script type="text/javascript" src="/js/admin/default/jquery.form.js"></script>
<script type="text/javascript" src="/js/admin/default/jquery.mattkarb.js"></script>
<script type="text/javascript" src="/js/admin/default/jquery.mattable.js"></script>
<script type="text/javascript" src="/js/admin/default/jquery.mattaccord.js"></script>
<script type="text/javascript" src="/js/admin/default/partner.js"></script>
{/block}

{block "kozep"}
<form id="exportform" method="POST">
    <input type="hidden" name="ids">
    <input type="hidden" name="country">
</form>
<div id="mattable-select" data-theme="{$theme}">
<div id="mattable-header" data-title="{at('Frissítés')}" data-caption="{at('Partnerek')}"></div>
<div id="mattable-filterwrapper">
	<div class="matt-hseparator"></div>
	<div>
        <label for="nevfilter">{at('Név')}:</label>
        <input id="nevfilter" name="nevfilter" type="text" maxlength="255">
        <label for="emailfilter">{at('Email')}:</label>
        <input id="emailfilter" name="emailfilter" type="text" maxlength="255">
	</div>
	<div class="matt-hseparator"></div>
    <div>
        <label for="szallitasiirszamfilter">{at('Szállítási cím')}:</label>
        <input id="szallitasiirszamfilter" name="szallitasiirszamfilter" type="text" size="8">
        <input id="szallitasivarosfilter" name="szallitasivarosfilter" type="text">
        <input id="szallitasiutcafilter" name="szallitasiutcafilter" type="text">
    </div>
	<div class="matt-hseparator"></div>
    <div>
        <label for="szamlazasiirszamfilter">{at('Számlázási cím')}:</label>
        <input id="szamlazasiirszamfilter" name="szamlazasiirszamfilter" type="text" size="8">
        <input id="szamlazasivarosfilter" name="szamlazasivarosfilter" type="text">
        <input id="szamlazasiutcafilter" name="szamlazasiutcafilter" type="text">
    </div>
	<div class="matt-hseparator"></div>
    <div>
        <label for="beszallitofilter">{at('Beszállító')}:</label>
        <select id="beszallitofilter" name="beszallitofilter">
            <option value="9">{at('Mindegy')}</option>
            <option value="0">{at('Nem')}</option>
            <option value="1">{at('Igen')}</option>
        </select>
        <label for="partnertipusfilter">{at('Partner típus')}: </label>
        <select id="partnertipusfilter" name="partnertipusfilter">
            <option value="">{at('válasszon')}</option>
            {foreach $partnertipuslist as $_gyarto}
                <option
                    value="{$_gyarto.id}"{if ($_gyarto.selected)} selected="selected"{/if}>{$_gyarto.caption}</option>
            {/foreach}
        </select>
        <label for="orszagfilter">{at('Ország')}: </label>
        <select id="orszagfilter" name="orszagfilter">
            <option value="">{at('válasszon')}</option>
            {foreach $orszaglist as $_gyarto}
                <option
                    value="{$_gyarto.id}"{if ($_gyarto.selected)} selected="selected"{/if}>{$_gyarto.caption}</option>
            {/foreach}
        </select>
    </div>
	<div class="matt-hseparator"></div>
	<div id="cimkefiltercontainer">
	{foreach $cimkekat as $_cimkekat}
	<div class="mattedit-titlebar ui-widget-header ui-helper-clearfix cimkefiltercloseupbutton" data-refcontrol="#{$_cimkekat.sanitizedcaption}">
		<a href="#" class="mattedit-titlebar-close">
			<span class="ui-icon ui-icon-circle-triangle-n"></span>
		</a>
		<span>{$_cimkekat.caption}</span>
	</div>
	<div id="{$_cimkekat.sanitizedcaption}" class="accordpage cimkelista" data-visible="visible">
		{foreach $_cimkekat.cimkek as $_cimke}
		<a class="js-cimkefilter" href="#" data-id="{$_cimke.id}">{$_cimke.caption}</a>&nbsp;&nbsp;
		{/foreach}
	</div>
	{/foreach}
	</div>
</div>
<div class="mattable-pagerwrapper">
	<div class="mattable-order">
	<label for="tos1">{at('Rendezés')}</label>
	<select id="tos1" class="mattable-orderselect">
		{foreach $orderselect as $_os}
		<option value="{$_os.id}"{if ($_os.selected)} selected="selected"{/if}>{$_os.caption}</option>
		{/foreach}
	</select>
	</div>
</div>
<div class="mattable-batch">
	{at('Csoportos művelet')} <select class="mattable-batchselect">
	<option value="">{at('válasszon')}</option>
	{foreach $batchesselect as $_batch}
	<option value="{$_batch.id}">{$_batch.caption}</option>
	{/foreach}
	</select>
    <a href="#" class="mattable-batchbtn">{at('Futtat')}</a>
</div>
<table id="mattable-table">
<thead>
	<tr>
        <th><input class="js-maincheckbox" type="checkbox"></th>
        <th>{at('Név')}</th>
        <th>{at('Cím')}</th>
        <th>{at('Elérhetőségek')}</th>
        <th>{at('Megjegyzés')}</th>
    	<th>{at('Címkék')}</th>
	</tr>
</thead>
<tbody id="mattable-body"></tbody>
</table>
<div class="mattable-pagerwrapper ui-corner-bottom">
	<div class="mattable-order">
	<label for="tos2">{at('Rendezés')}</label>
	<select id="tos2" class="mattable-orderselect">
		{foreach $orderselect as $_os}
		<option value="{$_os.id}"{if ($_os.selected)} selected="selected"{/if}>{$_os.caption}</option>
		{/foreach}
	</select>
	</div>
</div>
</div>
<div id="mattkarb">
</div>
{/block}
<div id="mattkarb-header">
	<h3>{at('Kupon')}</h3>
</div>
<form id="mattkarb-form" method="post" action="/admin/kupon/save">
	<div id="mattkarb-tabs">
		<ul>
			<li><a href="#AltalanosTab">{at('Általános adatok')}</a></li>
		</ul>
		<div id="AltalanosTab" class="mattkarb-page" data-visible="visible">
			<table><tbody>
			<tr>
				<td><span>{at('Id')}:</span></td>
				<td><span>{$egyed.id}</span></td>
			</tr>
            <tr>
                <td><label for="TipusEdit">{at('Típus')}:</label></td>
                <td><select id="TipusEdit" name="tipus">
                        <option value="">{at('válasszon')}</option>
                        {foreach $tipuslist as $_tcs}
                            <option value="{$_tcs.id}"{if ($_tcs.selected)} selected="selected"{/if}>{$_tcs.caption}</option>
                        {/foreach}
                    </select></td>
            </tr>
            <tr>
                <td><label for="LejaratEdit">{at('Állapot')}:</label></td>
                <td><select id="LejaratEdit" name="lejart">
                        <option value="">{at('válasszon')}</option>
                        {foreach $lejaratlist as $_tcs}
                            <option value="{$_tcs.id}"{if ($_tcs.selected)} selected="selected"{/if}>{$_tcs.caption}</option>
                        {/foreach}
                    </select></td>
            </tr>
            <tr>
                <td><label for="">{at('Összeg')}:</label></td>
                <td><input type="text" name="osszeg" value="{$egyed.osszeg}"></td>
            </tr>
			</tbody></table>
		</div>
	</div>
	<input name="oper" type="hidden" value="{$oper}">
	<input name="id" type="hidden" value="{$egyed.id}">
	<div class="mattkarb-footer">
		<input id="mattkarb-okbutton" type="submit" value="{at('OK')}">
		<a id="mattkarb-cancelbutton" href="#">{at('Mégsem')}</a>
	</div>
</form>
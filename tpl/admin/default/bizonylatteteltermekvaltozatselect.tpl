<select id="ValtozatSelect{$tetel.id}" name="tetelvaltozat_{$tetel.id}" class="js-tetelvaltozat">
	<option>{t('Válasszon')}</option>
	{foreach $tetel.valtozatlist as $_v}
	<option value="{$_v.id}"{if ($_v.selected)} selected{/if}>{$_v.caption}</option>
	{/foreach}
</select>
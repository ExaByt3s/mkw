<table id="recepttable_{$recept.id}" class="ui-widget ui-widget-content ui-corner-all mattable-repeatable">
    <tbody>
        <input name="receptid[]" type="hidden" value="{$recept.id}">
        <input name="receptoper_{$recept.id}" type="hidden" value="{$recept.oper}">
        <tr>
            <td><label for="TipusEdit{$recept.id}">{at('Típus')}:</label></td>
            <td><select id="TipusEdit{$recept.id}" name="recepttipus_{$recept.id}" required="required">
                    <option value="">{at('válasszon')}</option>
                    {foreach $recept.tipuslist as $_tipus}
                        <option value="{$_tipus.id}"{if ($_tipus.selected)} selected="selected"{/if}>{$_tipus.caption}</option>
                    {/foreach}
                </select>
            </td>
            <td><label for="AltermekEdit{$recept.id}">{at('Termék/művelet')}:</label></td>
            <td><select id="AltermekEdit{$recept.id}" name="receptaltermek_{$recept.id}" required="required">
                    <option value="">{at('válasszon')}</option>
                    {foreach $recept.termeklist as $_altermek}
                        <option value="{$_altermek.id}"{if ($_altermek.selected)} selected="selected"{/if}>{$_altermek.caption}</option>
                    {/foreach}
                </select>
            </td>
            <td><label for="MennyisegEdit{$recept.id}">{at('Mennyiség')}:</label></td>
            <td><input id="MennyisegEdit{$recept.id}" class="mennyiseginput" name="receptmennyiseg_{$recept.id}" type="number" step="any" value="{$recept.mennyiseg}" maxlength="20" size="10" required="required"></td>
            <td><label for="KotelezoEdit{$recept.id}">{at('Kötelező')}:</label></td>
            <td><input id="KotelezoEdit{$recept.id}" class="kotelezoinput" name="receptkotelezo_{$recept.id}" type="checkbox"{if ($recept.kotelezo)} checked="checked"{/if}></td>
            <td>
                <a class="js-receptdelbutton" href="#" data-id="{$recept.id}"{if ($recept.oper=='add')} data-source="client"{/if} title="{at('Töröl')}"><span class="ui-icon ui-icon-circle-minus"></span></a>
            </td>
        </tr>
    </tbody>
</table>
{if ($recept.oper=='add')}
<a class="js-receptnewbutton" href="#" title="{at('Új')}"><span class="ui-icon ui-icon-circle-plus"></span></a>
{/if}
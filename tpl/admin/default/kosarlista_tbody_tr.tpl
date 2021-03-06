<tr id="mattable-row_{$_egyed.id}" data-egyedid="{$_egyed.id}">
    <td class="cell"><input class="js-maincheckbox" type="checkbox"></td>
    <td class="cell">{$_egyed.createdstr}</td>
    <td class="cell">{$_egyed.session}
        <span class="jobbra"><a class="mattable-dellink" href="#" data-egyedid="{$_egyed.id}" data-oper="del" title="{at('Töröl')}"><span class="ui-icon ui-icon-circle-minus"></span></a></span>
    </td>
    <td class="cell">
        {if ($_egyed.partner)}
            <table>
                <tbody>
                    <tr><td>{$_egyed.partnernev}</td></tr>
                    <tr><td><a href="/admin/partner/viewkarb?id={$_egyed.partner}&oper=edit" title="{at('Szerkeszt')}">{at('Szerkeszt')}</a></td></tr>
                </tbody>
            </table>
            {/if}
    </td>
    <td class="cell">
        <table>
            <tbody>
                <tr><td colspan="2">{$_egyed.termeknev}</td></tr>
                {foreach $_egyed.valtozat as $valtozat}
                    {if ($valtozat.nev!=''&&$valtozat.ertek!='')}
                    <tr><td>{$valtozat.nev}:</td><td>{$valtozat.ertek}</td></tr>
                    {/if}
                {/foreach}
                <tr><td colspan="2"><a href="/admin/termek/viewkarb?id={$_egyed.termek}&oper=edit" title="{at('Szerkeszt')}">{at('Szerkeszt')}</a></td></tr>
                <tr><td colspan="2"><a href="/termek/{$_egyed.termekurl}" title="Megtekint">{at('Webáruház')}</a></td></tr>
            </tbody>
        </table>
    </td>
    <td class="cell">{$_egyed.mennyiseg}</td>
</tr>
<tr id="mattable-row_{$_egyed.id}" data-egyedid="{$_egyed.id}">
    <td class="cell"><input class="js-egyedcheckbox" type="checkbox"></td>
    <td class="cell">
        <a class="mattable-editlink" href="#" data-egyedid="{$_egyed.id}" data-oper="edit" title="{at('Szerkeszt')}">{$_egyed.nev}</a>
        <span class="jobbra"><a class="mattable-dellink" href="#" data-egyedid="{$_egyed.id}" data-oper="del" title="{at('Töröl')}"><span class="ui-icon ui-icon-circle-minus"></span></a></span>
        <table>
            <tbody>
                <tr><td>{$_egyed.kezdodatum}</td></tr>
                <tr><td>{$_egyed.termeknev}</td></tr>
            </tbody>
        </table>
    </td>
    <td class="cell">
        {$_egyed.tanarnev}
    </td>
</tr>
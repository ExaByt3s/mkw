<tr id="mattable-row_{$_orarend.id}" data-egyedid="{$_orarend.id}">
    <td class="cell"><input class="js-egyedcheckbox" type="checkbox"></td>
    <td class="cell">
        <table>
            <tbody>
                <tr>
                    <td>
                        <a class="mattable-editlink" href="#" data-orarendid="{$_orarend.id}" data-oper="edit" title="{at('Szerkeszt')}">{$_orarend.nev}</a>
                        <a class="mattable-dellink" href="#" data-orarendid="{$_orarend.id}" data-oper="del" title="{at('Töröl')}"><span class="ui-icon ui-icon-circle-minus"></span></a>
                        <table>
                            <tbody>
                                <tr>
                                    <td>{$_orarend.napnev}</td>
                                </tr>
                                <tr>
                                    <td>{$_orarend.dolgozonev}{if ($_orarend.helyettesitonev)} (helyettesit: {$_orarend.helyettesitonev}){/if}</td>
                                </tr>
                                <tr>
                                    <td>{$_orarend.jogateremnev}</td>
                                </tr>
                                <tr>
                                    <td>{$_orarend.kezdet} - {$_orarend.veg}</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
    <td class="cell">
        <table>
            <tbody>
                <tr><td><a href="#" data-id="{$_orarend.id}" data-flag="inaktiv" class="js-flagcheckbox{if ($_orarend.inaktiv)} ui-state-hover{/if}">{at('Inaktív')}</a></td></tr>
                <tr><td><a href="#" data-id="{$_orarend.id}" data-flag="alkalmi" class="js-flagcheckbox{if ($_orarend.alkalmi)} ui-state-hover{/if}">{at('Alkalmi')}</a></td></tr>
                <tr><td><a href="#" data-id="{$_orarend.id}" data-flag="elmarad" class="js-flagcheckbox{if ($_orarend.elmarad)} ui-state-hover{/if}">{at('Elmarad')}</a></td></tr>
            </tbody>
        </table>
    </td>
</tr>
{extends "../rep_base.tpl"}

{block "body"}
    <h4 xmlns="http://www.w3.org/1999/html">Tartozás</h4>
    <h5>{$datumnev} {$tolstr} - {$igstr}</h5>
    <h5>Kifizetések {$befdatumstr}-ig</h5>
    <h5>{$partnernev}</h5>
    <h5>{$cimkenevek}</h5>
    <h5>{$dolgozonev}</h5>
    <h5>{$uknev}</h5>
    <table>
        <thead>
        <tr>
            <th>Bizonylatszám</th>
            <th>Ki költött</th>
            <th>Fizetési mód</th>
            <th>Kelt</th>
            <th>Teljesítés</th>
            <th>Esedékesség</th>
            <th>Lejárat</th>
            <th class="textalignright">Fizetendő</th>
            <th class="textalignright">Tartozás</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        {$bsum = array()}
        {$nemlejartsum = array()}
        {$lejartsum = array()}
        {$cnt = count($lista)}
        {$cikl = 0}
        {while ($cikl < $cnt)}
            {$partner = $lista[$cikl]}
            {$partnerid = $partner.partner_id}
            {$pbsum = array()}
            {$plejartsum = array()}
            {$pnemlejartsum = array()}
            <tr class="italic">
                <td colspan="10" class="cell">
                    {$partner.nev} {$partner.irszam} {$partner.varos} {$partner.utca}
                </td>
            </tr>
            {while (($cikl < $cnt) && ($partnerid == $lista[$cikl].partner_id))}
                {$elem = $lista[$cikl]}
                <tr>
                    <td class="cell{if ($elem.lejart)} lejart{/if}">{$elem.bizonylatfej_id}</td>
                    <td class="cell{if ($elem.lejart)} lejart{/if}">{$elem.felhasznalonev}</td>
                    <td class="cell{if ($elem.lejart)} lejart{/if}">{$elem.fizmodnev}</td>
                    <td class="cell nowrap{if ($elem.lejart)} lejart{/if}">{$elem.kelt}</td>
                    <td class="cell nowrap{if ($elem.lejart)} lejart{/if}">{$elem.teljesites}</td>
                    <td class="cell{if ($elem.lejart)} lejart{/if}">{$elem.hivatkozottdatum}</td>
                    <td class="cell{if ($elem.lejart)} lejart{/if}">{$elem.lejartnap} nap</td>
                    <td class="cell textalignright nowrap{if ($elem.lejart)} lejart{/if}">{bizformat($elem.brutto * -1)}</td>
                    <td class="cell textalignright nowrap{if ($elem.lejart)} lejart{/if}">{bizformat($elem.tartozas * -1)}</td>
                    <td class="cell{if ($elem.lejart)} lejart{/if}">{$elem.valutanemnev}</td>
                </tr>
                {$bsum[$elem.valutanemnev]['brutto'] = $bsum[$elem.valutanemnev]['brutto'] + $elem.brutto}
                {$bsum[$elem.valutanemnev]['tartozas'] = $bsum[$elem.valutanemnev]['tartozas'] + $elem.tartozas}
                {$pbsum[$elem.valutanemnev]['brutto'] = $pbsum[$elem.valutanemnev]['brutto'] + $elem.brutto}
                {$pbsum[$elem.valutanemnev]['tartozas'] = $pbsum[$elem.valutanemnev]['tartozas'] + $elem.tartozas}
                {if ($elem.lejart)}
                    {$plejartsum[$elem.valutanemnev] = $plejartsum[$elem.valutanemnev] + $elem.tartozas}
                    {$lejartsum[$elem.valutanemnev] = $lejartsum[$elem.valutanemnev] + $elem.tartozas}
                {else}
                    {$pnemlejartsum[$elem.valutanemnev] = $pnemlejartsum[$elem.valutanemnev] + $elem.tartozas}
                    {$nemlejartsum[$elem.valutanemnev] = $nemlejartsum[$elem.valutanemnev] + $elem.tartozas}
                {/if}
                {$cikl = $cikl + 1}
            {/while}
            {if ($reszletessum)}
                {foreach $pnemlejartsum as $k=>$pn}
                    <tr class="italic bold">
                        <td colspan="8" class="cell">{$partner.nev} összesen nem lejárt</td>
                        <td class="cell nowrap textalignright">{bizformat($pn * -1)}</td>
                        <td class="cell">{$k}</td>
                    </tr>
                {/foreach}
                {foreach $plejartsum as $k=>$pn}
                    <tr class="italic bold">
                        <td colspan="8" class="cell">{$partner.nev} összesen lejárt</td>
                        <td class="cell nowrap textalignright">{bizformat($pn * -1)}</td>
                        <td class="cell">{$k}</td>
                    </tr>
                {/foreach}
            {/if}
            {foreach $pbsum as $k=>$bs}
                <tr class="italic bold">
                    <td colspan="7" class="cell">{$partner.nev} összesen</td>
                    <td class="nowrap textalignright">{bizformat($bs['brutto'] * -1)}</td>
                    <td class="nowrap textalignright">{bizformat($bs['tartozas'] * -1)}</td>
                    <td>{$k}</td>
                </tr>
            {/foreach}
        {/while}
        </tbody>
        <tfoot>
        {if ($reszletessum)}
            {foreach $nemlejartsum as $k=>$pn}
                <tr>
                    <td colspan="8">Összesen nem lejárt:</td>
                    <td class="nowrap textalignright">{bizformat($pn) * -1}</td>
                    <td>{$k}</td>
                </tr>
            {/foreach}
            {foreach $lejartsum as $k=>$pn}
                <tr>
                    <td colspan="8">Összesen lejárt:</td>
                    <td class="nowrap textalignright">{bizformat($pn) * -1}</td>
                    <td>{$k}</td>
                </tr>
            {/foreach}
        {/if}
        {foreach $bsum as $k=>$bs}
        <tr>
            <td colspan="7">{$k} összesen:</td>
            <td class="nowrap textalignright">{bizformat($bs['brutto'] * -1)}</td>
            <td class="nowrap textalignright">{bizformat($bs['tartozas'] * -1)}</td>
            <td>{$k}</td>
        </tr>
        {/foreach}
        </tfoot>
    </table>
{/block}
{extends "base.tpl"}

{block "inhead"}
{include 'ckeditor.tpl'}
<script type="text/javascript" src="/js/admin/default/jquery.form.js"></script>
<script type="text/javascript" src="/js/admin/default/jquery.jstree.js"></script>
<script type="text/javascript" src="/js/admin/default/jquery.mattkarb.js"></script>
<script type="text/javascript" src="/js/admin/default/jquery.mattaccord.js"></script>
<script type="text/javascript" src="/js/admin/default/setupform.js"></script>
{/block}

{block "kozep"}
<div id="mattkarb">
<div id="mattkarb-header">
	<h3>{t('Beállítások')}</h3>
</div>
<form id="mattkarb-form" action="/admin/setup/save" method="post">
	<div{if ($setup.editstyle=='tab')} id="mattkarb-tabs"{/if}>
		{if ($setup.editstyle=='tab')}
		<ul>
			<li><a href="#DefaTab">{t('Alapértelmezések')}</a></li>
			<li><a href="#TulajTab">{t('Tulajdonos adatai')}</a></li>
			<li><a href="#WebTab">{t('Web beállítások')}</a></li>
			<li><a href="#SzallitasiKtgTab">{t('Szállítási költség')}</a></li>
			<li><a href="#IdTab">{t('Azonosítók, kódok')}</a></li>
			<li><a href="#EmailTab">{t('Email')}</a></li>
			<li><a href="#FeedTab">{t('Feed beállítások')}</a></li>
			<li><a href="#SitemapTab">{t('Sitemap beállítások')}</a></li>
		</ul>
		{/if}
		{if ($setup.editstyle=='dropdown')}
		<div class="mattkarb-titlebar" data-caption="{t('Alapértelmezések')}" data-refcontrol="#DefaTab"></div>
		{/if}
		<div id="DefaTab" class="mattkarb-page" data-visible="visible">
		<table><tbody>
			<tr>
				<td><label for="FizmodEdit">{t('Fizetési mód')}:</label></td>
				<td><select id="FizmodEdit" name="fizmod">
					<option value="">{t('válasszon')}</option>
					{foreach $fizmodlist as $_fizmod}
					<option value="{$_fizmod.id}"{if ($_fizmod.selected)} selected="selected"{/if}>{$_fizmod.caption}</option>
					{/foreach}
				</select></td>
			</tr>
			<tr>
				<td><label for="RaktarEdit">{t('Raktár')}:</label></td>
				<td><select id="RaktarEdit" name="raktar">
					<option value="">{t('válasszon')}</option>
					{foreach $raktarlist as $_raktar}
					<option value="{$_raktar.id}"{if ($_raktar.selected)} selected="selected"{/if}>{$_raktar.caption}</option>
					{/foreach}
				</select></td>
			</tr>
			<tr>
				<td><label for="ValutanemEdit">{t('Valutanem')}:</label></td>
				<td><select id="ValutanemEdit" name="valutanem">
					<option value="">{t('válasszon')}</option>
					{foreach $valutanemlist as $_valutanem}
					<option value="{$_valutanem.id}"{if ($_valutanem.selected)} selected="selected"{/if}>{$_valutanem.caption}</option>
					{/foreach}
				</select></td>
			</tr>
			<tr>
				<td><label for="MarkaCsEdit">{t('Márka csoport')}:</label></td>
				<td><select id="MarkaCsEdit" name="markacs">
					<option value="">{t('válasszon')}</option>
					{foreach $markacslist as $_markacs}
					<option value="{$_markacs.id}"{if ($_markacs.selected)} selected="selected"{/if}>{$_markacs.caption}</option>
					{/foreach}
				</select></td>
			</tr>
			<tr>
				<td><label for="AdminroleEdit">{t('Admin szerepkör')}:</label></td>
				<td><select id="AdminroleEdit" name="adminrole">
					<option value="">{t('válasszon')}</option>
					{foreach $adminrolelist as $_role}
					<option value="{$_role.id}"{if ($_role.selected)} selected="selected"{/if}>{$_role.caption}</option>
					{/foreach}
				</select></td>
			</tr>
			<tr>
				<td><label for="TermekfeltoltoroleEdit">{t('Termékfeltöltő szerepkör')}:</label></td>
				<td><select id="TermekfeltoltoroleEdit" name="termekfeltoltorole">
					<option value="">{t('válasszon')}</option>
					{foreach $termekfeltoltorolelist as $_role}
					<option value="{$_role.id}"{if ($_role.selected)} selected="selected"{/if}>{$_role.caption}</option>
					{/foreach}
				</select></td>
			</tr>
			<tr>
				<td><label for="EsedAlapEdit">{t('Esedékesség alapja')}:</label></td>
				<td><select id="EsedAlapEdit" name="esedekessegalap">
					<option value="1"{if ($esedekessegalap=='1')} selected="selected"{/if}>{t('kelt')}</option>
					<option value="2"{if ($esedekessegalap=='2')} selected="selected"{/if}>{t('teljesítés')}</option>
				</select></td>
			</tr>
        </tbody></table>
        <table><tbody>
            <tr>
                <td><label>{t('Az importerek ebbe a kategóriába tegyék az új termékeket')}:</label></td>
                <td>
                    <span class="js-importnewkatid">{$importnewkat.caption|default:'nincs megadva'}</span>
                    <input name="importnewkatid" type="hidden" value="{$importnewkat.id}">
                </td>
            </tr>
		</tbody></table>
		</div>
		{if ($setup.editstyle=='dropdown')}
		<div class="mattkarb-titlebar" data-caption="{t('Tulajdonos adatai')}" data-refcontrol="#TulajTab"></div>
		{/if}
		<div id="TulajTab" class="mattkarb-page" data-visible="visible">
		<table><tbody>
		<tr>
			<td><label for="TulajnevEdit">{t('Név')}:</label></td>
			<td colspan="3"><input id="TulajnevEdit" name="tulajnev" type="text" size="75" maxlength="255" value="{$tulajnev}"></td>
		</tr>
		<tr>
			<td><label for="TulajirszamEdit">{t('Cím')}:</label></td>
			<td colspan="3"><input id="TulajirszamEdit" name="tulajirszam" type="text" size="6" maxlength="10" value="{$tulajirszam}" placeholder="{t('ir.szám')}">
				<input name="tulajvaros" type="text" size="20" maxlength="40" value="{$tulajvaros}" placeholder="{t('város')}">
				<input name="tulajutca" type="text" size="40" maxlength="60" value="{$tulajutca}" placeholder="{t('utca, házszám')}">
			</td>
		</tr>
		<tr><td><label for="TulajadoszamEdit">{t('Adószám')}:</label></td>
			<td><input id="TulajadoszamEdit" name="tulajadoszam" type="text" value="{$tulajadoszam}"></td>
			<td><label for="TulajeuadoszamEdit">{t('Közösségi adószám')}:</label></td>
			<td><input id="TulajeuadoszamEdit" name="tulajeuadoszam" type="text" value="{$tulajeuadoszam}"></td>
		</tr>
		</tbody></table>
		</div>
		{if ($setup.editstyle=='dropdown')}
		<div class="mattkarb-titlebar" data-caption="{t('Web beállítások')}" data-refcontrol="#WebTab"></div>
		{/if}
		<div id="WebTab" class="mattkarb-page" data-visible="visible">
        <table class="ui-widget ui-widget-content ui-corner-all mattable-repeatable"><tbody>
            <tr>
                <td><label>{t('Logo')}:</label></td>
                <td><input name="logo" type="text" value="{$logo}"></td>
        		<td><a class="js-kepbrowsebutton" data-name="logo" href="#" title="{t('Browse')}">{t('...')}</a></td>
            </tr>
            <tr>
                <td><label>{t('Új termék jelölő')}:</label></td>
                <td><input name="ujtermekjelolo" type="text" value="{$ujtermekjelolo}"></td>
        		<td><a class="js-kepbrowsebutton" data-name="ujtermekjelolo" href="#" title="{t('Browse')}">{t('...')}</a></td>
                <td><label>{t('Top 10 jelölő')}:</label></td>
                <td><input name="top10jelolo" type="text" value="{$top10jelolo}"></td>
        		<td><a class="js-kepbrowsebutton" data-name="top10jelolo" href="#" title="{t('Browse')}">{t('...')}</a></td>
            </tr>
            <tr>
                <td><label>{t('Akció jelölő')}:</label></td>
                <td><input name="akciojelolo" type="text" value="{$akciojelolo}"></td>
        		<td><a class="js-kepbrowsebutton" data-name="akciojelolo" href="#" title="{t('Browse')}">{t('...')}</a></td>
                <td><label>{t('Megszűnő termék jelölő')}:</label></td>
                <td><input name="megszunojelolo" type="text" value="{$megszunojelolo}"></td>
        		<td><a class="js-kepbrowsebutton" data-name="megszunojelolo" href="#" title="{t('Browse')}">{t('...')}</a></td>
            </tr>
            <tr>
                <td><label>{t('Ingyen szállítás jelölő')}:</label></td>
                <td><input name="ingyenszallitasjelolo" type="text" value="{$ingyenszallitasjelolo}"></td>
        		<td><a class="js-kepbrowsebutton" data-name="ingyenszallitasjelolo" href="#" title="{t('Browse')}">{t('...')}</a></td>
            </tr>
        </tbody></table>

		<table class="ui-widget ui-widget-content ui-corner-all mattable-repeatable"><tbody>
			<tr><td><label>{t('Hírek száma a főoldalon')}:</label></td><td><input name="fooldalhirdb" type="number" value="{$fooldalhirdb}"></td>
				<td><label>{t('Ajánlott termékek száma a főoldalon')}:</label></td><td><input name="fooldalajanlotttermekdb" type="number" value="{$fooldalajanlotttermekdb}"></td></tr>
			<tr><td><label>{t('Legnépszerűbb termékek száma a főoldalon')}:</label></td><td><input name="fooldalnepszerutermekdb" type="number" value="{$fooldalnepszerutermekdb}"></td>
				<td><label>{t('Kiemelt termékek száma')}:</label></td><td><input name="kiemelttermekdb" type="number" value="{$kiemelttermekdb}"></td></tr>
            <tr><td><label>{t('Termékek száma a terméklistában')}:</label></td><td><input name="termeklistatermekdb" type="number" value="{$termeklistatermekdb}"></td></tr>
			<tr><td><label>{t('Ár szűrő lépésköze')}:</label></td><td><input name="arfilterstep" type="number" value="{$arfilterstep}"></td>
				<td><label>{t('Automatikus kiléptetés ideje (perc)')}:</label></td><td><input name="autologoutmin" type="number" value="{$autologoutmin}"></td></tr>
		</tbody></table>
        <table class="ui-widget ui-widget-content ui-corner-all mattable-repeatable"><tbody>
			<tr>
				<td><label>{t('Mini kép utótag')}:</label></td><td><input name="miniimgpost" type="text" value="{$miniimgpost}"></td>
                <td><label>{t('Kis kép utótag')}:</label></td><td><input name="smallimgpost" type="text" value="{$smallimgpost}"></td>
			</tr>
			<tr>
				<td><label>{t('Közepes kép utótag')}:</label></td><td><input name="mediumimgpost" type="text" value="{$mediumimgpost}"></td>
				<td><label>{t('Nagy kép utótag')}:</label></td><td><input name="bigimgpost" type="text" value="{$bigimgpost}"></td>
			</tr>
		</tbody></table>
        <table class="ui-widget ui-widget-content ui-corner-all mattable-repeatable"><tbody>
            <tr><td><label for="OldalCimEdit">{t('Lap címe')}:</label></td>
                <td colspan="3"><input id="OldalCimEdit" name="oldalcim" type="text" size="75" maxlength="255" value="{$oldalcim}"></td>
            </tr>
            <tr><td><label for="SeodescriptionEdit">{t('META leírás')}:</label></td>
                <td colspan="3"><textarea id="SeodescriptionEdit" name="seodescription" type="text" cols="75">{$seodescription}</textarea></td>
            </tr>
        </tbody></table>
        <table class="ui-widget ui-widget-content ui-corner-all mattable-repeatable"><tbody>
            <tr><td colspan="3">{t('Kategória oldal')}</td></tr>
            <tr><td colspan="3">[kategorianev] [global]</td></tr>
            <tr><td><label for="KOldalCimEdit">{t('Lap címe')}:</label></td>
                <td colspan="3"><input id="KOldalCimEdit" name="katoldalcim" type="text" size="75" maxlength="255" value="{$katoldalcim}"></td>
            </tr>
            <tr><td><label for="KSeodescriptionEdit">{t('META leírás')}:</label></td>
                <td colspan="3"><textarea id="KSeodescriptionEdit" name="katseodescription" type="text" cols="75">{$katseodescription}</textarea></td>
            </tr>
        </tbody></table>
        <table class="ui-widget ui-widget-content ui-corner-all mattable-repeatable"><tbody>
            <tr><td colspan="3">{t('Termék oldal')}</td></tr>
            <tr><td colspan="3">[termeknev] [bruttoar] [kategorianev] [global]</td></tr>
            <tr><td><label for="TOldalCimEdit">{t('Lap címe')}:</label></td>
                <td colspan="3"><input id="TOldalCimEdit" name="termekoldalcim" type="text" size="75" maxlength="255" value="{$termekoldalcim}"></td>
            </tr>
            <tr><td><label for="TSeodescriptionEdit">{t('META leírás')}:</label></td>
                <td colspan="3"><textarea id="TSeodescriptionEdit" name="termekseodescription" type="text" cols="75">{$termekseodescription}</textarea></td>
            </tr>
        </tbody></table>
		</div>
		{if ($setup.editstyle=='dropdown')}
		<div class="mattkarb-titlebar" data-caption="{t('Szállítási költség')}" data-refcontrol="#SzallitasiKtgTab"></div>
		{/if}
		<div id="SzallitasiKtgTab" class="mattkarb-page" data-visible="visible">
		<table><tbody>
            <tr>
                <td><label for="SzallitasiKtg1TolEdit">{t('Értékhatár 1')}:</label></td>
                <td><input id="SzallitasiKtg1TolEdit" name="szallitasiktg1tol" type="text" value="{$szallitasiktg1tol}"> - <input name="szallitasiktg1ig" type="text" value="{$szallitasiktg1ig}">
                </td>
                <td><input name="szallitasiktg1ertek" value="{$szallitasiktg1ertek}"></td>
            </tr>
            <tr>
                <td><label for="SzallitasiKtg2TolEdit">{t('Értékhatár 2')}:</label></td>
                <td><input id="SzallitasiKtg2TolEdit" name="szallitasiktg2tol" type="text" value="{$szallitasiktg2tol}"> - <input name="szallitasiktg2ig" type="text" value="{$szallitasiktg2ig}">
                </td>
                <td><input name="szallitasiktg2ertek" value="{$szallitasiktg2ertek}"></td>
            </tr>
            <tr>
                <td><label for="SzallitasiKtg3TolEdit">{t('Értékhatár 3')}:</label></td>
                <td><input id="SzallitasiKtg3TolEdit" name="szallitasiktg3tol" type="text" value="{$szallitasiktg3tol}"> - <input name="szallitasiktg3ig" type="text" value="{$szallitasiktg3ig}">
                </td>
                <td><input name="szallitasiktg3ertek" value="{$szallitasiktg3ertek}"></td>
            </tr>
			<tr>
				<td><label for="SzallitasiKtgTermekEdit">{t('Szállítási költség')}:</label></td>
				<td colspan="2"><select id="SzallitasiKtgTermekEdit" name="szallitasiktgtermek">
					<option value="">{t('válasszon')}</option>
					{foreach $szallitasiktgtermeklist as $_szallitasiktgtermek}
					<option value="{$_szallitasiktgtermek.id}"{if ($_szallitasiktgtermek.selected)} selected="selected"{/if}>{$_szallitasiktgtermek.caption}</option>
					{/foreach}
				</select></td>
			</tr>
		</tbody></table>
		</div>
		{if ($setup.editstyle=='dropdown')}
		<div class="mattkarb-titlebar" data-caption="{t('Azonosítók, kódok')}" data-refcontrol="#IdTab"></div>
		{/if}
		<div id="IdTab" class="mattkarb-page" data-visible="visible">
		<table><tbody>
            <tr><td><label>{t('Google analytics kód')}:</label></td><td><input name="gafollow" type="text" value="{$gafollow}"</td></tr>
            <tr><td><label>{t('Facebook app-id')}:</label></td><td><input name="fbappid" type="text" value="{$fbappid}"</td></tr>
        </tbody></table>
        </div>
		{if ($setup.editstyle=='dropdown')}
		<div class="mattkarb-titlebar" data-caption="{t('Email')}" data-refcontrol="#EmailTab"></div>
		{/if}
		<div id="EmailTab" class="mattkarb-page" data-visible="visible">
		<table><tbody>
            <tr><td><label>{t('Email feladója')}:</label></td><td><input name="emailfrom" type="text" value="{$emailfrom}"</td></tr>
            <tr><td><label>{t('Válasz cím')}:</label></td><td><input name="emailreplyto" type="text" value="{$emailreplyto}"</td></tr>
            <tr><td><label>{t('Bcc')}:</label></td><td><input name="emailbcc" type="text" value="{$emailbcc}"</td></tr>
        </tbody></table>
        </div>
		{if ($setup.editstyle=='dropdown')}
		<div class="mattkarb-titlebar" data-caption="{t('Feed beállítások')}" data-refcontrol="#FeedTab"></div>
		{/if}
		<div id="FeedTab" class="mattkarb-page" data-visible="visible">
		<table><tbody>
			<tr><td><label>{t('Hírek száma a feed-ben')}:</label></td><td><input name="feedhirdb" type="number" value="{$feedhirdb}"></td>
				<td><label>{t('Hír feed címe')}:</label></td><td><input name="feedhirtitle" type="text" value="{$feedhirtitle}"></td></tr>
			<tr><td><label>{t('Hír feed leírása')}:</label></td><td colspan="3"><input name="feedhirdescription" type="text" value="{$feedhirdescription}"></td></tr>
			<tr><td><label>{t('Termékek száma a feed-ben')}:</label></td><td><input name="feedtermekdb" type="number" value="{$feedtermekdb}"></td>
				<td><label>{t('Termék feed címe')}:</label></td><td><input name="feedtermektitle" type="text" value="{$feedtermektitle}"></td></tr>
			<tr><td><label>{t('Termék feed leírása')}:</label></td><td colspan="3"><input name="feedtermekdescription" type="text" value="{$feedtermekdescription}"></td></tr>
		</tbody></table>
		</div>
		{if ($setup.editstyle=='dropdown')}
		<div class="mattkarb-titlebar" data-caption="{t('Sitemap beállítások')}" data-refcontrol="#SitemapTab"></div>
		{/if}
		<div id="SitemapTab" class="mattkarb-page" data-visible="visible">
		<table><tbody>
			<tr><td><label>{t('Statikus lap prioritás')}:</label></td><td><input name="statlapprior" type="text" value="{$statlapprior}"></td>
				<td><label>{t('changefreq')}:</label></td>
				<td><select name="statlapchangefreq" value="{$statlapchangefreq}">
						<option value="always"{if ($statlapchangefreq=='always')} selected="selected"{/if}>always</option>
						<option value="hourly"{if ($statlapchangefreq=='hourly')} selected="selected"{/if}>hourly</option>
						<option value="daily"{if ($statlapchangefreq=='daily')} selected="selected"{/if}>daily</option>
						<option value="weekly"{if ($statlapchangefreq=='weekly')} selected="selected"{/if}>weekly</option>
						<option value="monthly"{if ($statlapchangefreq=='monthly')} selected="selected"{/if}>monthly</option>
						<option value="yearly"{if ($statlapchangefreq=='yearly')} selected="selected"{/if}>yearly</option>
						<option value="never"{if ($statlapchangefreq=='never')} selected="selected"{/if}>never</option>
					</select>
				</td>
			</tr>
			<tr><td><label>{t('Terméklap prioritás')}:</label></td><td><input name="termekprior" type="text" value="{$termekprior}"></td>
				<td><label>{t('changefreq')}:</label></td>
				<td><select name="termekchangefreq" value="{$termekchangefreq}">
						<option value="always"{if ($termekchangefreq=='always')} selected="selected"{/if}>always</option>
						<option value="hourly"{if ($termekchangefreq=='hourly')} selected="selected"{/if}>hourly</option>
						<option value="daily"{if ($termekchangefreq=='daily')} selected="selected"{/if}>daily</option>
						<option value="weekly"{if ($termekchangefreq=='weekly')} selected="selected"{/if}>weekly</option>
						<option value="monthly"{if ($termekchangefreq=='monthly')} selected="selected"{/if}>monthly</option>
						<option value="yearly"{if ($termekchangefreq=='yearly')} selected="selected"{/if}>yearly</option>
						<option value="never"{if ($termekchangefreq=='never')} selected="selected"{/if}>never</option>
					</select>
				</td>
			</tr>
			<tr><td><label>{t('Kategória oldal prioritás')}:</label></td><td><input name="kategoriaprior" type="text" value="{$kategoriaprior}"></td>
				<td><label>{t('changefreq')}:</label></td>
				<td><select name="kategoriachangefreq" value="{$kategoriachangefreq}">
						<option value="always"{if ($kategoriachangefreq=='always')} selected="selected"{/if}>always</option>
						<option value="hourly"{if ($kategoriachangefreq=='hourly')} selected="selected"{/if}>hourly</option>
						<option value="daily"{if ($kategoriachangefreq=='daily')} selected="selected"{/if}>daily</option>
						<option value="weekly"{if ($kategoriachangefreq=='weekly')} selected="selected"{/if}>weekly</option>
						<option value="monthly"{if ($kategoriachangefreq=='monthly')} selected="selected"{/if}>monthly</option>
						<option value="yearly"{if ($kategoriachangefreq=='yearly')} selected="selected"{/if}>yearly</option>
						<option value="never"{if ($kategoriachangefreq=='never')} selected="selected"{/if}>never</option>
					</select>
				</td>
			</tr>
			<tr><td><label>{t('Főoldal prioritás')}:</label></td><td><input name="fooldalprior" type="text" value="{$fooldalprior}"></td>
				<td><label>{t('changefreq')}:</label></td>
				<td><select name="fooldalchangefreq" value="{$fooldalchangefreq}">
						<option value="always"{if ($fooldalchangefreq=='always')} selected="selected"{/if}>always</option>
						<option value="hourly"{if ($fooldalchangefreq=='hourly')} selected="selected"{/if}>hourly</option>
						<option value="daily"{if ($fooldalchangefreq=='daily')} selected="selected"{/if}>daily</option>
						<option value="weekly"{if ($fooldalchangefreq=='weekly')} selected="selected"{/if}>weekly</option>
						<option value="monthly"{if ($fooldalchangefreq=='monthly')} selected="selected"{/if}>monthly</option>
						<option value="yearly"{if ($fooldalchangefreq=='yearly')} selected="selected"{/if}>yearly</option>
						<option value="never"{if ($fooldalchangefreq=='never')} selected="selected"{/if}>never</option>
					</select>
				</td>
			</tr>
		</tbody></table>
		</div>
	</div>
	<div class="admin-form-footer">
		<input id="mattkarb-okbutton" type="submit" value="{t('OK')}">
		<a id="mattkarb-cancelbutton" href="#">{t('Mégsem')}</a>
	</div>
</form>
</div>
{/block}
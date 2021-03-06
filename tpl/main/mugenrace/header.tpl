{include "headerfirstrow.tpl"}
<div class="headertop">
	<div class="container">
		<div class="row headercartcontainer">
			{if (!$user.loggedin)}
			<div class="span8">
				<div class="headerbutton firstheaderbutton">
					<a rel="nofollow" href="{$showloginlink}" class="headerloginicon">{t('Jelentkezzen be')}</a>
				</div>
				<div class="headerbutton">
					<a rel="nofollow" href="{$showregisztraciolink}">{t('Hozza létre saját fiókját')}</a>
				</div>
                <div class="headerbutton lastheaderbutton">
                    <select name="headerorszag" class="headerorszag">
                        {foreach $orszaglist as $f}
                            <option value="{$f.id}"{if ($f.selected)} selected="selected"{/if}>{$f.caption}</option>
                        {/foreach}
                    </select>
                </div>
			</div>
			{else}
			<div class="span8">
				<div class="headerbutton">
					<a rel="nofollow" href="{$showaccountlink}" title="{t('Fiókom')}">{$user.nev}</a>
				</div>
				<div class="headerbutton lastheaderbutton">
					<a rel="nofollow" href="{$dologoutlink}">{t('Kijelentkezés')}</a>
				</div>
			</div>
			{/if}
			<div class="headercart">
				<a href="{$kosargetlink}" class="btn cartbtn pull-right" rel="nofollow">{t('Kosár')}</a>
				<a id="minikosar" class="pull-right" href="{$kosargetlink}" rel="nofollow">
					{include "minikosar.tpl"}
				</a>
			</div>
		</div>
	</div>
</div>
<div class="header-ingyenes">
    <div id="minikosaringyenes" class="container">
        {include "minikosaringyenes.tpl"}
    </div>
</div>
<div class="container whitebg headbgtakaro">
    <div class="headermid container whitebg">
        <div class="row">
            <div class="span12">
                <div class="span2">
                    <a href="/"><img src="{$imagepath}{$mugenracelogo}" class="headerlogo" alt="Mugenrace webshop" title="Mugenrace webshop"></a>
                </div>
                <div class="span2">
                    <form id="searchform" name="searchbox" method="get" action="/kereses" autocomplete="off">
                    <div class="searchinputbox">
                        <input id="searchinput" class="siteSearch span2" type="text" title="{t('Keressen a termékeink között!')}" placeholder="{t('Keressen a termékeink között!')}" accesskey="k" value="" maxlength="300" name="keresett">
                        <input id="searchbutton" type="submit" value="">
                    </div>
                    </form>
                </div>
                <div class="span7 fejleckep">
                    <img src="{$imagepath}{$mugenracefejleckep}">
                </div>
            </div>
        </div>
    </div>
    <div class="container headernav">
        <div class="row">
            <div class="span16">
                <nav>
                    <ul id="navmain">
                        {foreach $menu1 as $_menupont}
                            <li{if ($_menupont@last)} class="last"{/if}{if ($_menupont@first)} class="first"{/if}><a href="/termekfa/{$_menupont.slug}" data-cnt="{$_menupont.childcount}">{$_menupont.caption}</a>
                            <div class="sub">
                                {foreach $_menupont.children as $_focsoport}
                                <ul>
                                    <li class="categorytitle">{$_focsoport.caption}</li>
                                    {foreach $_focsoport.children as $_alcsoport}
                                        <li><a href="/termekfa/{$_alcsoport.slug}">{$_alcsoport.caption}</a></li>
                                    {/foreach}
                                </ul>
                                {/foreach}
                            </div>
                            </li>
                        {/foreach}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
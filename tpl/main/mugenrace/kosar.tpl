{extends "base.tpl"}

{block "kozep"}
<div class="container whitebg">
	<div class="row">
		<div class="span10 offset1 js-cart">
			{if (count($tetellista)>0)}
			<div class="megrendelemcontainer">
				<a href="{$prevuri}" class="btn okbtn">{t('Folytatom a vásárlást')}</a>
				<a href="{$showcheckoutlink}" rel="nofollow" class="btn cartbtn pull-right">
					<i class="icon-ok icon-white"></i>
					{t('Megrendelem')}
				</a>
			</div>
			<table class="table table-bordered">
				{include 'kosartetellist.tpl'}
			</table>
			<div class="megrendelemcontainer">
				<a href="{$prevuri}" class="btn okbtn">{t('Folytatom a vásárlást')}</a>
				<a href="{$showcheckoutlink}" rel="nofollow" class="btn cartbtn pull-right">
					<i class="icon-ok icon-white"></i>
					{t('Megrendelem')}
				</a>
			</div>
			{else}
				<h3>{t('Az Ön kosara üres')}.</h3>
                <a href="{$prevuri}" class="btn okbtn">{t('Folytatom a vásárlást')}</a>
			{/if}
            {if (count($hozzavasarolttermekek)>0)}
            <div class="row">
                <div class="span10">
                <div class="blockHeader">
                    <h2 class="main">{t('Vásárlóink ajánlják Önnek')}</h2>
                </div>
                <div id="hozzavasarolttermekslider" class="royalSlider contentSlider rsDefaultInv termekSlider">
                    {$lntcnt=count($hozzavasarolttermekek)}
                    {$step=3}
                    {for $i=0 to $lntcnt-1 step $step}
                        <div>
                        {for $j=0 to $step-1}
                            {if ($i+$j<$lntcnt)}
                            {$_termek=$hozzavasarolttermekek[$i+$j]}
                            <div class="textaligncenter pull-left" style="width:{100/$step}%">
                                <div class="termekSliderTermekInner">
                                    <a href="/termek/{$_termek.slug}">
                                        <div class="termekSliderImageContainer">
                                            <img src="{$imagepath}{$_termek.minikepurl}" title="{$_termek.caption}" alt="{$_termek.caption}">
                                        </div>
                                        <div>{$_termek.caption}</div>
                                        <h5 class="main"><span>{number_format($_termek.bruttohuf,0,',',' ')} {$valutanemnev}</span></h5>
                                    </a>
                                </div>
                            </div>
                            {/if}
                        {/for}
                        </div>
                    {/for}
                </div>
                </div>
            </div>
            {/if}
		</div>
	</div>
</div>
{/block}

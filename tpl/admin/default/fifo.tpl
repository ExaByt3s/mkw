{extends "base.tpl"}

{block "inhead"}
<script type="text/javascript" src="/js/admin/default/jquery.form.js"></script>
<script type="text/javascript" src="/js/admin/default/jquery.jstree.js"></script>
<script type="text/javascript" src="/js/admin/default/jquery.mattkarb.js"></script>
<script type="text/javascript" src="/js/admin/default/jquery.mattaccord.js"></script>
<script type="text/javascript" src="/js/admin/default/fifoform.js"></script>
{/block}

{block "kozep"}
<div id="mattkarb">
<div id="mattkarb-header">
	<h3>{t('Készletérték')}</h3>
</div>
<div{if ($setup.editstyle=='tab')} id="mattkarb-tabs"{/if}>
    {if ($setup.editstyle=='tab')}
    <ul>
        <li><a href="#DefaTab">{t('Készletérték')}</a></li>
    </ul>
    {/if}
    {if ($setup.editstyle=='dropdown')}
    <div class="mattkarb-titlebar" data-caption="{t('Készletérték')}" data-refcontrol="#DefaTab"></div>
    {/if}
    <div id="DefaTab" class="mattkarb-page" data-visible="visible">
        <form id="fifocalc">
        <div>
            <label>Stornó bizonylatok kellenek</label><input name="storno" type="checkbox">
        </div>
        <div>
        <a href="/admin/fifo/calc" class="js-fifocalc">FIFO számítás</a>
        </div>
        </form>
        <form id="fifoexport" action="">
        <div>
            <label>Számok Excel formátumban</label><input name="toexcel" type="checkbox" checked>
        </div>
        <div>
            <label>Ékezetek ISO-8859-2-ben</label><input name="toiso" type="checkbox" checked>
        </div>
        <div>
        <a href="/admin/fifo/alapadat" class="js-fifoalapadat">FIFO alapadatok</a>
        </div>
        <div>
        <a href="/admin/fifo/keszletertek" class="js-keszletertek">Készletérték</a>
        </div>
        </form>
    </div>
</div>
<div class="admin-form-footer">
</div>
</div>
{/block}
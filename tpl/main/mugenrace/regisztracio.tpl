{extends "base.tpl"}

{block "kozep"}
<div class="container whitebg">
	<div class="row">
		<div class="span10 offset1">
			<div class="form-header">
                <h2>{t('Regisztráljon')}</h2>
			</div>
			<form id="Regform" class="form-horizontal" action="/regisztracio/ment" method="post">
				<fieldset>
					<div class="control-group{if ($hibak.vezeteknev||$hibak.keresztnev)} error{/if}">
						<label class="control-label" for="VezeteknevEdit">{t('Név')}:</label>
						<div class="controls">
							<input id="VezeteknevEdit" name="vezeteknev" type="text" class="input-medium" value="{$vezeteknev|default}" placeholder="{t('vezetéknév')}" required data-errormsg="{t('Adja meg a nevét')}">
							<input id="KeresztnevEdit" name="keresztnev" type="text" class="input-medium" value="{$keresztnev|default}" placeholder="{t('keresztnév')}" required>
							<span id="NevMsg" class="help-inline">{$hibak.keresztnev|default}</span>
						</div>
					</div>
					<div class="control-group{if ($hibak.email|default)} error{/if}">
						<label class="control-label" for="EmailEdit">{t('Email')}:</label>
						<div class="controls">
							<input id="EmailEdit" name="email" type="email" class="input-large" value="{$email|default}" required data-errormsg1="{t('Adja meg az emailcímét')}" data-errormsg2="{t('Kérjük, emailcímet adjon meg.')}">
							<span id="EmailMsg" class="help-inline">{$hibak.email|default}</span>
						</div>
					</div>
					<div class="control-group{if ($hibak.jelszo|default)} error{/if}">
						<label class="control-label" for="Jelszo1Edit">{t('Jelszó')}:</label>
						<div class="controls">
							<input id="Jelszo1Edit" name="jelszo1" type="password" class="input-medium" required data-errormsg1="{t('Adjon meg jelszót.')}" data-errormsg2="{t('A két jelszó nem egyezik.')}">
							<input id="Jelszo2Edit" name="jelszo2" type="password" class="input-medium" required>
							<span id="JelszoMsg" class="help-inline">{$hibak.jelszo|default}</span>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn okbtn">{t('OK')}</button>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>
{/block}
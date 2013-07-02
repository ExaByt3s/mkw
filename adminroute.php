<?php
$router->map('GET','/admin','adminController#view','adminview');
$router->map('GET','/admin/view','adminController#view','adminview2');
$router->map('GET','/admin/egyebtorzs/view','egyebtorzsController#view','adminegyebtorzsview');
$router->map('GET','/admin/afa/jsonlist','afaController#jsonlist','adminafajsonlist');
$router->map('GET','/admin/afa/htmllist','afaController#htmllist','adminafahtmllist');
$router->map('POST','/admin/afa/save','afaController#save','adminafasave');
$router->map('GET','/admin/arfolyam/jsonlist','arfolyamController#jsonlist','adminarfolyamjsonlist');
$router->map('GET','/admin/arfolyam/htmllist','arfolyamController#htmllist','adminarfolyamhtmllist');
$router->map('POST','/admin/arfolyam/save','arfolyamController#save','adminarfolyamsave');
$router->map('GET','/admin/arfolyam/getarfolyam','arfolyamController#getarfolyam','admingetarfolyam');
$router->map('GET','/admin/bankszamla/jsonlist','bankszamlaController#jsonlist','adminbankszamlajsonlist');
$router->map('GET','/admin/bankszamla/htmllist','bankszamlaController#htmllist','adminbankszamlahtmllist');
$router->map('POST','/admin/bankszamla/save','bankszamlaController#save','adminbankszamlasave');
$router->map('GET','/admin/felhasznalo/jsonlist','felhasznaloController#jsonlist','adminfelhasznalojsonlist');
$router->map('POST','/admin/felhasznalo/save','felhasznaloController#save','adminfelhasznalosave');
$router->map('GET','/admin/fizmod/jsonlist','fizmodController#jsonlist','adminfizmodjsonlist');
$router->map('GET','/admin/fizmod/htmllist','fizmodController#htmllist','adminfizmodhtmllist');
$router->map('POST','/admin/fizmod/save','fizmodController#save','adminfizmodsave');
$router->map('GET','/admin/jelenlettipus/jsonlist','jelenlettipusController#jsonlist','adminjelenlettipusjsonlist');
$router->map('POST','/admin/jelenlettipus/save','jelenlettipusController#save','adminjelenlettipussave');
$router->map('GET','/admin/kapcsolatfelveteltema/jsonlist','kapcsolatfelveteltemaController#jsonlist','adminkapcsolatfelveteltemajsonlist');
$router->map('POST','/admin/kapcsolatfelveteltema/save','kapcsolatfelveteltemaController#save','adminkapcsolatfelveteltemasave');
$router->map('GET','/admin/kontaktcimkekat/jsonlist','kontaktcimkekatController#jsonlist','adminkontaktcimkekatjsonlist');
$router->map('POST','/admin/kontaktcimkekat/save','kontaktcimkekatController#save','adminkontaktcimkekatsave');
$router->map('GET','/admin/munkakor/jsonlist','munkakorController#jsonlist','adminmunkakorjsonlist');
$router->map('POST','/admin/munkakor/save','munkakorController#save','adminmunkakorsave');
$router->map('GET','/admin/partnercimkekat/jsonlist','partnercimkekatController#jsonlist','adminpartnercimkekatjsonlist');
$router->map('POST','/admin/partnercimkekat/save','partnercimkekatController#save','adminpartnercimkekatsave');
$router->map('GET','/admin/raktar/jsonlist','raktarController#jsonlist','adminraktarjsonlist');
$router->map('POST','/admin/raktar/save','raktarController#save','adminraktarsave');
$router->map('GET','/admin/termekcimkekat/jsonlist','termekcimkekatController#jsonlist','admintermekcimkekatjsonlist');
$router->map('POST','/admin/termekcimkekat/save','termekcimkekatController#save','admintermekcimkekatsave');
$router->map('GET','/admin/termekvaltozatadattipus/jsonlist','termekvaltozatadattipusController#jsonlist','admintermekvaltozatadattipusjsonlist');
$router->map('POST','/admin/termekvaltozatadattipus/save','termekvaltozatadattipusController#save','admintermekvaltozatadattipussave');
$router->map('GET','/admin/valutanem/jsonlist','valutanemController#jsonlist','adminvalutanemjsonlist');
$router->map('GET','/admin/valutanem/htmllist','valutanemController#htmllist','adminvalutanemhtmllist');
$router->map('POST','/admin/valutanem/save','valutanemController#save','adminvalutanemsave');
$router->map('GET','/admin/vtsz/jsonlist','vtszController#jsonlist','adminvtszjsonlist');
$router->map('GET','/admin/vtsz/htmllist','vtszController#htmllist','adminvtszhtmllist');
$router->map('POST','/admin/vtsz/save','vtszController#save','adminvtszsave');

$router->map('GET','/admin/setup/view','setupController#view','adminsetupview');
$router->map('POST','/admin/setup/save','setupController#save','adminsetupsave');

$router->map('GET','/admin/bizonylattetel/getar','bizonylattetelController#getar','adminbizonylattetelgetar');
$router->map('GET','/admin/bizonylattetel/calcar','bizonylattetelController#calcar','adminbizonylattetelcalcar');
$router->map('GET','/admin/bizonylattetel/getemptyrow','bizonylattetelController#getemptyrow','adminbizonylattetelgetemptyrow');
$router->map('GET','/admin/bizonylattetel/save','bizonylattetelController#save','adminbizonylattetelsave');

$router->map('GET','/admin/megrendelesfej/viewlist','megrendelesfejController#viewlist','adminmegrendelesfejviewlist');
$router->map('GET','/admin/megrendelesfej/getlistbody','megrendelesfejController#getlistbody','adminmegrendelesfejgetlistbody');
$router->map('GET','/admin/megrendelesfej/getkarb','megrendelesfejController#getkarb','adminmegrendelesfejgetkarb');
$router->map('GET','/admin/megrendelesfej/viewkarb','megrendelesfejController#viewkarb','adminmegrendelesfejviewkarb');
$router->map('POST','/admin/megrendelesfej/save','megrendelesfejController#save','adminmegrendelesfejsave');

$router->map('GET','/admin/termek/viewlist','termekController#viewlist','admintermekviewlist');
$router->map('GET','/admin/termek/htmllist','termekController#htmllist','admintermekhtmllist');
$router->map('GET','/admin/termek/getlistbody','termekController#getlistbody','admintermekgetlistbody');
$router->map('GET','/admin/termek/getkarb','termekController#getkarb','admintermekgetkarb');
$router->map('GET','/admin/termek/viewkarb','termekController#viewkarb','admintermekviewkarb');
$router->map('GET','/admin/termek/getnetto','termekController#getnetto','admintermekgetnetto');
$router->map('GET','/admin/termek/getbrutto','termekController#getbrutto','admintermekgetbrutto');
$router->map('POST','/admin/termek/save','termekController#save','admintermeksave');
$router->map('POST','/admin/termek/setflag','termekController#setflag','admintermeksetflag');

$router->map('GET','/admin/termekvaltozat/getemptyrow','termekvaltozatController#getemptyrow','admintermekvaltozatgetemptyrow');
$router->map('POST','/admin/termekvaltozat/generate','termekvaltozatController#generate','admintermekvaltozatgenerate');
$router->map('POST','/admin/termekvaltozat/save','termekvaltozatController#save','admintermekvaltozatsave');
$router->map('POST','/admin/termekvaltozat/delall','termekvaltozatController#delall','admintermekvaltozatdelall');

$router->map('GET','/admin/emailtemplate/viewlist','emailtemplateController#viewlist','adminemailtemplateviewlist');
$router->map('GET','/admin/emailtemplate/getlistbody','emailtemplateController#getlistbody','adminemailtemplategetlistbody');
$router->map('GET','/admin/emailtemplate/getkarb','emailtemplateController#getkarb','adminemailtemplategetkarb');
$router->map('GET','/admin/emailtemplate/viewkarb','emailtemplateController#viewkarb','adminemailtemplateviewkarb');
$router->map('POST','/admin/emailtemplate/save','emailtemplateController#save','adminemailtemplatesave');

$router->map('GET','/admin/dolgozo/viewlist','dolgozoController#viewlist','admindolgozoviewlist');
$router->map('GET','/admin/dolgozo/getlistbody','dolgozoController#getlistbody','admindolgozogetlistbody');
$router->map('GET','/admin/dolgozo/getkarb','dolgozoController#getkarb','admindolgozogetkarb');
$router->map('GET','/admin/dolgozo/viewkarb','dolgozoController#viewkarb','admindolgozoviewkarb');
$router->map('POST','/admin/dolgozo/save','dolgozoController#save','admindolgozosave');

$router->map('GET','/admin/esemeny/viewlist','esemenyController#viewlist','adminesemenyviewlist');
$router->map('GET','/admin/esemeny/getlistbody','esemenyController#getlistbody','adminesemenygetlistbody');
$router->map('GET','/admin/esemeny/getkarb','esemenyController#getkarb','adminesemenygetkarb');
$router->map('GET','/admin/esemeny/viewkarb','esemenyController#viewkarb','adminesemenyviewkarb');
$router->map('POST','/admin/esemeny/save','esemenyController#save','adminesemenysave');

$router->map('GET','/admin/hir/viewlist','hirController#viewlist','adminhirviewlist');
$router->map('GET','/admin/hir/getlistbody','hirController#getlistbody','adminhirgetlistbody');
$router->map('GET','/admin/hir/getkarb','hirController#getkarb','adminhirgetkarb');
$router->map('GET','/admin/hir/viewkarb','hirController#viewkarb','adminhirviewkarb');
$router->map('GET','/admin/hir/gethirlist','hirController#gethirlist','adminhirgethirlist');
$router->map('GET','/admin/hir/getfeedhirlist','hirController#getfeedhirlist','adminhirgetfeedhirlist');
$router->map('POST','/admin/hir/save','hirController#save','adminhirsave');
$router->map('POST','/admin/hir/setlathato','hirController#setlathato','adminhirsetlathato');

$router->map('GET','/admin/jelenletiiv/viewlist','jelenletiivController#viewlist','adminjelenletiivviewlist');
$router->map('GET','/admin/jelenletiiv/getlistbody','jelenletiivController#getlistbody','adminjelenletiivgetlistbody');
$router->map('GET','/admin/jelenletiiv/getkarb','jelenletiivController#getkarb','adminjelenletiivgetkarb');
$router->map('GET','/admin/jelenletiiv/viewkarb','jelenletiivController#viewkarb','adminjelenletiivviewkarb');
$router->map('POST','/admin/jelenletiiv/save','jelenletiivController#save','adminjelenletiivsave');
$router->map('POST','/admin/jelenletiiv/generatenapi','jelenletiivController#generatenapi','adminjelenletiivgeneratenapi');

$router->map('GET','/admin/keresoszolog/viewlist','keresoszologController#viewlist','adminkeresoszologviewlist');
$router->map('GET','/admin/keresoszolog/getlistbody','keresoszologController#getlistbody','adminkeresoszologgetlistbody');
$router->map('GET','/admin/keresoszolog/getkarb','keresoszologController#getkarb','adminkeresoszologgetkarb');
$router->map('GET','/admin/keresoszolog/viewkarb','keresoszologController#viewkarb','adminkeresoszologviewkarb');
$router->map('POST','/admin/keresoszolog/save','keresoszologController#save','adminkeresoszologsave');

$router->map('GET','/admin/statlap/viewlist','statlapController#viewlist','adminstatlapviewlist');
$router->map('GET','/admin/statlap/getlistbody','statlapController#getlistbody','adminstatlapgetlistbody');
$router->map('GET','/admin/statlap/getkarb','statlapController#getkarb','adminstatlapgetkarb');
$router->map('GET','/admin/statlap/viewkarb','statlapController#viewkarb','adminstatlapviewkarb');
$router->map('POST','/admin/statlap/save','statlapController#save','adminstatlapsave');

$router->map('GET','/admin/template/viewlist','templateController#viewlist','admintemplateviewlist');
$router->map('GET','/admin/template/getlistbody','templateController#getlistbody','admintemplategetlistbody');
$router->map('GET','/admin/template/getkarb','templateController#getkarb','admintemplategetkarb');
$router->map('GET','/admin/template/viewkarb','templateController#viewkarb','admintemplateviewkarb');
$router->map('POST','/admin/template/save','templateController#save','admintemplatesave');

$router->map('GET','/admin/kontakt/getemptyrow','kontaktController#getemptyrow','adminkontaktgetemptyrow');

$router->map('GET','/admin/kontaktcimke/viewlist','kontaktcimkeController#viewlist','adminkontaktcimkeviewlist');
$router->map('GET','/admin/kontaktcimke/getlistbody','kontaktcimkeController#getlistbody','adminkontaktcimkegetlistbody');
$router->map('GET','/admin/kontaktcimke/getkarb','kontaktcimkeController#getkarb','adminkontaktcimkegetkarb');
$router->map('GET','/admin/kontaktcimke/viewkarb','kontaktcimkeController#viewkarb','adminkontaktcimkeviewkarb');
$router->map('POST','/admin/kontaktcimke/save','kontaktcimkeController#save','adminkontaktcimkesave');
$router->map('POST','/admin/kontaktcimke/setmenulathato','kontaktcimkeController#setmenulathato','adminkontaktcimkesetmenulathato');

$router->map('GET','/admin/termekcimke/viewlist','termekcimkeController#viewlist','admintermekcimkeviewlist');
$router->map('GET','/admin/termekcimke/getlistbody','termekcimkeController#getlistbody','admintermekcimkegetlistbody');
$router->map('GET','/admin/termekcimke/getkarb','termekcimkeController#getkarb','admintermekcimkegetkarb');
$router->map('GET','/admin/termekcimke/viewkarb','termekcimkeController#viewkarb','admintermekcimkeviewkarb');
$router->map('POST','/admin/termekcimke/save','termekcimkeController#save','admintermekcimkesave');
$router->map('POST','/admin/termekcimke/setmenulathato','termekcimkeController#setmenulathato','admintermekcimkesetmenulathato');

$router->map('GET','/admin/partnercimke/viewlist','partnercimkeController#viewlist','adminpartnercimkeviewlist');
$router->map('GET','/admin/partnercimke/getlistbody','partnercimkeController#getlistbody','adminpartnercimkegetlistbody');
$router->map('GET','/admin/partnercimke/getkarb','partnercimkeController#getkarb','adminpartnercimkegetkarb');
$router->map('GET','/admin/partnercimke/viewkarb','partnercimkeController#viewkarb','adminpartnercimkeviewkarb');
$router->map('POST','/admin/partnercimke/save','partnercimkeController#save','adminpartnercimkesave');
$router->map('POST','/admin/partnercimke/setmenulathato','partnercimkeController#setmenulathato','adminpartnercimkesetmenulathato');

$router->map('GET','/admin/korhinta/viewlist','korhintaController#viewlist','adminkorhintaviewlist');
$router->map('GET','/admin/korhinta/getlistbody','korhintaController#getlistbody','adminkorhintagetlistbody');
$router->map('GET','/admin/korhinta/getkarb','korhintaController#getkarb','adminkorhintagetkarb');
$router->map('GET','/admin/korhinta/viewkarb','korhintaController#viewkarb','adminkorhintaviewkarb');
$router->map('POST','/admin/korhinta/save','korhintaController#save','adminkorhintasave');

$router->map('GET','/admin/partner/viewlist','partnerController#viewlist','adminpartnerviewlist');
$router->map('GET','/admin/partner/getlistbody','partnerController#getlistbody','adminpartnergetlistbody');
$router->map('GET','/admin/partner/getkarb','partnerController#getkarb','adminpartnergetkarb');
$router->map('GET','/admin/partner/viewkarb','partnerController#viewkarb','adminpartnerviewkarb');
$router->map('POST','/admin/partner/save','partnerController#save','adminpartnersave');
$router->map('POST','/admin/partner/regisztral','partnerController#regisztral','adminpartnerregisztral');
$router->map('POST','/admin/partner/checkemail','partnerController#checkemail','adminpartnercheckemail');

$router->map('GET','/admin/termekfa/getkarb','termekfaController#getkarb','admintermekfagetkarb');
$router->map('GET','/admin/termekfa/jsonlist','termekfaController#jsonlist','admintermekfajsonlist');
$router->map('POST','/admin/termekfa/save','termekfaController#save','admintermekfasave');
$router->map('GET','/admin/termekfa/isedeletable','termekfaController#isdeletable','admintermekfaisdeletable');
$router->map('POST','/admin/termekfa/move','termekfaController#move','admintermekfamove');
$router->map('GET','/admin/termekfa/viewlist','termekfaController#viewlist','admintermekfaviewlist');
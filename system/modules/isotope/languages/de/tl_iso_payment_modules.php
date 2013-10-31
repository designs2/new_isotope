<?php

/**
 * Isotope eCommerce for Contao Open Source CMS
 * 
 * Copyright (C) 2009-2013 Isotope eCommerce Workgroup
 * 
 * Core translations are managed using Transifex. To create a new translation
 * or to help to maintain an existing one, please register at transifex.com.
 * 
 * @link http://help.transifex.com/intro/translating.html
 * @link https://www.transifex.com/projects/i/isotope/language/de/
 * 
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

$GLOBALS['TL_LANG']['tl_iso_payment']['name'][0] = 'Name';
$GLOBALS['TL_LANG']['tl_iso_payment']['name'][1] = 'Geben Sie einen Namen für dieses Modul ein.';
$GLOBALS['TL_LANG']['tl_iso_payment']['label'][0] = 'Bezeichnung';
$GLOBALS['TL_LANG']['tl_iso_payment']['label'][1] = 'Dieser Text wird dem Kunden bei der Bestellung angezeigt.';
$GLOBALS['TL_LANG']['tl_iso_payment']['type'][0] = 'Zahlungsmodul';
$GLOBALS['TL_LANG']['tl_iso_payment']['type'][1] = 'Wählen Sie eine der unterstützen Zahlungsmethoden.';
$GLOBALS['TL_LANG']['tl_iso_payment']['note'][0] = 'Hinweise';
$GLOBALS['TL_LANG']['tl_iso_payment']['note'][1] = 'Die Hinweise können im Bestätigungs-Mail mitgesendet werden (##payment_note##).';
$GLOBALS['TL_LANG']['tl_iso_payment']['new_order_status'][0] = 'Status für neue Bestellungen';
$GLOBALS['TL_LANG']['tl_iso_payment']['new_order_status'][1] = 'Wählen Sie einen zutreffenden Status für neue Bestellungen im System.';
$GLOBALS['TL_LANG']['tl_iso_payment']['minimum_total'][0] = 'Minimaler Betrag';
$GLOBALS['TL_LANG']['tl_iso_payment']['minimum_total'][1] = 'Geben Sie ein Zahl grösser als 0 ein, wenn diese Zahlungsart erst ab einem gewissen Totalbetrag zur Verfügung steht.';
$GLOBALS['TL_LANG']['tl_iso_payment']['maximum_total'][0] = 'Maximaler Betrag';
$GLOBALS['TL_LANG']['tl_iso_payment']['maximum_total'][1] = 'Geben Sie ein Zahl grösser als 0 ein, wenn diese Zahlungsart nur bis einem gewissen Totalbetrag zur Verfügung steht.';
$GLOBALS['TL_LANG']['tl_iso_payment']['countries'][0] = 'Aktive Länder';
$GLOBALS['TL_LANG']['tl_iso_payment']['countries'][1] = 'Falls diese Zahlungsart nur in gewissen Ländern unterstütz wird (Rechnungsadresse des Kunden).';
$GLOBALS['TL_LANG']['tl_iso_payment']['shipping_modules'][0] = 'Versandarten';
$GLOBALS['TL_LANG']['tl_iso_payment']['shipping_modules'][1] = 'Falls diese Zahlungsart nur für bestimmte Versandarten unterstützt wird (z.B. Barzahlung nur bei Abholung).';
$GLOBALS['TL_LANG']['tl_iso_payment']['product_types'][0] = 'Produkttypen';
$GLOBALS['TL_LANG']['tl_iso_payment']['product_types'][1] = 'Sie können diese Bezahlmethode auf bestimmte Produkttypen einschränken. Wenn der Warenkorb einen Produkttypen enthält, den Sie nicht gewählt haben, ist die Bezahlmethode nicht verfügbar.';
$GLOBALS['TL_LANG']['tl_iso_payment']['price'][0] = 'Preis';
$GLOBALS['TL_LANG']['tl_iso_payment']['price'][1] = 'Geben Sie einen prozentualen Wert ein (z.B. "10" oder "10%").';
$GLOBALS['TL_LANG']['tl_iso_payment']['tax_class'][0] = 'Steuerklasse';
$GLOBALS['TL_LANG']['tl_iso_payment']['tax_class'][1] = 'Bitte wählen Sie eine Steuerklasse für diesen Preis.';
$GLOBALS['TL_LANG']['tl_iso_payment']['trans_type'][0] = 'Transaktions-Typ';
$GLOBALS['TL_LANG']['tl_iso_payment']['trans_type'][1] = 'Wählen Sie ob Sie das Geld sofort einnehmen oder für eine spätere Transaktion (z. B. wenn versandt wird) authorisieren (und abwarten) wollen.';
$GLOBALS['TL_LANG']['tl_iso_payment']['paypal_account'][0] = 'PayPal-Konto';
$GLOBALS['TL_LANG']['tl_iso_payment']['paypal_account'][1] = 'Geben Sie die E-Mail Adresse ein, welche als Standard ihres PayPal Kontos festgelegt ist. Beachten Sie die korrekte Schreibweise, auch Groß-Kleinschreibung!';
$GLOBALS['TL_LANG']['tl_iso_payment']['payflowpro_user'][0] = 'Paypal Payflow Pro Nutzername';
$GLOBALS['TL_LANG']['tl_iso_payment']['payflowpro_vendor'][0] = 'Paypal Payflow Pro Händler';
$GLOBALS['TL_LANG']['tl_iso_payment']['payflowpro_vendor'][1] = 'Ein alphanumerischer String mit ca. 10 Zeichen';
$GLOBALS['TL_LANG']['tl_iso_payment']['payflowpro_partner'][0] = 'Paypal Payflow Pro Partner';
$GLOBALS['TL_LANG']['tl_iso_payment']['payflowpro_partner'][1] = 'Groß-/Kleinschreibung beachten! Normalerweise sind Partner IDs entweder "PayPal" oder "PayPalUK".';
$GLOBALS['TL_LANG']['tl_iso_payment']['payflowpro_password'][0] = 'Paypal Payflow Pro API-Passwort';
$GLOBALS['TL_LANG']['tl_iso_payment']['payflowpro_password'][1] = 'Ein alphanumerischer String mit ca. 11 Zeichen';
$GLOBALS['TL_LANG']['tl_iso_payment']['payflowpro_transType'][0] = 'Paypal Payflow Pro Transaktionstyp';
$GLOBALS['TL_LANG']['tl_iso_payment']['payflowpro_transType'][1] = 'Bitte wählen Sie einen Transaktionstypen.';
$GLOBALS['TL_LANG']['tl_iso_payment']['requireCCV'][0] = 'Benötigt den Prüfcode (Card Code Verification - CCV)';
$GLOBALS['TL_LANG']['tl_iso_payment']['requireCCV'][1] = 'Wählen Sie diese Option wenn sie die Transaktionssicherheit durch die Abfrage des Prüfcodes erhöhen möchten.';
$GLOBALS['TL_LANG']['tl_iso_payment']['allowed_cc_types'][0] = 'Erlaubte Kreditkarten-Typen';
$GLOBALS['TL_LANG']['tl_iso_payment']['allowed_cc_types'][1] = 'Wählen Sie welche Kreditkarten die Bezahlmethode akzeptiert.';
$GLOBALS['TL_LANG']['tl_iso_payment']['datatrans_id'][0] = 'Händler-ID';
$GLOBALS['TL_LANG']['tl_iso_payment']['datatrans_id'][1] = 'Bitte geben Sie Ihre Händler-ID ein.';
$GLOBALS['TL_LANG']['tl_iso_payment']['datatrans_sign'][0] = 'HMAC Schlüssel';
$GLOBALS['TL_LANG']['tl_iso_payment']['datatrans_sign'][1] = 'Bitte geben Sie den HMAC Schlüssel der Datatrans-Verwaltung ein.';
$GLOBALS['TL_LANG']['tl_iso_payment']['sparkasse_paymentmethod'][0] = 'Zahlungsart';
$GLOBALS['TL_LANG']['tl_iso_payment']['sparkasse_paymentmethod'][1] = 'Bitte wählen Sie eine Zahlungsart.';
$GLOBALS['TL_LANG']['tl_iso_payment']['sparkasse_paymentmethod']['creditcard'] = 'Kreditkarte';
$GLOBALS['TL_LANG']['tl_iso_payment']['sparkasse_paymentmethod']['maestro'] = 'Abbuchungskarte';
$GLOBALS['TL_LANG']['tl_iso_payment']['sparkasse_paymentmethod']['directdebit'] = 'Bankeinzug';
$GLOBALS['TL_LANG']['tl_iso_payment']['sparkasse_sslmerchant'][0] = 'Verkäufer ID';
$GLOBALS['TL_LANG']['tl_iso_payment']['sparkasse_sslmerchant'][1] = 'Bitte geben Sie Ihre Verkäufer ID ein (Händlerkennung).';
$GLOBALS['TL_LANG']['tl_iso_payment']['sparkasse_sslpassword'][0] = 'Passwort';
$GLOBALS['TL_LANG']['tl_iso_payment']['sparkasse_sslpassword'][1] = 'Bitte geben Sie Ihr SSL-Passwort ein.';
$GLOBALS['TL_LANG']['tl_iso_payment']['sparkasse_merchantref'][0] = 'Referenz';
$GLOBALS['TL_LANG']['tl_iso_payment']['sparkasse_merchantref'][1] = 'Eine Referenz, welche auf der Detailseite des Verkäufers anstelle der Warenkorbnummer angezeigt wird.';
$GLOBALS['TL_LANG']['tl_iso_payment']['sofortueberweisung_user_id'][0] = 'Kunden ID';
$GLOBALS['TL_LANG']['tl_iso_payment']['sofortueberweisung_user_id'][1] = 'Ihre KUnden ID bei sofortüberweisung.de';
$GLOBALS['TL_LANG']['tl_iso_payment']['sofortueberweisung_project_id'][0] = 'Projekt ID';
$GLOBALS['TL_LANG']['tl_iso_payment']['sofortueberweisung_project_id'][1] = 'Ihre Projekt ID bei sofortüberweisung.de';
$GLOBALS['TL_LANG']['tl_iso_payment']['sofortueberweisung_project_password'][0] = 'Projekt-Passwort';
$GLOBALS['TL_LANG']['tl_iso_payment']['sofortueberweisung_project_password'][1] = 'Ihr Projekt-Passwort bei sofortüberweisung.de';
$GLOBALS['TL_LANG']['tl_iso_payment']['saferpay_accountid'][0] = 'Saferpay Account-ID';
$GLOBALS['TL_LANG']['tl_iso_payment']['saferpay_accountid'][1] = 'Bitte geben Sie ihre eindeutige Saferpay Account ID ein.';
$GLOBALS['TL_LANG']['tl_iso_payment']['saferpay_description'][0] = 'Checkout-Beschreibung';
$GLOBALS['TL_LANG']['tl_iso_payment']['saferpay_description'][1] = 'Der Kunde wird diese Beschreibung auf der Saferpay Checkout-Seite sehen';
$GLOBALS['TL_LANG']['tl_iso_payment']['saferpay_vtconfig'][0] = 'Konfiguration Zahlungsseite (VTCONFIG)';
$GLOBALS['TL_LANG']['tl_iso_payment']['saferpay_vtconfig'][1] = 'Sie können verschiedene Zahlseiten-Konfigurationen erstellen. Wenn Sie eine spezielle verwenden möchten, geben Sie den Wert des "Request"-Parameter hier ein.';
$GLOBALS['TL_LANG']['tl_iso_payment']['expercash_popupId'][0] = 'ExperCash Popup-ID';
$GLOBALS['TL_LANG']['tl_iso_payment']['expercash_popupId'][1] = 'Geben Sie die Popup-ID aus Ihrem ExperCash Portal ein.';
$GLOBALS['TL_LANG']['tl_iso_payment']['expercash_profile'][0] = 'ExperCash Profil';
$GLOBALS['TL_LANG']['tl_iso_payment']['expercash_profile'][1] = 'Geben Sie die dreistellige Profilnummer ein.';
$GLOBALS['TL_LANG']['tl_iso_payment']['expercash_popupKey'][0] = 'ExperCash Popup-Schlüssel';
$GLOBALS['TL_LANG']['tl_iso_payment']['expercash_popupKey'][1] = 'Geben Sie den Popup-Key aus Ihrem ExperCash Portal ein.';
$GLOBALS['TL_LANG']['tl_iso_payment']['expercash_paymentMethod'][0] = 'Transaktionsart';
$GLOBALS['TL_LANG']['tl_iso_payment']['expercash_paymentMethod'][1] = 'Sie können eine Transaktionsart vordefinieren oder den Kunden wählen lassen.';
$GLOBALS['TL_LANG']['tl_iso_payment']['expercash_paymentMethod']['automatic_payment_method'] = 'Auswahl der Zahlart durch den Endkunden';
$GLOBALS['TL_LANG']['tl_iso_payment']['expercash_paymentMethod']['elv_buy'] = 'Zahlung per Lastschrift (ELV)';
$GLOBALS['TL_LANG']['tl_iso_payment']['expercash_paymentMethod']['elv_authorize'] = 'Prüfung und Speicherung von Kontodaten zum späteren Einzug';
$GLOBALS['TL_LANG']['tl_iso_payment']['expercash_paymentMethod']['cc_buy'] = 'Kreditkartenzahlung';
$GLOBALS['TL_LANG']['tl_iso_payment']['expercash_paymentMethod']['cc_authorize'] = 'verbindliche Reservierung auf eine Kreditkarte zum späteren Einzug';
$GLOBALS['TL_LANG']['tl_iso_payment']['expercash_paymentMethod']['giropay'] = 'Transaktion über giropay';
$GLOBALS['TL_LANG']['tl_iso_payment']['expercash_paymentMethod']['sofortueberweisung'] = 'Transaktion über Sofortüberweisung';
$GLOBALS['TL_LANG']['tl_iso_payment']['expercash_css'][0] = 'CSS-Vorlage';
$GLOBALS['TL_LANG']['tl_iso_payment']['expercash_css'][1] = 'Wählen Sie eine CSS-Datei für die Übergabe an ExperCash.';
$GLOBALS['TL_LANG']['tl_iso_payment']['payone_clearingtype'][0] = 'Abwicklungsart';
$GLOBALS['TL_LANG']['tl_iso_payment']['payone_clearingtype'][1] = 'Bitte wählen Sie eine Abwicklungsart.';
$GLOBALS['TL_LANG']['tl_iso_payment']['payone_aid'][0] = 'PAYONE Account-ID';
$GLOBALS['TL_LANG']['tl_iso_payment']['payone_aid'][1] = 'Bitte geben Sie ihre eindeutige PAYONE Account ID ein.';
$GLOBALS['TL_LANG']['tl_iso_payment']['payone_portalid'][0] = 'PAYONE Portal-ID';
$GLOBALS['TL_LANG']['tl_iso_payment']['payone_portalid'][1] = 'Bitte geben Sie die eindeutige PAYONE Portal ID ein.';
$GLOBALS['TL_LANG']['tl_iso_payment']['payone_key'][0] = 'Sicherheitsschlüssel';
$GLOBALS['TL_LANG']['tl_iso_payment']['payone_key'][1] = 'Geben Sie den Sicherheitsschlüssel für dieses Portal ein.';
$GLOBALS['TL_LANG']['tl_iso_payment']['worldpay_instId'][0] = 'Installation ID';
$GLOBALS['TL_LANG']['tl_iso_payment']['worldpay_instId'][1] = 'Bitte geben Sie die WorldPay Installation\'s ID ein';
$GLOBALS['TL_LANG']['tl_iso_payment']['worldpay_callbackPW'][0] = 'Transaktions-Passwort';
$GLOBALS['TL_LANG']['tl_iso_payment']['worldpay_callbackPW'][1] = 'Geben Sie das selbe Passwort ein, den Sie bei Ihrer WorldPay-Konfiguration eingegeben haben.';
$GLOBALS['TL_LANG']['tl_iso_payment']['worldpay_signatureFields'][0] = 'Signaturfelder';
$GLOBALS['TL_LANG']['tl_iso_payment']['worldpay_signatureFields'][1] = 'Geben Sie den selben Wert für das Signaturfeld ein, den Sie bei Ihrer WorldPay-Konfiguration eingegeben haben.';
$GLOBALS['TL_LANG']['tl_iso_payment']['worldpay_md5secret'][0] = 'MD5 Geheim';
$GLOBALS['TL_LANG']['tl_iso_payment']['worldpay_md5secret'][1] = 'Geben Sie den selben MD5 Geheimwert ein, den Sie bei Ihrer WorldPay-Konfiguration eingegeben haben.';
$GLOBALS['TL_LANG']['tl_iso_payment']['worldpay_description'][0] = 'Beschreibung';
$GLOBALS['TL_LANG']['tl_iso_payment']['worldpay_description'][1] = 'Geben Sie eine Beschreibung für Ihren Shop ein. Diese wird den Kunden während dem Worldpay Checkout gezeigt.';
$GLOBALS['TL_LANG']['tl_iso_payment']['groups'][0] = 'Mitgliedergruppen';
$GLOBALS['TL_LANG']['tl_iso_payment']['groups'][1] = 'Diese Bezahlmethode auf bestimmte Mitgliedergruppen beschränken.';
$GLOBALS['TL_LANG']['tl_iso_payment']['protected'][0] = 'Modul schützen';
$GLOBALS['TL_LANG']['tl_iso_payment']['protected'][1] = 'Diese Bezahlmethode nur bestimmten Mitgliedergruppen anzeigen.';
$GLOBALS['TL_LANG']['tl_iso_payment']['guests'][0] = 'Nur Gästen zeigen';
$GLOBALS['TL_LANG']['tl_iso_payment']['guests'][1] = 'Diese Bezahlmethode nicht für eingeloggte Mitglieder anzeigen.';
$GLOBALS['TL_LANG']['tl_iso_payment']['debug'][0] = 'Testsystem verwenden';
$GLOBALS['TL_LANG']['tl_iso_payment']['debug'][1] = 'Aktivieren Sie diese Option um ein Testsystem zu verwenden, auf dem keine echten Zahlungen ausgeführt werden.';
$GLOBALS['TL_LANG']['tl_iso_payment']['enabled'][0] = 'Modul aktivieren';
$GLOBALS['TL_LANG']['tl_iso_payment']['enabled'][1] = 'Klicken Sie hier wenn dieses Modul für Besucher sichtbar sein soll.';
$GLOBALS['TL_LANG']['tl_iso_payment']['new'][0] = 'Neue Zahlungsart';
$GLOBALS['TL_LANG']['tl_iso_payment']['new'][1] = 'Erstellen Sie eine neue Zahlungsart';
$GLOBALS['TL_LANG']['tl_iso_payment']['edit'][0] = 'Zahlungsart bearbeiten';
$GLOBALS['TL_LANG']['tl_iso_payment']['edit'][1] = 'Zahlungsart ID %s bearbeiten';
$GLOBALS['TL_LANG']['tl_iso_payment']['copy'][0] = 'Zahlungsart kopieren';
$GLOBALS['TL_LANG']['tl_iso_payment']['copy'][1] = 'Zahlungsart ID %s kopieren';
$GLOBALS['TL_LANG']['tl_iso_payment']['delete'][0] = 'Zahlungsart löschen';
$GLOBALS['TL_LANG']['tl_iso_payment']['delete'][1] = 'Zahlungsart ID %s löschen';
$GLOBALS['TL_LANG']['tl_iso_payment']['toggle'][0] = 'Zahlungsmethode aktivieren/deaktivieren';
$GLOBALS['TL_LANG']['tl_iso_payment']['toggle'][1] = 'Zahlungsart ID %s aktivieren/deaktivieren';
$GLOBALS['TL_LANG']['tl_iso_payment']['show'][0] = 'Zahlungsart-Details';
$GLOBALS['TL_LANG']['tl_iso_payment']['show'][1] = 'Details der Zahlungsart ID %s anzeigen';
$GLOBALS['TL_LANG']['tl_iso_payment']['capture'][0] = 'Authorisieren und Einnehmen';
$GLOBALS['TL_LANG']['tl_iso_payment']['capture'][1] = 'Transaktionen von diesem Typ werden für die Authorisierung gesendet. Die Transaktion wird automatisch zur Begleichung geleitet wenn die Transaktion erfolgreich war.';
$GLOBALS['TL_LANG']['tl_iso_payment']['auth'][0] = 'Nur Authorisieren';
$GLOBALS['TL_LANG']['tl_iso_payment']['auth'][1] = 'Transaktionen dieses Typs werden übertragen, wenn der Händler die Kreditkarte auf die Menge der verkauften Waren prüfen lassen möchte. Wenn der Händler nicht genügend Waren im Lager hat oder die Bestellungen vor der Warenlieferung prüfen möchte, wird dieser Transaktiontyps übertragen.';
$GLOBALS['TL_LANG']['tl_iso_payment']['no_shipping'] = 'Bestellungen ohne Versand';
$GLOBALS['TL_LANG']['tl_iso_payment']['payone']['elv'] = 'Einziehen mit Drawal';
$GLOBALS['TL_LANG']['tl_iso_payment']['payone']['cc'] = 'Kreditkarte';
$GLOBALS['TL_LANG']['tl_iso_payment']['payone']['dc'] = 'Bankomatkarte';
$GLOBALS['TL_LANG']['tl_iso_payment']['payone']['vor'] = 'Vorauszahlung';
$GLOBALS['TL_LANG']['tl_iso_payment']['payone']['rec'] = 'Rechnung';
$GLOBALS['TL_LANG']['tl_iso_payment']['payone']['sb'] = 'Online Banktransfer';
$GLOBALS['TL_LANG']['tl_iso_payment']['payone']['wlt'] = 'e-Wallet';
$GLOBALS['TL_LANG']['tl_iso_payment']['type_legend'] = 'Name & Typ';
$GLOBALS['TL_LANG']['tl_iso_payment']['note_legend'] = 'Bestellhinweis';
$GLOBALS['TL_LANG']['tl_iso_payment']['config_legend'] = 'Allgemeine Einstellungen';
$GLOBALS['TL_LANG']['tl_iso_payment']['gateway_legend'] = 'Konfiguration des Zahlungsanbieters';
$GLOBALS['TL_LANG']['tl_iso_payment']['price_legend'] = 'Preis';
$GLOBALS['TL_LANG']['tl_iso_payment']['template_legend'] = 'Template';
$GLOBALS['TL_LANG']['tl_iso_payment']['expert_legend'] = 'Experteneinstellungen';
$GLOBALS['TL_LANG']['tl_iso_payment']['enabled_legend'] = 'Aktivierte Einstellungen';

Google-Base-Export
==================

Based on the SuperClix-Modul and using the generic export function of OXID eShop 4 this modul exports a complete list of selected articles which can be used for Google Base.

Originally registered on 2010-04-09 by Frank Schuhmacher on former OXIDprojects.

The module (formerly known as Google Base) creates a csv file with the specifications of SuperClix.


version 1.1.1


Installation:

1. Save your shop folders out and modules.


2. Add the the following lines into the module field in the admin area of your shop:
genexport => googlebase_export/googlebase_genexport
genexport_do => googlebase_export/googlebase_genexport_do

If there is already an entry named genexport and/or genexport_do just add &googlebase_export/googlebase_genexport and &googlebase_export/googlebase_genexport_do right behind the existing entry.


3. Copy the contents of the folder copy_this into the root directory of your shop.


4. Add the following line into the file cust_lang.php:
'GOOGLEBASE_MXGENEXP'                       => 'Google Base Export'


Changelog:

1.1.1 - According to the new changes of the Google Merchant Center-Feed the Module now creates the following variables:
  id (oxartnum, from database)
	title (oxtitle, from database)
	price (brutPrice, from database)
	description (oxlongdesc, from database)
	condition (Neu, Gebraucht or Erneuert, must be set manually)
	gtin (oxean, from database)
	image_link (PictureUrl, from database)
	product_type (must be set manually, for more details see http://www.google.com/support/merchants/bin/answer.py?hl=de&answer=160081)


1.1.0 - The Module now creates a file with the following Google Merchant Center-variables:
	Abholung (true or false, must be set manually)
	Beschreibung (oxlongdesc, from database)
	Bild URL (PictureUrl, from database)
	EAN (oxean, from database)
	Gewicht (oxweight, from database)
	Id (oxartnum, from database)
	Titel (oxtitle, from database)
	Link (Link, from database)
	Preis (brutPrice, from database)
	Produktart (must be set manually, for more details see http://www.google.com/support/merchants/bin/answer.py?hl=de&answer=160081)
	Zustand (Neu, Gebraucht or Erneuert, must be set manually)
	Zahlungsmethode (Barzahlung, Scheck, Visa, MasterCard, AmericanExpress, Lastschrift or Überweisung, must be set manually)
	Zahlungshinweise (Additional informations for payment)


1.0.1 - Version 1.0 only works with the basic-template. Version 1.0.1 now works with any user-defined template without changing the tpl-files.
[{if $linenr == 0 }]
id	title	link	price	description	condition	gtin	image_link	product_type<br>
[{/if}]

[{$article->oxarticles__oxartnum->value}]	[{* Artikelnummer *}]
[{$article->oxarticles__oxtitle->value}]	[{* Artikelbezeichnung *}]
[{$article->getLink()|replace:"&amp;":"&"}]	[{* Artikellink *}]
[{$article->brutPrice}]	[{* Preis *}]
[{$article->oxarticles__oxlongdesc->value}]	[{* Artikelbeschreibung *}]
Neu	[{* Zustand *}]
[{$article->oxarticles__oxean->value}]	[{* EAN-Code *}]
[{$sPictureUrl}]	[{* Bild-URL *}]
Möbel	[{* Produktart *}]
# Changelog
All notable changes to this project will be documented in this file.

## 4.0.0.2 (2018-10-19)
- Freigabe für OXID 6.1.x
- Fehlerhinweise eingefügt, wenn Langtexte nicht ausreichend befüllt sind
- bugfix: Schreibschutz für Langtexte an Artikelvarianten entfernt

## 4.0.0.1 (2018-03-01)
- Exception im Admin unter /Content Tabs/Tabverwaltung/Stamm/

## 4.0.0.0 (2018-03-01)
- Kompatibilität und Support ab Oxid 6.0.0
- Integration eines eigenen Admin-Bereich "D³ Content Tabs"
- Titel und Langtexte der Tabs werden in einer eigenen Tabelle gespeichert
- Langtexte haben eine "Aktiv" - Option erhalten, welche im Frontend zusätzlich geprüft wird
- Altlasten und unnötige Dateien entfernt
- Umstellung auf Namespaces
- Grundinstallation via Composer

## 3.2.0.1 (2016-12-19)
- Support für Apache 2.4
- Paketbereitstellung für ionCube

## 3.2.0.0 (2016-07-22)
- drop: techn. Support für Shopversionen 4.7.x eingestellt
- add: Freigabe für 4.10.x
- add: Prüfung auf gültige Modul-Dateien implementiert
- add feature: Support für Oxid-Theme Flow

## 3.1.0.2 (2015-10-07)
- bugfix: "Shop offline" Anzeige nach der Wahl einer Variante im Frontend
- bugfix: gepflegte Tab-Inhalte wurden nicht angezeigt

## 3.1.0.1 (2015-09-03)
- automatische Installation aufgeteilt, Anlegen der Datenbankfelder erfolgt "step by step"
- Übernahme Moduleigener Templates in copy_this und Verweis zur Überladung siehe FAQ
- fehlende Übersetzungen im Shopadmin nachgetragen
- Modulfreigabe für php5.5 und php5.6
- Aktualisierung Vorabprüfung und Installationsanleitung

## 3.1.0.0 (2014-11-12)
- support for mobile-themes
- adjustment of the structure
- update precheck

## 3.0.1.0 (2014-08-08)
- Module compatible with Shopvesion 4.8.7
- Show Message in Backend if Module is not active
- rename module-tab-Templates
- adjustment of the structure
- delete deprecated files in autoupdate
- fix module entrys in shopconfiguration

## 3.0.0.3 (2014-05-05)
- Update Precheck

## 3.0.0.2 (2014-03-18)
- bugfix for saving longdesc in admin

## 3.0.0.1 (2013-02-22)
- bugfix when module is inactive, tabs will be shown in frontend

## 3.0.0.0 (2013-02-19)
- restructured for 4.7 / 5.0

## 2.4.6.2 (2013-06-27)
- add funktionality for Edition EE
- add Versioncheck in oxarticle-extension
  till 4.5.x other method for getting Longdescription than in 4.6.x

## 2.4.6.1 (2013-03-12)
- bugfix in update.sql

## 2.4.6.0 (2013-02-01)
- tab content moved to templates, add extendable blocks

## 2.4.5.0 (2012-09-05)
- added 4.6.0 functionality

## 2.4.4 (2012-05-31)
- bug fix: javaScript fallback causes shop-in-tab-problem

## 2.4.3 (2011-11-02)
- added templates for 451 - 454
- added javaScript fallback for non js user

## 2.4.2 (2011-09-19)
- bug fix price doesn't save
- bug fix showed empty tabs

## 2.4.1 (2011-08-16)
- inheritance implemented
- bug in save function fixed

## 2.4.0 (2011-07-19)
- restructured
- removed Ajax lib, switched to jQuery
- removed ox_cmp module
- renamed fields (from oxlongdescXXX to d3longdescXXX) in database
- added 4.5.0 templates

## 2.1	(2009-11-13)
- Xajax-Implementierung au neues Intergrationsschema umgestellt
- langtext- und templatebasierte Versionen zusammengeführt
- Fallback-Funktion für Nicht-JavaScript-Einsatz
- Langtexte in einem Admin-Tab zusammengefaßt
- Langtext mehrsprachig verfügbar

## 2.0 (2009-08-26)
- auf PE4 portiert

## 1.1 (2008-09-22)
- Fallback-Funktion für Nicht-JavaScript-Einsatz (tpl)
- Attribute und Bewertungen stehen nun ebenfalls zur Verfügung (tpl)

## 1.0 (2008-09-12)
- Grundfunktion zum Modul komplettiert
- Scriptbasis ist aktuelles Xajax-Integrationsschema


[3.2.0.0]: https://blog.oxidmodule.com/archives/610-Neues-Update-fuer-Modul-Content-Tabs-auf-Version-3.2.0.0.html
[3.1.0.2]: https://blog.oxidmodule.com/archives/541-Neuer-Patch-fuer-Modul-Content-Tabs-auf-Version-3.1.0.2.html
[3.1.0.1]: https://blog.oxidmodule.com/archives/539-Neues-Update-fuer-Modul-Content-Tabs-auf-Version-3.1.0.1.html
[3.1.0.0]: https://blog.oxidmodule.com/archives/473-Neues-Update-fuer-Modul-Content-Tabs-auf-Version-3.1.0.0.html
[3.0.1.0]: https://blog.oxidmodule.com/archives/441-Neues-Update-fuer-Modul-Content-Tabs-auf-Version-3.0.1.0.html
[3.0.0.2]: https://blog.oxidmodule.com/archives/389-Neuer-Patch-fuer-Modul-Content-Tabs-auf-Version-3.0.0.2.html
[3.0.0.0]: https://blog.oxidmodule.com/archives/251-Neues-Upgrade-fuer-Modul-Content-Tabs-auf-Version-3.0.0.0.html
[2.4.6.2]: https://blog.oxidmodule.com/archives/290-Neuer-Patch-fuer-Modul-Content-Tabs-auf-Version-2.4.6.2.html
[2.4.6.0]: https://blog.oxidmodule.com/archives/246-Neues-Update-fuer-Modul-Content-Tabs-auf-Version-2.4.6.0.html
[2.4.5.0]: https://blog.oxidmodule.com/archives/211-Neuer-Patch-fuer-Modul-Content-Tabs-auf-Version-2.4.5.0.html
[2.4.4.0]: https://blog.oxidmodule.com/archives/188-Neuer-Patch-fuer-Modul-Content-Tabs-auf-Version-2.4.4.html
[2.4.3.0]: https://blog.oxidmodule.com/archives/144-Neues-Patch-fuer-Modul-Content-Tabs-auf-Version-2.4.3.html
[2.4.2.0]: https://blog.oxidmodule.com/archives/130-Neues-Patch-fuer-Modul-Content-Tabs-auf-Version-2.4.2.html
[2.4.0.0]: https://blog.oxidmodule.com/archives/116-Update-Content-Tabs-fuer-OXID-PE-4.5.html
[2.0.0.0]: https://blog.oxidmodule.com/archives/28-Modul-Content-Tabs.html


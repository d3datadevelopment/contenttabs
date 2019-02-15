---
title: Changelog
---

# Changelog
All notable changes to this project will be documented in this file.

## 4.1.0.2 - 2019-02-15
### fixed
- letzter Tab wurde nicht im Frontend gezeigt
- Artikel-Objekte wurden auch mit inaktivem Modul (ModCfg) erweitert

## 4.1.0.1 - 2019-02-08
### fixed
- Artikel konnten nicht gespeichert werden: verhindert, dass tabellenfremde Felder in den Save Query integriert werden
- Speichern veränderte HTML Encoding parallel existierender Tabinhalte
- Speichern von Tabinhalten (>= Tab 2) löschte Standardlangtext des Artikels
- Tabinhalte wurden mit verändertem HTML Encoding ans Frontend ausgeliefert

---

## 4.1.0.0 - 2019-01-18
### added
- Variantenartikel erben Langtexte der Elternartikel
- modulspezifisches Thememapping eingefügt
- Löschfunktion für angelegten Tab eingefügt

### changed
- keine Bearbeitung von zwischen Mandanten vererbten Artikelinhalten möglich
- Admin deaktiviert Eingabefelder, wenn deren Funktion vom Tab vordefiniert ist
- Admin zeigt Hinweis für Standard-Tabtitel, wenn kein Titel vergeben wurde
- Tab-Eigenschaften werden in Artikel-Objekt geladen und gespeichert (statt im proprietären eigenen Objekt)
- Logik aus Template ins Model verschoben (flow + azure)
- auf HTML-Dokumentation umgestellt

---

## 4.0.0.2 - 2018-10-19
### added
- Freigabe für OXID 6.1.x
- Fehlerhinweise eingefügt, wenn Langtexte nicht ausreichend befüllt sind

### fixed
- Schreibschutz für Langtexte an Artikelvarianten entfernt

---

## 4.0.0.1 - 2018-03-01
### fixed
- Exception im Admin unter /Content Tabs/Tabverwaltung/Stamm/

---

## 4.0.0.0 - 2018-03-01
### added
- Kompatibilität und Support ab Oxid 6.0.0
- Integration eines eigenen Admin-Bereich "D³ Content Tabs"
- Langtexte haben eine "Aktiv" - Option erhalten, welche im Frontend zusätzlich geprüft wird
- Grundinstallation via Composer

### changed
- Titel und Langtexte der Tabs werden in einer eigenen Tabelle gespeichert
- Altlasten und unnötige Dateien entfernt
- Umstellung auf Namespaces

---

## 3.2.0.1 - 2016-12-19
- Support für Apache 2.4
- Paketbereitstellung für ionCube

---

## 3.2.0.0 - 2016-07-22
- drop: techn. Support für Shopversionen 4.7.x eingestellt
- add: Freigabe für 4.10.x
- add: Prüfung auf gültige Modul-Dateien implementiert
- add feature: Support für Oxid-Theme Flow

---

## 3.1.0.2 - 2015-10-07
- bugfix: "Shop offline" Anzeige nach der Wahl einer Variante im Frontend
- bugfix: gepflegte Tab-Inhalte wurden nicht angezeigt

---

## 3.1.0.1 - 2015-09-03
- automatische Installation aufgeteilt, Anlegen der Datenbankfelder erfolgt "step by step"
- Übernahme Moduleigener Templates in copy_this und Verweis zur Überladung siehe FAQ
- fehlende Übersetzungen im Shopadmin nachgetragen
- Modulfreigabe für php5.5 und php5.6
- Aktualisierung Vorabprüfung und Installationsanleitung

---

## 3.1.0.0 - 2014-11-12
- support for mobile-themes
- adjustment of the structure
- update precheck

---

## 3.0.1.0 - 2014-08-08
- Module compatible with Shopvesion 4.8.7
- Show Message in Backend if Module is not active
- rename module-tab-Templates
- adjustment of the structure
- delete deprecated files in autoupdate
- fix module entrys in shopconfiguration

---

## 3.0.0.3 - 2014-05-05
- Update Precheck

---

## 3.0.0.2 - 2014-03-18
- bugfix for saving longdesc in admin

---

## 3.0.0.1 - 2013-02-22
- bugfix when module is inactive, tabs will be shown in frontend

---

## 3.0.0.0 - 2013-02-19
- restructured for 4.7 / 5.0

---

## 2.4.6.2 - 2013-06-27
- add funktionality for Edition EE
- add Versioncheck in oxarticle-extension
  till 4.5.x other method for getting Longdescription than in 4.6.x

---
  
## 2.4.6.1 - 2013-03-12
- bugfix in update.sql

---

## 2.4.6.0 - 2013-02-01
- tab content moved to templates, add extendable blocks

---

## 2.4.5.0 - 2012-09-05
- added 4.6.0 functionality

---

## 2.4.4 - 2012-05-31
- bug fix: javaScript fallback causes shop-in-tab-problem

---

## 2.4.3 - 2011-11-02
- added templates for 451 - 454
- added javaScript fallback for non js user

---

## 2.4.2 - 2011-09-19
- bug fix price doesn't save
- bug fix showed empty tabs

---

## 2.4.1 - 2011-08-16
- inheritance implemented
- bug in save function fixed

---

## 2.4.0 - 2011-07-19
- restructured
- removed Ajax lib, switched to jQuery
- removed ox_cmp module
- renamed fields (from oxlongdescXXX to d3longdescXXX) in database
- added 4.5.0 templates

---

## 2.1	- 2009-11-13
- Xajax-Implementierung au neues Intergrationsschema umgestellt
- langtext- und templatebasierte Versionen zusammengeführt
- Fallback-Funktion für Nicht-JavaScript-Einsatz
- Langtexte in einem Admin-Tab zusammengefaßt
- Langtext mehrsprachig verfügbar

---

## 2.0 - 2009-08-26
- auf PE4 portiert

---

## 1.1 - 2008-09-22
- Fallback-Funktion für Nicht-JavaScript-Einsatz (tpl)
- Attribute und Bewertungen stehen nun ebenfalls zur Verfügung (tpl)

---

## 1.0 - 2008-09-12
- Grundfunktion zum Modul komplettiert
- Scriptbasis ist aktuelles Xajax-Integrationsschema

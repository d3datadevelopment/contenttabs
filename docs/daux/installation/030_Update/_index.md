---
Title: Update von älteren Modulversionen (3.0.0.3 / 3.0.1.0 oder niedriger)
---

# versionsabhängige Besonderheiten

Bei den Modulversionen 3.0.1.0 sowie 3.1.0.0 hat sich die Struktur der Block- und Template-Dateien innerhalb des Moduls geändert. Des Weiteren wurde der Bereich `changed_full` im Modul entfernt.
Haben Sie Anpassungen an damaligen, moduleigenen Dateien vorgenommen, übernehmen Sie diese bitte in eine eigene Erweiterung. Die Modulstrukturen finden Sie nachfolgend:

## Version 3.0.0.3 oder niedriger

ab Verzeichnis `/modules/d3/d3contenttabs/views/azure/tpl/`

|   |                                            |
|:-:|--------------------------------------------|
| A | -/-                                        |
| B | page/details/inc/d3_ajax_content_tab_1.tpl |
| C | page/details/inc/d3_ajax_content_tab_2.tpl |
| D | page/details/inc/d3_ajax_content_tab_3.tpl |
| E | page/details/inc/d3_ajax_content_tab_4.tpl |
| F | page/details/inc/d3_ajax_content_tab_5.tpl |

## Version 3.0.1.0

ab Verzeichnis `/modules/d3/d3contenttabs/views/`

|   |                                         |
|:-:|-----------------------------------------|
| A | blocks/details_tabs_longdescription.tpl |
| B | azure/tpl/d3contenttabs_tab1.tpl        |
| C | azure/tpl/d3contenttabs_tab2.tpl        |
| D | azure/tpl/d3contenttabs_tab3.tpl        |
| E | azure/tpl/d3contenttabs_tab4.tpl        |
| F | azure/tpl/d3contenttabs_tab5.tpl        |

## bis Version 3.2.0.x

ab Verzeichnis `/modules/d3/d3contenttabs/views/`

|   |                                               |
|:-:|-----------------------------------------------|
| A | azure/blocks/details_tabs_longdescription.tpl |
| B | tpl/d3contenttabs_tab1.tpl                    |
| C | tpl/d3contenttabs_tab2.tpl                    |
| D | tpl/d3contenttabs_tab3.tpl                    |
| E | tpl/d3contenttabs_tab4.tpl                    |
| F | tpl/d3contenttabs_tab5.tpl                    |

## aktuelle Struktur ab Version 4.0.0.0

ab Verzeichnis `/sources/modules/d3/contenttabs/Application/views/`

|     |                                         |
|:---:|-----------------------------------------|
| A   | blocks/details_tabs_longdescription.tpl |
| B   | tpl/d3contenttabs_tab1.tpl              |
| C   | tpl/d3contenttabs_tab1.tpl              |
| ... | ...                                     |

Alle weiteren Updateschritte entnehmen Sie bitte den weiteren Unterseiten.
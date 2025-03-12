## Meals AUG24 - myfirstdockerproject met Apache, php, MySQL en phpMyAdmin
Met deze code kun je een redelijk eenvoudige Docker-container aanmaken met de volgende functionaliteiten:
- apache webserver met de recentste versie van php 8
- mysql-database server met PDO-extensie
- phpMyAdmin

## Wat je er bij krijgt
De map ***htdocs*** is de root van je webserver; in deze map zit 'als service van de zaak':
- ***index.php*** haalt de ruwe data uit de database
- ***index2.php*** toont een eenvoudig formulier waarmee je een nieuw recept in de tabel `recipes` kunt zetten
- ***info.php*** geeft de php-configuratie weer (je kunt kijken of je misschien iets mist)
- ***insert.php*** verwerkt het formulier in `index2.php`
- de map ***db*** bevat:
  - de nodige ínstellingen om de database te kunnen bevragen met PDO (***dbconnection.class.php***); de parameters zijn overgenomen uit de ***docker-compose.yml***-file die leidend is
  - de sql-statements die nodig zijn om bij `docker-compose up` de tabellen `recipes` en `ingredients` in de database te vullen met wat data (***init.sql***)

## Hoe te beginnen in VSC (kloon dit project)
* klik hier boven de repo op de groene knop en kopieer de link `https://github.com/idsosd/meals.git` 
* open een nieuw venster en ga naar Source Control
* klik op op de knop `Clone Repository` en plak de gekopieerde link in het invoerveld en klik op 'Clone from URL'
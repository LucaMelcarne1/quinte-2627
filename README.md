# 🚀 Sviluppo Web Backend con PHP e Laragon

&gt; Corso pratico di **Web Backend** per il **Quinto Anno** degli Istituti Tecnici ad indirizzo Informatica.
&gt; Dalla configurazione dell'ambiente di sviluppo alla costruzione di web app reali con PHP, MySQL e cenni al pattern MVC.

[![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?logo=php&logoColor=white)](https://www.php.net)
[![Laragon](https://img.shields.io/badge/Laragon-Ambiente%20di%20sviluppo-0E83CD)](https://laragon.org)
[![MySQL](https://img.shields.io/badge/MySQL-8.x-4479A1?logo=mysql&logoColor=white)](https://www.mysql.com)
[![Licenza](https://img.shields.io/badge/licenza-MIT-green)](LICENSE)

---

## 🎯 Obiettivi del corso

Al termine del percorso lo studente sarà in grado di:

1. **Installare e configurare** un ambiente di sviluppo professionale con Laragon;
2. Scrivere **script PHP** con sintassi corretta, gestendo variabili, array e superglobali;
3. Gestire **form HTML** e la sicurezza dei dati in ingresso (XSS, SQL Injection);
4. Implementare **autenticazione** con Sessioni e Cookie;
5. Persistere i dati su **MySQL tramite PDO** con Prepared Statements;
6. **Organizzare il codice** in modo professionale, con cenni al pattern **MVC**.

## 📋 Prerequisiti

| Competenza | Livello richiesto |
|---|---|
| HTML5 (form, tabelle, semantica) | ⭐⭐⭐ Base |
| CSS3 | ⭐⭐ Base |
| Logica di programmazione (variabili, cicli, condizioni) | ⭐⭐⭐ Base |
| Basi di dati relazionali (tabelle, chiavi primarie, SQL base) | ⭐⭐ Consigliata |

&gt; 💡 **Non serve aver già programmato in PHP**: il corso parte da zero lato server.

## 🛠️ Stack tecnologico

| Componente | Tecnologia | Ruolo |
|---|---|---|
| **Ambiente** | Laragon | Stack Apache/Nginx + PHP + MySQL + HeidiSQL in un click |
| **Linguaggio backend** | PHP 8.x | Elaborazione lato server, logica di business |
| **Database** | MySQL / MariaDB | Persistenza dati |
| **Frontend** | HTML5 + CSS3 | Interfaccia utente |
| **Gestione DB** | HeidiSQL | Client grafico per MySQL incluso in Laragon |
| **Versioning** | Git + GitHub | Condivisione codice e lavoro di gruppo |

## 🗺️ Mappa dei moduli

| # | Modulo | Argomenti | Progetto guidato | Stato |
|---|---|---|---|---|
| 1 | [**Ambiente di sviluppo con Laragon**](modulo-01-laragon/) | Installazione, virtual host, strumenti integrati | Primo progetto `app.test` | ✅ |
| 2 | [**PHP: sintassi, array e form GET/POST**](modulo-02-sintassi-e-form/) | Sintassi base, superglobali, validazione | Form di contatto sicuro | ✅ |
| 3 | [**Sessioni, Cookie e Autenticazione**](modulo-03-sessioni-e-autenticazione/) | `$_SESSION`, login/logout, pagine protette | Sistema Login/Register | ⬜ |
| 4 | [**Persistenza dati con PDO e MySQL**](modulo-04-pdo-e-mysql/) | CRUD completo, Prepared Statements, SQL Injection | Gestionale Eventi/Serie TV | ⬜ |
| 5 | [**Architettura del codice e cenni MVC**](modulo-05-architettura-e-mvc/) | Organizzazione cartelle, separazione logica/vista, front controller | Gestionale Eventi (MVC) | ⬜ |
| 🏁 | [**Progetto finale**](progetto-finale/) | Integrazione di tutti i moduli | Piattaforma a scelta (prenotazioni / e-commerce / eventi) | ⬜ |

## 📂 Come usare questa repository

1. **Clona** la repository nella cartella `www` di Laragon (o scaricala come ZIP ed estraila):
   ```bash
   cd C:\laragon\www
   git clone https://github.com/TUO-USERNAME/php-laragon-backend-tutorial.git
   ```
2. Per ogni modulo, leggi prima il **README.md teorico**, poi copia i file degli **esempi** in una sottocartella di `www` ed eseguili nel browser.
3. Affronta la **mini-sfida** di fine modulo prima di guardare la soluzione (è nascosta nei tag `&lt;details&gt;`).
4. Al termine del Modulo 5, sviluppa il **progetto finale** seguendo il brief.

## ⚡ Avvio rapido (Riepilogo)

```text
┌─────────────────────────────────────────────────────┐
│  1. Apri Laragon  →  Start All                      │
│  2. Crea cartella in C:\laragon\www\mia-app         │
│  3. Laragon genera automaticamente il virtual host  │
│     → http://mia-app.test                           │
│  4. Scrivi codice PHP → salva → ricarica il browser │
└─────────────────────────────────────────────────────┘
```

## 📜 Licenza

Materiale didattico distribuito con licenza MIT. Liberamente riutilizzabile per scopi educativi con attribuzione.

---

*Corso a cura del docente di Informatica — ITI, Quinto Anno.*
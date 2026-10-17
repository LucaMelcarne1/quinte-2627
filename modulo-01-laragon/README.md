# MODULO 1 — Ambiente di sviluppo con Laragon

&gt; 🎯 **Obiettivo**: installare, configurare e padroneggiare un ambiente di sviluppo web professionale, capendo cosa succede "sotto il cofano" quando scriviamo PHP.

---

## 1.1 Cos'è Laragon?

**Laragon** è un ambiente di sviluppo web **all-in-one** per Windows (disponibile anche per macOS/Linux) che racchiude in un'unica applicazione tutto ciò che serve per sviluppare in PHP:

- **Web server**: Apache o Nginx
- **Motore PHP**: dalla 5.x fino all'8.x
- **Database**: MySQL, MariaDB o PostgreSQL
- **Gestore DB grafico**: HeidiSQL
- **Terminale potenziato**: Cmder
- **Mail catcher** per testare l'invio di email in locale

### Perché si usa a scuola e in azienda

| Contesto | Motivazione |
|---|---|
| 🏫 **Scuola** | Installazione in 5 minuti, nessuna configurazione manuale di Apache/PHP/MySQL, ogni studente ha lo stesso identico ambiente → meno "funziona sul mio PC!" |
| 🏢 **Azienda** | Rapidità di setup per nuovi sviluppatori, virtual host automatici identici a quelli di produzione, portabilità |
| 🐛 **Debug** | Mail catcher integrato, log accessibili, switch istantaneo tra versioni PHP |

## 1.2 Confronto veloce: Laragon vs XAMPP vs WAMP

| Caratteristica | **Laragon** ✅ | XAMPP | WampServer |
|---|---|---|---|
| Virtual host automatici | ✅ Crea `nome.test` da solo | ❌ Manuale (editare `httpd-vhosts.conf`) | ❌ Manuale |
| Isolamento progetti | ✅ Ogni progetto è separato | ⚠️ Tutto in `htdocs` | ⚠️ Tutto in `www` |
| Switch versione PHP | ✅ In 1 click dal menu | ⚠️ Rischioso/complesso | ⚠️ Addon |
| Terminale integrato | ✅ Cmder (potente) | ❌ Solo cmd | ❌ |
| Mail catcher integrato | ✅ | ❌ | ❌ |
| Modernità e manutenzione | ✅ Attivamente sviluppato | ⚠️ Aggiornamenti lenti | ⚠️ |
| Peso / velocità | ✅ Leggero e veloce | ⚠️ Più pesante | ⚠️ |

&gt; 📌 **Conclusione**: XAMPP va benissimo per prototipi veloci, ma **Laragon è lo standard moderno** per chi studia o lavora sul web backend con PHP.

## 1.3 Architettura dello stack

Quando apri nel browser `http://mia-app.test`, ecco il viaggio della richiesta:

```
┌─────────┐   ① HTTP Request    ┌──────────┐   ② Passa il file .php   ┌─────────────┐
│ BROWSER │ ──────────────────► │  Apache  │ ───────────────────────► │ Motore PHP  │
│ (client)│                     │ (web srv)│                          │ (mod_php/   │
│         │ ◄────────────────── │          │ ◄─────────────────────── │  FastCGI)   │
└─────────┘   ⑤ Response HTML   └──────────┘   ④ HTML generato        └──────┬──────┘
                                                                              │ ③ Query SQL
                                                                       ┌──────▼──────┐
                                                                       │  MySQL DB   │
                                                                       └─────────────┘
```

**Flusso del ciclo Request/Response:**

```
1. CLIENT        Il browser invia una richiesta HTTP GET http://mia-app.test/index.php
2. WEB SERVER    Apache riceve la richiesta e vede che il file è .php
3. PHP ENGINE    Il motore PHP esegue lo script (eventuali query MySQL, logica...)
4. OUTPUT        PHP restituisce al server del semplice HTML (mai il codice sorgente!)
5. SERVER        Apache invia l'HTML al browser
6. CLIENT        Il browser riceve SOLO HTML/CSS/JS e lo renderizza
```

&gt; ⚠️ **Concetto chiave**: il browser **non vede mai** il codice PHP. Vede solo il risultato. Per questo il backend è il posto giusto per password, query e dati sensibili.

## 1.4 Installazione (Windows)

1. Scarica Laragon (versione **Full**, include tutto) da [laragon.org](https://laragon.org/download/).
2. Esegui l'installer → installa in `C:\laragon` (consigliato, senza spazi nel percorso).
3. Al primo avvio, apri il menu **≡ (Menu) → Preferences** e verifica:
   - **Web Server**: Apache (o Nginx, a piacere)
   - **Database**: MySQL 8.x (o MariaDB)
   - ✅ Spunta *"Automatically create virtual hosts"* (di default è attivo il pattern `{name}.test`)
4. Clicca **Start All** → Apache e MySQL diventano verdi. ✅

### Dove vivono i file

```
C:\laragon\
├── www\              ← QUI VANNO I TUOI PROGETTI (equivalente di htdocs)
│   └── mia-app\      ← Ogni sottocartella = un progetto = un virtual host
├── etc\
│   └── apache2\      ← Configurazioni Apache (virtual host automatici)
├── bin\              ← Apache, PHP, MySQL eseguibili (switch versioni dal menu)
└── data\             ← Database MySQL
```

## 1.5 Virtual Hosts automatici 🌟

Questa è la **killer feature** di Laragon.

In XAMPP accederesti a: `http://localhost/mia-app/index.php` ❌ brutto e poco realistico.
Con Laragon, basta **creare una cartella** e ottieni:

```
Crea la cartella → C:\laragon\www\mia-app
Apri il browser  → http://mia-app.test   ✅ automatico, senza configurare nulla!
```

```
┌──────────────────────────────────────────────┐
│  File system              Browser            │
│  ─────────────            ───────            │
│  C:\laragon\www\          http://mia-app.test│
│  └── mia-app\                                │
│      └── index.php  ◄──►  Apache lo trova    │
│                           da solo!           │
└──────────────────────────────────────────────┘
```

Se Laragon è aperto quando crei la cartella, il virtual host si genera all'istante. Altrimenti: menu **≡ → Apache → Reload** (o riavvia Laragon).

&gt; 🔐 Nota: il primo accesso a `.test` può mostrare un avviso di certificato SSL (Laragon genera certificati locali). Procedi pure in locale.
&gt;
&gt; 💡 Alternativa da menu: **Menu → Quick app → Blank** crea istantaneamente un nuovo progetto.

## 1.6 Strumenti integrati

### 🖥️ Terminale (Cmder)
Menu **≡ → Terminal** (o `Ctrl`+`` ` ``). Comandi utili:

```bash
# Posizionati nella cartella del progetto corrente
cd C:\laragon\www\mia-app

# Versione PHP in uso
php -v

# Esegui uno script da riga di comando
php mio_script.php

# Interprete interattivo PHP (ottimo per sperimentare!)
php -a
```

### 🗄️ HeidiSQL (gestione database)
Menu **≡ → Database → HeidiSQL**. Connessione preconfigurata:

| Campo | Valore |
|---|---|
| Host | `127.0.0.1` |
| User | `root` |
| Password | *(vuota, di default in Laragon)* |
| Porta | `3306` |

### 📧 Mail Catcher (test email in locale)
Menu **≡ → Preferences → Services**: abilita **Mail Catcher**. Qualsiasi email inviata con `mail()` di PHP viene "catturata" e mostrata all'indirizzo `http://localhost:8025` invece di partire davvero. Fondamentale per testare registrazioni e recupero password senza SPAM.

### ⚡ Quick App
Menu **≡ → Quick app**: genera in pochi secondi lo scheletro di progetti basati su framework (Laravel, WordPress, Symfony...) installandoli automaticamente. Lo useremo dal Modulo 5 in poi come riferimento, ma il corso costruisce tutto a mano per imparare.

## 1.7 Best practice per l'ambiente

- ✅ Un progetto = una cartella in `www` = un dominio `.test` dedicato
- ✅ Lavora con Laragon **aperto** mentre sviluppi (auto-ricarica i virtual host)
- ✅ Usa HeidiSQL per ispezionare i dati, **mai** per "aggiustare" il codice PHP
- ✅ Commit frequenti su Git: l'ambiente è riproducibile, il codice no
- ❌ Non mettere mai spazi o accenti nei nomi delle cartelle/progetti

---

## 🧪 Verifica di apprendimento

Al termine del modulo dovresti essere in grado di:
1. Spiegare il percorso di una richiesta dal browser al database e ritorno;
2. Creare un progetto `esercizio.test` e farlo girare in 30 secondi;
3. Aprire HeidiSQL, creare un database `test_db` con una tabella `utenti(id, nome)`;
4. Spiegare perché il codice PHP non è visibile dal browser.

➡️ **Prosegui con gli esempi nella cartella [`esempi/`](esempi/)**
<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file viene utilizzato, durante l’installazione, dallo script
 * di creazione di wp-config.php. Non è necessario utilizzarlo solo via web
 * puoi copiare questo file in «wp-config.php» e riempire i valori corretti.
 *
 * Questo file definisce le seguenti configurazioni:
 *
 * * Impostazioni del database
 * * Chiavi segrete
 * * Prefisso della tabella
 * * ABSPATH
 *
 * * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Impostazioni database - È possibile ottenere queste informazioni dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define( 'DB_NAME', 'gestione_vivaio' );

/** Nome utente del database */
define( 'DB_USER', 'root' );

/** Password del database */
define( 'DB_PASSWORD', '' );

/** Hostname del database */
define( 'DB_HOST', 'localhost' );

/** Charset del Database da utilizzare nella creazione delle tabelle. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Il tipo di collazione del database. Da non modificare se non si ha idea di cosa sia. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chiavi univoche di autenticazione e di sicurezza.
 *
 * Modificarle con frasi univoche differenti!
 * È possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 *
 * È possibile cambiare queste chiavi in qualsiasi momento, per invalidare tutti i cookie esistenti.
 * Ciò forzerà tutti gli utenti a effettuare nuovamente l'accesso.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'g{)8osr7N/ypMsWpKBvy9yv+2TO2cI,~G:2IHYd,L@SrIyH-=`ST[^p?JYx44og;' );
define( 'SECURE_AUTH_KEY',  'L(,IrqT=|rF[AI)&Zb7S4%Gd</m!4H#qzM7=|(z>ssL.du;4b_/6@eN,%{V0^hLG' );
define( 'LOGGED_IN_KEY',    'C R&/_E$D9o%4k6fFS70Z2zh5VvS=uQ%wv7rd~+CCYE7J5lNqK&+M{nm)A%z v=p' );
define( 'NONCE_KEY',        '(o@kekJhpl,.aaV?&Kl/RV,7TR_]K*E+qMjPTa8o)KMN^(_X))9(e;Z> c-hbjTO' );
define( 'AUTH_SALT',        ':%+V9+w9}r1rlzTFU{[nOmKJ7y./xsX[t^-?iLE/AvnOsZRo1y(*,@-MYI*l5[{l' );
define( 'SECURE_AUTH_SALT', 'fJ<c$?3SU}-To}.B}2nuK6wBKt.A9ls)2OC63KaX7n91[z,ri@#4FshD?#}y~EyF' );
define( 'LOGGED_IN_SALT',   'Sv2!$H=K:aM0d.frSmw+L03[W>j~Po`Vo56^5e/Jec n$U.o.3xHJSB3 <+Q!g6#' );
define( 'NONCE_SALT',       'U% f;Lr]}s8tr!_*qDs}7z1uwug3>-kkBhx85O4-n s~?fFIe($h2{+2aJjA+or9' );

/**#@-*/

/**
 * Prefisso tabella del database WordPress.
 *
 * È possibile avere installazioni multiple su di un unico database
 * fornendo a ciascuna installazione un prefisso univoco. Solo numeri, lettere e trattini bassi!
 */
$table_prefix = 'wp_';

/**
 * Per gli sviluppatori: modalità di debug di WordPress.
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi durante lo sviluppo
 * È fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all’interno dei loro ambienti di sviluppo.
 *
 * Per informazioni sulle altre costanti che possono essere utilizzate per il debug,
 * leggi la documentazione
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Aggiungere qualsiasi valore personalizzato tra questa riga e la riga "Finito, interrompere le modifiche". */


define('FS_METHOD', 'direct');
define('FS_CHMOD_DIR', (0705 & ~ umask()));
define('FS_CHMOD_FILE', (0604 & ~ umask()));

/* Finito, interrompere le modifiche! Buona pubblicazione. */

/** Path assoluto alla directory di WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Imposta le variabili di WordPress ed include i file. */
require_once ABSPATH . 'wp-settings.php';


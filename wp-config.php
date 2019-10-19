<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'new_jmh' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'mysql' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'p$42w>a3B>fJww{4FzIe]X:-mfK-P21(=UU)D~><jIQ]t@nre-{YsZ~r|~Pca7v0' );
define( 'SECURE_AUTH_KEY',  'Y[99*TcKJZ@8C8%:f^CuC=$v.MMS$uqIHAcXKiq6yi+ |wN6E8B(pW]iSWKwf^@B' );
define( 'LOGGED_IN_KEY',    'AsnYFc?36C.,RE9/`yc0a:%g7]hy_HLWI8SIR84=C.ts{ %,S(SDIEN+}7pl$u/$' );
define( 'NONCE_KEY',        '-)E:9c5L>yw;PvgYfTpWR^j/?mMXs=6@-cMD{{O@lAxELNvahKQ%z1EH9t1UTr&%' );
define( 'AUTH_SALT',        'fS(%@#[zBoJRSPJ{MV:ro$i$m5Tkr~cp^c^I=9$rH5_S)|Be {dQN9F}W%YDV_K#' );
define( 'SECURE_AUTH_SALT', '?`F~lSzqj|u S{VRQNVRqLv=VK6o(Sb)kqV{P+D~_Ek39XKvmat}w0UxB4&rbOdj' );
define( 'LOGGED_IN_SALT',   'XZ[^{j4Z`$/=?ul@p>Y?p*eSf jH3!aEZ4^lo=A<bS]v:!JSG,(Is!=~z0XStT%c' );
define( 'NONCE_SALT',       'MKxG?uA~qgVnI`ml{#ys4c?&hU,1DC^([8G]^^JrHd]iMPB v7,6DRjuvsC1|aRQ' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');

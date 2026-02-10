<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/2fa' => [[['_route' => '2fa_login', '_controller' => 'scheb_two_factor.form_controller::form'], null, null, null, false, false, null]],
        '/2fa_check' => [[['_route' => '2fa_login_check'], null, null, null, false, false, null]],
        '/admin/athlete' => [[['_route' => 'admin_athlete_index', '_controller' => 'App\\Controller\\Admin\\AdminAthleteController::index'], null, null, null, true, false, null]],
        '/admin/athlete/new' => [[['_route' => 'admin_athlete_new', '_controller' => 'App\\Controller\\Admin\\AdminAthleteController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/club-info' => [[['_route' => 'admin_clubinfo_index', '_controller' => 'App\\Controller\\Admin\\AdminClubInfoController::index'], null, null, null, true, false, null]],
        '/admin/club-info/new' => [[['_route' => 'admin_clubinfo_new', '_controller' => 'App\\Controller\\Admin\\AdminClubInfoController::new'], null, null, null, false, false, null]],
        '/gestion-chm-secrete-92x' => [[['_route' => 'admin_dashboard', '_controller' => 'App\\Controller\\Admin\\AdminDashboardController::index'], null, null, null, false, false, null]],
        '/admin/event' => [[['_route' => 'admin_event_index', '_controller' => 'App\\Controller\\Admin\\AdminEventController::index'], null, null, null, true, false, null]],
        '/admin/event/new' => [[['_route' => 'admin_event_new', '_controller' => 'App\\Controller\\Admin\\AdminEventController::new'], null, null, null, false, false, null]],
        '/admin/forfaits' => [[['_route' => 'admin_forfait_index', '_controller' => 'App\\Controller\\Admin\\AdminForfaitController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/forfaits/new' => [[['_route' => 'admin_forfait_new', '_controller' => 'App\\Controller\\Admin\\AdminForfaitController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/licences' => [[['_route' => 'admin_licence_index', '_controller' => 'App\\Controller\\Admin\\AdminLicenceController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/licences/new' => [[['_route' => 'admin_licence_new', '_controller' => 'App\\Controller\\Admin\\AdminLicenceController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/machines' => [[['_route' => 'admin_machine_list', '_controller' => 'App\\Controller\\Admin\\AdminMachineController::index'], null, null, null, true, false, null]],
        '/admin/machines/new' => [[['_route' => 'admin_machine_new', '_controller' => 'App\\Controller\\Admin\\AdminMachineController::new'], null, null, null, false, false, null]],
        '/admin/new-admin' => [[['_route' => 'admin_users_new_admin', '_controller' => 'App\\Controller\\Admin\\AdminManagementController::newAdmin'], null, null, null, false, false, null]],
        '/admin/newsletter' => [[['_route' => 'admin_newsletter_index', '_controller' => 'App\\Controller\\Admin\\AdminNewsletterController::index'], null, null, null, true, false, null]],
        '/admin/newsletter/compose' => [[['_route' => 'admin_newsletter_compose', '_controller' => 'App\\Controller\\Admin\\AdminNewsletterController::compose'], null, null, null, false, false, null]],
        '/admin/newsletter/history' => [[['_route' => 'admin_newsletter_history', '_controller' => 'App\\Controller\\Admin\\AdminNewsletterController::history'], null, null, null, false, false, null]],
        '/admin/produits' => [[['_route' => 'admin_product_index', '_controller' => 'App\\Controller\\Admin\\AdminProduitController::index'], null, null, null, true, false, null]],
        '/admin/produits/new' => [[['_route' => 'admin_product_new', '_controller' => 'App\\Controller\\Admin\\AdminProduitController::new'], null, null, null, false, false, null]],
        '/admin/security/blocklist' => [[['_route' => 'admin_security_blocklist', '_controller' => 'App\\Controller\\Admin\\AdminSecurityController::blocklist'], null, null, null, false, false, null]],
        '/admin/security/purge' => [[['_route' => 'admin_security_purge_logs', '_controller' => 'App\\Controller\\Admin\\AdminSecurityController::purge'], null, null, null, false, false, null]],
        '/admin/security/setup-2fa' => [[['_route' => 'admin_security_2fa_setup', '_controller' => 'App\\Controller\\Admin\\AdminSecurityController::setup'], null, null, null, false, false, null]],
        '/admin/security/export-csv' => [[['_route' => 'admin_security_export_csv', '_controller' => 'App\\Controller\\Admin\\AdminSecurityController::exportCsv'], null, null, null, false, false, null]],
        '/admin/settings' => [[['_route' => 'admin_settings_index', '_controller' => 'App\\Controller\\Admin\\AdminSettingsController::index'], null, null, null, true, false, null]],
        '/admin/users' => [[['_route' => 'admin_users_index', '_controller' => 'App\\Controller\\Admin\\AdminUsersController::index'], null, null, null, true, false, null]],
        '/admin/users/new' => [[['_route' => 'admin_users_new', '_controller' => 'App\\Controller\\Admin\\AdminUsersController::new'], null, null, null, false, false, null]],
        '/admin/articles' => [[['_route' => 'admin_articles_index', '_controller' => 'App\\Controller\\Admin\\ArticleAdminController::index'], null, null, null, true, false, null]],
        '/admin/articles/new' => [[['_route' => 'admin_articles_new', '_controller' => 'App\\Controller\\Admin\\ArticleAdminController::new'], null, null, null, false, false, null]],
        '/admin/backups' => [[['_route' => 'admin_backups_index', '_controller' => 'App\\Controller\\Admin\\BackupController::index'], null, null, null, true, false, null]],
        '/admin/backups/create' => [[['_route' => 'admin_backups_create', '_controller' => 'App\\Controller\\Admin\\BackupController::create'], null, null, null, false, false, null]],
        '/admin/competitions' => [[['_route' => 'admin_competition_index', '_controller' => 'App\\Controller\\Admin\\CompetitionAdminController::index'], null, null, null, true, false, null]],
        '/admin/competitions/new' => [[['_route' => 'admin_competition_new', '_controller' => 'App\\Controller\\Admin\\CompetitionAdminController::new'], null, ['POST' => 0, 'GET' => 1], null, false, false, null]],
        '/admin/contact' => [[['_route' => 'admin_contact_index', '_controller' => 'App\\Controller\\Admin\\ContactAdminController::index'], null, null, null, true, false, null]],
        '/admin/security/logs' => [[['_route' => 'admin_security_logs', '_controller' => 'App\\Controller\\Admin\\LogsAdminController'], null, null, null, false, false, null]],
        '/admin/pages' => [[['_route' => 'admin_pages_index', '_controller' => 'App\\Controller\\Admin\\PageAdminController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/pages/new' => [[['_route' => 'admin_pages_new', '_controller' => 'App\\Controller\\Admin\\PageAdminController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/stats' => [[['_route' => 'admin_stats_index', '_controller' => 'App\\Controller\\Admin\\StatsAdminController::index'], null, null, null, true, false, null]],
        '/admin/updates' => [[['_route' => 'admin_updates_index', '_controller' => 'App\\Controller\\Admin\\UpdateController::index'], null, null, null, true, false, null]],
        '/admin/updates/run' => [[['_route' => 'admin_updates_run', '_controller' => 'App\\Controller\\Admin\\UpdateController::run'], null, null, null, false, false, null]],
        '/assistant/chat' => [[['_route' => 'assistant_chat', '_controller' => 'App\\Controller\\AssistantController::chat'], null, ['POST' => 0], null, false, false, null]],
        '/assistant/licence/request' => [[['_route' => 'assistant_licence_request', '_controller' => 'App\\Controller\\AssistantController::requestLicenceCode'], null, ['POST' => 0], null, false, false, null]],
        '/assistant/licence/verify' => [[['_route' => 'assistant_licence_verify', '_controller' => 'App\\Controller\\AssistantController::verifyLicenceCode'], null, ['POST' => 0], null, false, false, null]],
        '/boutique' => [[['_route' => 'boutique', '_controller' => 'App\\Controller\\BoutiqueController::index'], null, null, null, false, false, null]],
        '/competition' => [[['_route' => 'competition', '_controller' => 'App\\Controller\\CompetitionController::index'], null, null, null, false, false, null]],
        '/competition/feminine' => [[['_route' => 'competitions_feminine', '_controller' => 'App\\Controller\\CompetitionController::feminine'], null, null, null, false, false, null]],
        '/competition/masculine' => [[['_route' => 'competitions_masculine', '_controller' => 'App\\Controller\\CompetitionController::masculine'], null, null, null, false, false, null]],
        '/contact' => [[['_route' => 'contact', '_controller' => 'App\\Controller\\ContactController::index'], null, null, null, false, false, null]],
        '/contact/submit' => [[['_route' => 'contact_submit', '_controller' => 'App\\Controller\\ContactController::submit'], null, ['POST' => 0], null, false, false, null]],
        '/dashboard' => [[['_route' => 'dashboard', '_controller' => 'App\\Controller\\DashboardAdherentController::index'], null, null, null, false, false, null]],
        '/espace-adherent' => [[['_route' => 'adherent_dashboard', '_controller' => 'App\\Controller\\DashboardAdherentController::index'], null, ['GET' => 0], null, false, false, null]],
        '/espace-adherent/licence' => [[['_route' => 'adherent_edit_license', '_controller' => 'App\\Controller\\DashboardAdherentController::editLicense'], null, ['POST' => 0], null, false, false, null]],
        '/espace-adherent/licence/remove' => [[['_route' => 'adherent_remove_license', '_controller' => 'App\\Controller\\DashboardAdherentController::removeLicense'], null, ['POST' => 0], null, false, false, null]],
        '/compte/change-password' => [[['_route' => 'change_password', '_controller' => 'App\\Controller\\DashboardAdherentController::changePassword'], null, ['POST' => 0], null, false, false, null]],
        '/profile/delete-account' => [[['_route' => 'profile_delete_account', '_controller' => 'App\\Controller\\DashboardAdherentController::deleteAccount'], null, ['POST' => 0], null, false, false, null]],
        '/api/user/update-settings' => [[['_route' => 'api_user_update_settings', '_controller' => 'App\\Controller\\DashboardAdherentController::updateSettings'], null, ['POST' => 0], null, false, false, null]],
        '/api/user/toggle-2fa' => [[['_route' => 'api_user_toggle_2fa', '_controller' => 'App\\Controller\\DashboardAdherentController::toggle2FA'], null, ['POST' => 0], null, false, false, null]],
        '/ecole' => [[['_route' => 'ecole', '_controller' => 'App\\Controller\\EcoleController::index'], null, null, null, false, false, null]],
        '/faq' => [[['_route' => 'faq', '_controller' => 'App\\Controller\\FaqController::index'], null, null, null, false, false, null]],
        '/connect/google' => [[['_route' => 'oauth_google_start', '_controller' => 'App\\Controller\\GoogleController::connect'], null, null, null, false, false, null]],
        '/connect/google/check' => [[['_route' => 'oauth_google_check', '_controller' => 'App\\Controller\\GoogleController::connectCheck'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/installations/halterophilie' => [[['_route' => 'section_halterophilie', '_controller' => 'App\\Controller\\InstallationController::halterophilie'], null, null, null, false, false, null]],
        '/installations/musculation' => [[['_route' => 'section_musculation', '_controller' => 'App\\Controller\\InstallationController::jambes'], null, null, null, false, false, null]],
        '/licence/add' => [[['_route' => 'add_licence', '_controller' => 'App\\Controller\\LicenceController::add'], null, ['POST' => 0], null, false, false, null]],
        '/licence/delete' => [[['_route' => 'delete_licence', '_controller' => 'App\\Controller\\LicenceController::delete'], null, ['POST' => 0], null, false, false, null]],
        '/halterophilie' => [[['_route' => 'halterophilie', '_controller' => 'App\\Controller\\MenuDropdownController::halterophilie'], null, null, null, false, false, null]],
        '/musculation' => [
            [['_route' => 'musculation', '_controller' => 'App\\Controller\\MenuDropdownController::musculation'], null, null, null, false, false, null],
            [['_route' => 'pratique_musculation', '_controller' => 'App\\Controller\\NosPratiquesController::musculation'], null, null, null, false, false, null],
        ],
        '/cours-collectifs' => [[['_route' => 'cours_collectifs', '_controller' => 'App\\Controller\\MenuDropdownController::coursCollectifs'], null, null, null, false, false, null]],
        '/seance-essai' => [[['_route' => 'seance_essai', '_controller' => 'App\\Controller\\MenuDropdownController::seanceEssai'], null, null, null, false, false, null]],
        '/evenements' => [[['_route' => 'evenements', '_controller' => 'App\\Controller\\MenuDropdownController::evenements'], null, null, null, false, false, null]],
        '/sauna' => [[['_route' => 'sauna', '_controller' => 'App\\Controller\\MenuDropdownController::sauna'], null, null, null, false, false, null]],
        '/president' => [[['_route' => 'president', '_controller' => 'App\\Controller\\MenuDropdownController::president'], null, null, null, false, false, null]],
        '/tresorier' => [[['_route' => 'tresorier', '_controller' => 'App\\Controller\\MenuDropdownController::tresorier'], null, null, null, false, false, null]],
        '/secretaire' => [[['_route' => 'secretaire', '_controller' => 'App\\Controller\\MenuDropdownController::secretaire'], null, null, null, false, false, null]],
        '/membres-bureau' => [[['_route' => 'membres_bureau', '_controller' => 'App\\Controller\\MenuDropdownController::membresBureau'], null, null, null, false, false, null]],
        '/app-club' => [[['_route' => 'app_club', '_controller' => 'App\\Controller\\MenuDropdownController::appClub'], null, null, null, false, false, null]],
        '/labels-club' => [[['_route' => 'labels_club', '_controller' => 'App\\Controller\\MenuDropdownController::labelsClub'], null, null, null, false, false, null]],
        '/horaires' => [[['_route' => 'horaires', '_controller' => 'App\\Controller\\MenuDropdownController::horaires'], null, null, null, false, false, null]],
        '/newsletter' => [[['_route' => 'newsletter_subscribe', '_controller' => 'App\\Controller\\NewsletterController::subscribe'], null, ['POST' => 0], null, false, false, null]],
        '/haltérophilie' => [[['_route' => 'pratique_haltérophilie', '_controller' => 'App\\Controller\\NosPratiquesController::halterophilie'], null, null, null, false, false, null]],
        '/devenir-partenaire' => [[['_route' => 'app_partenaire', '_controller' => 'App\\Controller\\PartenaireController::index'], null, null, null, false, false, null]],
        '/set-password' => [[['_route' => 'set_password', '_controller' => 'App\\Controller\\PasswordController::setPassword'], null, null, null, false, false, null]],
        '/tarifs' => [[['_route' => 'app_pricing', '_controller' => 'App\\Controller\\PricingController::index'], null, null, null, false, false, null]],
        '/profil/photo' => [[['_route' => 'profile_photo', '_controller' => 'App\\Controller\\ProfileController::uploadProfilePhoto'], null, ['POST' => 0], null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, ['POST' => 0], null, false, false, null]],
        '/reset-password' => [[['_route' => 'app_reset_password_request', '_controller' => 'App\\Controller\\ResetPasswordController::request'], null, ['POST' => 0], null, false, false, null]],
        '/api/reset-password-final' => [[['_route' => 'app_reset_password_final', '_controller' => 'App\\Controller\\ResetPasswordController::resetPasswordFinal'], null, ['POST' => 0], null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/verify/code' => [[['_route' => 'app_verify_code', '_controller' => 'App\\Controller\\VerifyCodeController::verifyCode'], null, ['POST' => 0], null, false, false, null]],
        '/verify/code/resend' => [[['_route' => 'app_resend_code', '_controller' => 'App\\Controller\\VerifyCodeController::resendCode'], null, ['GET' => 0], null, false, false, null]],
        '/mentions-legales' => [[['_route' => 'app_legal', '_controller' => 'App\\Controller\\PageController::legal'], null, null, null, false, false, null]],
        '/confidentialite' => [[['_route' => 'app_privacy', '_controller' => 'App\\Controller\\PageController::privacy'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/qr\\-code/([^/]++)/([\\w\\W]+)(*:35)'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:70)'
                .'|/a(?'
                    .'|ctualites(?:/(\\d+))?(*:102)'
                    .'|rticle/([^/]++)(*:125)'
                    .'|dmin/(?'
                        .'|a(?'
                            .'|thlete/([^/]++)/(?'
                                .'|edit(*:168)'
                                .'|delete(*:182)'
                            .')'
                            .'|rticles/([^/]++)/(?'
                                .'|delete(*:217)'
                                .'|edit(*:229)'
                            .')'
                        .')'
                        .'|c(?'
                            .'|lub\\-info/(?'
                                .'|edit/([^/]++)(*:269)'
                                .'|delete/([^/]++)(*:292)'
                            .')'
                            .'|o(?'
                                .'|mpetitions/(?'
                                    .'|edit/([^/]++)(*:332)'
                                    .'|delete/([^/]++)(*:355)'
                                .')'
                                .'|ntact/([^/]++)/reply(*:384)'
                            .')'
                        .')'
                        .'|event/([^/]++)/(?'
                            .'|edit(*:416)'
                            .'|delete(*:430)'
                        .')'
                        .'|forfaits/([^/]++)(?'
                            .'|/edit(*:464)'
                            .'|(*:472)'
                        .')'
                        .'|licences/(?'
                            .'|([^/]++)(?'
                                .'|/edit(*:509)'
                                .'|(*:517)'
                            .')'
                            .'|forfait/([^/]++)/avantages(*:552)'
                        .')'
                        .'|machines/(?'
                            .'|edit/([^/]++)(*:586)'
                            .'|delete/([^/]++)(*:609)'
                        .')'
                        .'|p(?'
                            .'|roduits/([^/]++)/(?'
                                .'|edit(*:646)'
                                .'|delete(*:660)'
                            .')'
                            .'|ages/([^/]++)/(?'
                                .'|edit(*:690)'
                                .'|delete(*:704)'
                            .')'
                        .')'
                        .'|security/blocklist/(?'
                            .'|unlock/([^/]++)(*:751)'
                            .'|ban\\-ip/([^/]++)(*:775)'
                        .')'
                        .'|users/([^/]++)/(?'
                            .'|edit(*:806)'
                            .'|delete(*:820)'
                        .')'
                        .'|backups/d(?'
                            .'|ownload/([^/]++)(*:857)'
                            .'|elete/([^/]++)(*:879)'
                        .')'
                    .')'
                    .'|thlete/([^/]++)(*:904)'
                    .'|uth/modal/([^/]++)(*:930)'
                .')'
                .'|/events/([^/]++)/(?'
                    .'|register(*:967)'
                    .'|unregister(*:985)'
                .')'
                .'|/newsletter/(?'
                    .'|confirm/([^/]++)(*:1025)'
                    .'|unsubscribe/([^/]++)(*:1054)'
                .')'
                .'|/pa(?'
                    .'|ge/([^/]++)(*:1081)'
                    .'|iement/([^/]++)(*:1105)'
                .')'
                .'|/reset\\-password/([^/]++)(*:1140)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => 'qr_code_generate', '_controller' => 'Endroid\\QrCodeBundle\\Controller\\GenerateController'], ['builder', 'data'], null, null, false, true, null]],
        70 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        102 => [[['_route' => 'actualites', 'page' => '1', '_controller' => 'App\\Controller\\ActualitesController::index'], ['page'], null, null, false, true, null]],
        125 => [[['_route' => 'article_show', '_controller' => 'App\\Controller\\ActualitesController::show'], ['id'], null, null, false, true, null]],
        168 => [[['_route' => 'admin_athlete_edit', '_controller' => 'App\\Controller\\Admin\\AdminAthleteController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        182 => [[['_route' => 'admin_athlete_delete', '_controller' => 'App\\Controller\\Admin\\AdminAthleteController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        217 => [[['_route' => 'admin_articles_delete', '_controller' => 'App\\Controller\\Admin\\ArticleAdminController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        229 => [[['_route' => 'admin_articles_edit', '_controller' => 'App\\Controller\\Admin\\ArticleAdminController::edit'], ['id'], null, null, false, false, null]],
        269 => [[['_route' => 'admin_clubinfo_edit', '_controller' => 'App\\Controller\\Admin\\AdminClubInfoController::edit'], ['id'], null, null, false, true, null]],
        292 => [[['_route' => 'admin_clubinfo_delete', '_controller' => 'App\\Controller\\Admin\\AdminClubInfoController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        332 => [[['_route' => 'admin_competition_edit', '_controller' => 'App\\Controller\\Admin\\CompetitionAdminController::edit'], ['id'], null, null, false, true, null]],
        355 => [[['_route' => 'admin_competition_delete', '_controller' => 'App\\Controller\\Admin\\CompetitionAdminController::delete'], ['id'], null, null, false, true, null]],
        384 => [[['_route' => 'admin_contact_reply', '_controller' => 'App\\Controller\\Admin\\ContactAdminController::reply'], ['id'], ['POST' => 0], null, false, false, null]],
        416 => [[['_route' => 'admin_event_edit', '_controller' => 'App\\Controller\\Admin\\AdminEventController::edit'], ['id'], null, null, false, false, null]],
        430 => [[['_route' => 'admin_event_delete', '_controller' => 'App\\Controller\\Admin\\AdminEventController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        464 => [[['_route' => 'admin_forfait_edit', '_controller' => 'App\\Controller\\Admin\\AdminForfaitController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        472 => [[['_route' => 'admin_forfait_delete', '_controller' => 'App\\Controller\\Admin\\AdminForfaitController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        509 => [[['_route' => 'admin_licence_edit', '_controller' => 'App\\Controller\\Admin\\AdminLicenceController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        517 => [[['_route' => 'admin_licence_delete', '_controller' => 'App\\Controller\\Admin\\AdminLicenceController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        552 => [[['_route' => 'admin_licence_forfait_avantages', '_controller' => 'App\\Controller\\Admin\\AdminLicenceController::getForfaitAvantages'], ['id'], ['GET' => 0], null, false, false, null]],
        586 => [[['_route' => 'admin_machine_edit', '_controller' => 'App\\Controller\\Admin\\AdminMachineController::edit'], ['id'], null, null, false, true, null]],
        609 => [[['_route' => 'admin_machine_delete', '_controller' => 'App\\Controller\\Admin\\AdminMachineController::delete'], ['id'], null, null, false, true, null]],
        646 => [[['_route' => 'admin_product_edit', '_controller' => 'App\\Controller\\Admin\\AdminProduitController::edit'], ['id'], null, null, false, false, null]],
        660 => [[['_route' => 'admin_product_delete', '_controller' => 'App\\Controller\\Admin\\AdminProduitController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        690 => [[['_route' => 'admin_pages_edit', '_controller' => 'App\\Controller\\Admin\\PageAdminController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        704 => [[['_route' => 'admin_pages_delete', '_controller' => 'App\\Controller\\Admin\\PageAdminController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        751 => [[['_route' => 'admin_security_unlock_user', '_controller' => 'App\\Controller\\Admin\\AdminSecurityController::unlockUser'], ['id'], null, null, false, true, null]],
        775 => [[['_route' => 'admin_security_ban_ip', '_controller' => 'App\\Controller\\Admin\\AdminSecurityController::banIp'], ['ip'], null, null, false, true, null]],
        806 => [[['_route' => 'admin_users_edit', '_controller' => 'App\\Controller\\Admin\\AdminUsersController::edit'], ['id'], null, null, false, false, null]],
        820 => [[['_route' => 'admin_users_delete', '_controller' => 'App\\Controller\\Admin\\AdminUsersController::delete'], ['id'], null, null, false, false, null]],
        857 => [[['_route' => 'admin_backups_download', '_controller' => 'App\\Controller\\Admin\\BackupController::download'], ['filename'], null, null, false, true, null]],
        879 => [[['_route' => 'admin_backups_delete', '_controller' => 'App\\Controller\\Admin\\BackupController::delete'], ['filename'], null, null, false, true, null]],
        904 => [[['_route' => 'athlete_show', '_controller' => 'App\\Controller\\CompetitionController::showAthlete'], ['id'], null, null, false, true, null]],
        930 => [[['_route' => 'app_auth_modal', '_controller' => 'App\\Controller\\ModalController::modal'], ['view'], null, null, false, true, null]],
        967 => [[['_route' => 'event_register', '_controller' => 'App\\Controller\\DashboardAdherentController::registerEvent'], ['id'], ['POST' => 0], null, false, false, null]],
        985 => [[['_route' => 'event_unregister', '_controller' => 'App\\Controller\\DashboardAdherentController::unregisterEvent'], ['id'], ['POST' => 0], null, false, false, null]],
        1025 => [[['_route' => 'newsletter_confirm', '_controller' => 'App\\Controller\\NewsletterController::confirm'], ['token'], null, null, false, true, null]],
        1054 => [[['_route' => 'newsletter_unsubscribe', '_controller' => 'App\\Controller\\NewsletterController::unsubscribeByToken'], ['token'], ['GET' => 0], null, false, true, null]],
        1081 => [[['_route' => 'page_show', '_controller' => 'App\\Controller\\PageController::show'], ['slug'], null, null, false, true, null]],
        1105 => [[['_route' => 'paiement_type', '_controller' => 'App\\Controller\\PaiementController::paiement'], ['type'], null, null, false, true, null]],
        1140 => [
            [['_route' => 'app_reset_password', '_controller' => 'App\\Controller\\ResetPasswordController::redirectToModal'], ['token'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];

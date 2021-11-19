<?php

/**
 * offlinehandler Addon.
 *
 * @author Giacomo Barbalinardo
 *
 * @var rex_addon
 */
if (!rex::isBackend()) {
    rex_extension::register('PACKAGES_INCLUDED', function () {
        if (rex_article::getCurrent() instanceof rex_article && rex_article::getCurrent()->getValue('status') == 0 && !rex_backend_login::hasSession()) {

            if (rex_article::getCurrent(rex_clang::getStartId())->getValue('status') == 0) {
                if (rex_article::getCurrentId() === rex_article::getNotfoundArticleId()) {
                    return;
                }

                rex_redirect(rex_article::getNotfoundArticleId(), rex_clang::getCurrentId());
            }
        }
    }, rex_extension::LATE);
}

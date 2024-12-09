<?php

namespace Opinionstage\Infrastructure;

defined( 'ABSPATH' ) || die();

use Opinionstage\Core\Module;

class SettingsPageACF {
    
    use Module;
    
    // todo - move constants somewhere
    CONST FIELD_NAME_TEST_ARCHIVE_PAGE_GROUP = 'test_archive_page';
    CONST FIELD_NAME_SENDY = 'sveakbt_tests_sendy';

    public function init() {
        
    }

}

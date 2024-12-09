<?php

namespace Opinionstage\Infrastructure;

defined( 'ABSPATH' ) || die();

use Opinionstage\Core\Provider;


/**
 * Class ModulesProvider
 *
 * @package Opinionstage\Modules
 */
final class InfrastructureProvider {

    use Provider;

    /**
     * Instantiate modules
     *
     * @return array
     */
    protected function get_modules() {
        return [
//            SettingsPageACF::class,
        ];
    }
}

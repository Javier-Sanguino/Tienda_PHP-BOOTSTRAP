<?php return array(
    'root' => array(
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'type' => 'project',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'reference' => NULL,
        'name' => 'js_creations/tienda_php',
        'dev' => true,
    ),
    'versions' => array(
        'js_creations/tienda_php' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'type' => 'project',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'reference' => NULL,
            'dev_requirement' => false,
        ),
        'twbs/bootstrap' => array(
            'pretty_version' => 'v5.1.0',
            'version' => '5.1.0.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../twbs/bootstrap',
            'aliases' => array(),
            'reference' => 'f20fece3a8cdd0e76a42c2737524b7652bf54d26',
            'dev_requirement' => false,
        ),
        'twitter/bootstrap' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => 'v5.1.0',
            ),
        ),
    ),
);

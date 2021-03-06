<?php

/*
 * This file is part of Laravel Algolia.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vinkla\Algolia\Factories;

use AlgoliaSearch\Client;

/**
 * This is the Algolia factory class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class AlgoliaFactory
{
    /**
     * Make a new Algolia client.
     *
     * @param array $config
     *
     * @return \AlgoliaSearch\Client
     */
    public function make(array $config)
    {
        $config = $this->getConfig($config);

        return new Client($config['id'], $config['key']);
    }

    /**
     * Get the configuration data.
     *
     * @param string[] $config
     *
     * @throws \InvalidArgumentException
     *
     * @return array
     */
    protected function getConfig(array $config)
    {
        $keys = ['id', 'key'];

        foreach ($keys as $key) {
            if (!array_key_exists($key, $config)) {
                throw new \InvalidArgumentException(
                    'The Algolia client requires authentication.'
                );
            }
        }

        return array_only($config, $keys);
    }
}

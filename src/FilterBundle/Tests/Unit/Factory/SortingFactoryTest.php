<?php

namespace BestIt\Commercetools\FilterBundle\Tests\Unit\Factory;

use BestIt\Commercetools\FilterBundle\Factory\SortingFactory;
use BestIt\Commercetools\FilterBundle\Model\Search\SearchConfig;
use BestIt\Commercetools\FilterBundle\Model\Search\SearchContext;
use PHPUnit\Framework\TestCase;

/**
 * Test for sorting factory
 *
 * @author     chowanski <chowanski@bestit-online.de>
 * @category   Tests\Unit
 * @package    BestIt\Commercetools\FilterBundle
 * @subpackage Factory
 * @version    $id$
 */
class SortingFactoryTest extends TestCase
{
    /**
     * The sorting factory
     *
     * @var SortingFactory
     */
    private $fixture;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->fixture = new SortingFactory();
    }

    /**
     * Test create method with active sort
     *
     * @return void
     */
    public function testCreateWithActiveSort()
    {
        $context = new SearchContext(
            [
                'config' => new SearchConfig(
                    [
                        'sortings' => [
                            'name_asc' => [
                                'translation' => 'name.asc',
                                'query' => 'name.de asc'
                            ],
                            'price_asc' => [
                                'translation' => 'price.asc',
                                'query' => 'price asc'
                            ],
                            'name_desc' => [
                                'translation' => 'name.desc',
                                'query' => 'name.de desc'
                            ]
                        ],
                        'defaultSorting' => 'price_asc'
                    ]
                ),
                'sorting' => 'name_desc'
            ]
        );

        $sortingCollection = $this->fixture->create($context);

        $active = $sortingCollection->getActive();
        static::assertEquals('name_desc', $active->getKey());
        static::assertEquals('name.de desc', $active->getQuery());
        static::assertEquals('name.desc', $active->getLabel());
    }

    /**
     * Test create method with all value
     *
     * @return void
     */
    public function testCreateWithAllValues()
    {
        $context = new SearchContext(
            [
                'config' => new SearchConfig(
                    [
                        'sortings' => [
                            'name_asc' => [
                                'translation' => 'name.asc',
                                'query' => 'name.de asc'
                            ],
                            'price_asc' => [
                                'translation' => 'price.asc',
                                'query' => 'price asc'
                            ],
                            'name_desc' => [
                                'translation' => 'name.desc',
                                'query' => 'name.de desc'
                            ]
                        ],
                        'defaultSorting' => 'price_asc'
                    ]
                ),
                'sorting' => 'foo'
            ]
        );

        $sortingCollection = $this->fixture->create($context);

        $all = $sortingCollection->all();
        static::assertEquals('name_asc', $all['name_asc']->getKey());
        static::assertEquals('name.de asc', $all['name_asc']->getQuery());
        static::assertEquals('name.asc', $all['name_asc']->getLabel());
    }

    /**
     * Test create method with default value
     *
     * @return void
     */
    public function testCreateWithDefaultValues()
    {
        $context = new SearchContext(
            [
                'config' => new SearchConfig(
                    [
                        'sortings' => [
                            'name_asc' => [
                                'translation' => 'name.asc',
                                'query' => 'name.de asc'
                            ],
                            'price_asc' => [
                                'translation' => 'price.asc',
                                'query' => 'price asc'
                            ],
                            'name_desc' => [
                                'translation' => 'name.desc',
                                'query' => 'name.de desc'
                            ]
                        ],
                        'defaultSorting' => 'price_asc'
                    ]
                ),
                'sorting' => 'foo'
            ]
        );

        $sortingCollection = $this->fixture->create($context);

        $active = $sortingCollection->getActive();
        static::assertEquals('price_asc', $active->getKey());
        static::assertEquals('price asc', $active->getQuery());
        static::assertEquals('price.asc', $active->getLabel());

        $default = $sortingCollection->getDefault();
        static::assertEquals('price_asc', $default->getKey());
        static::assertEquals('price asc', $default->getQuery());
        static::assertEquals('price.asc', $default->getLabel());
    }
}

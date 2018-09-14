<?php
/**
 * Created by PhpStorm.
 * User: tuong-linux
 * Date: 13/09/2018
 * Time: 10:35
 */
namespace Magenest\Movie\Setup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        // TODO: Implement install() method.
        $installer = $setup;
        $installer->startSetup();

        $table_director = $installer->getConnection()->newTable(
            $installer->getTable('magenest_director')
        )->addColumn(
            'director_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,[
            'identify' => true,
            'unsigned' => true,
            'nullable' =>false,
            'primary' => true
        ], 'director_id'
        )->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            64,[
            'nullable' => false
        ], 'director id'
        );
        $setup->getConnection()->createTable($table_director);

        $table_movie = $installer->getConnection()->newTable(
            $installer->getTable('magenest_movie')
        )->addColumn(
            'movie_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,[
                'identify' => true, /**identify equals auto_increment*/
                'unsigned' => true,
                'nullable' => false,
                'primary' => true
                ], 'Movie_id'
        )->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            128,[
                'nullable' => false
            ], 'Movie_name'
        )->addColumn(
            'description',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,[
                'nullable' => true
            ], 'Movie_description'
        )->addColumn(
            'rating',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            1,[
                'nullable' => true
            ], 'Movie_rating'
        )->addColumn(
            'director_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,[
            'identify' => true,
            'unsigned' => true,
            'nullable' => false,
        ], 'director_id'
        )->addForeignKey(
            $installer->getFkName(
                'magenest_movie',
                'director_id',
                'magenest_director',
                'director_id'
            ), 'director_id',
            $installer->getTable('magenest_director'),
            'director_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        );
        $setup->getConnection()->createTable($table_movie);


        $table_actor = $installer->getConnection()->newTable(
            $installer->getTable('magenest_actor')
        )->addColumn(
            'actor_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,[
            'identify' => true,
            'unsigned' => true,
            'nullable' =>false,
            'primary' => true
        ], 'actor_id'
        )->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            64,[
                'nullable' => false
            ], 'actor id'
        );
        $setup->getConnection()->createTable($table_actor);


        $table_movie_director = $installer->getConnection()->newTable(
            $installer->getTable('magenest_movie_actor')
        )->addColumn(
            'movie_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,[
            'unsigned' => true,
            'nullable' =>false,
            'primary' => true
        ], 'Movie_rating'
        )->addColumn(
            'actor_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,[
            'unsigned' => true,
            'nullable' =>false,
            'primary' => true
        ], 'Movie_rating'
        )->addForeignKey(
            $installer->getFkName(
                'magenest_movie_actor',
                'movie_id',
                'magenest_movie',
                'movie_id'
            ), 'movie_id',
            $installer->getTable('magenest_movie'),
            'movie_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        )->addForeignKey(
            $installer->getFkName(
                'magenest_movie_actor',
                'actor_id',
                'magenest_actor',
                'actor_id'
            ), 'actor_id',
            $installer->getTable('magenest_actor'),
            'actor_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        );


        $setup->getConnection()->createTable($table_movie_director);
        $installer->endSetup();

    }
}
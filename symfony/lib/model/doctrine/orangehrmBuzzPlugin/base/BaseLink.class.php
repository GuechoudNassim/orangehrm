<?php

/**
 * BaseLink
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property int     $id                         Type: integer, primary key
 * @property int     $post_id                    Type: integer
 * @property string  $link                       Type: string
 * @property int     $type                       Type: integer
 * @property string  $title                      Type: string
 * @property string  $description                Type: string
 * @property Post    $LinkAttached               
 *  
 * @method int       getId()                     Type: integer, primary key
 * @method int       getPostId()                 Type: integer
 * @method string    getLink()                   Type: string
 * @method int       getType()                   Type: integer
 * @method string    getTitle()                  Type: string
 * @method string    getDescription()            Type: string
 * @method Post      getLinkAttached()           
 *  
 * @method Link      setId(int $val)             Type: integer, primary key
 * @method Link      setPostId(int $val)         Type: integer
 * @method Link      setLink(string $val)        Type: string
 * @method Link      setType(int $val)           Type: integer
 * @method Link      setTitle(string $val)       Type: string
 * @method Link      setDescription(string $val) Type: string
 * @method Link      setLinkAttached(Post $val)  
 *  
 * @package    orangehrm
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseLink extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ohrm_buzz_link');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => '',
             ));
        $this->hasColumn('post_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '',
             ));
        $this->hasColumn('link', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '',
             ));
        $this->hasColumn('type', 'integer', null, array(
             'type' => 'integer',
             'length' => '',
             ));
        $this->hasColumn('title', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Post as LinkAttached', array(
             'local' => 'post_id',
             'foreign' => 'id'));
    }
}
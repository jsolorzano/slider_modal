<?php
class CmsPages extends ObjectModel {

	/** @var int id_lang */
	public $id_lang;

	/** @var int id_shop */
	public $id_shop;

	/** @var string meta_title */
	public $meta_title;

	/** @var string head_seo_title */
	public $head_seo_title;

	/** @var string meta_description */
	public $meta_description;

	/** @var string meta_keywords */
	public $meta_keywords;

	/** @var string content */
	public $content;

	/** @var string link_rewrite */
	public $link_rewrite;

	/**
	* Définition des paramètres de la classe
	*/
	public static $definition = array(
		'table' => 'cms_lang',
		'primary' => 'id_cms',
		'fields' => array(
			'id_lang' => array('type' => self::TYPE_INT, 'required' => TRUE),
			'id_shop' => array('type' => self::TYPE_INT, 'required' => TRUE),
			'meta_title' => array('type' => self::TYPE_STRING, 'required' => TRUE),
			'head_seo_title' => array('type' => self::TYPE_STRING),
			'meta_description' => array('type' => self::TYPE_STRING),
			'meta_keywords' => array('type' => self::TYPE_STRING),
			'content' => array('type' => self::TYPE_STRING),
			'link_rewrite' => array('type' => self::TYPE_STRING, 'required' => TRUE),
		),
	);

	/** @var array $webserviceParameters Web service parameters */
	protected $webserviceParameters = array(
		'objectsNodeName' => 'cms_pages',
	);

	public function messageTest()
	{
		return "Otro mensaje de prueba.";
	}
 
}

?>

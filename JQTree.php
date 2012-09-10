<?php
Yii::import('system.web.widgets.CTreeView');
class JQTree extends CTreeView
{
	public $dragAndDrop;
	public $selectable;
	public $saveState;
	public $dataUrl;
	public $autoOpen;
	public $autoEscape;

	public $onCanSelectNode;
	public $onCreateLi;
	public $onIsMoveHandle;
	public $onCanMove;
	public $onCanMoveTo;



	public function init()
	{
		if(isset($this->htmlOptions['id']))
			$id=$this->htmlOptions['id'];
		else
			$id=$this->htmlOptions['id']=$this->getId();
		if($this->url!==null)
			$this->url=CHtml::normalizeUrl($this->url);
		$cs=Yii::app()->getClientScript();

		//$cs->registerCoreScript('treeview');
		$baseUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.yii-jqTree.source'));
		$cs->registerScriptFile($baseUrl . '/tree.jquery.js');

		$options=$this->getClientOptions();
		$options=$options===array()?'{}' : CJavaScript::encode($options);


		$cs->registerScript('Yii.JQTree#0'.$id, "if (jQuery.jqTree == undefined) {jQuery.jqTree = new Array;}");
		$cs->registerScript('Yii.JQTree#'.$id, "jQuery.jqTree[\"{$id}\"] = jQuery(\"#{$id}\").tree($options);");
		if($this->cssFile===null)
			$cs->registerCssFile($baseUrl .'/jqtree.css');
		else if($this->cssFile!==false)
			$cs->registerCssFile($this->cssFile);

		echo CHtml::tag('ul',$this->htmlOptions,false,false)."\n";
	}

		/**
	 * @return array the javascript options
	 */
	protected function getClientOptions()
	{
		$options=$this->options;
		$availableOptions = array('data', 'id', 'dragAndDrop', 'saveState', 'dataUrl', 'autoOpen', 'selectable', 'autoEscape',
			'onCanSelectNode','onCreateLi','onIsMoveHandle','onCanMove', 'onCanMoveTo');

		foreach($availableOptions as $name)
		{
			if($this->$name!==null)
				$options[$name]=$this->$name;
		}
		return $options;
	}
}

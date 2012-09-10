yii-jqTree
==========

alternative JS tree for yii framework, with drag-n-drop. Implements jQuery plugin jqTree: http://mbraak.github.com/jqTree/

Usage:
```php
<?php
  $dataTree = array(
    array(
  		'label' => 'node1',
  		'children' => array(
  			array('label' => 'child1'),
  			array('label' => 'child2'),
  		),
  	),
  	array(
  		'label' => 'node2',
  	)
  );

  $this->widget('ext.yii-jqTree.JQTree', array(
  	'id' => 'treeview',
  	'data' => $dataTree,
  	'dragAndDrop' => true,
  	'selectable' => true,
  	'saveState' => true,
  	'autoOpen' => false,
  	'htmlOptions' => array(
  		'class' => 'treeview-red',
  	),
  ));
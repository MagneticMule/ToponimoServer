<?php
/*
  $this->breadcrumbs=array(
  'Places'=>array('index'),
  $model->name,
  );
 */

$this->menu = array(
    array('label' => 'List Place', 'url' => array('index')),
    array('label' => 'Create Place', 'url' => array('create')),
    array('label' => 'Update Place', 'url' => array('update', 'id' => $model->_id)),
    array('label' => 'Delete Place', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->_id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Place', 'url' => array('admin')),
);
?>

<div id="address_holder">
    <div id="address_header"><?php echo $model->name; ?></div>
    <div id="address_body"><?php echo $model->vicinity; ?></div>
    <div id ="address_type">
        <?php
        $vars = new CActiveDataProvider(Type::model()->getPlaceTypes($model->placeid));
        foreach ($vars->getData() as $val) {
            if ($val->type != 'establishment') {
                echo $val->type . " ";
            }
        }
        ?>
    </div>
</div>

<?php
/**
 * Google Map Setup and Display
 */
Yii::import('ext.jquery-gmap.*');
$gmap = new EGmap3Widget();
$gmap->setSize(749, 250);
$options = new EGmap3MapOptions();
$options->scaleControl = false;
$options->streetViewControl = false;
$options->zoom = 17;
$options->mapTypeId = EGmap3MapTypeId::ROADMAP;
$zoomOptions = new EGmap3ZoomControlOptions();
$zoomOptions->style = EGmap3ZoomControlStyle::SMALL;
$zoomOptions->position = EGmap3ControlPosition::LEFT_TOP;
$options->zoomControlOptions = $zoomOptions;
$marker = new EGmap3Marker(array('title' => $model->name));
$marker->latLng = array($model->latitude, $model->longitude);
// center the map on the marker
$marker->centerOnMap();
$gmap->add($marker);
$gmap->setOptions($options);
echo '<div id="mapcontainer">';
$gmap->renderMap();
echo '</div>';
?>

<?php
/* construct query to extract words using ID as common key */

$words = Word::model()->getArrayWords($model->placeid);
$words = array_merge($words, Wordenglish::model()->getArrayDictionaryWords($model->placeid));

if ($words != null) {
    echo '<div id="dataheaderrounded"><h1>Words</h1></div>';
    foreach ($words as $word) {
        echo '<div id="wordcontainer"><div id="wordtitle">' . ucfirst($word) . '</div>';
        echo '<div id="ratingform">';
        $this->widget('bootstrap.widgets.BootButton', array(
            'label' => 'Add to Word Bank',
            'type' => 'info', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'size' => 'mini', // '', 'large', 'small' or 'mini'
        ));

        echo '</div><div id="wordheader"><div id="definitiontext">';
        $defcount = 1;
        $wordno = new CActiveDataProvider(WordnetWord::model()->getWordNumber($word));
        foreach ($wordno->getData() as $d) {
            $synsetno = new CActiveDataProvider(WordnetSense::model()->getSynsetNo($d->wordno));
            foreach ($synsetno->getData() as $syn) {
                $definition = new CActiveDataProvider(WordnetSynset::model()->getDefinition($syn->synsetno));
                foreach ($definition->getData() as $def) {
                    echo $defcount . ') ' . ucfirst($def->definition) . '<br />';
                    $defcount++;
                }
            }
        }

        echo '</div></div></div>';
    }
}
?>

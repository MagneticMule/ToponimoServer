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

Bookmark
<h1><?php echo $model->name; ?></h1>
<h2><?php echo $model->vicinity; ?></h2>

<?php
$vars = new CActiveDataProvider(Type::model()->getPlaceTypes($model->placeid));
echo '<b>Type: </b>';
foreach ($vars->getData() as $val) {
    if ($val->type != 'establishment') {
        echo $val->type . " ";
    }
}
?>

<?php
/**
 * Google Map Setup and Display
 */
Yii::import('ext.jquery-gmap.*');
$gmap = new EGmap3Widget();
$gmap->setSize(708, 250);
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
echo '</div> <hr/>';
?>

<?php
/* construct query to extract words using ID as common key */

$words = new CActiveDataProvider(Word::model()->getWords($model->placeid));

if ($words->getData() != null) {
    echo '<div id="dataheaderrounded"><h1>Words</h1></div>';
    foreach ($words->getData() as $val) {
        echo '<div id="wordcontainer"><div id="wordtitle">' . ucwords($val->word) . '</div>';
        echo '<div id="ratingform">';
        echo 'Relevancy ';
        echo CHtml::beginForm();
        $this->widget('CStarRating', array(
            'name' => 'relevancy',
            'minRating' => 1,
            'maxRating' => 5,
            'starCount' => 5,
        ));
        echo CHtml::endForm();
        echo '</div><div id="wordheader"><div id="definitiontext">';
        $defcount = 1;
        $wordno = new CActiveDataProvider(WordnetWord::model()->getWordNumber($val->word));
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
    echo '<hr/>';
    echo '<div id="dataheaderrounded"><h1>Phrases</h1></div>';
} else {
    echo '<div id = "wordcontainer"><div id ="wordtitle">No words or phrases at this location yet :(<br/>
        <b>Been here?</b>Why not add some of your own?</div></div>';
}
?>
<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\widgets\Alert;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
AppAsset::register($this);
//$siteInfo = Yii::$app->config->get('siteInfo');
//$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js');
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js');
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <div class="wrap bs-docs-main">
        <?php
        NavBar::begin([
//            'brandLabel' => $siteInfo['siteName']?$siteInfo['siteName']:'DCMS',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'bs-docs-nav',
            ],
        ]);
        $menuItems[] = [
                'label' => 'Сменная выработка',
                'url' => ['/tasks/index']
        ];
//https://github.com/djfly/dcms2/blob/master/views/layouts/main.php
//        if (Yii::$app->user->isGuest) {
//            $menuItems2[] = ['label' => 'Signup', 'url' => ['/site/signup']];
//            $menuItems2[] = ['label' => 'Login', 'url' => ['/site/login']];
//        }
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'encodeLabels' => false,
            'items' => $menuItems,
        ]);
//        echo Nav::widget([
//            'options' => ['class' => 'navbar-nav navbar-right'],
//            'items' => $menuItems2,
//        ]);
        NavBar::end();
        ?>

        <div class="container main">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>

        <footer id="footer" class="mt-auto py-3 bg-light">
            <div class="container">
                <div class="row text-muted">
                    <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
                    <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
                </div>
            </div>
        </footer>

    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>
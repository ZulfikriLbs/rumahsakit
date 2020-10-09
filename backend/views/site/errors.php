<?php
    use yii\helpers\Html;
    $class = 'text-danger';
    if ($exception->statusCode === 404)
        $class = 'text-warning';
?>
<section class="content">
    <div class="error-page">
    <h2 class="headline text-warning"><?= $exception->statusCode ?></h2>

    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle <?= $class ?>"></i> <?= nl2br(Html::encode($message)) ?></h3>

        <p>
        The above error occurred while the Web server was processing your request. Please contact us if you think this is a server error. Thank you.
        Meanwhile, you may <a href="../../index.html">return to dashboard</a> or try using the search form.
        </p>

        
    </div>
    <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
</section>
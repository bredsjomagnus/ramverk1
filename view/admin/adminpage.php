<?php
if (!$app->session->has('user') || $app->session->get('role') != 'admin') {
    $app->response->redirect('login');
}
?>
<!-- <div class="page">
    <div class="row">
        <div class="col-md-2 col-md-offset-1">
            <a href=<?= $app->url->create("accountinfo") ?>>Tillbaka</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <navbar>
                <a href=<?= $app->url->create('adminpagecontent') ?>>Innehåll</a> |
                <a href=<?= $app->url->create('adminpageusers') ?>>Konton</a> |
                <a href=<?= $app->url->create('adminpagewebbshop') ?>>Webbshop</a>
            </navbar>
        </div>
    </div>
</div> -->

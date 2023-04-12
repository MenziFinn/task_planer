<?php  if (session("message")): ?>
    <div class="col-12 grid-margin">
        <div class="card flash-message">
            <div class="card-body">
                <h4 class="<?= session("status") ?> m-0"><?= session("message") ?></h4>
            </div>
        </div>
    </div>
<?php  endif; ?>
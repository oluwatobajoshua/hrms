<!-- src/Template/Element/progress_bar.ctp -->
<div class="progress mb-4">
    <div class="progress-bar bg-success" role="progressbar"
         aria-valuenow="<?= $progress ?>" aria-valuemin="0" aria-valuemax="100"
         style="width: <?= $progress ?>%;">
        <?= $progress ?>% Complete
    </div>
</div>
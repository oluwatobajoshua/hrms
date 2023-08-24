<div class="education row">
    <div class="col-md-3">
        <?= $this->Form->input("education.$index.school", ['label' => 'School', 'class' => 'form-control']) ?>
    </div>
    <div class="col-md-3">
        <?= $this->Form->input("education.$index.degree", ['label' => 'Degree', 'class' => 'form-control']) ?>
    </div>
    <div class="col-md-3">
        <?= $this->Form->input("education.$index.year", ['label' => 'Year', 'class' => 'form-control']) ?>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger remove-education">Remove</button>
    </div>
</div>

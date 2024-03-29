<?php
/**
 * @var $trucks
 * @var $form
 * @var $model
 */
$form = \yii\bootstrap4\ActiveForm::begin([
    'id' => 'ticket-form-dynamic-truck'
]); ?>
    <div id="misc_container-truck">
        <h5>Truck</h5>
        <div id="sub-forms-container_main-truck"></div>
        <?php if (!empty($model)): ?>
            <?php foreach ($model as $index => $mod): ?>
                <div class="form-row sub-form-truck">
                    <div class="form-group col-md-2">
                        <?= $form->field($mod, "[$index]label"); ?>
                    </div>
                    <div class="form-group col-md-2">
                        <?= $form->field($mod, "[$index]quantity")->textInput(['class' => 'quantity-truck form-control']); ?>
                    </div>
                    <div class="form-group col-md-2">
                        <?= $form->field($mod, "[$index]uom")->dropDownList(\app\models\Tickets::getUomOptions(), ['class' => 'uom-truck form-control']); ?>
                    </div>
                    <div class="form-group col-md-2">
                        <?= $form->field($mod, "[$index]rate")->textInput(['readonly' => true, 'class' => 'reg-rate-truck form-control'])->label('Reg rate'); ?>
                    </div>
                    <div class="form-group col-md-2">
                        <?= $form->field($mod, "[$index]total")->textInput(['readonly' => true, 'class' => 'total-truck form-control']); ?>
                    </div>
                    <div class="form-group col-md-2 text-center" style="margin-top: 30px">
                        <button type="button" id="<?= $mod->id ?>" class="btn btn-danger remove-sub-form-truck">X
                        </button>
                        <button type="button" class="btn btn-primary add-sub-form-truck">+</button>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="container" style="margin-top: -20px">
                <div class="form-group row">
                    <label for="inputExample" class="col-sm-8 col-form-label"><b>Sub-Total</b></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" disabled id="trucks-sub_total" value="0">
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="form-group col-md-12 text-right" style="margin-top: 30px">
                <button type="button" class="btn btn-primary add-sub-form-truck">+</button>
            </div>
        <?php endif; ?>
        <?= \yii\bootstrap4\Html::submitButton('Save', ['id' => 'save-dynamic-form-misc-truck', 'style' => 'display: none']); ?>
    </div>
<?php \yii\bootstrap4\ActiveForm::end(); ?>
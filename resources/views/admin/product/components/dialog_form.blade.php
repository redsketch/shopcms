<div class="modal fade" id="product-dialog" role="dialog" aria-labelledby="form-label" aria-hidden="true">
    <div class="modal-dialog  modal-sm">
        <div class="panel panel-primary modal-content">
            <div class="panel-heading modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="panel-title modal-title" id="form-label"> Product Form </h4>
            </div>

            <form method="post">
                <div class="panel-body modal-body">
                    @include('admin.product.components.fields')
                </div>

                <div class="panel-footer modal-footer">
                    <button class="btn btn-primary" data-action="" id="submit">Submit</button>
                    <button class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

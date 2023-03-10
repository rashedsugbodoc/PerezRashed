<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="row">
            <div class="col-md-6">
                <div class="panel">
                    <header class="panel-heading">
                        <?php
                        if (!empty($expense->id))
                            echo lang('pharmacy') . ' ' . lang('edit_expense');
                        else
                            echo lang('pharmacy') . ' ' . lang('add_expense');
                        ?>
                    </header>
                    <div class="panel-body">
                        <?php echo validation_errors(); ?>
                        <form role="form" action="finance/pharmacy/addExpense" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> <?php echo lang('category'); ?> </label>
                                <select class="form-control m-bot15" name="category" value=''>
                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?php echo $category->category; ?>" <?php
                                        if (!empty($expense->category)) {
                                            if ($category->category == $expense->category) {
                                                echo 'selected';
                                            }
                                        }
                                        ?> > <?php echo $category->category; ?> </option>
                                            <?php } ?> 
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> <?php echo lang('amount'); ?> </label>
                                <input type="text" class="form-control" name="amount" id="exampleInputEmail1" value='<?php
                                if (!empty($expense->amount)) {
                                    echo $expense->amount;
                                }
                                ?>' placeholder="<?php echo $settings->currency; ?>">
                            </div>
                            <input type="hidden" name="id" value='<?php
                            if (!empty($expense->id)) {
                                echo $expense->id;
                            }
                            ?>'>
                            <div class="col-md-12 form-group">
                                <button type="submit" name="submit" class="btn btn-primary pull-right"> <?php echo lang('submit'); ?> </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->

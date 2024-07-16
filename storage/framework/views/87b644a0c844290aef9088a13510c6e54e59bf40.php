

<?php $__env->startSection('head'); ?>

    <!-- BEGIN PAGE LEVEL STYLES -->
    <?php echo HTML::style('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css'); ?>

    <?php echo HTML::style('assets/global/plugins/bootstrap-datepicker/css/datepicker3.css'); ?>

    <!-- END PAGE LEVEL STYLES -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainarea'); ?>

    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title" xmlns="http://www.w3.org/1999/html">
        Employee Details
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="<?php echo e(route('admin.employees.index')); ?>">Operator</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="">Edit Operator </a>

            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <div class="clearfix">
    </div>
    <div class="row ">
        <div class="col-md-6 col-sm-6">
            <div class="portlet box purple-wisteria">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-calendar"></i>Personal Details
                    </div>
                    <div class="actions">

                        <a href="javascript:;" onclick="UpdateDetails('<?php echo $employee->employeeID; ?>','personal')"
                           class="btn btn-sm btn-default ">
                            <i class="fa fa-save"></i> Save </a>
                    </div>
                </div>


                <div class="portlet-body">
                    <div id="personal_alert"></div>

                    

                    <?php echo Form::open(['method' => 'PUT','route'=> ['admin.employees.update', $employee->employeeID],'class' =>
                    'form-horizontal','id' => 'personal_details_form','files'=>true]); ?>

                    <input type="hidden" name="updateType" class="form-control" value="personalInfo">
                    <?php if(Session::get('successPersonal')): ?>
                        <div class="alert alert-success"><i
                                class="fa fa-check"></i> <?php echo Session::get('successPersonal'); ?>

                        </div>
                    <?php endif; ?>


                    <?php if(Session::get('errorPersonal')): ?>

                        <div class="alert alert-danger alert-dismissable ">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <?php $__currentLoopData = Session::get('errorPersonal'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p><strong><i class="fa fa-warning"></i></strong> <?php echo e($error); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>

                    <div class="form-body">
                        <div class="form-group ">
                            <label class="control-label col-md-3">Photo</label>
                            <div class="col-md-9">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="<?php echo e($employee->profile_image_url); ?>"/>
                                        <input type="hidden" name="hiddenImage" value="<?php echo e($employee->profileImage); ?>">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail">
                                    </div>
                                    <div>
                                    <span class="btn default btn-file">
                                        <span class="fileinput-new">
                                            Select image </span>
                                        <span class="fileinput-exists">
                                            Change </span>
                                        <input type="file" name="profileImage">
                                    </span>
                                        <a href="#" class="btn btn-sm red fileinput-exists" data-dismiss="fileinput">
                                            Remove </a>
                                    </div>
                                </div>

                                <div class="clearfix margin-top-10">
                                <span class="label label-danger">
                                    NOTE! </span> Image Size must be (378px by 496px)

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Name<span class="required">* </span></label>
                            <div class="col-md-9">
                                <input type="text" name="fullName" class="form-control" value="<?php echo e($employee->fullName); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Father's Name</label>
                            <div class="col-md-9">
                                <input type="text" name="fatherName" class="form-control"
                                       value="<?php echo e($employee->fatherName); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Date of Birth</label>
                            <div class="col-md-3">
                                <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy"
                                     data-date-viewmode="years">
                                    <input type="text" class="form-control" name="date_of_birth" readonly
                                           value="<?php if(empty($employee->date_of_birth)): ?><?php else: ?><?php echo e(date('d-m-Y',strtotime($employee->date_of_birth))); ?><?php endif; ?>">
                                    <span class="input-group-btn">
                                    <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Gender</label>
                            <div class="col-md-9">
                                <select class="form-control" name="gender">

                                    <option value="male" <?php if($employee->gender=='male'): ?> selected <?php endif; ?>>Male</option>
                                    <option value="female" <?php if($employee->gender=='female'): ?> selected <?php endif; ?>>Female
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Phone</label>
                            <div class="col-md-9">
                                <input type="text" name="mobileNumber" class="form-control"
                                       value="<?php echo e($employee->mobileNumber); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Address</label>
                            <div class="col-md-9">
                            <textarea name="localAddress" class="form-control"
                                      rows="3"><?php echo e($employee->localAddress); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Permanent Address</label>
                            <div class="col-md-9">
                            <textarea name="permanentAddress" class="form-control"
                                      rows="3"><?php echo e($employee->permanentAddress); ?></textarea>
                            </div>
                        </div>
                        <h4><strong>Account Login</strong></h4>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Email<span class="required">* </span></label>
                            <div class="col-md-9">
                                <input type="text" name="email" class="form-control" value="<?php echo e($employee->email); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Password</label>
                            <div class="col-md-9">
                                <input type="password" name="new_password" class="form-control">
                            </div>
                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="portlet box red-sunglo">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-calendar"></i>Company Details
                    </div>
                    <div class="actions">
                        <a href="javascript:;"
                           onclick="UpdateDetails('<?php echo $employee->employeeID; ?>','company');return false"
                           class="demo-loading-btn-ajax btn btn-sm btn-default ">
                            <i class="fa fa-save"></i> Save </a>
                    </div>
                </div>
                <div class="portlet-body">

                    
                    <?php echo Form::open(['method' => 'PUT','class' => 'form-horizontal','id' => 'company_details_form']); ?>

                    <input type="hidden" name="updateType" class="form-control" value="company">
                    <div id="company_alert">

                    </div>

                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Employee ID<span class="required">* </span></label>
                            <div class="col-md-9">
                                <input type="text" name="employeeID" class="form-control" readonly
                                       value="<?php echo e($employee->employeeID); ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3">Date of Joining</label>
                            <div class="col-md-3">
                                <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy"
                                     data-date-viewmode="years">
                                    <input type="text" class="form-control" name="joiningDate" readonly
                                           value="<?php if(empty($employee->joiningDate)): ?>00-00-0000 <?php else: ?> <?php echo e(date('d-m-Y',strtotime($employee->joiningDate))); ?> <?php endif; ?>">
                                    <span class="input-group-btn">
                                    <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Exit Date</label>
                            <div class="col-md-3">
                                <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy"
                                     data-date-viewmode="years">
                                    <input type="text" class="form-control" name="exit_date" readonly
                                           value="<?php if(empty($employee->exit_date)): ?> <?php else: ?> <?php echo e(date('d-m-Y',strtotime($employee->exit_date))); ?> <?php endif; ?>">
                                    <span class="input-group-btn">
                                    <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Status</label>
                            <div class="col-md-3">
                                <input type="checkbox" value="active" onchange="remove_exit();" class="make-switch"
                                       name="status" <?php if($employee->status=='active'): ?>checked
                                       <?php endif; ?> data-on-color="success" data-on-text="Active" data-off-text="Inactive"
                                       data-off-color="danger">
                            </div>
                            <div class="col-md-6">
                                (<strong>Note:</strong>Status active will remove the exit date)
                            </div>
                        </div>

                        <hr>
                     
                    </div>
                    <?php echo Form::close(); ?>



                    

                </div>
            </div>

            <div class="portlet box red-sunglo">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-calendar"></i>Bank Account Details
                    </div>
                    <div class="actions">
                        <a href="javascript:;" onclick="UpdateDetails('<?php echo e($employee->employeeID); ?>','bank');return false"
                           class="demo-loading-btn-ajax btn btn-sm btn-default ">
                            <i class="fa fa-save"></i> Save </a>
                    </div>
                </div>
                <div class="portlet-body">

                    
                    <?php echo Form::open(['method' => 'PUT','class' => 'form-horizontal','id' => 'bank_details_form']); ?>

                    <input type="hidden" name="updateType" class="form-control" value="bank">

                    <div id="bank_alert"></div>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Account Holder Name</label>
                            <div class="col-md-9">
                                <input type="text" name="accountName" class="form-control"
                                       value="<?php echo e($bank_details->accountName ?? ''); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Account Number</label>
                            <div class="col-md-9">
                                <input type="text" name="accountNumber" class="form-control"
                                       value="<?php echo e($bank_details->accountNumber ?? ''); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Bank Name</label>
                            <div class="col-md-9">
                                <input type="text" name="bank" class="form-control"
                                       value="<?php echo e($bank_details->bank ?? ''); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">IFSC Code</label>
                            <div class="col-md-9">
                                <input type="text" name="ifsc" class="form-control"
                                       value="<?php echo e($bank_details->ifsc ?? ''); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">PAN Number</label>
                            <div class="col-md-9">
                                <input type="text" name="pan" class="form-control" value="<?php echo e($bank_details->pan ?? ''); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Branch</label>
                            <div class="col-md-9">
                                <input type="text" name="branch" class="form-control"
                                       value="<?php echo e($bank_details->branch ?? ''); ?>">
                            </div>
                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                    


                </div>
            </div>
        </div>
    </div>
    <div class="clearfix">
        <div class="row ">
            <div class="col-md-12 col-sm-12">
                <div class="portlet box purple-wisteria">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-calendar"></i>Documents
                        </div>
                        <div class="actions">
                            <button onclick="UpdateDetails('<?php echo $employee->employeeID; ?>','documents')"
                                    class="btn btn-sm btn-default ">
                                <i class="fa fa-save"></i> Save
                            </button>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="portlet-body">
                            

                            <?php echo Form::open(['method' => 'PUT','route'=> ['admin.employees.update',
                            $employee->employeeID],'class' => 'form-horizontal','id' =>
                            'documents_details_form','files'=>true]); ?>

                            <input type="hidden" name="updateType" class="form-control" value="documents">
                            <div id="documents_alert">

                            </div>
                            <?php if(Session::get('successDocuments')): ?>
                                <div class="alert alert-success"><i class="fa fa-check"></i> <?php echo Session::get('successDocuments'); ?></div>
                            <?php endif; ?>

                            <?php if(Session::get('errorDocuments')): ?>
                                <div class="alert alert-danger"><i class="fa fa-warning"></i> <?php echo Session::get('errorDocuments'); ?></div>
                            <?php endif; ?>

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-2">Resume</label>
                                    <div class="col-md-5">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="input-group input-large">
                                                <div class="form-control uneditable-input" data-trigger="fileinput">
                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp; <span
                                                        class="fileinput-filename">
                                                </span>
                                                </div>
                                                <span class="input-group-addon btn default btn-file">
                                                <span class="fileinput-new">
                                                    Select file </span>
                                                <span class="fileinput-exists">
                                                    Change </span>
                                                <input type="file" name="resume">
                                            </span>
                                                <a href="#" class="input-group-addon btn btn-sm red fileinput-exists"
                                                   data-dismiss="fileinput">
                                                    Remove </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php if(isset($documents['resume'])): ?>
                                            <a href="<?php echo e($documents['resume']); ?>" target="_blank"
                                               class="btn btn-sm purple">View
                                                Resume</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Offer Letter</label>
                                    <div class="col-md-5">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="input-group input-large">
                                                <div class="form-control uneditable-input" data-trigger="fileinput">
                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp; <span
                                                        class="fileinput-filename">
                                                </span>
                                                </div>
                                                <span class="input-group-addon btn default btn-file">
                                                <span class="fileinput-new">
                                                    Select file </span>
                                                <span class="fileinput-exists">
                                                    Change </span>
                                                <input type="file" name="offerLetter">
                                            </span>
                                                <a href="#" class="input-group-addon btn btn-sm red fileinput-exists"
                                                   data-dismiss="fileinput">
                                                    Remove </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php if(isset($documents['offerLetter'])): ?>
                                            <a href="<?php echo e($documents['offerLetter']); ?>" target="_blank"
                                               class="btn btn-sm purple">Offer Letter</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Joining Letter</label>
                                    <div class="col-md-5">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="input-group input-large">
                                                <div class="form-control uneditable-input" data-trigger="fileinput">
                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp; <span
                                                        class="fileinput-filename">
                                                </span>
                                                </div>
                                                <span class="input-group-addon btn default btn-file">
                                                <span class="fileinput-new">
                                                    Select file </span>
                                                <span class="fileinput-exists">
                                                    Change </span>
                                                <input type="file" name="joiningLetter">
                                            </span>
                                                <a href="#" class="input-group-addon btn btn-sm red fileinput-exists"
                                                   data-dismiss="fileinput">
                                                    Remove </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php if(isset($documents['joiningLetter'])): ?>
                                            <a href="<?php echo e($documents['joiningLetter']); ?>" target="_blank"
                                               class="btn btn-sm purple">View Joining Letter</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Contract and Agreement</label>
                                    <div class="col-md-5">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="input-group input-large">
                                                <div class="form-control uneditable-input" data-trigger="fileinput">
                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp; <span
                                                        class="fileinput-filename">
                                                </span>
                                                </div>
                                                <span class="input-group-addon btn default btn-file">
                                                <span class="fileinput-new">
                                                    Select file </span>
                                                <span class="fileinput-exists">
                                                    Change </span>
                                                <input type="file" name="contract">
                                            </span>
                                                <a href="#" class="input-group-addon btn btn-sm red fileinput-exists"
                                                   data-dismiss="fileinput">
                                                    Remove </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php if(isset($documents['contract'])): ?>
                                            <a href="<?php echo e($documents['contract']); ?>" target="_blank"
                                               class="btn btn-sm purple">View Contract</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">ID Proof</label>
                                    <div class="col-md-5">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="input-group input-large">
                                                <div class="form-control uneditable-input" data-trigger="fileinput">
                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp; <span
                                                        class="fileinput-filename">
                                                </span>
                                                </div>
                                                <span class="input-group-addon btn default btn-file">
                                                <span class="fileinput-new">
                                                    Select file </span>
                                                <span class="fileinput-exists">
                                                    Change </span>
                                                <input type="file" name="IDProof">
                                            </span>
                                                <a href="#" class="input-group-addon btn btn-sm red fileinput-exists"
                                                   data-dismiss="fileinput">
                                                    Remove </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php if(isset($documents['IDProof'])): ?>
                                            <a href="<?php echo e($documents['IDProof']); ?>" target="_blank"
                                               class="btn btn-sm purple">View
                                                ID Proof</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix">
            </div>
        </div>

    </div>
    <?php echo $__env->make('admin.include.delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('include.show-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footerjs'); ?>

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <?php echo HTML::script('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'); ?>

    <?php echo HTML::script("assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"); ?>

    <?php echo HTML::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>

    <?php echo HTML::script('assets/admin/pages/scripts/components-pickers.js'); ?>


    <!-- END PAGE LEVEL PLUGINS -->

    <script>
        jQuery(document).ready(function () {
            ComponentsPickers.init();
            dept();
        });

        function dept() {

            $.getJSON("<?php echo e(route('admin.departments.ajax_designation')); ?>",
                {deptID: $('#department').val()},
                function (data) {
                    var model = $('#designation');
                    model.empty();
                    var selected = '';
                    var match = '<?php echo e($employee->designation ?? ''); ?>';
                    $.each(data, function (index, element) {
                        if (element.id == match) selected = 'selected';
                        else selected = '';
                        model.append("<option value='" + element.id + "' " + selected + ">" + element.designation + "</option>");
                    });

                });
        }

        // Javascript function to update the company info and Bank Info
        function UpdateDetails(id, type) {

            var form_id = '#' + type + '_details_form';
            var alert_div = '#' + type + '_alert';

            var url = "<?php echo e(route('admin.employees.update',':id')); ?>";
            url = url.replace(':id', id);
            $.easyAjax({
                type: 'POST',
                url: url,
                container: form_id,
                file: true,
                alertDiv: alert_div
            });
        }

        // Add New Salary
        function saveSalary(id) {
            var url = "<?php echo e(route('admin.salary.store')); ?>";
            url = url.replace(':id', id);
            $.easyAjax({
                type: 'POST',
                url: url,
                container: '#save_salary',
                data: $('#save_salary').serialize(),
                success: function (response) {
                    if (response.status == "success") {
                        $('#showModal').modal('hide');
                        $('#salaryData').append(response.viewData);
                    }
                }
            });
        }

        // Show Salary Modal
        function showSalary(id) {
            $('#showModal .modal-dialog').removeClass("modal-md").addClass("modal-lg");
            var url = "<?php echo e(route('admin.add-salary-modal',[':id'])); ?>";
            url = url.replace(':id', id);
            $.ajaxModal('#showModal', url);
            $('#showModal_div').removeClass("modal-dialog modal-lg").addClass("modal-dialog modal-md");
        }

        // Show Delete Modal and delete salary
        function del(id, type) {

            $('#deleteModal').modal('show');

            $("#deleteModal").find('#info').html('Are you sure ! You want to delete <strong>' + type + '</strong> Salary?.');

            $('#deleteModal').find("#delete").off().on("click", function () {

                var url = "<?php echo e(route('admin.salary.destroy',':id')); ?>";
                url = url.replace(':id', id);

                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    type: 'DELETE',
                    url: url,
                    data: {'_token': token},
                    container: "#deleteModal",
                    success: function (response) {
                        if (response.status == "success") {
                            $('#deleteModal').modal('hide');
                            $('#salary' + id).remove();
                        }
                    }
                });

            });
        }


        function remove_exit() {
            if ($("input[name=status]:checked").val() == "active") {
                $("input[name=exit_date]").val("");
            }
        }


        $("input[name=exit_date]").change(function () {
            $("input[name=status]").bootstrapSwitch('state', false);

        });
    </script>

    <?php if(Session::get('successDocuments')): ?>
        
        <script>
            $("html, body").animate({scrollTop: $(document).height()}, 2000);
        </script>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.adminlayouts.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Milan\Desktop\Work\keralavision\resources\views/admin/employees/edit.blade.php ENDPATH**/ ?>
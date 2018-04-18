<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add User</div>

                <div class="card-body">
                    <a class="btn btn-primary" href="<?php echo e(route('user.add')); ?>">Add User</a> 
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Manage User</div>
                <div class="card-body">
                    <table class="table table-hover m-0  table-actions-bar dt-responsive " cellspacing="0" width="100%" id="datatable">
                       <thead>
                            <tr>
                                <th>
                                    No.
                                </th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th class="hidden-sm">Action</th>
                            </tr>
                        </thead>
                         <tbody>
                            <?php $no=1; ?>
                            <?php $__currentLoopData = $userData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($no++); ?></td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="<?php echo e(route('user.edit', [$user->id])); ?>">Edit</a> <br>
                                        <form method="POST" action="<?php echo e(route('user.destroy', [$user->id])); ?>">
                                                <?php echo method_field('delete'); ?>

                                                <?php echo csrf_field(); ?>

                                                <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </tbody>
                    </table>
                </div>
            </div>        
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
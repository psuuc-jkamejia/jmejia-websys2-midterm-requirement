<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Edit Task</h2>

    <form action="<?php echo e(route('tasks.update', $task->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="<?php echo e($task->title); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" name="category" class="form-control" value="<?php echo e(old('category', $task->category)); ?>" required>
            </div>
        <div class="mb-3">
            <label class="form-label">Details</label>
            <textarea name="details" class="form-control"><?php echo e($task->details); ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Deadline</label>
            <input type="date" name="deadline" class="form-control" value="<?php echo e($task->deadline); ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Update Task</button>
        <a href="<?php echo e(route('tasks.index')); ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\acer user\TaskManagement\resources\views/tasks/edit.blade.php ENDPATH**/ ?>
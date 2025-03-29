<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Add Task</h2>

    <form action="<?php echo e(route('tasks.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" name="category" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Details</label>
            <textarea name="details" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="To-Do" <?php echo e(old('status') == 'To-Do' ? 'selected' : ''); ?>>To-Do</option>
                <option value="In Progress" <?php echo e(old('status') == 'In Progress' ? 'selected' : ''); ?>>In Progress</option>
                <option value="Completed" <?php echo e(old('status') == 'Completed' ? 'selected' : ''); ?>>Completed</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Deadline</label>
            <input type="date" name="deadline" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Attachment</label>
            <input type="file" name="attachment" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save Task</button>
        <a href="<?php echo e(route('tasks.index')); ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\KENN Folder\TaskManagement\resources\views/tasks/create.blade.php ENDPATH**/ ?>